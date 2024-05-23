<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
            'password_confirm' => ['required', 'same:password'],
            'phone_no' => ['required'],
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $profilePicture = $request->file('profile_pic');
        $profilePictureName = time().'.'.$profilePicture->extension();
        $profilePicture->storeAs('public/profile_pictures', $profilePictureName);

        $user = $this->create(array_merge(
            $request->all(),
            ['profile_picture' => $profilePictureName]
        ));

        Auth::login($user);
        return redirect()->route('home');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {   
        // Create the user
        return User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone_no' => $data['phone_no'],
            'profile_picture' => $data['profile_picture'],
        ]);
    }

    /**
     * Handle user login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        // $isuser = User::where('role',"!=",'admin')->where('email',$request->email)->exists();
        $credentials = $request->only('email', 'password');
        // if (!$isuser) {
            if (Auth::attempt($credentials)) {
                return redirect()->route('home')->with('success','You are Logged-in');
            } else {
                // return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
                return redirect("login")->with('error','Oppes! You have entered invalid credentials');
            }
        // }
        return redirect("login")->with('error','Credentials are wrong.');
    }
}
