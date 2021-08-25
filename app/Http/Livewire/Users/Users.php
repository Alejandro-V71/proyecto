<?php

namespace App\Http\Livewire\Users;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\User;

class Users extends Component
{
    use WithPagination;

    public $users,$name, $email, $password, $id_user;
    public $modal = false;
    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save(){
        $validation =$this->validate();
        User::create($validation);
    }

    public function render()
    {
        $this->users = User::all();
        return view('livewire.users.users');
    }

    public function limpiar(){
        $this->name='';
        $this->email='';
        $this->id_user='';
    }

    public function store(){
        $this->exampleMode = true;
        User::updateOrCreate(['id'=>$this->id_user],
        [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,

        ]);

        session()->flash('message', 'Usuario creado correctamente');

        $this->limpiar();

        $this->emit('userGuardar'); // Close model to using to jquery

    }
    public function editar($id)
    {
        $this->updateMode = true;
        $user = User::where('id',$id)->first();
        $this->id_user = $id;
        $this->name = $user->name;
        $this->email = $user->email;

    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->limpiar();

    }

    public function update()
    {
        $user = $this->validate([
            'name' => 'required|min:6',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($this->id_user) {
            $user = User::find($this->id_user);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Usuario actualizado correctamente');
            $this->limpiar();

        }
    }

    public function delete($id)
    {
        if($id){
            User::where('id',$id)->delete();
            session()->flash('message', 'Usuario eliminado correctamente');
        }
    }
}
