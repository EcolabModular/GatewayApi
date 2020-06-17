<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\ReportService;
use App\Services\DictionaryService;

class ReportController extends Controller
{
    use ApiResponser;
    public $reportService;
    public $dictionaryService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ReportService $reportService, DictionaryService $dictionaryService)
    {
        $this->reportService = $reportService;
        $this->dictionaryService = $dictionaryService;
    }

    /**
     * Returns a list of report
     *
     * @return void
     */
    public function index(Request $request)
    {
        return $this->successResponse($this->reportService->getAll($request->all()));
    }
    /**
     * Creates an instance of report
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->dictionaryService->getOne($request['reportType_id']);
        return $this->successResponse($this->reportService->create($request->all()), Response::HTTP_CREATED);
    }
    /**
     * Returns an specific report
     *
     * @return void
     */
    public function show($report)
    {
        return $this->successResponse($this->reportService->getOne($report));
    }
    /**
     * Updates an specific report
     *
     * @return void
     */
    public function update(Request $request,$report)
    {
        $this->dictionaryService->getOne($request['reportType_id']);
        return $this->successResponse($this->reportService->edit($request->all(),$report));
    }
    /**
     * Returns an specific report
     *
     * @return void
     */
    public function destroy($report)
    {
        return $this->successResponse($this->reportService->delete($report));

    }

}
