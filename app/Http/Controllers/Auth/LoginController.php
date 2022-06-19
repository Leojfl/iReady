<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    public function username(){
        return 'username';
    }


    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function autenticate(Request $request)
    {
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'username.required' => 'Correo requerido',
                'password.required' => 'Contraseña requerida',
            ],
            $request->all()
        );

        $credentials = [
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ];
        if (Auth::attempt($credentials)) {
            $role = User::find(Auth::id())->role;

            if ($role->id == Role::ADMIN) {
                return redirect(route('admin_index'));
            }

            if ($role->id == Role::STORE) {
                return redirect(route('store_index'));
            }

            if ($role->id == Role::MANAGER) {
                return redirect(route('admin_index'));
            }

            if ($role->id == Role::WAITER) {
                return redirect(route('admin_index'));
            }

            if ($role->id == Role::DELIVERY) {
                return redirect(route('admin_index'));
            }
            
        }
        return back()
        ->withErrors([ 'username' => ['Correo o contraseña incorrectos']])
        ->withInput($request->all());
    }
    public function logout(){
        Auth::logout();
        return redirect(route('login'));
    }
}
