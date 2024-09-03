<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    public function create($roomId)
    {
        $room = Room::findOrFail($roomId);
        
        // Fetch existing reservations for the room to pass to the view
        $reservations = Reservation::where('room_id', $roomId)->get();
        
        return view('frontend.rooms.reserve', compact('room', 'reservations'));
    }

    public function store(Request $request, $roomId)
    {
        // Verificar se o usuário está autenticado
        if (!Auth::check()) {
            return redirect()->route('client.login')->with('error', 'Você precisa estar logado para fazer uma reserva.');
        }

    
        // Validar o campo de intervalo de datas
        $request->validate([
            'date_range' => 'required|string',
        ]);


        // Extrair datas de check-in e check-out
        list($checkIn, $checkOut) = explode(' to ', $request->input('date_range'));

    
        // Converter as datas para instâncias de Carbon
        $checkIn = Carbon::parse($checkIn);
        $checkOut = Carbon::parse($checkOut);
    
        // Verificar se as datas estão disponíveis
        $existingReservation = Reservation::where('room_id', $roomId)
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->whereBetween('check_in', [$checkIn, $checkOut])
                      ->orWhereBetween('check_out', [$checkIn, $checkOut])
                      ->orWhere(function ($query) use ($checkIn, $checkOut) {
                          $query->where('check_in', '<=', $checkIn)
                                ->where('check_out', '>=', $checkOut);
                      });
            })
            ->first();
    
        if ($existingReservation) {
            return back()->withErrors(['error' => 'As datas selecionadas já estão ocupadas. Por favor, escolha outras datas.']);
        }
    
        // Criar nova reserva se as datas estiverem disponíveis
        $reservation = new Reservation();
        $reservation->room_id = $roomId;
        $reservation->check_in = $checkIn;
        $reservation->check_out = $checkOut;
        $reservation->client_id = auth()->id(); // Assumindo que o usuário está autenticado
        $reservation->save();
    
        return redirect()->route('home')->with('success', 'Reserva criada com sucesso!');
    }
    
}
