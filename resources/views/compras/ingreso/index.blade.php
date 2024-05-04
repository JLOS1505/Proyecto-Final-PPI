@extends('layout.admin')
@section('contenido')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de ingresos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="a">Inicio</a></li>
                        <li class="breadcrumb-item active">Ingresos</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>



    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-xl-12">
                            <form action="{{ route('ingreso.index') }}" method="GET">

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group mb-6">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-plus-circle-fill"></i></span>
                                            <input type="text" class="form-control" name="texto" value="{{$texto}}" placeholder="Buscar categoria" aria-label="Recipent's username" aria-describedby="button-addon2">
                                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>                
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group mb-6">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-plus-circle-fill"></i></span>
                                            <a href="{{ route('ingreso.create')}}" class="btn btn-success">Nuevo</a>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="card-content">  

                        <div class="card-body">
                              <table class=" table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Opciones</th>
                                        <th>Fecha</th>
                                        <th>Proveedor</th>
                                        <th>Comprobante</th>
                                        <th>Impuesto</th>
                                        <th>Total</th>
                                        <th>Estatus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ingresos as $ing)
                                    <tr>
                                        <td>
                                            <a href="{{route('ingreso.show', $ing->id_ingreso)}}" class="btn btn-outline-info btn-sm">Detalle</a>
                                            <!-- Button trigger -->
                                            <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#">Eliminar</button>
                                        </td>
                                        <td>{{ $ing->fecha_hora}}</td>
                                        <td>{{ $ing->nombre}}</td>
                                        <td>{{ $ing->tipo_comprobante.': '. $ing->num_comprobante}}</td>
                                        <td>{{ $ing->impuesto}}</td>
                                        <td>{{ $ing->total}}</td>
                                        <td>{{ $ing->estado}}</td>

                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                            {{ $ingresos->links()}}
                    </div>                   
                </div>
            </div>
        </div>
    </div> 
</section>


@endsection