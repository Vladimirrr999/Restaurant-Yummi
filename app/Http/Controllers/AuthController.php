<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Testing\Fluent\Concerns\Has;


class AuthController extends BaseController
{
    public function showRegisterForm(){
        return view('auth.register', ['data' => $this->data]);
    }
    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullName' => ['required', 'string', 'max:255', function ($attribute, $value, $fail) {
                if (!preg_match('/^([A-Z][a-z]+)\s([A-Z][a-z]+)$/', $value)) {
                    $fail("Incorrect name. It should be in format: Vladimir Lobanov.");
                }
            }],
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ], [
            'required' => 'Field :attribute is required.',
            'email' => 'You need to enter valid email. (@gmail.com|ict.edu.rs).',
            'unique' => 'Email already registered.',
            'min' => 'Field :attribute must have :min characters.',
            'confirmed' => 'Confirmed password doesnt match the original one.',
            'fullName.string' => 'Name cannot contain special chars. (@,%,^,$,&,*)'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $defaultRole = Role::where('role', 'user')->first();
        $newUser = User::create([
            'fullName' => $request->input('fullName'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'role_id' => $defaultRole->id
        ]);

        if(!$newUser){
            return redirect()->back()->with('error', 'Error occuried while registering new user.');
        }

        return redirect()->route('login')->with('success', 'Succefully registered! Now you can login.');
    }
    public function showLoginForm(){
        return view('auth.login', ['data' => $this->data]);
    }
    public function loginUser(Request $request){
        $email = $request->email;
        $password = $request->password;
        $user = User::where('email',$email)->first();
        if(!$user){
            return redirect()->back()->with('error-msg', 'No user found!');
        }
        if(!Hash::check($password,$user->password)){
           return redirect()->back()->with('error-msg', 'Wrong password!');
        }
        Auth::login($user);
        return redirect()->route('home');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
