<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Servicetype;
use Illuminate\Http\Request;

class ServicetypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Servicetype::paginate(5);
        return response($services);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required', 
            'charge' => 'required', 
            'description' => 'required', 
            'status' => 'required'
        ]);

        Servicetype::create($request->all());
        return response('column created');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $service = Servicetype::find($id);
        return response($service);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicetype $servicetype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required', 
            'charge' => 'required', 
            'description' => 'required', 
            'status' => 'required'
        ]);

        $service = Servicetype::find($id);
        $service->update($request->all());
        return response('column updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $service = Servicetype::find($id);
        $service->update();
        return response('column deleted');
    }
}
