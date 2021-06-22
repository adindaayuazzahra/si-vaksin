<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use App\Models\Registrasi;
use App\Models\InformasiUser;
use App\Models\RumahSakit;
use App\Models\Vaksin;
use App\Models\Pembayaran;
use App\Models\User;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminController extends Controller
{

    public function index(){
        $akun = Auth::user();
        return view("Admin.index", compact('akun'));
    }
    
    //Akun 
    public function login(){
        if (Auth::check()) {
            $akun=Auth::user();
            return redirect("admin");
        }
        return view("User.akun.login");
    }

    public function loginAction(Request $request){
        if ($request->has('submit')) {
            $request->validate([
                'email'=> 'required|email',
                'password'=>'required'
            ]);

            $authen = $request->only('email','password');
            $check = Auth::attempt($authen);
            if ($check) {
                $request->session()->regenerate();
                return redirect("admin");
            }
        }
        return redirect()->back()->with('msg','Username atau password salah');    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("login");
    }

    //Data Laporan
    //Laporan pendaftaran
    public function indexPendaftaran(){
        $akun=Auth::user();
        $laporan = Registrasi::with(['status'])->get();
        $status=Status::all();
        return view("Admin.laporan.pendaftaran.index", ['laporan' => $laporan,'akun' => $akun, 'list_status' => $status]);
    }

    public function editPendaftaran(Request $request, $id){
        $registrasi=Registrasi::find($id);
        return response()->json($registrasi);
    }

    public function editPendaftaranAction(Request $request){
        $request->validate([
            'id_pendaftaran'=>'required',
            'id_status'=>'required',
        ]);
        
        Registrasi::find($request->id_pendaftaran)->update([
            'id_status'=>$request->id_status,
        ]);
        
        $laporan=Registrasi::with(['status'])->find($request->id_pendaftaran);
        return response()->json($laporan);
    }

    public function delPendaftaran($id){
        Registrasi::destroy($id);
        return redirect("admin/laporan/pendaftaran");
    }

    //Laporan Pembayaran
    public function indexPembayaran(){
        $akun=Auth::user();
        $laporan=Pembayaran::all();
        return view("Admin.laporan.pembayaran.index",['akun'=>$akun,'laporan'=>$laporan]);
    }

    public function valPembayaran(Request $request,$id){
        $pembayaran=Pembayaran::find($id);
        if ($request->submit=="payment") {
            $current_timestamp = Carbon::now()->toDateTimeString();
            $pembayaran->update([
                'id_pembayaran'=>$pembayaran->id_pembayaran,
                'id_pendaftaran'=>$pembayaran->id_pendaftaran,
                'tgl_pembayaran'=>$current_timestamp,
                'total_harga'=>$pembayaran->total_harga,
            ]);
        }
        else{
            if(!empty($pembayaran->tgl_pembayaran)){
                $pembayaran->update([
                    'id_pembayaran'=>$pembayaran->id_pembayaran,
                    'id_pendaftaran'=>$pembayaran->id_pendaftaran,
                    'tgl_pembayaran'=>null,
                    'total_harga'=>$pembayaran->total_harga,
                ]);
            }
        }
        return redirect("admin/laporan/pembayaran");
        
    }

    //Data Vaccine
    public function indexVaksin(){
        $akun=Auth::user();
        $list_vaksin=Vaksin::all();
        return view("Admin.vaksin.index", ['list_vaksin' => $list_vaksin,'akun'=>$akun]);
    }

    public function addVaksin(Request $request){
            $request->validate([
                'img'=>'image|mimes:png,jpeg,jpg,gif,svg',
                'nama_vaksin'=>'required|string',
                'deskripsi'=>'required|string',
                'harga'=>'required|string'
            ]);
            $imageName=null;
            if ($request->file('img')) {
                $imageName=time() . "-" . $request->nama_vaksin . "." . $request->img->extension();
                $request->img->move(public_path('assets/vaksin/img/'), $imageName);
            }

            $vaksin=Vaksin::create([
                'img'=>$imageName,
                'nama_vaksin'=>$request->nama_vaksin,
                'deskripsi'=>$request->deskripsi,
                'harga'=>$request->harga,
            ]);

            return response()->json($vaksin);
    }

    public function editVaksin($id){
        $vaksin = Vaksin::find($id);
        return response()->json($vaksin);
    }

    public function editVaksinAction(Request $request){
        $request->validate([
            'id_vaksin'=>'required',
            'nama_vaksin'=>'required|string',
            'deskripsi'=>'required|string',
            'harga'=>'required',
            'img'=>'image|mimes:png,jpeg,jpg,gif,svg',
        ]);

        $imageName=null;
        
        $vaksinData = Vaksin::find($request->id_vaksin);
        if ($request->hasFile('img')) {
            if ($vaksinData->img) {
                File::delete(public_path('assets/vaksin/img/') . $vaksinData->img);
            }
            $imageName=time() . "-" . $request->nama_vaksin2 . "." . $request->img->extension();
            $request->img->move(public_path('assets/vaksin/img/'), $imageName);
        }
        else{
            if ($vaksinData->img) {
                $imageName=$vaksinData->img;
            }
        }

        $vaksinData->update([
            'img'=>$imageName,
            'nama_vaksin'=>$request->nama_vaksin,
            'deskripsi'=>$request->deskripsi,
            'harga'=>$request->harga,           
        ]);

        return redirect("admin/data-vaksin");
    }

    public function delVaksin($id){
        $data = Vaksin::find($id);
        File::delete(public_path('assets/vaksin/img/').$data->img);
        $data->delete();
        return redirect("admin/data-vaksin")->with('success','Data has been deleted!');
    }


    //Data Rumah Sakit
    public function indexRS(){
        $akun=Auth::user();
        $list_rs=RumahSakit::all();
        return view("Admin.rumahsakit.index", ['list_rs' => $list_rs,'akun'=>$akun]);
    }

    public function addRS(Request $request){
        $request->validate([
            'nama_rs'=>'required|string',
            'alamat'=>'required|string',
            'no_telephone'=>'required',
            'jadwal'=>'required|string',
            'img'=>'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imageName=null;

        if ($request->hasFile('img')) {
            $imageName=time() . "-" . $request->nama_rs . "." . $request->img->extension();
            $request->img->move(public_path('assets/rs/img/'), $imageName);
        }

        $rs=RumahSakit::create([
            'img'=>$imageName,
            'nama_rs'=>$request->nama_rs,
            'alamat'=>$request->alamat,
            'jadwal'=>$request->jadwal,
            'keterangan'=>$request->keterangan,
            'no_telephone'=>$request->no_telephone,
        ]);

        return response()->json($rs);
    }

    public function editRS($id){
        $rs=RumahSakit::find($id);
        return response()->json($rs);
    }

    public function editRSAction(Request $request){
        if ($request->has('submit')) {
            $request->validate([
                'id_rs'=>'required',
                'nama_rs'=>'required|string',
                'alamat'=>'required|string',
                'no_telephone'=>'required',
                'jadwal'=>'required|string',
                'img'=>'image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $imageName=null;

            $rsData=RumahSakit::find($request->id_rs);

            if ($request->hasFile('img')) {
                if ($rsData->img) {
                    File::delete(public_path('assets/rs/img/') . $rsData->img);
                }
                $imageName=time() . "-" . $request->nama_rs . "." . $request->img->extension();
                $request->img->move(public_path('assets/rs/img/'), $imageName);
            }
            else{
                if ($rsData->img) {
                    $imageName=$rsData->img;
                }
            }

            $rs= $rsData->update([
                'img'=>$imageName,
                'nama_rs'=>$request->nama_rs,
                'alamat'=>$request->alamat,
                'jadwal'=>$request->jadwal,
                'keterangan'=>$request->keterangan,
                'no_telephone'=>$request->no_telephone,
            ]);

            if ($rs) {
                return redirect("admin/data-rumah-sakit");
            }
            else{
                return redirect()->back()-with('success','Data update failed!');

            }
        }
        else{
            return redirect("admin/data-rumah-sakit");
        }
    }

    public function delRS($id){
        $data=RumahSakit::find($id);
        File::delete(public_path('assets/rs/img/') . $data->img);
        $data->delete();
        return redirect("admin/data-rumah-sakit")->with('success','Data has been deleted!');
    }


    //Data Admin
    public function indexAdmin(){
        $akun=Auth::user();
        $list_admin=User::where('level',1)->orWhere('level',2)->get();
        return view("Admin.akun.index", ['list_admin' => $list_admin,'akun'=>$akun]);
    }

    public function addAdmin(Request $request){
        $request->validate([
            'username'=>'required|string',
            'email'=>'required|email',
            'nama'=>'required|string',
            'password'=>'required',
            'level'=>'required'
        ]);
        
        $userid=mt_rand(100000000, 999999999);
        $count=0;
        while (User::find($userid) && $count < 899999999) {
            $count++;
            $userid=mt_rand(100000000, 999999999);
        }
        User::create([
            'id_user'=>$userid,
            'username'=>$request->username,
            'email'=>$request->email,
            'nama'=>$request->nama,
            'password'=>bcrypt($request->password),
            'level'=>$request->level,
        ]);

        $attr=User::find($userid);
        return response()->json($attr); 
    }

    public function editAdmin($id){
        $admin=User::find($id);
        return response()->json($admin);
    }

    public function editAdminAction(Request $request){
        $request->validate([
            'id_user'=>'required',
            'username'=>'required|string',
            'email'=>'required|email',
            'nama'=>'required|string',
            'password'=>'required',
            'level'=>'required'
        ]);

        User::find($request->id_user)->update([
            'id_user'=>$request->id_user,
            'username'=>$request->username,
            'email'=>$request->email,
            'nama'=>$request->nama,
            'password'=>bcrypt($request->password),
            'level'=>$request->level,
        ]);

        $inputAdmin=User::find($request->id_user);
        return response()->json($inputAdmin);
    }

    public function delAdmin($id){
        User::destroy($id);
        return redirect("admin/data-admin");
    }


    //Jadwal Vaksinasi
    public function indexStatus(){
        $akun=Auth::user();
        $status = Status::all();
        return view('Admin.status.index', compact('status'),compact('akun'));
    }

    public function addStatus(Request $request){
        $request->validate([
            'status'=>'required|string'
        ]);

        $status = Status::create([
            'status'=>$request->status,
        ]);
        return response()->json($status);
    }

    public function editStatus($id){
        $status = Status::find($id);
        return response()->json($status);
    }

    public function editStatusAction(Request $request){
        $request->validate([
            'status'=>'required|string'
        ]);

        Status::find($request->id_status)->update([
            'status'=>$request->status,
        ]);
        $status=Status::find($request->id_status);

        return response()->json($status);
    }

    public function delStatus(Request $request, $id){
        Status::destroy($id);
        return redirect("admin/data-status");
    }

    //Data user
    public function indexAkunUser(){
        $akun=Auth::check();
        $list_user=User::where('level',3)->get();
        return view("Admin.akun.user.index",['akun'=>$akun,'list_user'=>$list_user]);
    }

    public function getInformasi($id){
        $akun=Auth::check();
        $user=InformasiUser::where('id_user',$id)->get();
        return view("Admin.akun.user.informasi",['akun'=>$akun,'user'=>$user]);
    }
}
