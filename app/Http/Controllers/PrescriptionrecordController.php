<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Prescription;
use App\Models\Prescriptionrecord;
use Illuminate\Http\Request;

class PrescriptionrecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pres = Prescriptionrecord::join('prescriptions','prescriptionrecords.prescription_id','=','prescriptions.id')
        ->join('medicines','prescriptionrecords.medicine_id','=','medicines.id')
        ->select('prescriptions.prescriptiondate','medicines.name', 'medicines.cost', 'medicines.description','prescriptionrecords.cost', 'prescriptionrecords.unit', 'prescriptionrecords.dosage', 'prescriptionrecords.status')
        ->orderBy('prescriptionrecords.id','desc')
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
            'medicine' => 'required', 
            'cost' => 'required', 
            'unit' => 'required', 
            'dosage' => 'required', 
            'status' => 'required'
        ]);
        $medicine = Medicine::where('medicines.name',$request->medicine)->first()->id;
        $presid = Prescriptionrecord::where('prescriptionrecords.medicine_id',$medicine)->first()->id;
         Prescriptionrecord::create([
            'prescription_id' => $presid, 
            'medicine_id' =>$medicine, 
            'cost' => $request->cost, 
            'unit' => $request->unit, 
            'dosage' => $request->dosage, 
            'status' => $request->status
         ]);
         return response('column created');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pres = Prescriptionrecord::join('prescriptions','prescriptionrecords.prescription_id','=','prescriptions.id')
        ->join('medicines','prescriptionrecords.medicine_id','=','medicines.id')
        ->select('prescriptions.prescriptiondate','medicines.name', 'medicines.cost', 'medicines.description','prescriptionrecords.cost', 'prescriptionrecords.unit', 'prescriptionrecords.dosage', 'prescriptionrecords.status')
        ->orderBy('prescriptionrecords.id','desc')
        ->where('prescriptionrecords.id',$id)
        ->get();
        
        return response($pres);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prescriptionrecord $prescriptionrecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([ 
            'medicine' => 'required', 
            'cost' => 'required', 
            'unit' => 'required', 
            'dosage' => 'required', 
            'status' => 'required'
        ]);
 
         
         $medicine = Medicine::where('medicines.name',$request->medicine)->first()->id;
         $presid = Prescriptionrecord::where('prescriptionrecords.id',$id)
         ->select('prescriptionrecords.prescription_id')
         ->first();

        $pres = Prescriptionrecord::find($id);
            $pres->prescription_id = $presid->prescription_id; 
            $pres->medicine_id = $medicine; 
            $pres->cost = $request->cost; 
            $pres->unit = $request->unit; 
            $pres->dosage = $request->dosage; 
            $pres->status = $request->status;

        $pres->update(); 
        return response('column updated');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pres=Prescriptionrecord::find($id);
        $pres->delete(); 
        return response('column deleted');
    }
}
