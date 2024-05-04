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
                            <select name="id_proveedor" class="form-control" id="tipo_documento">
                                    @foreach($personas as $persona)
                                        <option value="{{$persona->id_persona}}">{{$persona->nombre}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form group">
                            <label for="tipo_documento">Tipo de Documento</label>
                            <select name="tipo_documento" class="form-control" id="tipo_documento">
                                    <option value="RFC">RFC</option>
                                    <option value="TICKET">Ticket</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form group">
                            <label for="num_documento">Número de Documento</label>
                            <input type="text" class="form-control" name="num_documento" id="num_documento" placeholder="Ingresa el número de documento">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="proveedor">Productos</label>
                                <select name="id_producto" class="form-control selectpicker" id="id_producto" data-live-search="true">
                                        @foreach($productos as $producto)
                                            <option value="{{$producto->id_producto}}">{{$producto->Articulo}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" class="form-control" name="pcantidad" id="pcantidad" placeholder="Cantidad">
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label for="pcompra">P. y Compra</label>
                                <input type="number" class="form-control" name="pprecio_compra" id="pprecio_compra" step="0.01" min="0" placeholder="P. Compra">
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label for="pventa">P. y Venta</label>
                                <input type="number" class="form-control" name="pprecio_venta" id="pprecio_venta" step="0.01" min="0" placeholder="P. Venta">
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label for="accion">Acción</label>
                                <button type="button" id="bt_add" class="btn btn-success"></button>
                            </div>
                        </div>

                        <div class="col-12">  

                            <div class="card-body">
                                <table class=" table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Opciones</th>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Precio de Compra</th>
                                            <th>Precio de Venta</th>
                                            <th>Subtotal</th>
                                            <th>Estatus</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <th>TOTAL</th>
                                        <th></th>
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

                        <input type="hidden" name="_tocken" value="{{ csrf_tocken() }}">
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                            <button type="reset" class="btn btn-danger me-1 mb-1">Cancelar</button>
                        </div>
                    </div>

                
                </div>
            </div>
        </form>
    </div>

</div>

@endsection