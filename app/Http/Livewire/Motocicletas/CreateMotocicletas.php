<?php

namespace App\Http\Livewire\Motocicletas;

use Livewire\Component;

class CreateMotocicletas extends Component
{

    public $marca_id = "", $categoria_id = "", $linea_id = "", $user_id="";
    public $marcas, $categorias = [], $lineas = [], $linea_seleccionada, $users = [];
    public $number, $placa, $modelo, $color, $cilindraje;

    public function mount()
    {
        $this->marcas = Marca::all();
        $this->users = User::all();
        $this->close = 0;
    }

    protected $rules = [
        'placaMotocicleta' => 'required|unique:motocicletas,placa|min:6|max:6',
        'colorMotocicleta' => 'required|numeric',
        'cilindraje' => 'required|alpha',
        'kilometraje' => 'required',
        'categoria_id' => 'required',
        'linea_id' => 'required',
        // 'cilindraje' => 'required',
        'user_id' => 'required'
    ];

    public function updatedPlacaMotocicleta()
    {
        $this->validateOnly('placaMotocicleta');
    }

    public function updatedColorMotocicleta()
    {
        $this->validateOnly('colorMotocicleta');
    }

    public function updatedCilindraje()
    {
        $this->validateOnly('cilindraje');
    }

    public function updatedKilometraje()
    {
        $this->validateOnly('kilometraje');
    }


public function updatedUserId()
    {
        $this->validateOnly('user_id');
    }

    public function updatedMarcaId($value)
    {
        $this->categorias = Categoria::where('marca_id', $value)->get();
        $this->reset(['categoria_id', 'linea_id', 'lineas', 'linea_seleccionada']);
        $this->validateOnly('marca_id');
    }

    public function updatedCategoriaId($value)
    {
        $this->lineas = Linea::where('categoria_id', $value)->get();
        $this->reset(['linea_id', 'linea_seleccionada']);
        $this->validateOnly('categoria_id');
    }

    public function updatedLineaId($value)
    {
        $this->validateOnly('linea_id');
        $this->linea_seleccionada = Linea::where('id', $value)->first();
    }
    public function render()
    {
        return view('livewire.motocicletas.create-motocicletas');
    }
}
