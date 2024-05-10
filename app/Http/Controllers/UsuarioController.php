<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class UsuarioController extends Controller
{
    //
    public function _construct()
    {

    }

   public function index(Request $request)
   {
       //
       if ($request)
       {

           $query=trim($request->get('texto'));
           
           $usuarios=DB::table('users')->where('name', 'LIKE','%'.$query.'%')
           ->where('estatus','=','1')
           ->orderBy('id', 'asc')
           ->paginate(7);
           return view('seguridad.usuarios.index', ["usuarios"=>$usuarios,"texto"=>$query]);
       }
      
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
       //
        if (!Gate::allows('create-user')) {
            abort(403, 'Acceso no autorizado.');
        }
       return view("seguridad.usuarios.create");
   }

   /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $usuario=new User;
        $usuario->name=$request->get('nombre');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->save();
        return Redirect::to('seguridad/usuarios');
    }

    public function edit($id)
    {
        if (!Gate::allows('edit-user')) {
            abort(403, 'Acceso no autorizado.');
        }
        $usuario = User::findOrFail($id);
        return view("seguridad/usuarios.edit", ["usuario" => $usuario]);
    }

    public function update(Request $request, $id)
    {
        //
        $usuario=User::findOrFail($id);
        $usuario->name=$request->get('nombre');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->update();
        return Redirect::to('seguridad/usuarios');

    }

    public function destroy($id)
    {
        if (!Gate::allows('delete-user')) {
            abort(403, 'Acceso no autorizado.');
        }
        // Baja lógica, NO se elimina de la base de dato
        $usuario=User::findOrFail($id);
        $usuario->estatus=0;
        $usuario->update();
        return redirect()->route('usuarios.index');
    }
}
