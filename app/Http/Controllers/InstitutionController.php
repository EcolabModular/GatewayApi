<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\InstitutionService;

class InstitutionController extends Controller
{
    use ApiResponser;

    public $institutionService;



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(InstitutionService $institutionService)
    {
        $this->institutionService = $institutionService;
    }

    /**
     * Returns a list of institution
     *
     * @return void
     */
    public function index(Request $request)
    {
        return $this->successResponse($this->institutionService->getAll($request->all()));
    }
    /**
     * Creates an instance of institution
     *
     * @return void
     */
    public function store(Request $request)
    {
        $multipart = [
            [
                'name'     => 'name',
                'contents' => $request['name'],
                'headers'  => [ 'Content-Type' => 'application/json']
            ],
            [
                'name'     => 'acronym',
                'contents' => $request['acronym'],
                'headers'  => [ 'Content-Type' => 'application/json']
            ],
            [
                'name' => 'description',
                'contents' => $request['description'],
                'headers'  => [ 'Content-Type' => 'application/json']
            ],
            [
                'name' => 'address',
                'contents' => $request['address'],
                'headers'  => [ 'Content-Type' => 'application/json']
            ],
            [
                'name'     => 'file',
                'contents' => $request->hasfile('file') == true ? file_get_contents($request['file']) : "",
                'filename' => $request->hasfile('file') == true ? $request->file('file')->getClientOriginalName() : ""
            ],
        ];

        return $this->successResponse($this->institutionService->create($multipart), Response::HTTP_CREATED);
    }
    /**
     * Returns an specific institution
     *
     * @return void
     */
    public function show($institution)
    {
        return $this->successResponse($this->institutionService->getOne($institution));
    }
    /**
     * Updates an specific institution
     *
     * @return void
     */
    public function update(Request $request,$institution)
    {
        if($request->hasFile('file')){
            $multipart = [
                [
                    'name'     => 'name',
                    'contents' => $request['name'],
                    'headers'  => [ 'Content-Type' => 'application/json']
                ],
                [
                    'name'     => 'acronym',
                    'contents' => $request['acronym'],
                    'headers'  => [ 'Content-Type' => 'application/json']
                ],
                [
                    'name' => 'description',
                    'contents' => $request['description'],
                    'headers'  => [ 'Content-Type' => 'application/json']
                ],
                [
                    'name' => 'address',
                    'contents' => $request['address'],
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
            return $this->successResponse($this->institutionService->editWithFile($multipart,$institution));
        }else{
            return $this->successResponse($this->institutionService->edit($request->all(),$institution));
        }
    }
    /**
     * Returns an specific institution
     *
     * @return void
     */
    public function destroy($institution)
    {
        return $this->successResponse($this->institutionService->delete($institution));

    }

}
