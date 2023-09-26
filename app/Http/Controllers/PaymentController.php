<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::join('patients','payments.patient_id','=','patients.id')
        ->join('appointments','payments.appointment_id','=','appointments.id')
        ->join('doctors','appointments.doctor_id','=','doctors.id')
        ->select('doctors.name','appointments.appointmentdate', 'appointments.appointmenttime','appointments.app_reason','patients.name','patients.admissiondate','patients.admissiontime','patients.address', 'patients.mobile', 'patients.city', 'patients.pincode', 'patients.bloodgroup', 'patients.gender')
        ->orderBy('payments.id','desc')
        ->paginate(5);
        return response($payments);
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
            'patient'=> 'required', 
            'appointment' => 'required', 
            'paiddate' => 'required', 
            'paidtime' => 'required', 
            'paidamount' => 'required', 
            'status' => 'required', 
            'cardholder' => 'required', 
            'cardnumber' => 'required',
            'cvvno' => 'required', 
            'exdate' => 'required'
        ]);

        $patient = Patient::where('patients.name',$request->patient)->first()->id;
        $appointment = Appointment::where('appointments.appointmentdate',$request->appointment)->first()->id;

        Payment::create([
            'patient_id'=> $patient, 
            'appointment_id' => $appointment, 
            'paiddate' => $request->paiddate, 
            'paidtime' => $request->paidtime, 
            'paidamount' => $request->paidamount, 
            'status' => $request->status, 
            'cardholder' => $request->cardholder, 
            'cardnumber' => $request-> cardnumber,
            'cvvno' => $request->cvvno, 
            'exdate' => $request->exdate  
        ]);
        return response('column created');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $payment = Payment::join('patients','payments.patient_id','=','patients.id')
        ->join('appointments','payments.appointment_id','=','appointments.id')
        ->join('doctors','appointments.doctor_id','=','doctors.id')
        ->select('doctors.name','appointments.appointmentdate', 'appointments.appointmenttime','appointments.app_reason','patients.name','patients.admissiondate','patients.admissiontime','patients.address', 'patients.mobile', 'patients.city', 'patients.pincode', 'patients.bloodgroup', 'patients.gender')
        ->where('payments.id',$id)
        ->get();
        return response($payment);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'patient'=> 'required', 
            'appointment' => 'required', 
            'paiddate' => 'required', 
            'paidtime' => 'required', 
            'paidamount' => 'required', 
            'status' => 'required', 
            'cardholder' => 'required', 
            'cardnumber' => 'required',
            'cvvno' => 'required', 
            'exdate' => 'required'
        ]);

        $patient = Patient::where('patients.name',$request->patient)->first()->id;
        $appointment = Appointment::where('appointments.appointmentdate',$request->appointment)->first()->id;

        $payment = Payment::find($id);
        $payment->patient_id= $patient;
        $payment->appointment_id = $appointment; 
        $payment->paiddate = $request->paiddate; 
        $payment->paidtime = $request->paidtime; 
        $payment->paidamount = $request->paidamount; 
        $payment->status = $request->status;
        $payment->cardholder = $request->cardholder; 
        $payment->cardnumber = $request-> cardnumber;
        $payment->cvvno = $request->cvvno; 
        $payment->exdate = $request->exdate;
        $payment->update();  
        
        return response('column updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $payment = Payment::find($id);
        $payment->delete();  
        return response('column deleted');
    }
}
