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

Route::group(['prefix'=>'/'], function(){
    Route::get('/', [Homecontroller::class, 'index']);
    Route::get('login', [Homecontroller::class, 'login']);
    Route::get('daftar', [Homecontroller::class, 'daftar']);
});


Route::group(['prefix'=>'admin'],function(){
    Route::get('/',[Admincontroller::class, 'index']);
    Route::get('login',[Admincontroller::class, 'login']);
    Route::post('login',[Admincontroller::class, 'loginAction']);

    Route::get('signup','AdminController@signup');
    Route::post('signupAction','AdminController@signupAction');

    Route::group(['prefix'=>'data-vaksin'], function(){
        Route::get('/',[Admincontroller::class, 'indexVaksin']);
        Route::post('add',[Admincontroller::class, 'addVaksin']);
        
        Route::get('edit/{id}',[Admincontroller::class, 'editVaksin']);
        Route::post('edit/{id}',[Admincontroller::class, 'editVaksinAction']);

        Route::post('delete/{id}',[Admincontroller::class, 'delVaksin']);
    });

    Route::group(['prefix'=>'data-rumah-sakit'], function(){
        Route::get('/',[Admincontroller::class, 'indexRS']);
        Route::post('add',[Admincontroller::class, 'addRS']);

        Route::get('edit/{id}',[Admincontroller::class, 'editRS']);
        Route::post('edit/{id}',[Admincontroller::class, 'editRSAction']);

        Route::post('delete/{id}',[Admincontroller::class, 'delRS']);
    });

    Route::group(['prefix'=>'data-admin'], function(){
        Route::get('/',[Admincontroller::class, 'indexAdmin']);
        Route::post('add',[Admincontroller::class, 'addAdmin']);

        Route::get('edit/{id}',[Admincontroller::class, 'editAdmin']);
        Route::post('edit/{id}',[Admincontroller::class, 'editAdminAction']);

        Route::post('delete/{id}',[Admincontroller::class, 'delAdmin']);

    });
});



