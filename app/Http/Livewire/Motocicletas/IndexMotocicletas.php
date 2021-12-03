<?php

namespace App\Http\Livewire\Motocicletas;

use App\Models\Motocicleta;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class IndexMotocicletas extends Component
{

    public $number;
    protected $listeners = ['render', 'delete', 'open'];

    public function open()
    {
        if ($this->number === 1) {
            $this->emit('open-true');
        } else {
            if (Auth::user()->motocicletas->count() >= 6) {
                $this->emit('alert-limit', 'Se excedio el numero de registros permitidos para Motocicletas, elimina al menos un registro para continuar');
            }else{
                $this->emit('open-true');
            }
        }
    }

    public function delete(Motocicleta $motocicleta)
    {
        $motocicleta->delete();
    }

    public function edit($id)
    {
        $this->emit('openEditMotocicleta');
        $this->emit('editMotocicleta', $id);
        // $this->render();
    }

    public function detalle($id)
    {
        $this->emit('openDetalleMotocicleta');
        $this->emit('detalleMotocicleta', $id);
        // $this->render();
    }

    public function render()
    {
        if ($this->number === 1) {
            $motocicletas = Motocicleta::paginate(9);
        } else {
            // $motocicletas = Motocicleta::paginate(9);
            $user = User::find(Auth::user()->id);
            $motocicletas = $user->motocicletas()->paginate(9);
        }

        return view('livewire.motocicletas.index-motocicletas', compact('motocicletas'));
    }
}
