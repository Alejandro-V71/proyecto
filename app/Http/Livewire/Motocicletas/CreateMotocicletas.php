<?php

namespace App\Http\Livewire\Motocicletas;

use App\Models\Categoria;
use App\Models\Linea;
use App\Models\Marca;
use App\Models\Motocicleta;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateMotocicletas extends Component
{

    public $marca_id = "", $categoria_id = "", $linea_id = "", $user_id = "";
    public $marcas, $categorias = [], $lineas = [], $linea_seleccionada, $users = [];
    public $number, $placaMotocicleta, $modelo, $colorMotocicleta, $cilindraje, $kilometraje;

    public function mount()
    {
        $this->marcas = Marca::all();
        $this->users = User::all();
        $this->close = 0;
    }

    protected $rules = [
        'placaMotocicleta' => 'required|unique:motocicletas,placaMotocicleta|min:6|max:6',
        'colorMotocicleta' => 'required|alpha',
        'cilindraje' => 'required|numeric',
        'kilometraje' => 'required|numeric',
        'categoria_id' => 'required',
        'linea_id' => 'required',
        'marca_id' => 'required',
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

    public function clean()
    {
        $this->reset(['placaMotocicleta', 'colorMotocicleta', 'marca_id', 'categoria_id', 'linea_id', 'cilindraje', 'user_id', 'linea_seleccionada']);
        $this->resetValidation();
    }

    public function save()
    {
        if ($this->number != 1) {
            $this->user_id = Auth::user()->id;
        }

        $this->validate();

        Motocicleta::create([
            'placaMotocicleta' => $this->placaMotocicleta,
            'colorMotocicleta' => $this->colorMotocicleta,
            'cilindraje' => $this->cilindraje,
            'kilometraje' => $this->kilometraje,
            'marca_id' => $this->marca_id,
            'categoria_id' => $this->categoria_id,
            'linea_id' => $this->linea_id,
            'user_id' => $this->user_id,
        ]);

        $this->reset(['placaMotocicleta', 'colorMotocicleta', 'marca_id', 'categoria_id', 'linea_id', 'cilindraje', 'user_id', 'linea_seleccionada']);

        $this->emitTo('motocicletas.index-motocicletas', 'render');

        $this->emit('alert', 'La motocicleta se registro satisfactoriamente');

        $this->emit('close');
    }

    public function render()
    {
        return view('livewire.motocicletas.create-motocicletas');
    }
}
