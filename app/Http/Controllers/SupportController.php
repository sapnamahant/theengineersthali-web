<?php

namespace App\Http\Controllers;
use App\Models\Support;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

class SupportController extends Controller
{
        
    public function index(){

        $this->data['supports'] = Support::where('id',1)->first();
        $this->data['policy'] = PrivacyPolicy::where('id',1)->first();

        return view('supports.add',$this->data);
   
    }
   

    public function editSupport(Request $request){

        $support = Support::where('id',1)->first();
            $support->email = $request->email;
            $support->address = $request->address;
            $support->mobile = $request->mobile;
            $support->save();

        $policy = PrivacyPolicy::where('id',1)->first();
            $policy->privacy_policy = $request->privacy_policy;
            $policy->terms_and_condition = $request->terms_and_condition;
            $policy->about = $request->about;
            $policy->save();

        return back()->with('message','Data updated successfully');
        // ('message','Data updated successfully');

    }

}


