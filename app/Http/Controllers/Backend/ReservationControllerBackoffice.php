<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class ReservationControllerBackoffice extends Controller
{
    // Método para atualizar uma reserva
    public function update(Request $request, $id)
    {
        // Encontrar a reserva pelo ID
        $reservation = Reservation::findOrFail($id);

        // Validar as entradas
        $request->validate([
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
        ]);

        // Atualizar as informações da reserva
        $reservation->check_in = $request->input('check_in');
        $reservation->check_out = $request->input('check_out');
        $reservation->save();

        // Registrar a ação
        Log::create([
            'action' => "Alterou a reserva com o ID $id",
            'performed_by' => Auth::user()->name, // Ou o nome do secretário
        ]);

        return redirect()->route('admin.reservations')->with('success', 'Reserva atualizada com sucesso!');
    }

    // Método para deletar uma reserva
    public function destroy($id)
    {
        // Encontrar a reserva pelo ID
        $reservation = Reservation::findOrFail($id);

        // Deletar a reserva
        $reservation->delete();

        // Registrar a ação
        Log::create([
            'action' => "Apagou a reserva com o id $id",
            'performed_by' => Auth::user()->name, // Ou o nome do secretário
        ]);

        return redirect()->route('admin.reservations')->with('success', 'Reserva deletada com sucesso!');
    }
}
