<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Log;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('backoffice.auth.login');
    }

    public function logs()
    {
        $logs = Log::orderBy('created_at', 'desc')->get();
        return view('backoffice.logs.index', compact('logs'));
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('employee')->attempt($credentials)) {
            // Autenticado com sucesso
            return redirect()->intended('panel/dashboard');
        }
    
        // Falha na autenticação
        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }
    
    

    public function logout()
    {
        Auth::guard('employee')->logout();
        return redirect()->route('admin.login');
    }

    public function rooms(Request $request)
    {
        // Obtenha todos os tipos de quartos disponíveis para o filtro
        $roomTypes = DB::table('rooms')->distinct()->pluck('type');
    
        // Construa a consulta de quartos com base nos filtros
        $query = Room::query();
    
        // Aplicar o filtro por nome se fornecido
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }
    
        // Aplicar o filtro por intervalo de preço se fornecido
        if ($request->filled('price_min')) {
            $priceMin = $request->input('price_min');
            if (is_numeric($priceMin)) {
                $query->where('price_per_night', '>=', $priceMin);
            }
        }
        if ($request->filled('price_max')) {
            $priceMax = $request->input('price_max');
            if (is_numeric($priceMax)) {
                $query->where('price_per_night', '<=', $priceMax);
            }
        }
    
        // Aplicar o filtro por tipo se fornecido
        if ($request->filled('type') && in_array($request->input('type'), $roomTypes)) {
            $query->where('type', $request->input('type'));
        }
    
        // Obtenha os resultados filtrados
        $rooms = $query->get();
    
        // Passe as variáveis para a view
        return view('backoffice.rooms.index', [
            'rooms' => $rooms,
            'roomTypes' => $roomTypes
        ]);
    }
    
    

    public function dashboard()
    {
        return view('backoffice.dashboard');
    }

    public function reservations(Request $request)
    {
        $query = Reservation::query();

        // Filtrar por email do cliente se fornecido
        if ($request->has('search') && !empty($request->search)) {
            $query->whereHas('client', function ($q) use ($request) {
                $q->where('email', 'like', '%' . $request->search . '%');
            });
        }

        // Obter as reservas com os dados do cliente e do quarto
        $reservations = $query->with(['client', 'room'])->get();

        // Retornar a view com as reservas
        return view('backoffice.reservations.index', compact('reservations'));
    }
    
}
