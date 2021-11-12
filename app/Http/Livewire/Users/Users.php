<?php

namespace App\Http\Livewire\Users;

use App\Mail\CredencialesUsuario;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Str;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    use WithPagination;


    protected $listeners = ['store','cambiarEstado'];

    public $search = "";
    

    public
           $name,
           $email,
            $estado,
           $roles,
            $rol,
           $id_user;


    public $updateMode= false;

    protected $paginationTheme = 'bootstrap';
    protected $rules = [
        'estado' => 'required',
        'email' => 'required|unique:users|email|string',


    ];



    public function render()
    {
        $this->roles  = Role::all()->pluck('name','id');
        return view('livewire.users.users',[
           'users' =>  User::where('name','like','%' . $this->search. '%')
            ->orWhere('email','like','%' . $this->search. '%')
            ->orWhere('Estado', $this->search)->paginate(6),
        ]);
    }

    //resetear los campos

    private function resetInputFields(){
        $this->name = '';
        $this->email= '';
        $this->rol = '';
        $this->password= '';
        $this->estado = '';

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
        $contrasena = Str::random(8);

        $user =  User::create([

            'name' => Str::random(8),
            'email' => $this->email,
            'password' =>  Hash::make($contrasena),
            'rol' => $this->rol,
            'Estado' => $this->estado
        ]);

         $user->syncRoles($this->rol);


         Mail::to($this->email)->send(new CredencialesUsuario($this->email,$contrasena));


        $this->resetInputFields();

        $this->emit('successUser');
        $this->emit('UserStore'); // Close model to using to jquery

    }

    //Método para que se muestre el formulario de edición

    public function edit($id)
    {
        $this->updateMode = true;
        $user = User::where('id',$id)->first();
        $this->id_user= $id;
        $this->name = $user->name;
        $this->email = $user->email;


    }


    //Método para actualizar un registro
    public function update()
    {
        $this->validate();

        if ($this->id_user) {
            $user = User::find($this->id_user);
            $user->update([
                'name' => $this->name,
                'email' => $this->email
            ]);

            $this->updateMode = false;
            session()->flash('message', 'Repuesto actualizado correctamente.');
            $this->resetInputFields();

            $this->emit('UserStore'); // Cierra el modal Utilizando  jquery*/

        }
    }

    //Funcion para cambiar de estado
    public function cambiarEstado(User $user){

        switch ($user->Estado) {
            case null:
                 $user->Estado = 1;
            break;
            case 1:
                $user->Estado = 2;
           break;
           case 2:
            $user->Estado = 1;
        break;
            default:
                # code...
                break;
        }
        $user->save();
    }
    //Funcion Eliminar


}
