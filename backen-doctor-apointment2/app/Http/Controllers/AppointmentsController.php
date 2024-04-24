<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AppointmentsController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            'doctor_id'=>'required',
            'date'=>'required|string',
            'day'=>'required|string',
            'time'=>'required|string',
        ]);

        $request->user_id = Auth::user()->id;
 
        $apointment = Appointment::create([
            'doctor_id' => $request->doctor_id,
            'date' => $request->date,
            'day' => $request->day,
            'time' => $request->time,
            'status' => 'upcoming',
            'user_id' => $request->user_id
        ]);
        
        return $apointment;
    }

    public function index(Request $request){
        $appointments = Appointment::where('user_id', Auth::user()->id)->get();
        $doctors = User::where('type', 'doctor')->get();

        foreach($appointments as $appointment){
            foreach($doctors as $doctor){
                $details= $doctor->doctor;
                if($appointment['doctor_id'] == $doctor['id']){
                    $appointment['doctor_name'] = $doctor['name'];
                    $appointment['doctor_profile'] = $doctor['profile_photo_url'];
                    $appointment['category'] = $details['category'];
                }
            }
        }
        return $appointments;
    }
}
