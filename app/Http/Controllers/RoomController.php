<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms =Room::paginate(5);
        return response($rooms);
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
            'type' =>'required', 
            'number' =>'required', 
            'noofbeds' =>'required', 
            'room_tariff' =>'required', 
            'status' =>'required'
        ]);
        Room::create($request->all());
        return response('column created');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $room = Room::find($id);
        return response($room);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'type' =>'required', 
            'number' =>'required', 
            'noofbeds' =>'required', 
            'room_tariff' =>'required', 
            'status' =>'required'
        ]);

        
        $room = Room::find($id);
        $room->update($request->all());
        return response('column updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $room = Room::find($id);
        $room->delete();
        return response('column deleted');
    }
}
