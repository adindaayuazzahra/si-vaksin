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
    // cuman buat ngeiat hasil tampilan nya aja
    public function konfirmasi() {
        $akun=Auth::user();
        return view("User.akun.konfirmasi",compact('akun'));
    }
    
    public function rincian() {
        $akun=Auth::user();
        return view("User.akun.rincian",compact('akun'));
    }

    public function index(){
        $akun=Auth::user();
        return view("User.homepage",compact('akun'));
    }
  
    public function infoJadwal(){
        $akun=Auth::user();
        $list_rs=RumahSakit::all();
        return view("User.jadwaltempat", ['list_rs' => $list_rs,'akun'=>$akun]);
    }
    
    public function syarat(){
        $akun=Auth::user();
        return view("User.syarat",compact('akun'));
    }

    
    public function harga(){
        $akun=Auth::user();
        $list_vaksin=Vaksin::all();
        return view("User.harga",['list_vaksin' => $list_vaksin,'akun'=>$akun]);
    }

    
    public function registrasiVaksinasi(){
        $akun=Auth::user();
        $list_vs=Vaksin::all();
        $list_rs=RumahSakit::all();
        return view("User.akun.form",['list_rs' => $list_rs,'akun'=>$akun,'list_vs'=>$list_vs]);
    }

    public function registrasiVaksinasiAction(Request $request){
        // dd($request->all());
        $akun=Auth::user();
        $request->validate([
            'nik'=>'required',
            'nama'=>'required|string',
            'alamat'=>'required|string',
            'vaksin'=>'required',
            'rs'=>'required',
            'tgl'=>'required',
            'time'=>'required',
            'keterangan'=>'string',
        ]);
        $IU=InformasiUser::create([
            'id_user'=>$akun->id_user,
            'nik'=>$request->nik,
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
        ]);

        $PVS=Registrasi::create([
            'id_user'=>$akun->id_user,
            'id_rs'=>$request->rs,
            'id_vaksin'=>$request->vaksin,
            'tanggal_vaksinasi'=>$request->tgl,
            'jam_vaksinasi'=>$request->time,
            'keterangan'=>$request->keterangan,
        ]);
        if ($IU) {
            if ($PVS) {
                return redirect("/");
            }
        }
        return redirect()->back();
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
        return redirect()->back()->with('msg','Username atau password salah');
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
