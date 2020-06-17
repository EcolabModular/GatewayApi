<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\DictionaryService;
use App\Services\ReportFieldService;

class ReportFieldController extends Controller
{
    use ApiResponser;
    public $reportFieldService;
    public $dictionaryService;



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ReportFieldService $reportFieldService, DictionaryService $dictionaryService)
    {
        $this->reportFieldService = $reportFieldService;
        $this->dictionaryService = $dictionaryService;
    }

    /**
     * Returns a list of reportField
     *
     * @return void
     */
    public function index(Request $request)
    {
        return $this->successResponse($this->reportFieldService->getAll($request->all()));
    }


    public function fieldsReport($reportType)
    {
        $this->dictionaryService->getOne($reportType);
        return $this->successResponse($this->reportFieldService->reportFields($reportType));
    }

    /**
     * Creates an instance of reportField
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->dictionaryService->getOne($request['reportType_id']);
        return $this->successResponse($this->reportFieldService->create($request->all()), Response::HTTP_CREATED);
    }
    /**
     * Returns an specific reportField
     *
     * @return void
     */
    public function show($reportField)
    {
        return $this->successResponse($this->reportFieldService->getOne($reportField));
    }
    /**
     * Updates an specific reportField
     *
     * @return void
     */
    public function update(Request $request,$reportField)
    {
        $this->dictionaryService->getOne($request['reportType_id']);
        return $this->successResponse($this->reportFieldService->edit($request->all(),$reportField));
    }
    /**
     * Returns an specific reportField
     *
     * @return void
     */
    public function destroy($reportField)
    {
        return $this->successResponse($this->reportFieldService->delete($reportField));

    }

}
