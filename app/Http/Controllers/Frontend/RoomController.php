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
        //Obtém as informações do quarto consoante o id
        $room = Room::findOrFail($id);
        $reservations = Reservation::where('room_id', $id)
            ->get(['check_in', 'check_out']);

        // Envia o utilizador para a view com os dados do quarto
        return view('frontend.rooms.show', compact('room', 'reservations'));
    }
    
}
