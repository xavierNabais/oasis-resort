<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    // Outros métodos e propriedades do modelo

    /**
     * Get the client associated with the reservation.
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    /**
     * Get the room associated with the reservation.
     */
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
