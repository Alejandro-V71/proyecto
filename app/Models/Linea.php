<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class Linea extends Model
{
    use HasFactory;


    //relacion uno a muchos con la tabla marca


    public function marca(){
        return $this->belongsTo(Marca::class);
    }
}
