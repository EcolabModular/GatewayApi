<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\SchedularyService;

class SchedularyController extends Controller
{
    use ApiResponser;
    public $schedularyService;



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SchedularyService $schedularyService)
    {
        $this->schedularyService = $schedularyService;
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

    public function itemSchedulary($item){
        return $this->successResponse($this->schedularyService->itemschedulary($item));
    }
    /**
     * Creates an instance of schedulary
     *
     * @return void
     */
    public function store(Request $request)
    {
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
