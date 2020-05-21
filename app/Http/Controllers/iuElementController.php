<?php

namespace App\Http\Controllers;

use App\User;
use App\iuElement;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\DictionaryService;

class iuElementController extends Controller
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
     * Return elements list
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $elements = iuElement::all();

        return $this->validResponse($elements);
    }

    public function userElementsView($userType){

        $this->dictionaryService->getOne($userType);

        $userelementsView = iuElement::where([
            ['userType',$userType]])->get();
        return $this->successResponse($userelementsView);

    }

    /**
     * Create an instance of iuElement
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'element' => 'required|max:255',
            'canEdit' => 'required|integer|between:0,1',
            'canView' => 'required|integer|between:0,1',
            'userType' => 'required|in:' . User::USUARIO_ADMIN . ',' . User::USUARIO_REGULAR,
        ];

        $this->validate($request, $rules);

        $this->dictionaryService->getOne($request['userType']);

        $element = iuElement::create($request->all());

        return $this->validResponse($element, Response::HTTP_CREATED);
    }

    /**
     * Return an specific element
     * @return Illuminate\Http\Response
     */
    public function show($element)
    {
        $element = iuElement::findOrFail($element);

        return $this->validResponse($element);
    }

    /**
     * Update the information of an existing element
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $element)
    {
        $rules = [
            'element' => 'max:255',
            'canEdit' => 'integer|between:0,1',
            'canView' => 'integer|between:0,1',
            'userType' => 'in:' . User::USUARIO_ADMIN . ',' . User::USUARIO_REGULAR,
        ];

        $this->validate($request, $rules);

        $element = iuElement::findOrFail($element);

        $this->dictionaryService->getOne($request['userType']);

        $element->fill($request->all());

        if ($element->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $element->save();

        return $this->validResponse($element);
    }

    /**
     * Removes an existing element
     * @return Illuminate\Http\Response
     */
    public function destroy($element)
    {
        $element = iuElement::findOrFail($element);

        $element->delete();

        return $this->validResponse($element);
    }
}
