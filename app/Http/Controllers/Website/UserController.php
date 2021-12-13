<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function registration(Request $request)
    {
        //validate this request
        $request->validate([
           'username'=>'required',
           'email'=>'email|required',
           'password'=>'required',
           'mobile'=>'required|digits:10',
        ]);

        User::create([
           'name'=>$request->username,
           'email'=>$request->email,
           'password'=>bcrypt($request->password),
           'mobile'=>$request->mobile,
        ]);

        return redirect()->back()->with('batch','Registration Successful.');



    }
    public function userLogin(Request $request){
        // dd($request->all());
        $userpost= $request->except('_token');
        // dd($userpost);
        // dd(Auth::attempt($userpost));
        if (Auth::attempt($userpost)) {
            return redirect()->back();
        }
        else
        return redirect()->back();
        return redirect()->back()->with('batch','email not found.');
    }

    public function userLogout(){
        Auth::logout();
        return redirect()->back();
    }
}
