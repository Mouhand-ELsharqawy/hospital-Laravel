<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::paginate(5);
        return response($patients);

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
            'name' => 'required', 
            'admissiondate' => 'required', 
            'admissiontime'  => 'required', 
            'address'  => 'required', 
            'mobile' => 'required', 
            'city' => 'required', 
            'pincode' => 'required', 
            'bloodgroup' => 'required', 
            'gender' => 'required',
            'dob'  => 'required', 
            'status'  => 'required'
        ]);
        Patient::create($request->all());
        return response('column created');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $patient = Patient::find($id);
        return response($patient);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required', 
            'admissiondate' => 'required', 
            'admissiontime'  => 'required', 
            'address'  => 'required', 
            'mobile' => 'required', 
            'city' => 'required', 
            'pincode' => 'required', 
            'bloodgroup' => 'required', 
            'gender' => 'required',
            'dob'  => 'required', 
            'status'  => 'required'
        ]);
        $patient = Patient::find($id);
        $patient->update($request->all());
        return response('column updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        return response('column deleted');
    }
}
