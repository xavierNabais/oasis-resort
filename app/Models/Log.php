<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    // Adicione os campos que você deseja permitir a atribuição em massa
    protected $fillable = [
        'action',
        'performed_by',
    ];
}
