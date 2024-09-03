<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    // Definindo as colunas que podem ser atribuídas em massa
    protected $fillable = [
        'name',           // Nome do quarto
        'description',    // Descrição do quarto
        'type',           // Tipo de quarto
        'price_per_night' // Preço por noite
    ];


}
