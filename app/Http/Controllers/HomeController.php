<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Auth;
use App\Http\Models\User;

class HomeController extends Controller
{
    public function index(){
        return view("User.homepage");
    }
    //Akun
    public function login(){
        return view("User.akun.login");
    }

    public function loginAction(Request $request){
        if ($request->submit=="login"){
            $request->validate([
                'email'=>'required|email',
                'password'=>'required'
            ]);

            if(Auth::attempt(['email'=> $request->email, 'password'=>$request->password])){
                $user=Auth::user();
                $request->session()->regenerate();
                return redirect("/")->with('account',$user);
            }
            else{
                return redirect()->back()->with('success', 'Inputed username or password is incorrect!');   
            }  
        }
        else{
            return redirect("/");
        }   
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }

    public function daftar(){
        return view("User.akun.daftar");
    }

    public function jadwal(){
        return view("User.jadwaltempat");
    }
    
    public function daftarpAction(Request $request){
        if ($request->submit=="signup") {
            $akun = $request->validate([
                'username'=>'required|string',
                'nama'=>'required|string',
                'email'=>'required|email',
                'password'=>'required'
            ]);

            User::create(
                array(
                    'username' => $request->username,
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'password' => bcrypt($request->password)
                )
            );

            return redirect("login");
        }
        else{
            return redirect("/");
        }

    }
}
