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


Route::get('/', function () {
    return view('homepage');
});

Route::get('/', [Homecontroller::class, 'index']);

Route::get('login', [Homecontroller::class, 'login']);
Route::post('login',[Homecontroller::class, 'loginAction']);

Route::get('daftar', [Homecontroller::class, 'daftar']);
Route::post('daftar', [Homecontroller::class, 'daftarAction']);
Route::get('jadwal', [Homecontroller::class, 'infoJadwal']);


Route::get('login-admin',[Admincontroller::class, 'login'])->name('login.admin');
Route::post('login-admin',[Admincontroller::class, 'loginAction']);

Route::middleware(['pendaftarcheck'])->group(function(){

});

Route::middleware(['auth'])->group(function(){
    //Admin
    Route::middleware(['authcheck:1,2'])->group(function(){
        
        Route::post('logout',[Admincontroller::class, 'logout']);
        Route::group(['prefix'=>'admin'],function(){
            
            Route::get('/',[Admincontroller::class, 'index']);

            Route::group(['prefix'=>'laporan'], function(){
                Route::get('/',[Admincontroller::class, 'indexLaporan']);
            });

            Route::group(['prefix'=>'data-vaksin'], function(){
                Route::get('/',[Admincontroller::class, 'indexVaksin']);
                Route::post('add',[Admincontroller::class, 'addVaksin'])->name('vaksin.add');
                
                Route::get('edit/{id}',[Admincontroller::class, 'editVaksin']);

                Route::post('edit',[Admincontroller::class, 'editVaksinAction'])->name('vaksin.edit');

                Route::post('delete',[Admincontroller::class, 'delVaksin'])->name('vaksin.delete');;
            });

            Route::group(['prefix'=>'data-rumah-sakit'], function(){
                Route::get('/',[Admincontroller::class, 'indexRS']);
                Route::post('add',[Admincontroller::class, 'addRS']);

                Route::get('edit/{id}',[Admincontroller::class, 'editRS']);
                Route::post('edit/{id}',[Admincontroller::class, 'editRSAction']);

                Route::post('delete/{id}',[Admincontroller::class, 'delRS']);
            });
            Route::group(['prefix'=>'data-status'], function(){
                Route::get('/',[Admincontroller::class, 'indexStatus']);
                Route::post('add',[Admincontroller::class, 'addStatus'])->name('status.add');

                Route::get('edit/{id}',[Admincontroller::class, 'editStatus']);
                Route::post('edit',[Admincontroller::class, 'editStatusAction'])->name('status.edit');

                Route::post('delete/{id}',[Admincontroller::class, 'delStatus'])->name('status.delete');

            });
        });
    });

    //Superadmin

    Route::middleware(['authcheck:1'])->group(function(){
        Route::group(['prefix'=>'admin'],function(){
            Route::group(['prefix'=>'data-admin'],function(){
                Route::get('/',[Admincontroller::class, 'indexAdmin']);
                Route::post('add',[Admincontroller::class, 'addAdmin'])->name('admin.add');

                Route::get('edit/{id}',[Admincontroller::class, 'editAdmin']);
                Route::post('edit',[Admincontroller::class, 'editAdminAction'])->name('admin.edit');

                Route::post('delete/{id}',[Admincontroller::class, 'delAdmin'])->name('admin.delete');
            });
        });
    });
});



