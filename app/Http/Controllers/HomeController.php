<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\Registrasi;
use App\Models\InformasiUser;
use App\Models\RumahSakit;
use App\Models\Vaksin;
use App\Models\Pembayaran;

class HomeController extends Controller
{
    public function index(){
        return view("User.homepage");
    }
  
    public function jadwal(){
        return view("User.jadwaltempat");
    }
    
    public function syarat(){
        return view("User.syarat");
    }

    public function harga(){
        return view("User.harga");
    }
    // ganti aja ini cuman nyoba buat ngeliat hasil doang
    public function homepageuser(){
        return view("User.akun.index");
    }

    //Akun
    public function login(){
        return view("User.akun.login");
    }

    public function loginAction(Request $request){
        if ($request->submit=="submit") {
            $request->validate([
                'email'=>'required|email',
                'password'=>'required'
            ]);   
        }
    }

    public function logout(Request $request){
    
    }

    public function daftar(){
        return view("User.akun.daftar");
    }

    public function daftarAction(Request $request){
        if ($request->submit=="submit") {
            $request->validate([
                'username'=>'required|string',
                'nama'=>'required|string',
                'email'=>'required|email',
                'password'=>'required'
            ]);

            $userid=mt_rand(100000000, 999999999);
            $count=0;
            while (Pendaftar::find($userid) && $count < 899999999) {
                $count++;
                $userid=mt_rand(100000000, 999999999);
            }

            Pendaftar::create(
                array(
                    'id_user'=>$userid,
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
