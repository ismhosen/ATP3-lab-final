<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Scout;
use App\ScoutRequest;

class adminController extends Controller
{
    public function index(){
        $users=User::all();
        $scouts=Scout::all();
        $scoutsRequest=ScoutRequest::all();
        return view('admin.home')->with(['users'=>$users,'scouts'=>$scouts,'scouts'=>$scoutsRequest]);
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
    public function postPublishByadmin($id){
        $scout=Scout::find($id);
        $scout->status="active";
        $scout->save();
        return redirect()->back();
    }
}
