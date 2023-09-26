<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::join('departments','doctors.department_id','=','departments.id')
        ->select('departments.name','doctors.name','doctors.mobile', 'doctors.status', 'doctors.education', 'doctors.experince_years', 'doctors.consultancy_charge')
        ->get();
        return response($doctors);
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
            'name' =>'required' , 
            'mobile' =>'required', 
            'department_id' =>'required', 
            'user_id'  =>'required', 
            'status'  =>'required', 
            'education'  =>'required', 
            'experince_years'  =>'required', 
            'consultancy_charge'  =>'required'
        ]);

        $departmentid = Department::where('departments.name',$request->department_id)->first()->id;
        $userid = User::where('users.name',$request->user_id)->first()->id;

        Doctor::create([
            'name' => $request->name, 
            'mobile' => $request->mobile, 
            'department_id' => $departmentid, 
            'user_id' => $userid, 
            'status' => $request->status, 
            'education' => $request->education, 
            'experince_years' => $request->experince_years, 
            'consultancy_charge' => $request->consultancy_charge
        ]);

        return response('column created');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $doctor = Doctor::join('departments','doctors.department_id','=','departments.id')
        ->select('departments.name','doctors.name','doctors.mobile', 'doctors.status', 'doctors.education', 'doctors.experince_years', 'doctors.consultancy_charge')
        ->where('doctors.id',$id)
        ->get();

        return response($doctor);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' =>'required' , 
            'mobile' =>'required', 
            'department_id' =>'required', 
            'user_id'  =>'required', 
            'status'  =>'required', 
            'education'  =>'required', 
            'experince_years'  =>'required', 
            'consultancy_charge'  =>'required'
        ]);

        $departmentid = Department::where('departments.name',$request->department_id)->first()->id;
        $userid = User::where('users.name',$request->user_id)->first()->id;


        $doctor = Doctor::find($id);
            $doctor->name = $request->name;
            $doctor->mobile = $request->mobile;
            $doctor->department_id = $departmentid;
            $doctor->user_id = $userid; 
            $doctor->status = $request->status; 
            $doctor->education = $request->education; 
            $doctor->experince_years = $request->experince_years;
            $doctor->consultancy_charge = $request->consultancy_charge;
            $doctor->update();

        return response('column updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();
        return response('column deleted');
    }
}
