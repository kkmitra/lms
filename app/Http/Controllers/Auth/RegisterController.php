<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Role\UserRole;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        /**@var \App\User */
        $user = Auth::user();

        if($user->hasRole(UserRole::ROLE_CUSTOMER)) {
            return abort('403');
        }

        $roles = [];

        if($user->hasRole(UserRole::ROLE_ADMIN)) {
            $roles = [
                UserRole::ROLE_MANAGEMENT => UserRole::getRoleName(UserRole::ROLE_MANAGEMENT),
                UserRole::ROLE_CUSTOMER => UserRole::getRoleName(UserRole::ROLE_CUSTOMER)
            ];
        } elseif ($user->hasRole(UserRole::ROLE_MANAGEMENT)) {
            $roles = [
                UserRole::ROLE_CUSTOMER => UserRole::getRoleName(UserRole::ROLE_CUSTOMER)
            ];
        }

        return view('auth.register', ["roles" => $roles]);
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
            'roles' =>  ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = (new User([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]));
        $user->addRole($data['roles']);
        $user->save();

        return $user;
    }
}
