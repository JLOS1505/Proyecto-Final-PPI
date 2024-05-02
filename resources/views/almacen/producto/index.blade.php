@extends('layout.admin')
@section('contenido')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de Productos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="a">Inicio</a></li>
                        <li class="breadcrumb-item active">Productos</li>
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
                            <form action="{{ route('producto.index') }}" method="GET">

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group mb-6">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-plus-circle-fill"></i></span>
                                            <input type="text" class="form-control" name="texto" placeholder="Buscar producto" value="{{$texto}}" aria-label="Recipent's username" aria-describedby="button-addon2">
                                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>                
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group mb-6">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-plus-circle-fill"></i></span>
                                            <a href="{{ route('producto.create')}}" class="btn btn-success">Nuevo</a>
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
                              <table class=" table table-bordered table-hower">
                                <thead>
                                    <tr>
                                        <th>Opciones</th>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Stock</th>
                                        <th>Imagen</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($productos as $prod)
                                    <tr>
                                        <td>
                                            <a href="{{ route('producto.edit', $prod->id_producto) }}" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                                            <!-- Button trigger -->
                                            <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#">Eliminar</button>
                                        </td>
                                        <td>{{ $prod->codigo}}</td>
                                        <td>{{ $prod->nombre}}</td>
                                        <td>{{ $prod->descripcion}}</td>
                                        <td>{{ $prod->stock}}</td>
                                        <td><img src="{{asset('imagenes/productos/'.$prod->imagen)}}" alt="{{ $prod->nombre }}" height="70px" width="70px" class="img-thumbnail"></td>
                                        <td>{{ $prod->estado}}</td>
                                    </tr>
                                    <!-- En esta linea va el modal -->
                                    @endforeach
                                </tbody>
                              </table>
                              {{ $productos->links()}}
                         </div>
                    </div>
                   
                </div>

            </div>
        </div>
    </section>
@endsection