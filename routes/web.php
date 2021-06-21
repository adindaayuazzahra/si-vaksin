<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Homecontroller::class, 'index'])->name('user.index');
Route::get('login', [Homecontroller::class, 'login'])->name('login.get');
Route::post('login',[Homecontroller::class, 'loginAction'])->name('login');
Route::get('daftar', [Homecontroller::class, 'daftar'])->name('daftar.get');
Route::post('daftar', [Homecontroller::class, 'daftarAction'])->name('daftar.user');
Route::get('jadwal', [Homecontroller::class, 'infoJadwal'])->name('jadwal.user');
Route::get('syarat', [Homecontroller::class, 'syarat'])->name('syarat.user');
Route::get('harga', [Homecontroller::class, 'harga'])->name('harga.user');
Route::middleware(['auth'])->group(function(){
    //User
    Route::middleware(['usercheck:3'])->group(function(){
        Route::post('logout',[Homecontroller::class, 'logout'])->name('user.logout');
        Route::get('daftar-vaksin', [Homecontroller::class, 'registrasiVaksinasi'])->name('user.get.registrasi');
        Route::post('daftar-vaksin', [Homecontroller::class, 'registrasiVaksinasiAction'])->name('user.registrasi');   
        Route::get('rincian/{id}', [Homecontroller::class, 'rincian']);   
        Route::get('pembayaran/{id}', [Homecontroller::class, 'rincianAction']);
        Route::get('status', [Homecontroller::class, 'status'])->name('user.status');
        Route::get('notifikasi/{id}',[Homecontroller::class,'notifikasi'])->name('user.notifikasi');
    });

    //Admin
    Route::middleware(['authcheck:1,2'])->group(function(){ 
        Route::group(['prefix'=>'admin'],function(){
            Route::post('logout',[Admincontroller::class, 'logout'])->name('admin.logout');
            Route::get('/',[Admincontroller::class, 'index'])->name('index');

            Route::group(['prefix'=>'laporan'], function(){
                Route::get('/',[Admincontroller::class, 'indexLaporan'])->name('laporan.index');
                Route::get('edit/{id}',[Admincontroller::class, 'editLaporan']);
                Route::post('edit',[Admincontroller::class, 'editLaporanAction'])->name('laporan.edit');
                Route::post('delete/{id}',[Admincontroller::class, 'delLaporan'])->name('laporan.delete');
            });

            Route::group(['prefix'=>'data-vaksin'], function(){
                Route::get('/',[Admincontroller::class, 'indexVaksin'])->name('vaksin.index');
                Route::post('add',[Admincontroller::class, 'addVaksin'])->name('vaksin.add');
                Route::get('edit/{id}',[Admincontroller::class, 'editVaksin'])->name('vaksin.get');
                Route::post('edit',[Admincontroller::class, 'editVaksinAction'])->name('vaksin.edit');
                Route::post('delete/{id}',[Admincontroller::class, 'delVaksin'])->name('vaksin.delete');
            });

            Route::group(['prefix'=>'data-rumah-sakit'], function(){
                Route::get('/',[Admincontroller::class, 'indexRS'])->name('rs.index');
                Route::post('add',[Admincontroller::class, 'addRS'])->name('rs.add');
                Route::get('edit/{id}',[Admincontroller::class, 'editRS'])->name('rs.get');
                Route::post('edit',[Admincontroller::class, 'editRSAction'])->name('rs.edit');
                Route::post('delete/{id}',[Admincontroller::class, 'delRS'])->name('rs.delete');
            });

            Route::group(['prefix'=>'data-status'], function(){
                Route::get('/',[Admincontroller::class, 'indexStatus'])->name('status.index');
                Route::post('add',[Admincontroller::class, 'addStatus'])->name('status.add');
                Route::get('edit/{id}',[Admincontroller::class, 'editStatus'])->name('status.get');
                Route::post('edit',[Admincontroller::class, 'editStatusAction'])->name('status.edit');
                Route::post('delete/{id}',[Admincontroller::class, 'delStatus'])->name('status.delete');
            });
        });
    });

    //Superadmin
    Route::middleware(['authcheck:1'])->group(function(){
        Route::group(['prefix'=>'admin'],function(){
            Route::group(['prefix'=>'data-admin'],function(){
                Route::get('/',[Admincontroller::class, 'indexAdmin'])->name('admin.index');
                Route::post('add',[Admincontroller::class, 'addAdmin'])->name('admin.add');
                Route::get('edit/{id}',[Admincontroller::class, 'editAdmin'])->name('admin.get');
                Route::post('edit',[Admincontroller::class, 'editAdminAction'])->name('admin.edit');
                Route::post('delete/{id}',[Admincontroller::class, 'delAdmin'])->name('admin.delete');
            });
        });
    });
});



