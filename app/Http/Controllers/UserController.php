<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function login()
    {
        if (Auth::check()){
            return redirect()->intended("/");
        }else{
            return view('front.pages.login');

        }



    }
    public function signup()
    {
        return view('front.pages.sign');

    }

    public function register(Request $request)
    {
       $data = $request->validate([
           'email' => 'required|email|max:255|unique:users',
           'password' => 'required|min:8'
       ]);

       $user = User::create($data);

    }

    public function authenticate( Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'

        ]);
      if(Auth::attempt($data)){
          $request->session()->regenerate();
          return redirect()->intended("/");
      }else{
          return "wrong";
      }
    }

    public function logout()
    {
       if (Auth::check()){
           Auth::logout();
           return redirect()->route("front.login");

       }else{
           return redirect()->route("front.login");
       }
    }

    public function post()
    {
        $categories = Category::all();
        return view('admin.post', compact('categories'));
    }
}
