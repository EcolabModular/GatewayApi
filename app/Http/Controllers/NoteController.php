<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Services\NoteService;
use Illuminate\Http\Response;

class NoteController extends Controller
{
    use ApiResponser;
    public $noteService;



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
    }

    /**
     * Returns a list of note
     *
     * @return void
     */
    public function index()
    {
        return $this->successResponse($this->noteService->getAll());
    }
    /**
     * Creates an instance of note
     *
     * @return void
     */
    public function store(Request $request)
    {
        return $this->successResponse($this->noteService->create($request->all()), Response::HTTP_CREATED);
    }
    /**
     * Returns an specific note
     *
     * @return void
     */
    public function show($note)
    {
        return $this->successResponse($this->noteService->getOne($note));
    }
    /**
     * Updates an specific note
     *
     * @return void
     */
    public function update(Request $request,$note)
    {
        return $this->successResponse($this->noteService->edit($request->all(),$note));
    }
    /**
     * Returns an specific note
     *
     * @return void
     */
    public function destroy($note)
    {
        return $this->successResponse($this->noteService->delete($note));

    }

}
