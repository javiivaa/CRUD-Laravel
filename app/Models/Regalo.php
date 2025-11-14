<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regalo extends Model
{
    protected $fillable = ['name', 'user_id'];

    // La migración original no define timestamps, así que desactivamos timestamps en el modelo
    public $timestamps = false;

    // Relación: un regalo pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
