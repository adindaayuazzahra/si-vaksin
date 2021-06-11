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
use Auth;
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

    //Data Vaccine
    public function indexVaksin(){
        $list_vaksin=Vaksin::all();
        return view("Admin.vaksin.index", compact('list_vaksin'));
    }

    public function addVaksin(Request $request){
        if ($request->submit=="submit") {
            $attr = $request->validate([
                'img'=>'image|mimes:png,jpeg,jpg,gif,svg',
                'nama_vaksin'=>'required|string',
                'deskripsi'=>'required|string',
                'harga'=>'required|string'
            ]);
            $imageName=null;

            if ($request->hasFile('img')) {
                $imageName=time() . "-" . $request->nama_vaksin . "-" . $request->img->extension();

                $request->img->move(public_path('assets/vaksin/img/'), $imageName);
            }

            

            $vaksin=Vaksin::create([
                'img'=>$imageName,
                'nama_vaksin'=>$request->nama_vaksin,
                'deskripsi'=>$request->deskripsi,
                'harga'=>$request->harga,
            ]);

            if($vaksin){
                return redirect("admin/data-vaksin");
            }
            else{
                return redirect()->back()->with('success', 'Storing inputed data failed!');   
            }
        }
        else{
            return redirect("admin/data-vaksin");
        }

    }

    public function editVaksin($id){
        $vaksin = Vaksin::find($id);
        return view("Admin.vaksin.edit_vaksin", compact('vaksin'));
    }

    public function editVaksinAction(Request $request, $id){
        if ($request->submit=="submit") {
            $request->validate([
                'img'=>'image|mimes:png,jpeg,jpg,gif,svg',
                'nama_vaksin'=>'required|string',
                'deskripsi'=>'required|string',
                'harga'=>'required|string'
            ]);

            $imageName=null;
            
            $vaksinData = Vaksin::find($id);
            if ($request->hasFile('img')) {
                if ($vaksinData->img) {
                    File::delete(public_path('assets/vaksin/img/') . $vaksinData->img);
                }
                $imageName=time() . "-" . $request->nama_vaksin . "-" . $request->img->extension();
                $request->img->move(public_path('assets/vaksin/img/'), $imageName);
            }

            $vaksin = $vaksinData->update([
                'img'=>$imageName,
                'nama_vaksin'=>$request->nama_vaksin,
                'deskripsi'=>$request->deskripsi,
                'harga'=>$request->harga,           
            ]);

            if ($vaksin) {
                return redirect("admin/data-vaksin");
            }
            else{
                return redirect()->back()->with('success','Storing inputed data fail!');
            }
            
        }
        else{
            return redirect("admin/data-vaksin");
        }
    }

    public function delVaksin($id){
        $data = Vaksin::find($id);
        File::delete(public_path('assets/vaksin/img/') . $data->img);
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
                $imageName=time() . "-" . $request->nama_rs . "-" . $request->img->extension();
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
                $imageName=time() . "-" . $request->nama_rs . "-" . $request->img->extension();
                $request->img->move(public_path('assets/rs/img/'), $imageName);
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
        $list_admin=User::all();
        return view("Admin.akun.index", compact('list_admin'));
    }

    public function addAdmin(Request $request){
         if ($request->submit=="submit") {
            $request->validate([
                'img'=>'image|mimes:jpeg,png,jpg,gif,svg',
                'username'=>'required|string',
                'nama'=>'required|string',
                'password'=>'required'
            ]);

            if ($request->hasFile('img')) {
                $imageName=time() . "-" . $request->username . "-" . $request->img->extension();

                $request->img->move(public_path('assets/admin/img/'), $imageName);
            }
            
            $attr = User::create([
                'img'=>$imageName,
                'username'=>$request->username,
                'nama'=>$request->nama,
                'password'=>bcrypt($request->password)
            ]);
            
            if ($attr) {
                return redirect("admin/data-admin");
            }
            else{
                return redirect()->back()->with('success','Storing inputed data failed!');
            }
        }
        else{
            return redirect("admin/data-admin");
        }

    }

    public function editAdmin($id){
        $admin=User::find($id);
        return view("Admin.akun.edit_admin", compact('admin'));
    }

    public function editAdminAction(Request $request, $id){
        if ($request->submit=="submit") {
            $request->validate([
                'img'=>'image|mimes:jpeg,png,jpg,gif,svg',
                'username'=>'required|string',
                'nama'=>'required|string',
                'password'=>'required'
            ]);

            $adminData = User::find($id);

            if ($request->hasFile('img') && !($adminData->img == "admin.svg") ) {
                File::delete(public_path('assets/admin/img/') . $adminData->img);

                $imageName=time() . "-" . $request->username . "-" . $request->img->extension();

                $request->img->move(public_path('assets/admin/img/'), $imageName);
            }

            $inputAdmin=User::find($id)->update([
                'img'=>$imageName,
                'username'=>$request->username,
                'nama'=>$request->nama,
                'password'=>bcrypt($request->password)
            ]);

            if ($inputAdmin) {
                return redirect("admin/data-admin");
            }
            else{
                return redirect()->back()-with('success','Data update failed!');
            }
        }
        
        else{
            return redirect("admin/data-admin");
        }
    }

    public function delAdmin($id){
        $data = User::find($id);
        if (!($data->img=="admin.svg")) {
            File::delete(public_path('assets/admin/img/') . $data->img);
        }
        $data->delete();
        return redirect("admin/data-admin");

    }




    //Jadwal Vaksinasi
    public function addJadwal(){

    }

    public function addJadwalAction(){

    }

    public function editJadwal(){

    }

    public function editJadwalAction(){

    }

    public function delJadwal(){

    }
}
