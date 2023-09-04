<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Auth extends Controller
{
 
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:User,Email',
            'password' => 'required'
        ]);

        $user = User::where('Email','=',$request->email)->first();
        

        if($user->Password != $request->password)
        {
            return redirect('/')->with('status','incorrect password');
        } else {
            Session::put('LoginUsername',$user->FullName);
            Session::put('LoginRole',$user->UserRole);
            return redirect('/dashboard');
        }
    }

    public function signup(Request $request){
        $request->validate([
            'username' => 'required|min:3|max:40',
            'email' => 'required|unique:User,Email',
            'password' => 'required|min:6|max:12',
            'phone' => 'required'
        ]);
        if(Str::endsWith($request->email, '@gmail.com') != true)
        {
            return redirect('/signup')->with('status','email must ended with @gmail.com');
        }else if(Str::startsWith($request->phone, '08') != true)
        {
            return redirect('/signup')->with('status','phone number must start with 08');
        }else{
            $data = [
                'FullName' => $request->fullname,
                'Email' => $request->email,
                'Password' => $request->password,
                'PhoneNumber' => $request->phone,
                'UserRole' => 'User'
            ];
        
            User::insert($data);
        
            // Redirect to a success page or perform other actions as needed
            return redirect('/signup')->with('status', 'Registration successful!');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
}