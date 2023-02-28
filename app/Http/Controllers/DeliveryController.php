<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\User;
use App\Models\Transation;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index(){
        $this->data['deliveries'] = Delivery::select('delivery.*','delivery.id as delivery_id','users.name as user')->leftJoin('users','users.id','=','delivery.user_id')->orderBy('delivery.id','desc')->get();
        // $this->data['users'] = User::with('delivery_user')->where('role', '!=', 1)->get();
        $this->data['users'] = Transation::select('transations.*', 'users.name as user', 'users.id as id','delivery.lunch','delivery.dinner')->leftJoin('users','users.id','=','transations.user_id')->leftJoin('delivery','delivery.user_id','=','transations.user_id')->where('transations.remaining_thali', '!=', 0 )->where('delivery.date',date('Y-m-d'))->get();
        // echo "<pre>"; print_r($this->data['users']); die;
        return view('delivery.index',$this->data);
    }

    public function update(Request $request){
        // if(!empty($request->break_fast)){
        //     for ($i=0; $i <count($request->break_fast) ; $i++) {
        //         $break_fast_id = explode('-',$request->break_fast[$i]);
        //         $check = Delivery::where('user_id',$break_fast_id[1])->where('date',date('Y-m-d'))->first();
        //         if($check){
        //             $this->updateBreakFast($break_fast_id[1]);
        //         }else{
        //             $this->insertBreakFast($break_fast_id[1], $request->date);
        //         }
        //     }
        // }
        if(!empty($request->lunch)){
            for ($i=0; $i <count($request->lunch) ; $i++) {
                $lunch_id = explode('-',$request->lunch[$i]);
                $check = Delivery::where('user_id',$lunch_id[1])->where('date',date('Y-m-d'))->first();
                if($check){
                    $this->updateLunch($lunch_id[1]);
                }else{
                    $this->insertLunch($lunch_id[1], $request->date);
                }
                $trans = Transation::where('user_id',$lunch_id[1])->first();
                $subs = Transation::where('user_id',$lunch_id[1])->where('id',$trans->id)->first();
                $subs->remaining_thali = $trans->remaining_thali - 1;
                $subs->save();
            }
        }
        if(!empty($request->dinner)){
            for ($i=0; $i <count($request->dinner) ; $i++) {
                $dinner_id = explode('-',$request->dinner[$i]);
                $check = Delivery::where('user_id',$dinner_id[1])->where('date',date('Y-m-d'))->first();
                if($check){
                    $this->updateDinner($dinner_id[1]);
                }else{
                    $this->insertDinner($dinner_id[1], $request->date);
                }

                $trans = Transation::where('user_id',$dinner_id[1])->first();
                $subs = Transation::where('user_id',$dinner_id[1])->where('id',$trans->id)->first();
                $subs->remaining_thali = $trans->remaining_thali - 1;
                $subs->save();
            }
        }

        return back()->with('message','delivery updated successfully.');
    }

    public function updateBreakFast($id){
        $delivery = Delivery::where('user_id',$id)->where('date',date('Y-m-d'))->first();
        $delivery->break_fast = 1;
        $delivery->save();
        return true;
    }
    public function insertBreakFast($id,$date){
        $delivery = new Delivery();
        $delivery->user_id = $id;
        $delivery->break_fast = 1;
        $delivery->date = $date;
        $delivery->save();
        return true;
    }

    public function updateLunch($id){
        $delivery = Delivery::where('user_id',$id)->where('date',date('Y-m-d'))->first();
        $delivery->lunch = 1;
        $delivery->save();
        return true;
    }
    public function insertLunch($id,$date){
        $delivery = new Delivery();
        $delivery->user_id = $id;
        $delivery->lunch = 1;
        $delivery->date = $date;
        $delivery->save();
        return true;
    }

    public function updateDinner($id){
        $delivery = Delivery::where('user_id',$id)->where('date',date('Y-m-d'))->first();
        $delivery->dinner = 1;
        $delivery->save();
        return true;
    }
    public function insertDinner($id,$date){
        $delivery = new Delivery();
        $delivery->user_id = $id;
        $delivery->dinner = 1;
        $delivery->date = $date;
        $delivery->save();
        return true;
    }
}
