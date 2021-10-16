<?php

namespace App\Http\Livewire\Rol;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Rol extends Component
{
    public $roles, $permisos;


    public function render()
    {
        $this->permisos = Permission::all();
        $this->roles = Role::all();
        return view('livewire.rol.rol',compact(['roles' => $this->roles]));
    }
}
