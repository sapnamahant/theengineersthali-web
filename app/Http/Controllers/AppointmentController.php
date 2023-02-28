<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    
    public function add(Request $request){
        $appointment =  new Appointment();

        $appointment->name = $request->name;
        $appointment->email = $request->email;
        $appointment->contact = $request->contact;
        $appointment->no_of_person = $request->no_of_person;
        $appointment->date= $request->date;
        $appointment->time = $request->time;
        $appointment->preferred_food = $request->preferred_food;
        $appointment->occasion = $request->occasion;
        $appointment->save();
        return back()->with('message','Thank You for your reservation...');
        // print_r("Tnank You for your reservation...");
    }
}
