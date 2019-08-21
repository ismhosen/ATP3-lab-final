<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        return view('admin.home');
    }
    public function newUsers()
    {
        return view('admin.newUsers');
    }
    public function addUsers(Request $req){
        // dd($req->all());
        // User::create(array(
        //     'name' => 'first_user',
        //     'email' => 'first_user',
        //     'password' => Hash::make('123456'),
        //     'adress'    => 'my@email.com',
        //     'type'    => 'my@email.com',
        // ));
    }
}
