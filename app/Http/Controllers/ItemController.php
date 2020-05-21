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

        return $this->successResponse($this->itemService->create($request->all()), Response::HTTP_CREATED);
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
        return $this->successResponse($this->itemService->edit($request->all(),$item));
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
