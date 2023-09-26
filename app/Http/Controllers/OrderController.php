<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Order;
use App\Models\Patient;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::join('doctors','orders.doctor_id','=','doctors.id')
        ->select('doctors.name','doctors.mobile','orders.orderdate', 'orders.deliverydate', 'orders.address', 'orders.phone', 'orders.note', 'orders.status', 'orders.paymenttype', 'orders.cardno', 'orders.cvvno', 'orders.card_holder', 'orders.expiredate')
        ->paginate(5);
        return response($orders);
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
            'patient' => 'required', 
            'doctor' => 'required', 
            'orderdate' => 'required', 
            'deliverydate' => 'required', 
            'address' => 'required', 
            'phone' => 'required', 
            'note' => 'required', 
            'status' => 'required', 
            'paymenttype' => 'required', 
            'cardno' => 'required', 
            'cvvno' => 'required', 
            'card_holder' => 'required', 
            'expiredate' => 'required'
        ]);

        $patient = Patient::where('patients.name',$request->patient)->first()->id;
        $doctor = Doctor::where('doctors.name',$request->doctor)->first()->id;

        Order::create([
            'patient_id' =>$patient, 
            'doctor_id' =>$doctor, 
            'orderdate' =>$request->orderdate, 
            'deliverydate' =>$request->deliverydate, 
            'address' => $request->address, 
            'phone' => $request->phone, 
            'note' =>$request->note, 
            'status' => $request->status, 
            'paymenttype' => $request->paymenttype, 
            'cardno' => $request->cardno, 
            'cvvno' => $request->cvvno, 
            'card_holder' => $request->card_holder, 
            'expiredate' =>$request->expiredate
        ]);
        return response('column created');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Order::join('doctors','orders.doctor_id','=','doctors.id')
        ->select('doctors.name','doctors.mobile','orders.orderdate', 'orders.deliverydate', 'orders.address', 'orders.phone', 'orders.note', 'orders.status', 'orders.paymenttype', 'orders.cardno', 'orders.cvvno', 'orders.card_holder', 'orders.expiredate')
        ->where('orders.id',$id)
        ->get();
        return response($order);
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'patient' => 'required', 
            'doctor' => 'required', 
            'orderdate' => 'required', 
            'deliverydate' => 'required', 
            'address' => 'required', 
            'phone' => 'required', 
            'note' => 'required', 
            'status' => 'required', 
            'paymenttype' => 'required', 
            'cardno' => 'required', 
            'cvvno' => 'required', 
            'card_holder' => 'required', 
            'expiredate' => 'required'
        ]);

        $order = Order::find($id);

        
        $patient = Patient::where('patients.name',$request->patient)->first()->id;
        $doctor = Doctor::where('doctors.name',$request->doctor)->first()->id;

        
            $order->patient_id = $patient;
            $order->doctor_id = $doctor;
            $order->orderdate = $request->orderdate; 
            $order->deliverydate = $request->deliverydate; 
            $order->address = $request->address;
            $order->phone = $request->phone; 
            $order->note = $request->note; 
            $order->status = $request->status; 
            $order->paymenttype = $request->paymenttype; 
            $order->cardno = $request->cardno;
            $order->cvvno = $request->cvvno;
            $order->card_holder = $request->card_holder; 
            $order->expiredate = $request->expiredate;
            $order->update();
            return response('column updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return response('column deleted');
    }
}
