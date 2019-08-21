<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;

class adminController extends Controller
{
    public function index(){
        $users=User::all();
        return view('admin.home')->with(['users'=>$users]);
    }
    public function newUsers()
    {
        return view('admin.newUsers');
    }
    public function addUsers(Request $req){
        // dd($req->all());
        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'address'    => $req->address,
            'type'    => $req->type,
        ]);
        echo "<script>";
        echo "alert('users added')";
        echo "</script>";
        return redirect()->back();

    }
    public function statusActive($id){
        $user=User::find($id);
        $user->status="active";
        $user->save();
        return redirect()->back();

    }
    public function statusBlock($id){
        $user=User::find($id);
        $user->status="block";
        $user->save();
        return redirect()->back();

    }
}
