<?php

namespace App\Http\Controllers;

use App\Services\DictionaryService;
use App\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\InstitutionService;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use ApiResponser;

    public $institutionService;
    public $dictionaryService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(InstitutionService $institutionService, DictionaryService $dictionaryService)
    {
        $this->dictionaryService = $dictionaryService;
        $this->institutionService = $institutionService;
    }

    /**
     * Return users list
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return $this->validResponse($users);
    }

    /**
     * Create an instance of User
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'code' => 'required|min:9|unique:users',
            'gender' => 'required|in:' . User::MASCULINO . ',' . User::FEMENINO,
            'phone' => 'min:10',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'userType' => 'required|in:' . User::USUARIO_ADMIN . ',' . User::USUARIO_REGULAR,
            'institution_id' => 'required|integer|min:1',
        ];

        $this->validate($request, $rules);

        $this->dictionaryService->getOne($request['userType']);
        $this->institutionService->getOne($request['institution_id']);

        $fields = $request->all();
        $fields['password'] = Hash::make($request->password);
        $fields['name'] = ucwords(strtolower($request->name));
        $fields['lastname'] = ucwords(strtolower($request->lastname));

        $user = User::create($fields);

        return $this->validResponse($user, Response::HTTP_CREATED);
    }

    /**
     * Return an specific user
     * @return Illuminate\Http\Response
     */
    public function show($user)
    {
        $user = User::findOrFail($user);

        return $this->validResponse($user);
    }

    /**
     * Update the information of an existing user
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        $rules = [
            'name' => 'max:255',
            'lastname' => 'max:255',
            'gender' => 'in:' . User::MASCULINO . ',' . User::FEMENINO,
            'phone' => 'min:10',
            'email' => 'email|unique:users,email,' . $user,
            'code' => 'min:9|unique:users,code,' . $user,
            'password' => 'min:6|confirmed',
            'userType' => 'in:' . User::USUARIO_ADMIN . ',' . User::USUARIO_REGULAR,
            'institution_id' => 'integer|min:1',
        ];

        $this->validate($request, $rules);

        $user = User::findOrFail($user);

        $this->dictionaryService->getOne($request['userType']);
        $this->institutionService->getOne($request['institution_id']);

        $user->fill($request->all());

        $user->name = ucwords(strtolower($request->name));
        $user->lastname = ucwords(strtolower($request->lastname));

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($user->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user->save();

        return $this->validResponse($user);
    }

    /**
     * Removes an existing user
     * @return Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $user = User::findOrFail($user);

        $user->delete();

        return $this->validResponse($user);
    }

    /**
     * Identifies the curren user
     * @return Illuminate\Http\Response
     */
    public function me(Request $request)
    {
        return $this->validResponse($request->user());
    }
}
