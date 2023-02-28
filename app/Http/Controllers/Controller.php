<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function profile(){
        $this->data['user'] = Auth::user();
        return view('profile',$this->data);
    }


    public function updateProfile(Request $request){
        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required'
        ]);

        if(empty($request->password)){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->save();
        }else{
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->password = Hash::make($request->password);
            $user->save();
        }

        return back()->with('message','Profile updated successfully');
    }
}
