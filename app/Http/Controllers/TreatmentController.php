<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $treatments = Treatment::paginate(5);
        return response($treatments);
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
            'treatment_type' => 'required', 
            'cost' => 'required', 
            'notic' => 'required', 
            'status' => 'required'
        ]);
        Treatment::create($request->all());
        return response('column created');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $treatment = Treatment::find($id);
        return response($treatment);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Treatment $treatment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'treatment_type' => 'required', 
            'cost' => 'required', 
            'notic' => 'required', 
            'status' => 'required'
        ]);
        $treatment = Treatment::find($id);
        $treatment->update($request->all());
        return response('column created');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $treatment = Treatment::find($id);
        $treatment->delete();
        return response('column deleted');
    }
}
