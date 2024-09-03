<?php

namespace App\Http\Controllers\Backend;

use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\DB;

class RoomControllerBackoffice extends Controller
{
    // Outros métodos...

    // Método para exibir o formulário de edição
    public function edit($id)
    {
        // Buscar o quarto pelo ID
        $room = Room::findOrFail($id);
    
        // Buscar os tipos de quarto distintos da tabela 'rooms'
        $roomTypes = DB::table('rooms')->distinct()->pluck('type');
    
        return view('backoffice.rooms.edit', compact('room', 'roomTypes'));
    }

    // Método para atualizar os dados do quarto
    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);

        $type = $request->type === 'other' ? $request->new_type : $request->type;

        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string',
            'price_per_night' => 'required|numeric',
        ]);

        // Atualizar os dados do quarto
        $room->update([
            'name' => $request->name,
            'description' => $request->description,
            'type' => $type,
            'price_per_night' => $request->price_per_night,
        ]);

        // Registrar a ação
        Log::create([
            'action' => "Alterou o quarto com ID $id",
            'performed_by' => Auth::user()->name, // Ou o nome do secretário
        ]);

        return redirect()->route('admin.rooms')->with('success', 'Quarto atualizado com sucesso!');
    }

    // Método para excluir o quarto
    public function delete($id)
    {
        // Buscar o quarto pelo ID
        $room = Room::findOrFail($id);

        // Verificar se o quarto existe
        if ($room) {
            // Excluir o quarto
            $room->delete();
        }

        // Buscar os tipos de quarto distintos da tabela 'rooms'
        $roomTypes = DB::table('rooms')->distinct()->pluck('type');

        // Registrar a ação
        Log::create([
            'action' => "Apagou o quarto com ID $id",
            'performed_by' => Auth::user()->name, // Ou o nome do secretário
        ]);

        // Retornar a visão com os tipos de quarto
        return route('admin.rooms', compact('roomTypes'));
    }
}
