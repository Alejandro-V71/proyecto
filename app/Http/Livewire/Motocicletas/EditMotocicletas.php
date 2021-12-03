<?php

namespace App\Http\Livewire\Motocicletas;

use App\Models\Categoria;
use App\Models\Linea;
use App\Models\Marca;
use App\Models\Motocicleta;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditMotocicletas extends Component
{
    public $marca_id = "", $categoria_id = "", $linea_id = "";
    public $marcas, $categorias = [], $lineas = [], $linea_seleccionada, $users = [];
    public $number, $placaMotocicleta, $modelo, $colorMotocicleta, $cilindraje, $kilometraje, $user_id, $motocicleta;

    protected $listeners = ['editMotocicleta'];

    public function editMotocicleta($id)
    {
        $this->resetValidation();
        $motocicleta = Motocicleta::find($id);
        $this->motocicleta = $motocicleta;

        $linea = Linea::find($motocicleta->linea_id);
        $this->linea_seleccionada = $linea;

        $this->categorias = Categoria::where('marca_id', $motocicleta->marca_id)->get();
        $this->lineas = Linea::where('categoria_id', $motocicleta->categoria_id)->get();
    }

    public function mount()
    {
        // abort_if(Gate::denies('motocicleta_destroy'), 403);
        $this->marcas = Marca::all();
        // $this->categorias = Categoria::all();
        // $this->lineas = Linea::where('categoria_id', $this->linea_seleccionada->categoria_id);
        // $this->linea_seleccionada = $this->motocicleta->cilindraje;
        $this->users = User::all();
    }

    protected $rules = [
        'motocicleta.placaMotocicleta' => 'required|min:6|max:6',
        'motocicleta.colorMotocicleta' => 'required|alpha',
        'motocicleta.cilindraje' => 'required|numeric',
        'motocicleta.kilometraje' => 'required|numeric',
        'motocicleta.categoria_id' => 'required',
        'motocicleta.linea_id' => 'required',
        'motocicleta.marca_id' => 'required',
        'motocicleta.user_id' => 'required'
    ];

    // protected $messages = [
    //     'placa.required' => 'La Placa es obligatoria',
    //     'modelo.required' => 'El Modelo es obligatorio',
    //     'color.required' => 'El Color es obligatorio',
    //     'marca_id.required' => 'La Marca es obligatoria',
    //     'categoria_id.required' => 'La Categoria es obligatoria',
    //     'linea_id.required' => 'La Linea es obligatoria',
    //     'cilindraje.required' => 'El Cilindraje es obligatorio',
    //     'user_id.required' => 'El Usuario es obligatorio',
    // ];

    public function updatedMotocicletaPlacaMotocicleta()
    {
        $this->validateOnly('motocicleta.placaMotocicleta');
    }

    public function updatedMotocicletaColorMotocicleta()
    {
        $this->validateOnly('motocicleta.colorMotocicleta');
    }

    public function updatedMotocicletaCilindraje()
    {
        $this->validateOnly('motocicleta.cilindraje');
    }

    public function updatedMotocicletaKilometraje()
    {
        $this->validateOnly('motocicleta.kilometraje');
    }

    public function updatedMotocicletaUserId()
    {
        $this->validateOnly('motocicleta.user_id');
    }

    public function updatedMotocicletaMarcaId($value)
    {
        $this->categorias = Categoria::where('marca_id', $value)->get();
        $this->reset(['categoria_id', 'linea_id', 'lineas', 'linea_seleccionada']);
        $this->validateOnly('motocicleta.marca_id');

        $this->motocicleta->categoria_id = '';
        $this->motocicleta->linea_id = '';
    }

    public function updatedMotocicletaCategoriaId($value)
    {
        $this->lineas = Linea::where('categoria_id', $value)->get();
        $this->reset(['linea_id', 'linea_seleccionada']);
        $this->validateOnly('motocicleta.categoria_id');
        $this->motocicleta->linea_id = '';
    }

    public function updatedMotocicletaLineaId($value)
    {
        $this->validateOnly('motocicleta.linea_id');
        $this->linea_seleccionada = Linea::where('id', $value)->first();
    }

    public function clean()
    {
        // $this->reset(['motocicleta.placa', 'motocicleta.modelo', 'motocicleta.color', 'motocicleta.marca_id', 'motocicleta.categoria_id', 'motocicleta.linea_id', 'motocicleta.cilindraje', 'motocicleta.user_id']);
        $this->resetValidation();
    }

    public function update()
    {
        if ($this->number != 1) {
            $this->user_id = Auth::user()->id;
        }

        $this->motocicleta->cilindraje;

        $this->validate();

        $this->motocicleta->save();

        // Motocicleta::create([
        //     'motocicleta.placa' => $this->placa,
        //     'motocicleta.modelo' => $this->modelo,
        //     'motocicleta.color' => $this->color,
        //     'motocicleta.marca_id' => $this->marca_id,
        //     'motocicleta.categoria_id' => $this->categoria_id,
        //     'motocicleta.linea_id' => $this->linea_id,
        //     'motocicleta.cilindraje' => $this->cilindraje,
        //     'motocicleta.user_id' => $this->user_id,
        // ]);

        $this->emitTo('motocicletas.index-motocicletas', 'render');

        $this->emit('close');
        $this->emit('close2');

        $this->emit('alert', 'La Motocicleta se actualizó satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.motocicletas.edit-motocicletas');
    }
}
