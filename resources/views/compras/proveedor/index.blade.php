@extends('layout.admin')
@section('contenido')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de Proveedores</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="a">Inicio</a></li>
                        <li class="breadcrumb-item active">Proveedores</li>
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
                            <form action="{{ route('proveedor.index') }}" method="GET">

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group mb-6">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-plus-circle-fill"></i></span>
                                            <input type="text" class="form-control" name="texto" placeholder="Buscar proveedor" value="{{$texto}}" aria-label="Recipent's username" aria-describedby="button-addon2">
                                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>                
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group mb-6">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-plus-circle-fill"></i></span>
                                            <a href="{{ route('proveedor.create')}}" class="btn btn-success">Nuevo</a>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="card-content">  
                        <div class="card-body">
                        </div>
                         <!-- Table Hover -->
                         <div class="table-responsive">
                              <table class=" table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Opciones</th>
                                        <th>Nombre</th>
                                        <th>Tipo Documento</th>
                                        <th>Numero Documento</th>
                                        <th>Dirección</th>
                                        <th>Telefono</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($proveedor as $prov)
                                    <tr>
                                        <td>
                                            <a href="{{ route('proveedor.edit', $prov->id_persona)}}" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                                            <!-- Button trigger -->
                                            <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{ $prov->id_persona }}">Eliminar</button>
                                        </td>
                                        <td>{{ $prov->nombre}}</td>
                                        <td>{{ $prov->tipo_documento}}</td>
                                        <td>{{ $prov->num_documento}}</td>
                                        <td>{{ $prov->direccion}}</td>
                                        <td>{{ $prov->telefono}}</td>
                                        <td>{{ $prov->email}}</td>
                                    </tr>
                                    @include('compras.proveedor.modal')
                                    @endforeach
                                </tbody>
                              </table>
                              {{ $proveedor->links()}}
                         </div>
                    </div>
                   
                </div>

            </div>
        </div>
    </section>
@endsection