@extends('layout.admin')
@section('contenido')
    
<div class="col-md-12">

    <div class="card card-primary">
        <div class="header">
            <h3 class="card-tittle">Nuevo Ingreso</h3>
        </div>


        <form action="{{ route('ingreso.store')}}" method="POST" class="form">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="proveedor">Proveedor</label>
                            <select name="id_proveedor" class="form-control" id="id_proveedor">
                                    @foreach($personas as $persona)
                                        <option value="{{$persona->id_persona}}" {{ old('id_proveedor') == $persona->id_persona ? 'selected' : '' }}>{{$persona->nombre}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form group">
                            <label for="tipo_documento">Tipo de Documento</label>
                            <select name="tipo_documento" class="form-control" id="tipo_documento">
                                    <option value="RFC" {{ old('tipo_documento') == 'RFC' ? 'selected' : '' }}>RFC</option>
                                    <option value="TICKET" {{ old('tipo_documento') == 'TICKET' ? 'selected' : '' }}>TICKET</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form group">
                            <label for="num_documento">Número de Documento</label>
                            <input type="text" class="form-control" name="num_documento" id="num_documento" value="{{ old('num_documento') }}" placeholder="Ingresa el número de documento">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="proveedor">Productos</label>
                                <select name="pidarticulo" class="form-control selectpicker" id="pidarticulo" data-live-search="true">
                                        @foreach($productos as $producto)
                                            <option value="{{$producto->id_producto}}" {{ old('pidarticulo') == $producto->id_producto ? 'selected' : '' }}>{{$producto->Articulo}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" class="form-control" name="pcantidad" id="pcantidad" value="{{ old('pcantidad') }}" placeholder="Cantidad">
                               
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label for="pcompra">P. de Compra</label>
                                <input type="number" class="form-control" name="pprecio_compra" id="pprecio_compra" step="0.01" min="0" value="{{ old('pprecio_compra') }}" placeholder="P. Compra">
                        
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label for="pventa">P. de Venta</label>
                                <input type="number" class="form-control" name="pprecio_venta" id="pprecio_venta" step="0.01" min="0" value="{{ old('pprecio_venta') }}" placeholder="P. Venta">
                              
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label for="accion">Acción</label>
                                <button type="button" id="bt_add" class="btn btn-success">Agregar</button>
                            </div>
                        </div>

                        <div class="col-12">  

                            <div class="card-body">
                                <table id="detalles" class=" table table-bordered table-hover">
                                    <thead style="background-color:#A9D0F5" >
                                        <tr>
                                            <th>Opciones</th>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Precio de Compra</th>
                                            <th>Precio de Venta</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <th>TOTAL</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th><h4 id="total">$ 0.00 </h4></th>
                                    </tfoot>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                                
                            </div> 
                        </div>         

                        
                        <div class="card-footer">
                            <button id="guardar" type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                            <button type="reset" class="btn btn-danger me-1 mb-1">Cancelar</button>
                        </div>
                    </div>

                
                </div>
            </div>
        </form>
    </div>

</div>
@push ('scripts')
<script>

    $(document).ready(function(){
    
        $("#bt_add").click(function(){
            
            agregar();
        });
    });

    var cont = 0;
    total = 0;
    subtotal = [];

    $("#guardar").hide();
    $("#pidarticulo").change(mostrarValores);

    function mostrarValores(){
        datosArticulo=document.getElementById('pidarticulo').value.split('_');
        $("#pcantidad").val(datosArticulo[1]);
        $("#unidad").val(datosArticulo[2]);

    }

    function agregar(){
        
        datosArticulo=document.getElementById('pidarticulo').value.split('_');
        idarticulo=datosArticulo[0];
        articulo=$("#pidarticulo option:selected").text();
        
        cantidad=$("#pcantidad").val();
        precio_compra=$("#pprecio_compra").val();
        precio_venta=$("#pprecio_venta").val();
        
        if (idarticulo != "" && cantidad != "" && cantidad > 0 && precio_compra != "" && precio_venta != ""){
           
            subtotal[cont]=(cantidad * precio_compra);
            total= total + subtotal[cont];
           
            var fila='<tr class="selected" id="fila'+cont+
                '"> <td><button type="button" class="btn btn-warning" onclick="eliminar(' + cont+ 
                ')";>Eliminar</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+
                            '</td><td><input type="number" name="cantidad[]" value="'+cantidad+
                                '"></td> <td><input type="number" name="precio_compra[]" value="'+precio_compra+
                                    '"></td> <td> <input type="number" name="precio_venta[]" value="'+precio_venta+
                                        '"></td><td>'+subtotal[cont]+'</td></tr>';
             cont++;
             limpiar();
             $("#total").html("$ "+ total);
             evaluar();
             $("#detalles").append(fila);
       
        }else{
            alert("Error al ingresar el detalle del artículo, revise los datos del artículo");
        }

    }

    function limpiar(){
        $("#pcantidad").val("");
        $("#pprecio_compra").val("");
        $("#pprecio_venta").val("");

    }

    function evaluar(){
        if (total>0){
            $("#guardar").show();
        }else{
            $("#guardar").hide();
        }        
    }

    function eliminar(index){
        total = total - subtotal[index];
        $("#total").html("$ "+ total);
        $("#fila"+index).remove();
        evaluar();
    }

</script>
@endpush

@endsection