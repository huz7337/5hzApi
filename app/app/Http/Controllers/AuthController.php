<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Http\Transformers\UserTransformer;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    /**
     * @var UserService
     */
    private UserService $_service;

    /**
     * @var UserTransformer
     */
    private UserTransformer $_transformer;


    /**
     * AuthController constructor.
     * @param UserService $service
     * @param UserTransformer $transformer
     */
    public function __construct(UserService $service, UserTransformer $transformer)
    {
        $this->_service = $service;
        $this->_transformer = $transformer;
    }


    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function loginView()
    {
        return view('auth.login');
    }


    /**
     * User sing-in
     * @param AuthLoginRequest $request
     * @return mixed
     */
    public function login(AuthLoginRequest $request)
    {
        $credentials = $request->validated();

        if(!Auth::validate($credentials)):
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return redirect()->intended();
    }

    /**
     * User logout
     * @return mixed
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.view');
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function registerView()
    {
        return view('auth.register');
    }


    /**
     * User sign-up
     * @param AuthRegisterRequest $request
     * @return mixed
     */
    public function register(AuthRegisterRequest $request)
    {
        $user = User::create($request->validated());

        auth()->login($user);
        return redirect()->intended();
    }
}
