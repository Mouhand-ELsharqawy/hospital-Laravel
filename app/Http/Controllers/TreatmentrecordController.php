<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Treatment;
use App\Models\Treatmentrecord;
use Illuminate\Http\Request;

class TreatmentrecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Treatmentrecord::join('appointments','treatmentrecords.appointment_id','=','appointments.id')
        ->join('patients','treatmentrecords.patient_id','=','patients.id')
        ->join('treatments','treatmentrecords.treatment_id','=','treatments.id')
        ->join('doctors','treatmentrecords.doctor_id','=','doctors.id')
        ->select('treatments.treatment_type', 'treatments.cost', 'treatments.notic','patients.name', 'patients.admissiondate', 'patients.admissiontime', 'patients.address', 'patients.mobile', 'patients.city', 'patients.bloodgroup', 'patients.gender', 'patients.dob','appointments.app_reason','doctors.name')
        ->orderBy('patients.id','desc')
        ->paginate(5);
        return response($records);
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
            'treatment' => 'required',  
            'patient' => 'required', 
            'descrption' => 'required', 
            'status' => 'required', 
            'treaatmentdate' => 'required', 
            'treaatmenttime' => 'required',
        ]);

        $patientid = Patient::where('patients.name', $request->patient)
        ->orderBy('patients.id','desc')
        ->first()->id;
        $treatid = Treatment::where('treatments.treatment_type',$request->treatment)
        ->orderBy('treatments.id','desc')
        ->first()->id;
        $appoint = Appointment::where('appointments.patient_id',$patientid)
        ->orderBy('appointments.id','desc')
        ->first();
        $appointid = $appoint->id;
        $doctorid = $appoint->doctor_id;

        Treatmentrecord::create([
            'treatment_id' => $treatid, 
            'appointment_id' => $appointid, 
            'patient_id' => $patientid, 
            'doctor_id' => $doctorid, 
            'descrption' => $request->descrption , 
            'status' => $request->status, 
            'treaatmentdate' => $request->treaatmentdate, 
            'treaatmenttime' => $request->treaatmenttime
        ]);
        return response('column created');


        // return response($appointid);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = Treatmentrecord::join('appointments','treatmentrecords.appointment_id','=','appointments.id')
        ->join('patients','treatmentrecords.patient_id','=','patients.id')
        ->join('treatments','treatmentrecords.treatment_id','=','treatments.id')
        ->join('doctors','treatmentrecords.doctor_id','=','doctors.id')
        ->select('treatments.treatment_type', 'treatments.cost', 'treatments.notic','patients.name', 'patients.admissiondate', 'patients.admissiontime', 'patients.address', 'patients.mobile', 'patients.city', 'patients.bloodgroup', 'patients.gender', 'patients.dob','appointments.app_reason','doctors.name')
        ->orderBy('patients.id','desc')
        ->where('treatmentrecords.id', $id)
        ->get();
        return response($record);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Treatmentrecord $treatmentrecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'treatment' => 'required',  
            'patient' => 'required', 
            'descrption' => 'required', 
            'status' => 'required', 
            'treaatmentdate' => 'required', 
            'treaatmenttime' => 'required',
        ]);

        $patientid = Patient::where('patients.name', $request->patient)
        ->orderBy('patients.id','desc')
        ->first()->id;
        $treatid = Treatment::where('treatments.treatment_type',$request->treatment)
        ->orderBy('treatments.id','desc')
        ->first()->id;
        $appoint = Appointment::where('appointments.patient_id',$patientid)
        ->orderBy('appointments.id','desc')
        ->first();
        $appointid = $appoint->id;
        $doctorid = $appoint->doctor_id;

        $treatmentrecord=Treatmentrecord::find($id);

        $treatmentrecord->treatment_id = $treatid;
        $treatmentrecord->appointment_id = $appointid; 
        $treatmentrecord->patient_id = $patientid; 
        $treatmentrecord->doctor_id = $doctorid;
        $treatmentrecord->descrption = $request->descrption; 
        $treatmentrecord->status = $request->status;
        $treatmentrecord->treaatmentdate = $request->treaatmentdate;
        $treatmentrecord->treaatmenttime = $request->treaatmenttime;

        $treatmentrecord->update();
        return response('column updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $treatmentrecord=Treatmentrecord::find($id);
        $treatmentrecord->update();
        return response('column deleted');
    }
}
