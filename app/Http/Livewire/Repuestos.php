<?php

namespace App\Http\Livewire;

use App\Models\Repuesto;
use Livewire\Component;
use Livewire\WithPagination;

class Repuestos extends Component
{

    use WithPagination;

    protected $listeners = ['delete'];

    public
           $nombreRepuestos,
           $descripcionRepuestos,
           $precioRepuestos,
           $id_repuesto;


    public $updateMode= false;

    protected $paginationTheme = 'bootstrap';
    protected $rules = [
        'nombreRepuestos' => 'required|string|max:20|unique:repuestos,nombreRepuesto',
        'descripcionRepuestos' => 'required|string|max:250',
        'precioRepuestos' => 'required|integer',
    ];

    public function render()
    {
       // $this->repuestos = Repuesto::
        return view('livewire.repuestos',[
            'repuestos' =>Repuesto::all(),
        ]);
    }

    //resetear los campos

    private function resetInputFields(){
        $this->nombreRepuestos = '';
        $this->descripcionRepuestos= '';
        $this->precioRepuestos= '';

    }


    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }
    //Método para crear un nuevo Registro

    public function store()
    {

        $this->validate();

        Repuesto::create([

            'nombreRepuesto' => $this->nombreRepuestos,
            'descripcionRepuesto' => $this->descripcionRepuestos,
            'precioRepuesto' => $this->precioRepuestos
        ]);

       $this->emit('alert','El repuesto se creo correctamente');
       $this->emit('render');

        $this->resetInputFields();

        $this->emit('RepuestoStore'); // Close model to using to jquery

    }

    //Método para que se muestre el formulario de edición

    public function edit($id)
    {
        $this->updateMode = true;
        $repuesto = Repuesto::where('id',$id)->first();
        $this->id_repuesto = $id;
        $this->nombreRepuestos = $repuesto->nombreRepuesto;
        $this->descripcionRepuestos = $repuesto->descripcionRepuesto;
        $this->precioRepuestos = $repuesto->precioRepuesto;

    }


    //Método para actualizar un registro
    public function update()
    {
        $this->validate();

        if ($this->id_repuesto) {
            $repuesto = Repuesto::find($this->id_repuesto);
            $repuesto->update([
                'nombreRepuesto' => $this->nombreRepuestos,
                'descripcionRepuesto' => $this->descripcionRepuestos,
                'precioRepuesto' => $this->precioRepuestos
            ]);

            $this->updateMode = false;

            $this->resetInputFields();


            $this->emit('RepuestoStore'); // Cierra el modal Utilizando  jquery
            $this->emit('alert','Registro actualizado correctamente');
        }
    }


    //Funcion Eliminar

    public function delete(Repuesto $repuesto)
    {

            $repuesto->delete();


    }
}
