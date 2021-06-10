<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Hospital;
use App\Models\Vaccine;
use App\Models\Payment;
use App\Models\User;
use App\Models\UserInformation;

class AdminController extends Controller
{
     //Akun 
    public function login(){
        return view("Admin.akun.login");
    }

    public function loginAction(Request $request){

    }

    public function index(){
        return view("Admin.index");
    }


    //Data Vaccine
    public function indexVaksin(){
        $list_vaksin=Vaccine::all();
        return view("Admin.vaksin.index", compact('list_vaksin'));
    }

    public function addVaksin(Request $request){
        if ($request->submit=="submit") {
            $attr = $request->validate([
                'nama_vaksin'=>'required|string',
                'deskripsi'=>'required|string',
                'harga'=>'required|string'
            ]);

            if(Vaccine::create($attr)){
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
        $vaksin = Vaccine::find($id);

        return view("Admin.vaksin.edit_vaksin", compact('vaksin'));
    }

    public function editVaksinAction(Request $request, $id){
        if ($request->submit=="submit") {
            $request->validate([
                'nama_vaksin'=>'required|string',
                'deskripsi'=>'required|string',
                'harga'=>'required|string'
            ]);

            $attr= Vaccine::find($id)->update([
                'nama_vaksin'=>$request->nama_vaksin,
                'deskripsi'=>$request->deskripsi,
                'harga'=>$request->harga            
            ]);

            if ($attr) {
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
        Vaccine::find($id)->delete();
        return redirect("admin/data-vaksin")->with('success','Data has been deleted!');
    }


    //Data Rumah Sakit
    public function indexRS(){
        $list_rs=Hospital::all();
        return view("Admin.rumahsakit.index", compact('list_rs'));
    }


    public function addRS(Request $request){
        if ($request->submit=="submit") {
             $attr= $request->validate([
                'nama_rs'=>'required|string',
                'alamat'=>'required|string',
                'kelurahan'=>'required|string',
                'kecamatan'=>'required|string',
                'provinsi'=>'required|string',
                'keterangan'=>'required|string'
            ]);

            if(Hospital::create($attr)){
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
        $rs=Hospital::find($id);
        return view("Admin.rumahsakit.edit_rs", compact('rs'));
    }

    public function editRSAction(Request $request, $id){
        if ($request->submit=="submit") {
            $request->validate([
                'nama_rs'=>'required|string',
                'alamat'=>'required|string',
                'kelurahan'=>'required|string',
                'kecamatan'=>'required|string',
                'provinsi'=>'required|string',
                'keterangan'=>'required|string'
            ]);

            $rs=Hospital::find($id)->update([
                'nama_rs'=>$request->nama_rs,
                'alamat'=>$request->alamat,
                'kelurahan'=>$request->kelurahan,
                'kecamatan'=>$request->kecamatan,
                'provinsi'=>$request->provinsi,
                'keterangan'=>$request->keterangan,
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
        Hospital::find($id)->delete();
        return redirect("admin/data-rumah-sakit")->with('success','Data has been deleted!');
    }


    //Data Admin
    public function indexAdmin(){
        $list_admin=Admin::all();
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

            $imageName=time() . "-" . $request->username . "-" . $request->img->extension();

            $request->img->move(public_path('assets/admin/img/'), $imageName);


            $attr = Admin::create([
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
        $admin=Admin::find($id);
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

            $imageName=time() . "-" . $request->username . "-" . $request->img->extension();

            $request->img->move(public_path('assets/admin/img/'), $imageName);

            $rs=Admin::find($id)->update([
                'img'=>$imageName,
                'username'=>$request->username,
                'nama'=>$request->nama,
                'password'=>bcrypt($request->password)
            ]);

            if ($rs) {
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
        Admin::find($id)->delete();
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
