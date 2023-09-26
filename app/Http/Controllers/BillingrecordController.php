<?php

namespace App\Http\Controllers;

use App\Models\Billingrecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BillingrecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $billrecords = Billingrecord::join('billings','billingrecords.billing_id','=','billings.id')
        ->join('servicetypes','billingrecords.servicetype_id','=','servicetypes.id')
        ->select('billings.date', 'billings.time','billings.dicount', 'billings.taxamount', 'billings.discountreason', 'billings.dischargedate', 'billings.dischargetime','servicetypes.type', 'servicetypes.charge', 'servicetypes.description', 'servicetypes.status','billingrecords.amount', 'billingrecords.billdate', 'billingrecords.status')
        ->paginate(5);
        return response(['billrecords'=>$billrecords]);
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
            'bid' =>'required', 
            'sid' =>'required', 
            'amount' =>'required', 
            'date' =>'required', 
            'status' =>'required'
        ]);

        Billingrecord::create([
            'billing_id' => $request->bid, 
            'servicetype_id' =>$request->sid, 
            'amount' => $request->amount, 
            'billdate' => $request->date, 
            'status' => $request->status
        ]);
        return response('column created');
    }

    /**
     * Display the specified resource.
     */
    public function show( $billingrecord)
    {
        $billrecord = Billingrecord::join('billings','billingrecords.billing_id','=','billings.id')
        ->join('servicetypes','billingrecords.servicetype_id','=','servicetypes.id')
        ->select('billingrecords.id','billings.date', 'billings.time','billings.dicount', 'billings.taxamount', 'billings.discountreason', 'billings.dischargedate', 'billings.dischargetime','servicetypes.type', 'servicetypes.charge', 'servicetypes.description', 'servicetypes.status','billingrecords.amount', 'billingrecords.billdate', 'billingrecords.status')
        ->where('billingrecords.id',$billingrecord)
        ->get();
        return response($billrecord);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Billingrecord $billingrecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'bid' =>'required', 
            'sid' =>'required', 
            'amount' =>'required', 
            'date' =>'required', 
            'status' =>'required'
        ]);

        $record= Billingrecord::find($id);
            $record->billing_id = $request->bid; 
            $record->servicetype_id =$request->sid;
            $record->amount = $request->amount; 
            $record->billdate = $request->date; 
            $record->status = $request->status;
            $record->update();
        return response('column updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $record= Billingrecord::find($id);
        $record->delete();
        return response('column deleted');
    }
}
