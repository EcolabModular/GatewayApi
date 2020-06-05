<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Services\ItemService;
use Illuminate\Http\Response;
use App\Services\LaboratoryService;

class ItemController extends Controller
{
    use ApiResponser;
    public $itemService;
    public $laboratoryService;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ItemService $itemService, LaboratoryService $laboratoryService)
    {
        $this->itemService = $itemService;
        $this->laboratoryService = $laboratoryService;
    }

    /**
     * Returns a list of item
     *
     * @return void
     */
    public function index()
    {
        return $this->successResponse($this->itemService->getAll());
    }
    /**
     * Creates an instance of item
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->laboratoryService->getOne($request['laboratory_id']);


        $multipart = [
            [
                'name'     => 'name',
                'contents' => $request['name'],
                'headers'  => [ 'Content-Type' => 'application/json']
            ],
            [
                'name' => 'description',
                'contents' => $request['description'],
                'headers'  => [ 'Content-Type' => 'application/json']
            ],
            [
                'name' => 'laboratory_id',
                'contents' => $request['laboratory_id'],
                'headers'  => [ 'Content-Type' => 'application/json']
            ],
            [
                'name'     => 'file',
                'contents' => $request->hasfile('file') == true ? file_get_contents($request['file']) : "",
                'filename' => $request->hasfile('file') == true ? $request->file('file')->getClientOriginalName() : ""
            ],
        ];


        return $this->successResponse($this->itemService->create($multipart), Response::HTTP_CREATED);
    }
    /**
     * Returns an specific item
     *
     * @return void
     */
    public function show($item)
    {
        return $this->successResponse($this->itemService->getOne($item));
    }
    /**
     * Updates an specific item
     *
     * @return void
     */
    public function update(Request $request,$item)
    {
        $this->laboratoryService->getOne($request['laboratory_id']);

        if($request->hasFile('file')){
            $multipart = [
                [
                    'name'     => 'name',
                    'contents' => $request['name'],
                    'headers'  => [ 'Content-Type' => 'application/json']
                ],
                [
                    'name' => 'description',
                    'contents' => $request['description'],
                    'headers'  => [ 'Content-Type' => 'application/json']
                ],
                [
                    'name' => 'laboratory_id',
                    'contents' => $request['laboratory_id'],
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
            return $this->successResponse($this->itemService->editWithFile($multipart,$item));
        }else{
            return $this->successResponse($this->itemService->edit($request->all(),$item));
        }
    }
    /**
     * Returns an specific item
     *
     * @return void
     */
    public function destroy($item)
    {
        return $this->successResponse($this->itemService->delete($item));

    }

}
