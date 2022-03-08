<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __invoke(){
        // return view('home');
        $role=Auth::user()->role;
        if($role=='1'){
            return view('admin.dashboard');
        }else{
            return view('dashboard');
        }
    }
}
