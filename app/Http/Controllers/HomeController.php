<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view("User.homepage");
    }
    //Akun
    public function login(){
        return view("User.akun.login");
    }

    public function daftar(){
        return view("User.akun.daftar");
    }
}
