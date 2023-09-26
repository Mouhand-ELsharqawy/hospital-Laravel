<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Room;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointment = Appointment::join('patients','appointments.patient_id','=','patients.id')
        ->join('rooms','appointments.room_id','=','rooms.id')
        ->join('departments','appointments.department_id','=','departments.id')
        ->join('doctors','appointments.doctor_id','=','doctors.id')
        ->select('appointments.id','appointments.type','patients.name','patients.mobile','patients.bloodgroup','patients.gender','rooms.number','departments.name','doctors.name','doctors.mobile','appointments.app_reason')
        ->paginate();
        return response(['appoint'=>$appointment]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' =>'required', 
            'pname' =>'required',
            'number' =>'required',
            'departname' =>'required',
            'date' =>'required',
            'time' =>'required',
            'doctorname' =>'required',
            'status' =>'required',
            'reason' =>'required'
        ]);

        $patient_id = Patient::where('name',$request->pname)->first()->id;

        $room_id = Room::where('number',$request->number)->first()->id;

        $department_id = Department::where('name',$request->departname)->first()->id;

        $doctor_id = Doctor::where('name',$request->doctorname)->first()->id;

        Appointment::create([
            'type' => $request->type, 
            'patient_id'=> $patient_id, 
            'room_id' => $room_id, 
            'department_id' => $department_id, 
            'appointmentdate' => $request->date, 
            'appointmenttime' => $request->time, 
            'doctor_id' => $doctor_id, 
            'status' => $request->status, 
            'app_reason' => $request->reason
        ]);
        return response('column created');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $appointment = Appointment::join('patients','appointments.patient_id','=','patients.id')
        ->join('rooms','appointments.room_id','=','rooms.id')
        ->join('departments','appointments.department_id','=','departments.id')
        ->join('doctors','appointments.doctor_id','=','doctors.id')
        ->select('appointments.id','appointments.type','patients.name','patients.mobile','patients.bloodgroup','patients.gender','rooms.number','departments.name','doctors.name','doctors.mobile','appointments.app_reason')
        ->where('appointments.id',$id)
        ->get();
        return response(['appoint'=>$appointment]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id,Request $request)
    {
        $patient_id = Patient::where('name',$request->pname)->first()->id;

        $room_id = Room::where('number',$request->number)->first()->id;

        $department_id = Department::where('name',$request->departname)->first()->id;

        $doctor_id = Doctor::where('name',$request->doctorname)->first()->id;

        $appointment = Appointment::find($id);
        $appointment->type = $request->type;
        $appointment->patient_id = $patient_id; 
        $appointment->room_id = $room_id; 
        $appointment->department_id = $department_id;
        $appointment->appointmentdate = $request->date; 
        $appointment->appointmenttime = $request->time; 
        $appointment->doctor_id = $doctor_id;
        $appointment->status = $request->status;
        $appointment->app_reason = $request->reason;
        $appointment->update();
        return response('column updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();
        return response('column deleted');
    }
}
