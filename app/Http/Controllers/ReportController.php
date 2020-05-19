<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\ReportService;

class ReportController extends Controller
{
    use ApiResponser;
    public $reportService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }

    /**
     * Returns a list of report
     *
     * @return void
     */
    public function index()
    {
        return $this->successResponse($this->reportService->getAll());
    }
    /**
     * Creates an instance of report
     *
     * @return void
     */
    public function store(Request $request)
    {
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
