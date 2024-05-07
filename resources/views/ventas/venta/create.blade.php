@extends('layout.admin')
@section('contenido')
    
<div class="col-md-12">

    <div class="card card-primary">
        <div class="header">
            <h3 class="card-tittle">Nueva Venta</h3>
        </div>


        <form action="{{ route('venta.store')}}" method="POST" class="form">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cliente">Cliente</label>
                            <select name="id_cliente" class="form-control" id="id_cliente">
                                    @foreach($personas as $persona)
                                        <option value="{{$persona->id_persona}}" {{ old('id_cliente') == $persona->id_persona ? 'selected' : '' }}>{{$persona->nombre}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form group">
                            <label for="tipo_documento">Tipo de Documento</label>
                            <select name="tipo_documento" class="form-control" id="tipo_documento">
                                    <option value="RFC" {{ old('tipo_documento') == 'RFC' ? 'selected' : '' }}>RFC</option>
                                    <option value="INE" {{ old('tipo_documento') == 'INE' ? 'selected' : '' }}>INE</option>
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
                                <label for="producto">Productos</label>
                                <select name="pidarticulo" class="form-control selectpicker" id="pidarticulo" data-live-search="true">
                                        @foreach($productos as $producto)
                                            <option value="{{$producto->id_producto}}_{{$producto->stock}}_{{$producto->precio_promedio}}">{{$producto->Articulo}}</option>
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
                                <label for="pcompra">Stock</label>
                                <input type="number" disabled class="form-control" name="pstock" id="pstock" placeholder="Stock">
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label for="pventa">P. de Venta</label>
                                <input type="number" class="form-control" disabled name="pprecio_venta" id="pprecio_venta" step="0.01" min="0" placeholder="P. de Venta">
                            </div>
                        </div>

                        <div class="col-1">
                            <div class="form-group">
                                <label for="descuento">Descuento</label>
                                <input type="number" class="form-control" name="pdescuento" id="pdescuento" step="0.01" min="0" placeholder="Descuento"  value="0">
                            </div>
                        </div>

                        <div class="col-1">
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
                                            <th>Precio de Venta</th>
                                            <th>Descuento</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <th>TOTAL</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th><h4 id="total">$ 0.00 </h4><input type="hidden" name="total_venta" id="total_venta"></th>
                                    </tfoot>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                                
                            </div> 
                        </div>         

                        <div class="form-group">
                            <div class="card-footer">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button id="guardar" type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                                <button type="reset" class="btn btn-danger me-1 mb-1">Cancelar</button>
                            </div>
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

    $('#bt_guar').click(function(){
        swal({
            title: 'Su cambio es|',
            text: "Gracias por su compra",
            type: 'success'
        })

    });

    var cont = 0;
    total = 0;
    subtotal = [];

    $("#guardar").hide();
    $("#pidarticulo").change(mostrarValores);

    function mostrarValores(){
        datosArticulo=document.getElementById('pidarticulo').value.split('_');
        $("#pprecio_venta").val(datosArticulo[2]);
        $("#pstock").val(datosArticulo[1]);
    }

    function agregar(){
        
        datosArticulo=document.getElementById('pidarticulo').value.split('_');
        
        idarticulo=datosArticulo[0];
        articulo=$("#pidarticulo option:selected").text();
        cantidad=parseInt($("#pcantidad").val());
        descuento=$("#pdescuento").val();
        precio_venta=$("#pprecio_venta").val();
        stock=parseInt($("#pstock").val());
        unidad=datosArticulo[3];
        
        if (idarticulo != "" && cantidad != "" && cantidad > 0 && descuento != "" && precio_venta != ""){
        
            console.log(cantidad);
            console.log(stock);
            console.log(unidad);
            if(unidad === 'Kilos'){
                cantidadfinal = cantidad / 1000;
            }
            else
            {
                cantidadfinal = cantidad;
            }
            if(cantidadfinal < stock){
                subtotal[cont] = (cantidadfinal*precio_venta-descuento);
                total=total+subtotal[cont];

                var fila='<tr class="selected" id="fila'+cont+
                '"> <td><button type="button" class="btn btn-warning" onclick="eliminar(' + cont+ 
                ')";>Eliminar</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+idarticulo+
                            '</td><td><input type="number" name="cantidad[]" value="'+cantidadfinal+
                                '"></td> <td><input type="number" name="precio_venta[]" value="'+precio_venta+
                                    '"></td> <td> <input type="number" name="descuento[]" value="'+descuento+
                                        '"></td><td>'+subtotal[cont]+'</td></tr>';
                cont++;
                limpiar();
                $("#total").html("$ " + total);
                $("#total_venta").val(total);
                evaluar();
                $('#detalles').append(fila);


            }
            else
            {
                alert('La cantidad a vender supera el stock');
            }
        }
        else
        {
            alert("Error al ingresar el detalle de la venta, revisa los datos del articulo");
        }
   }

    function limpiar(){
        $("pcantidad").val("");
        $("pdescuento").val("");
        $("pprecio_venta").val("");

    }

    function evaluar(){
        if (total>0){
            $("#guardar").show();
        } 
        else {
            $("#guardar").hide();
        }        
    }

    function eliminar(index){
        total = total - subtotal[index];
        $("#total").html("$ "+ total);
        $("#total_venta").val(total);
        $("#fila"+index).remove();
        evaluar();
    }

</script>
@endpush

@endsection