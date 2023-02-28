<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use Illuminate\Http\Request;
use LRedis;
class NotificationController extends Controller
{
    
    public function index(){
        $this->data['notifications'] = Notification::orderBy('id', 'desc') ->get();
        return view('notifications.index',$this->data);
    }


    public function addNotification(){
        return view('notifications.add');
    }
    public function add(Request $request){
        $redis = LRedis::connection();
        if(!empty($request->id)){
            $notification =  Notification::firstwhere('id',$request->id);
            $notification->message = $request->message;
            $notification->save();
        }else{
            $notification = new Notification();
            $notification->message = $request->message;
            $notification->save();
         }
         $redis->publish('message', json_encode($_message));
        return back()->with('message','Notification updated successfully');
    }

    public function editNotification($id){
        $this->data['notification'] = Notification::where('id',base64_decode($id))->first();
        return view('notifications.add',$this->data);
    }

    public function destroy($id){
        Notification::where('id',base64_decode($id))->delete();
        return back()->with('message','Notification deleted successfully');
    }
}


