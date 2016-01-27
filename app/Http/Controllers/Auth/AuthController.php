<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function getLogin()
    {
        if (Auth::user()->check()) return redirect('admin/dashboard');

        return view('auth.login');
    }


    public function postLogin(Request $request)
    {
        $field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $request->merge([$field => $request->input('email')]);

        $auth = $this->authenticate($request, $request->remember, $field);

        if ($auth == 'user') return response()->json(array('log' => 1, 'redirect' => '/admin/dashboard'));

        if ($auth == 'customer') return redirect('account');

        return redirect()->back();
    }


    public function authenticate(Request $request, $remember, $field)
    {
        if (Auth::user()->attempt($request->only($field, 'password'), $remember)) {

            return 'user';
        }

        if (Auth::customer()->attempt($request->only($field, 'password'), $remember)) {

            return 'customer';
        }
    }


    public function getLogout()
    {
        if (Auth::user()->check()) {
            Auth::user()->logout();
            return redirect('auth/login');
        }

        if (Auth::customer()->check()) {
            Auth::customer()->logout();
            return redirect('login');
        }

        return redirect()->back();

    }

}
