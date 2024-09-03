<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Reservation;

class RoomController extends Controller
{
    public function show($id)
    {
        $room = Room::findOrFail($id);
        $reservations = Reservation::where('room_id', $id)
            ->get(['check_in', 'check_out']);
        return view('frontend.rooms.show', compact('room', 'reservations'));
    }
    
}
