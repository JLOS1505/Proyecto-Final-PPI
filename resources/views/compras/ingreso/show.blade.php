@extends('layout.admin')
@section('contenido')
    
<div class="col-md-12">

    <div class="card card-primary">
        <div class="header">
            <h3 class="card-tittle">Detalle del ingreso</h3>
        </div>


        
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="proveedor">Proveedor</label>
                            <p>{{ $ingreso -> nombre }}</p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form group">
                            <label for="tipo_documento">Tipo de Documento</label>
                            <p>{{ $ingreso -> tipo_comprobante }}</p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form group">
                            <label for="num_documento">Número de Documento</label>
                            <p>{{ $ingreso -> num_comprobante }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">  

                            <div class="card-body">
                                <table id="detalles" class=" table table-bordered table-hover">
                                    <thead style="background-color:#A9D0F5" >
                                        <tr>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Precio de Compra</th>
                                            <th>Precio de Venta</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>Total: </th>
                                        <th><h4 id="total">$ {{ number_format($ingreso-> total,2) }} </h4></th>
                                    </tfoot>
                                    <tbody>
                                        @foreach($detalles as $det)
                                            <tr>
                                                <td>{{$det -> producto}}</td>
                                                <td>{{$det -> cantidad }}</td>
                                                <td>{{$det -> precio_compra}}</td>
                                                <td>{{$det -> precio_venta}}</td>
                                                <td>{{number_format($det ->cantidad*$det->precio_compra, 2)}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                            </div> 
                        </div>         

                    </div>

                
                </div>
            </div>
        
    </div>

</div>

@endsection