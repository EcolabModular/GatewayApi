<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\DictionaryService;

class DictionaryController extends Controller
{
    use ApiResponser;


    public $dictionaryService;



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DictionaryService $dictionaryService)
    {
        $this->dictionaryService = $dictionaryService;
    }

    /**
     * Returns a list of dictionary
     *
     * @return void
     */
    public function index(Request $request)
    {
        return $this->successResponse($this->dictionaryService->getAll($request->all()));
    }
    /**
     * Creates an instance of dictionary
     *
     * @return void
     */
    public function store(Request $request)
    {
        return $this->successResponse($this->dictionaryService->create($request->all()), Response::HTTP_CREATED);
    }
    /**
     * Returns an specific dictionary
     *
     * @return void
     */
    public function show($dictionary)
    {
        return $this->successResponse($this->dictionaryService->getOne($dictionary));
    }
    /**
     * Updates an specific dictionary
     *
     * @return void
     */
    public function update(Request $request,$dictionary)
    {
        return $this->successResponse($this->dictionaryService->edit($request->all(),$dictionary));
    }
    /**
     * Returns an specific dictionary
     *
     * @return void
     */
    public function destroy($dictionary)
    {
        return $this->successResponse($this->dictionaryService->delete($dictionary));

    }

}
