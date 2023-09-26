<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Billing;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\DB;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $billings = Billing::join('patients','billings.patient_id','=','patients.id')
        ->join('appointments','billings.appointment_id','=','appointments.id')
        ->select('patients.name','patients.mobile','patients.address','patients.city','patients.bloodgroup','appointments.app_reason','billings.date','billings.time','billings.dicount','billings.taxamount','billings.discountreason','billings.dischargedate','billings.dischargetime')
        ->paginate();
        return response()->json($billings);
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
            'pname' =>'required', 
            'date' =>'required', 
            'time' =>'required', 
            'dicount' =>'required', 
            'taxamount' =>'required', 
            'discountreason' =>'required', 
            'dischargedate' =>'required', 
            'dischargetime' =>'required',
        ]);


        $patient_id = Patient::where('name',$request->pname)->first()->id;

         $appointment_id = Appointment::join('patients','appointments.patient_id','=','patients.id')
         ->select('appointments.id')
         ->where('appointments.patient_id',$patient_id)
         ->first()->id;
        Billing::create([
            'patient_id' => $patient_id, 
            'appointment_id' => $appointment_id, 
            'date' => $request->date, 
            'time' => $request->time, 
            'dicount' => $request->dicount, 
            'taxamount' => $request->taxamount, 
            'discountreason' => $request->discountreason, 
            'dischargedate' => $request->dischargedate, 
            'dischargetime' => $request->dischargetime
        ]);
        return response('column created');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $billing = Billing::join('patients','billings.patient_id','=','patients.id')
        ->join('appointments','billings.appointment_id','=','appointments.id')
        ->select('patients.name','patients.mobile','patients.address','patients.city','patients.bloodgroup','appointments.app_reason','billings.date','billings.time','billings.dicount','billings.taxamount','billings.discountreason','billings.dischargedate','billings.dischargetime')
        ->where('billings.id',$id)
        ->get();
        return response()->json($billing);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Billing $billing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $billing =Billing::find($id);


        $request->validate([
            'pname' =>'required', 
            'date' =>'required', 
            'time' =>'required', 
            'dicount' =>'required', 
            'taxamount' =>'required', 
            'discountreason' =>'required', 
            'dischargedate' =>'required', 
            'dischargetime' =>'required',
        ]);
        $patient_id = Patient::where('name',$request->pname)->first()->id;

        $appointment_id = Appointment::join('patients','appointments.patient_id','=','patients.id')
        ->select('appointments.id')
        ->where('appointments.patient_id',$patient_id)
        ->first()->id;

        $billing->patient_id = $patient_id; 
        $billing->appointment_id = $appointment_id; 
        $billing->date = $request->date;
        $billing->time = $request->time; 
        $billing->dicount = $request->dicount; 
        $billing->taxamount = $request->taxamount; 
        $billing->discountreason = $request->discountreason; 
        $billing->dischargedate = $request->dischargedate;
        $billing->dischargetime = $request->dischargetime;
        $billing->update();
        
        return response('column updated');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $billing = Billing::find($id);
        $billing->delete;
        return response('column deleted');
    }
}
