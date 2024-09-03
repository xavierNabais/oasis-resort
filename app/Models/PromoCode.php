<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    use HasFactory;

    // Define o nome da tabela se não for o padrão
    protected $table = 'promo_codes';

    // Define quais atributos podem ser preenchidos em massa
    protected $fillable = [
        'code',
        'discount',
        'expires_at'
    ];

    // Define o formato de data
    protected $dates = [
        'expires_at',
        'created_at',
        'updated_at'
    ];

    // Atributos que devem ser ocultados para arrays
    protected $hidden = [];
}
