<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicnes = Medicine::paginate(5);
        return response($medicnes);
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
            'cost' => 'required', 
            'description' => 'required', 
            'status' => 'required',
        ]);

        Medicine::create([
            'name' => $request->name, 
            'cost' => $request->cost, 
            'description' => $request->description, 
            'status' => $request->status,
        ]);
        return response('column created');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $medicine = Medicine::find($id);
        return response($medicine);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicine $medicine)
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
            'cost' => 'required', 
            'description' => 'required', 
            'status' => 'required',
        ]);

        $medicine = Medicine::find($id);
        $medicine->name = $request->name; 
        $medicine->cost = $request->cost;
        $medicine->description = $request->description; 
        $medicine->status = $request->status;
        $medicine->update();

        return response('column updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $medicine = Medicine::find($id);
        $medicine->delete();
        return response('column deleted');
    }
}
