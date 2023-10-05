<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chirp extends Model
{
    use HasFactory;

     protected $fillable = [
         'message',
         'user_id',
     ];
}

//estamos agregando fillable, diciendo que las propiedades que podemos asignar masivamente