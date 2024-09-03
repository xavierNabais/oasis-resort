<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;

class HomeController extends Controller
{
    public function index()
    {
        $rooms = Room::all(); // Recupera todos os quartos
        return view('frontend.home', compact('rooms')); // Retorna a view com os quartos
    }
}
