<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

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
    protected $redirectPath = '/dashboard'; //added by mugdha
    protected $loginPath = '/auth/login'; //added by mugdha
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
        // dd("before");
        return Validator::make($data, [
            'name' => 'required|max:255',
            // 'email' => 'required|email|max:255|unique:users',
            'phone_no' => 'required|regex:/(01)[0-9]{9}/|unique:users,phone_no',
            'thana_id' => 'required',
            'user_type' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);
        // dd($data);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
            // dd("create");
            // dd($data);
        return User::create([
            'name' => $data['name'],
            'phone_no' => $data['phone_no'],
            'thana_id' => $data['thana_id'],
            'user_type' => $data['user_type'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
