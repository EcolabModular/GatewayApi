<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Services\FileService;
use Illuminate\Http\Response;

class FileController extends Controller
{
    use ApiResponser;
    public $fileService;



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    /**
     * Returns a list of file
     *
     * @return void
     */
    public function index()
    {
        return $this->successResponse($this->fileService->getAll());
    }
    /**
     * Creates an instance of file
     *
     * @return void
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $multipart = [
            [
                'name'     => 'idReport',
                'contents' => $request['idReport'],
                'headers'  => [ 'Content-Type' => 'application/json']
            ],
            [
                'name'     => 'file',
                'contents' => $request->hasfile('file') == true ? file_get_contents($request['file']) : "",
                'filename' => $request->hasfile('file') == true ? $request->file('file')->getClientOriginalName() : ""
            ],
        ];
        //dd($multipart);
        return $this->successResponse($this->fileService->create($multipart), Response::HTTP_CREATED);
    }
    /**
     * Returns an specific file
     *
     * @return void
     */
    public function show($file)
    {
        return $this->successResponse($this->fileService->getOne($file));
    }
    /**
     * Updates an specific file
     *
     * @return void
     */
    public function update(Request $request, $file)
    {

        if($request->hasFile('file')){
            $multipart = [
                [
                    'name'     => 'idReport',
                    'contents' => $request['idReport'],
                    'headers'  => [ 'Content-Type' => 'application/json']
                ],
                [
                    'name'     => '_method',
                    'contents' => $request['_method'],
                    'headers'  => [ 'Content-Type' => 'application/json']
                ],
                [
                    'name'     => 'file',
                    'contents' => $request->hasfile('file') == true ? file_get_contents($request['file']) : "",
                    'filename' => $request->hasfile('file') == true ? $request->file('file')->getClientOriginalName() : ""
                ],
            ];
            return $this->successResponse($this->fileService->editWithFile($multipart,$file));
        }else{
            return $this->successResponse($this->fileService->edit($request->all(),$file));
        }

    }
    /**
     * Returns an specific file
     *
     * @return void
     */
    public function destroy($file)
    {
        return $this->successResponse($this->fileService->delete($file));

    }

}
