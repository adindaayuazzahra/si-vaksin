<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use App\Models\Pendaftar;
use App\Models\Registrasi;
use App\Models\InformasiUser;
use App\Models\RumahSakit;
use App\Models\Vaksin;
use App\Models\Pembayaran;
use App\Models\User;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;

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
        return view("Admin.akun.login");
    }

    public function loginAction(Request $request){
        if ($request->has('submit')) {
            $request->validate([
                'username'=> 'required|string',
                'password'=>'required'
            ]);

            $authen = $request->only('username','password');
            
            $check = Auth::attempt($authen);
            if ($check) {
                $request->session()->regenerate();
                return redirect("admin");
            }
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("login-admin");
    }

    //Data Laporan
    public function indexLaporan(){
        $laporan = Registrasi::all();
        return view("Admin.laporan.index", compact('laporan'));
    }

    //Data Vaccine
    public function indexVaksin(){
        $list_vaksin=Vaksin::all();
        return view("Admin.vaksin.index", compact('list_vaksin'));
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
        // return view("Admin.vaksin.edit_vaksin", compact('vaksin'));
    }

    public function editVaksinAction(Request $request){
        $request->validate([
            'nama_vaksin2'=>'required|string',
            'deskripsi2'=>'required|string',
            'harga2'=>'required',
            'img2'=>'image|mimes:png,jpeg,jpg,gif,svg',
        ]);

        $imageName=null;
        
        $vaksinData = Vaksin::find($request->id);
        if ($request->hasFile('img')) {
            if ($vaksinData->img) {
                File::delete(public_path('assets/vaksin/img/') . $vaksinData->img);
            }
            $imageName=time() . "-" . $request->nama_vaksin . "." . $request->img->extension();
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

        $vaksin=Vaksin::find($request->id);
        return response()->json($vaksin);
            // if ($vaksin) {
            //     return redirect("admin/data-vaksin");
            // }
            // else{
            //     return redirect()->back()->with('success','Storing inputed data fail!');
            // }
            
        // }
        // else{
        //     return redirect("admin/data-vaksin");
        // }
    }

    public function delVaksin($id){
        $data = Vaksin::find($id);
        File::delete(public_path('assets/vaksin/img/').$data->img);
        $data->delete();
        return redirect("admin/data-vaksin")->with('success','Data has been deleted!');
    }


    //Data Rumah Sakit
    public function indexRS(){
        $list_rs=RumahSakit::all();
        return view("Admin.rumahsakit.index", compact('list_rs'));
    }


    public function addRS(Request $request){
        if ($request->submit=="submit") {
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

            if($rs){
                return redirect("admin/data-rumah-sakit");
            }
            else{
                return redirect()->back()->with('success', 'Storing inputed data failed!');   
            }
        }
        else{
            return redirect("admin/data-rumah-sakit");
        }
    }

    public function editRS($id){
        $rs=RumahSakit::find($id);
        return view("Admin.rumahsakit.edit_rs", compact('rs'));
    }

    public function editRSAction(Request $request, $id){
        if ($request->submit=="submit") {
            $request->validate([
                'nama_rs'=>'required|string',
                'alamat'=>'required|string',
                'no_telephone'=>'required',
                'jadwal'=>'required|string',
                'img'=>'image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $imageName=null;

            $rsData=RumahSakit::find($id);

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
        $list_admin=User::where('level',1)->orWhere('level',2)->get();
        return view("Admin.akun.index", compact('list_admin'));
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
        while (Pendaftar::find($userid) && $count < 899999999) {
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
        // return view("Admin.akun.edit_admin", compact('admin'));
    }

    public function editAdminAction(Request $request){
        $request->validate([
            'id_user2'=>'required',
            'username2'=>'required|string',
            'email2'=>'required|email',
            'nama2'=>'required|string',
            'password2'=>'required',
            'level2'=>'required'
        ]);

        User::find($request->id_user2)->update([
            'id_user'=>$request->id_user2,
            'username'=>$request->username2,
            'email'=>$request->email2,
            'nama'=>$request->nama2,
            'password'=>bcrypt($request->password2),
            'level'=>$request->level2,
        ]);

        $inputAdmin=User::find($request->id_user2);
        return response()->json($inputAdmin);
    }

    public function delAdmin($id){
        User::destroy($id);
        return redirect("admin/data-admin");
    }


    //Jadwal Vaksinasi
    public function indexStatus(){
        $status = Status::all();
        return view('Admin.status.index', compact('status'));
    }

    public function addStatus(Request $request){
        // if($request->submit=="submit"){
            $request->validate([
                'status'=>'required|string'
            ]);

            $status = Status::create([
                'status'=>$request->status,
            ]);
            return response()->json($status);
            // if(Status::create($attr)){
            //     // return redirect("admin/data-status");
                
            // }
            // else{
            //     return redirect()->back()->with('success', 'Storing inputed data failed!');  
            // }
        // }
        // else{
        //     return redirect("admin/data-status");
        // }
    }

    public function editStatus($id){
        $status = Status::find($id);
        return response()->json($status);
        // return view('Admin.status.edit_status',compact('status'));
    }

    // public function editStatusAction(Request $request, $id){
    //     if ($request->submit=="submit") {
    //         $request->validate([
    //             'status'=>'required|string'
    //         ]);

    //         $attr=Status::find($id)->update([
    //             'status'=>$request->status,
    //         ]);

    //         if (!$attr) {
    //             return redirect()->back()->with('success', 'Storing inputed data failed!');
    //         }
    //     }
    //     return redirect("admin/data-status");

    // }

    public function editStatusAction(Request $request){
        // if ($request->submit=="submit") {
        $request->validate([
            'status'=>'required|string'
        ]);

        Status::find($request->id)->update([
            'status'=>$request->status,
        ]);
        $status=Status::find($request->id);

        return response()->json($status);
    }

    public function delStatus(Request $request, $id){
        Status::destroy($id);
        return redirect("admin/data-status");
    }
}
