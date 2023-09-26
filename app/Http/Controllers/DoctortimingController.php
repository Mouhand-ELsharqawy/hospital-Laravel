<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Doctortiming;
use Illuminate\Http\Request;

class DoctortimingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctortimings = Doctortiming::join('doctors','doctortimings.doctor_id','=','doctors.id')
        ->select( 'doctors.name', 'doctors.mobile','doctortimings.start', 'doctortimings.end', 'doctortimings.avilable_day')
        ->paginate(5);
        return response($doctortimings);
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
            'doctor' => 'required', 
            'start' => 'required', 
            'end' => 'required', 
            'avilable_day' => 'required', 
            'status' => 'required'
        ]);
        $doctorid = Doctor::where('doctors.name',$request->doctor)->first()->id;
        Doctortiming::create([
            'doctor_id' => $doctorid, 
            'start' => $request->start, 
            'end' => $request->end, 
            'avilable_day' => $request->avilable_day, 
            'status' => $request->status
        ]);
        return response('column created');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $doctortiming = Doctortiming::join('doctors','doctortimings.doctor_id','=','doctors.id')
        ->select( 'doctors.name', 'doctors.mobile','doctortimings.start', 'doctortimings.end', 'doctortimings.avilable_day')
        ->where('doctortimings.id',$id)
        ->get();
        return response($doctortiming);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctortiming $doctortiming)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'doctor' => 'required', 
            'start' => 'required', 
            'end' => 'required', 
            'avilable_day' => 'required', 
            'status' => 'required'
        ]);
        $doctorid = Doctor::where('doctors.name',$request->doctor)->first()->id;
        $time=Doctortiming::find($id);

            $time->doctor_id = $doctorid;
            $time->start = $request->start;
            $time->end = $request->end;
            $time->avilable_day = $request->avilable_day;
            $time->status = $request->status;
            $time->update();
        
        return response('column updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $time=Doctortiming::find($id);
        $time->delete();
        return response('column deleted');
    }
}
