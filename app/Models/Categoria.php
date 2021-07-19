<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    //relacion uno a muchos con la tabla motocicleta

    public function motocicletas(){
         return $this->hasMany(Motocicleta::class);
    }
}
