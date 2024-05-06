<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

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
       return view("seguridad.usuarios.create");
   }
}
