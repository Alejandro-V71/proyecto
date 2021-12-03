<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\CssSelector\Node\FunctionNode;

class Motocicleta extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    //relacion uno a muchos con la tabla marcas

    public function marca(){
        return $this->belongsTo(Marca::class);
    }

    //relacion uno a muchos con la tabla categoria
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    // relacion uno a mochos con la tabla user

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function linea(){
        return $this->belongsTo(Linea::class);
    }
}
