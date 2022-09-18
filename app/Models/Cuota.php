<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Cuota extends Authenticatable
{
    
    protected $table = 'cuota';
    protected $primaryKey = 'id';

    protected $fillable = [
        'descripcion',
        'valor',
        'prestamo_id'
    ];

}
