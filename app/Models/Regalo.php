<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regalo extends Model
{
    protected $fillable = ['name'];

    // La migración no define timestamps, así que desactivamos timestamps en el modelo
    public $timestamps = false;
}
