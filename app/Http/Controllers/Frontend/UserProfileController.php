<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        
        // Obter a data atual
        $today = \Carbon\Carbon::now();
        
        // Filtrar reservas novas e antigas baseadas na data de término
        $newReservations = Reservation::where('client_id', $userId)
            ->where('check_out', '>=', $today)
            ->get();
        
        $oldReservations = Reservation::where('client_id', $userId)
            ->where('check_out', '<', $today)
            ->get();
    
        // Passar as reservas para a visualização
        return view('frontend.profile.index', [
            'user' => auth()->user(),
            'newReservations' => $newReservations,
            'oldReservations' => $oldReservations
        ]);
    }
    
    
}
