<?php

namespace App\Http\Controllers\Auth;
use App\Http\Requests\loginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        $this->data['headline'] = 'Login';
        $this->data['mode'] = 'login';
        return view('login.form', $this->data);
    }

   public function Confirm(loginRequest $request){
       $data = $request->only('email', 'password');
       if(Auth::attempt($data))
       {
            return redirect()->intended('dashboard');
       }
       else{
            return redirect()->route('login')->withErrors(['Invalid Username & Password']);
       }

   }

   public function logout()
   {
       Auth::logout();
       return redirect()->route('login');
   }
}
