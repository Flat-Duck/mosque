<?php

namespace App\Http\Controllers\User;

use App\Room;
use App\Mosque;
use App\Http\Controllers\Controller;
use Auth;
class RoomController extends Controller
{
    /**
     * Display a list of Rooms.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::getList();

        return view('user.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new Room
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mosques = Mosque::all();

        $floorOptions = Room::$floorOptions;

        return view('user.rooms.add', compact('floorOptions', 'mosques'));
    }

    /**
     * Save new Room
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        request()->merge(['mosque_id'=>Auth::user()->teacher->mosque_id]);
        $validatedData = request()->validate(Room::validationRules());

        $room = Room::create($validatedData);

        return redirect()->route('user.rooms.index')->with([
            'type' => 'success',
            'message' => 'Room added'
        ]);
    }

    /**
     * Show the form for editing the specified Room
     *
     * @param \App\Room $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $mosques = Mosque::all();

        $floorOptions = Room::$floorOptions;

        return view('user.rooms.edit', compact('room', 'floorOptions', 'mosques'));
    }

    /**
     * Update the Room
     *
     * @param \App\Room $room
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Room $room)
    {
        request()->merge(['mosque_id'=>Auth::user()->teacher->mosque_id]);
        $validatedData = request()->validate(
            Room::validationRules($room->id)
        );

        $room->update($validatedData);

        return redirect()->route('user.rooms.index')->with([
            'type' => 'success',
            'message' => 'Room Updated'
        ]);
    }

    /**
     * Delete the Room
     *
     * @param \App\Room $room
     * @return void
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('user.rooms.index')->with([
            'type' => 'success',
            'message' => 'Room deleted successfully'
        ]);
    }
}
