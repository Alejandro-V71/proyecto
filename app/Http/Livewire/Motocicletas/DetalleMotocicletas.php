<?php

namespace App\Http\Livewire\Motocicletas;

use App\Models\Motocicleta;
use Livewire\Component;

class DetalleMotocicletas extends Component
{
    public $motocicleta;
    protected $listeners = ['detalleMotocicleta'];

    public function detalleMotocicleta($id)
    {
        $motocicleta = Motocicleta::where('id', $id)->first();
        $this->motocicleta = $motocicleta;
    }

    public function render()
    {
        return view('livewire.motocicletas.detalle-motocicletas');
    }
}
