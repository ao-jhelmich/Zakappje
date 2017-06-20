<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'lastName' => 'required|string|max:55|',
            'streetAdress' => 'required|string|max:255|',
            'houseNumber' => 'required|integer|min:1|',
            'city' => 'required|string|max:255|',
            'postal_code' => 'required|string|max:255|',
            'user_phone_number' => 'required|integer|min:10|',
            'birth_day' => 'required|date|min:1',
            'user_parent_name' => 'required|string|max:255|',
            'user_parent_email' => 'required|email|max:255|',
            'user_parent_phone' => 'required|integer|min:10|',

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
        $birthday = explode('-', $data['birth_day']);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'lastName' => $data['lastName'],
            'streetAdress' => $data['streetAdress'],
            'houseNumber' => $data['houseNumber'],
            'city' => $data['city'],
            'postal_code' => $data['postal_code'],
            'user_phone_number' => $data['user_phone_number'],
            'birth_day_day' => $birthday[2],
            'birth_day_month' => $birthday[1],
            'birth_day_year' => $birthday[0],
            'user_parent_name' => $data['user_parent_name'],
            'user_parent_email' => $data['user_parent_email'],
            'user_parent_phone' => $data['user_parent_phone'],
        ]);
    }
}
