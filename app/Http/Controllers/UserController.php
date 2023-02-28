<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $this->data['users'] = User::where('role','!=',1)->get();
        return view('user.index',$this->data);
    }

    public function updateStatus($id){
        $user = User::where('id',base64_decode($id))->first();
        if($user->status==1){
            User::where('id',base64_decode($id))->update(['status'=>0]);
        }else{
            User::where('id',base64_decode($id))->update(['status'=>1]);
        }
        return back()->with('message','status updated successfully');
    }
}
