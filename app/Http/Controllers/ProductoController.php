<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductoFormRequest;

class ProductoController extends Controller
{
     /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {

     }

     public function index(Request $request)
     {
         
         $texto=trim($request->get('texto'));
         $productos=DB::table('producto as a')
             ->join('categoria as c','a.id_categoria','=','c.id_categoria')
             ->select('a.id_producto','a.nombre','a.codigo','a.stock','c.categoria','a.descripcion','a.imagen','a.estado')
             ->where('a.nombre','LIKE','%'.$texto.'%')
             ->orwhere('a.codigo','LIKE','%'.$texto.'%')
             ->orderBy('id_producto', 'asc')
             ->paginate(10);
        return view('almacen.producto.index', compact('productos', 'texto'));
     }

     /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */

     public function create()
     {
         $categorias=DB::table('categoria')->where('estatus','=','1')->get();
         return view("almacen.producto.create",["categorias"=>$categorias]);
     }

     /**
     * Store a newly created resource in storage
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

     public function store(ProductoFormRequest $request)
     {
        $producto = new Producto;
        $producto->id_categoria=$request->input('id_categoria');
        $producto->codigo=$request->input('codigo');
        $producto->nombre=$request->input('nombre');
        $producto->stock=$request->input('stock');
        $producto->descripcion=$request->input('descripcion');
        $producto->estado='Activo';
        // script para subit la imagen
        if ($request->hasFile("imagen")){
            
            $imagen = $request->file("imagen");
            $nombreimagen = Str::slug($request->nombre).".".$imagen->guessExtension();
            $ruta = public_path("/imagenes/productos/");
            copy($imagen->getRealPath(),$ruta.$nombreimagen);

            $producto->imagen = $nombreimagen;
        }
        $producto->save();
        return redirect()->route('producto.index');

     }

     /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */

     public function show($id)
     {
        //
     }

     /**
     * Show the form for editing the specified resource
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
     {
        //
        $producto = Producto::findOrFail($id);
        $categorias = DB::table('categoria')->where('estatus','=','1')->get();
        return view("almacen.producto.edit", ["producto"=>$producto, "categorias"=>$categorias]);
     }

     /**
     * Update the specified resource in storage
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

     public function update(ProductoFormRequest $request, $id)
     {
        //
        $producto = Producto::findOrFail($id);
        
        //Checar aqui si la variables id_categoria va asi o es idcategoria
        $producto->id_categoria=$request->input('id_categoria');
        $producto->codigo=$request->input('codigo');
        $producto->nombre=$request->input('nombre');
        $producto->stock=$request->input('stock');
        $producto->descripcion=$request->input('descripcion');
        $producto->estado='Activo';
        // script para subit la imagen
        if ($request->hasFile("imagen")){
            
            $imagen = $request->file("imagen");
            $nombreimagen = Str::slug($request->nombre).".".$imagen->guessExtension();
            $ruta = public_path("/imagenes/productos/");
            copy($imagen->getRealPath(),$ruta.$nombreimagen);

            $producto->imagen = $nombreimagen;
        }
        $producto->update();
        return redirect()->route('producto.index');

     }

     /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */

     public function destroy($id)
     {
        // Baja lógica, NO se elimina de la base de datos
        $producto=Producto::findOrFail($id);
        $producto->estado='Inactivo';
        $producto->update();
        return redirect()->route('producto.index');

     }



}
