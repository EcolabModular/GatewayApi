<?php

namespace App\Http\Controllers;

use App\Services\InstitutionService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\LaboratoryService;

class LaboratoryController extends Controller
{
    use ApiResponser;
    public $laboratoryService;
    public $institutionService;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LaboratoryService $laboratoryService, InstitutionService $institutionService)
    {
        $this->laboratoryService = $laboratoryService;
        $this->institutionService = $institutionService;
    }

    /**
     * Returns a list of laboratory
     *
     * @return void
     */
    public function index()
    {
        return $this->successResponse($this->laboratoryService->getAll());
    }
    /**
     * Creates an instance of laboratory
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->institutionService->getOne($request['institution_id']);
        return $this->successResponse($this->laboratoryService->create($request->all()), Response::HTTP_CREATED);
    }
    /**
     * Returns an specific laboratory
     *
     * @return void
     */
    public function show($laboratory)
    {
        return $this->successResponse($this->laboratoryService->getOne($laboratory));
    }
    /**
     * Updates an specific laboratory
     *
     * @return void
     */
    public function update(Request $request,$laboratory)
    {
        $this->institutionService->getOne($request['institution_id']);
        return $this->successResponse($this->laboratoryService->edit($request->all(),$laboratory));
    }
    /**
     * Returns an specific laboratory
     *
     * @return void
     */
    public function destroy($laboratory)
    {
        return $this->successResponse($this->laboratoryService->delete($laboratory));

    }

}
