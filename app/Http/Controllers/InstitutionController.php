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
    public function index()
    {
        return $this->successResponse($this->institutionService->getAll());
    }
    /**
     * Creates an instance of institution
     *
     * @return void
     */
    public function store(Request $request)
    {
        return $this->successResponse($this->institutionService->create($request->all()), Response::HTTP_CREATED);
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
        return $this->successResponse($this->institutionService->edit($request->all(),$institution));
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
