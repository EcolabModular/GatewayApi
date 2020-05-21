<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Services\ItemService;
use Illuminate\Http\Response;
use App\Services\ReportService;
use App\Services\SchedularyService;

class SchedularyController extends Controller
{
    use ApiResponser;
    public $schedularyService;
    public $reportService;
    public $itemService;



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SchedularyService $schedularyService, ReportService $reportService, ItemService $itemService)
    {
        $this->schedularyService = $schedularyService;
        $this->reportService = $reportService;
        $this->itemService = $itemService;
    }

    /**
     * Returns a list of schedulary
     *
     * @return void
     */
    public function index()
    {
        return $this->successResponse($this->schedularyService->getAll());
    }

    public function itemSchedulary($item)
    {
        $this->itemService->getOne($item);
        return $this->successResponse($this->schedularyService->itemschedulary($item));
    }
    /**
     * Creates an instance of schedulary
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->reportService->getOne($request['report_id']);
        $this->itemService->getOne($request['item_id']);
        return $this->successResponse($this->schedularyService->create($request->all()), Response::HTTP_CREATED);
    }
    /**
     * Returns an specific schedulary
     *
     * @return void
     */
    public function show($schedulary)
    {
        return $this->successResponse($this->schedularyService->getOne($schedulary));
    }
    /**
     * Updates an specific schedulary
     *
     * @return void
     */
    public function update(Request $request,$schedulary)
    {
        $this->reportService->getOne($request['report_id']);
        $this->itemService->getOne($request['item_id']);
        return $this->successResponse($this->schedularyService->edit($request->all(),$schedulary));
    }
    /**
     * Returns an specific schedulary
     *
     * @return void
     */
    public function destroy($schedulary)
    {
        return $this->successResponse($this->schedularyService->delete($schedulary));

    }

}
