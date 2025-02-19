<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view('users.registration');
    }

    public function register(Request $request){
        $request->validate(['name'=>'required|string|unique:users',
            'email'=>'required|email',
            'password'=>'required|string|min:6|confirmed',]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password  = Hash::make($request->password);
        $user->save();
        Auth::login($user);
        return redirect('profile');
    }

    public function profile(Request $request){
        if (Auth::user()->admin){
            $films = Film::all();
            $data = ['films' => $films];
            return view('admin.profile_admin', $data);
        }
        else{
            return view('users.profile');
        }

    }

/*
 * $rev = Review::where('status', NULL)->get();
 * $data = ['reviews' => $rev];
 */


    public function index_auth(){
        return view('users.login');
    }

    public function login(Request $request){
        $request->validate([
            'name'=>'required',
            'password'=>'required|min:6'
        ]);
        if (Auth::attempt(['name'=>$request['name'],'password'=>$request['password']], true)){
            return redirect('profile');
        }
        return redirect()->back()->with('error', 'Неправильный логин или пароль');

    }


    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
