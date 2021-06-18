<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendaftar;
use App\Models\Registrasi;
use App\Models\InformasiUser;
use App\Models\RumahSakit;
use App\Models\Vaksin;
use App\Models\Pembayaran;

class HomeController extends Controller
{
    public function index(){
        $akun=Auth::user();
        return view("User.homepage",compact('akun'));
    }
  
    public function infoJadwal(){
        $akun=Auth::user();
        $list_rs=RumahSakit::all();
        return view("User.jadwaltempat", compact('list_rs'),compact('akun'));
    }
    
    public function syarat(){
        $akun=Auth::user();
        return view("User.syarat",compact('akun'));
    }

    public function harga(){
        $akun=Auth::user();
        $list_vaksin=Vaksin::all();
        return view("User.harga",compact('list_vaksin'),compact('akun'));
    }
    // ganti aja ini cuman nyoba buat ngeliat hasil doang
    public function homepageuser(){
        $akun=Auth::user();
        return view("User.akun.index", compact('akun'));
    }

    //Akun
    public function login(){
        if (Auth::check()) {
            return redirect("/");
        }
        else{
            return view("User.akun.login");
        }
    }

    public function loginAction(Request $request){
        if ($request->has('submit')) {
            $request->validate([
                'email'=> 'required|email',
                'password'=>'required'
            ]);

            $check = Auth::attempt($request->only('email','password'));
            if ($check) {
                $request->session()->put('pendaftar', $check);
                return redirect("/");
            }
        }
    }

    public function logout(Request $request){
        if (Auth::check()) {
            Auth::logout();
            $request->session()->forget('pendaftar');
            return redirect("/");
        }
        return redirect("login");
    }

    public function daftar(){
        if (Auth::check()) {
            return redirect("/");
        }

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

            Pendaftar::create([
                'id_user'=>$userid,
                'username' => $request->username,
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            return redirect("login");
        }
        else{
            return redirect("/");
        }

    }


    //Registrasi Vaksinasi
    public function registerVaksinasi(){
        $list_vaksin=Vaksin::all();
        $list_rs=RumahSakit::all();
        // return view();
    }

    public function registerVaksinasiAction(Request $request){
        if ($request->submit=="submit") {
            // code...
        }
    }

    public function infoRegistrasiVaksinasi(Request $request, $id){

    }
}
