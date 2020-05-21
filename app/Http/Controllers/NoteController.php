<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Services\ItemService;
use App\Services\NoteService;
use Illuminate\Http\Response;

class NoteController extends Controller
{
    use ApiResponser;
    public $noteService;
    public $itemService;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NoteService $noteService, ItemService $itemService)
    {
        $this->noteService = $noteService;
        $this->itemService = $itemService;
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

    public function notesItem($item)
    {
        $this->itemService->getOne($item);
        return $this->successResponse($this->noteService->itemNotes($item));
    }

    /**
     * Creates an instance of note
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->itemService->getOne($request['item_id']);
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
        $this->itemService->getOne($request['item_id']);
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
