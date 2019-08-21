<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class scoutController extends Controller
{
    public function index(){
        return view('scouts.home');
    }
}
