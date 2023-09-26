<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Order;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\Treatmentrecord;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pres = Prescription::join('treatmentrecords','prescriptions.treatmentrecord_id','=','treatmentrecords.id')
        ->join('patients','prescriptions.patient_id','=','patients.id')
        ->join('orders','prescriptions.order_id','=','orders.id')
        ->join('appointments','prescriptions.appointment_id','=','appointments.id')
        ->select('appointments.appointmentdate', 'appointments.appointmenttime', 'appointments.status', 'appointments.app_reason','orders.expiredate','patients.name', 'patients.admissiondate', 'patients.admissiontime', 'patients.address', 'patients.mobile', 'patients.city', 'patients.pincode', 'patients.bloodgroup', 'patients.gender', 'patients.dob','treatmentrecords.descrption', 'treatmentrecords.status', 'treatmentrecords.treaatmentdate', 'treatmentrecords.treaatmenttime','prescriptions.deliverytype', 'prescriptions.status', 'prescriptions.prescriptiondate')
        ->paginate(5);
        return response($pres);
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
            // 'treatmentrecord' => 'required', 
            'doctor' => 'required', 
            'patient' => 'required', 
            // 'order' => 'required', 
            // 'appointment' => 'required', 
            'deliverytype' => 'required', 
            'status' => 'required', 
            'prescriptiondate' => 'required'
        ]);

        $patientid = Patient::where('patients.name',$request->patient)->first()->id;
        $trecordid = Treatmentrecord::where('treatmentrecords.patient_id',$patientid)->first()->id;
        $doctorid = Doctor::where('doctors.name',$request->doctor)->first()->id;
        $orderid = Order::where('orders.id',$doctorid)->first()->id; 
        $appointid = Appointment::where('appointments.patient_id',$patientid)->first()->id;
        
        
        Prescription::create([
            'treatmentrecord_id' =>$trecordid, 
            'doctor_id' =>$doctorid, 
            'patient_id' => $patientid, 
            'order_id' => $orderid, 
            'appointment_id' =>$appointid, 
            'deliverytype' =>$request->deliverytype, 
            'status' => $request->status, 
            'prescriptiondate' => $request->prescriptiondate
        ]);
        return response('column created');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pres = Prescription::join('treatmentrecords','prescriptions.treatmentrecord_id','=','treatmentrecords.id')
        ->join('patients','prescriptions.patient_id','=','patients.id')
        ->join('orders','prescriptions.order_id','=','orders.id')
        ->join('appointments','prescriptions.appointment_id','=','appointments.id')
        ->select('appointments.appointmentdate', 'appointments.appointmenttime', 'appointments.status', 'appointments.app_reason','orders.expiredate','patients.name', 'patients.admissiondate', 'patients.admissiontime', 'patients.address', 'patients.mobile', 'patients.city', 'patients.pincode', 'patients.bloodgroup', 'patients.gender', 'patients.dob','treatmentrecords.descrption', 'treatmentrecords.status', 'treatmentrecords.treaatmentdate', 'treatmentrecords.treaatmenttime','prescriptions.deliverytype', 'prescriptions.status', 'prescriptions.prescriptiondate')
        ->where('prescriptions.id',$id)
        ->get();
        return response($pres);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prescription $prescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            // 'treatmentrecord' => 'required', 
            'doctor' => 'required', 
            'patient' => 'required', 
            // 'order' => 'required', 
            // 'appointment' => 'required', 
            'deliverytype' => 'required', 
            'status' => 'required', 
            'prescriptiondate' => 'required'
        ]);

        $patientid = Patient::where('patients.name',$request->patient)->first()->id;
        $trecordid = Treatmentrecord::where('treatmentrecords.patient_id',$patientid)->first()->id;
        $doctorid = Doctor::where('doctors.name',$request->doctor)->first()->id;
        $orderid = Order::where('orders.id',$doctorid)->first()->id; 
        $appointid = Appointment::where('appointments.patient_id',$patientid)->first()->id;
        
        
        $prescription =Prescription::find($id);


        $prescription->treatmentrecord_id = $trecordid;
        $prescription->doctor_id = $doctorid;
        $prescription->patient_id = $patientid; 
        $prescription->order_id = $orderid; 
        $prescription->appointment_id = $appointid; 
        $prescription->deliverytype = $request->deliverytype; 
        $prescription->status = $request->status; 
        $prescription->prescriptiondate = $request->prescriptiondate;
        $prescription->update();

        return response('column updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $prescription =Prescription::find($id);
        $prescription->update();
        return response('column deleted');
    }
}
