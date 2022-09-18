<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Prestamo extends Authenticatable
{

    protected $table = 'prestamo';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'descripcion',
        'valor',
        'tipo_prestamo'
    ];

}
