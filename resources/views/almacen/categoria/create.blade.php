@extends('layout.admin')
@section('contenido')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de Categorias</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="a">Inicio</a></li>
                        <li class="breadcrumb-item active">Categoria</li>
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
                            <form action="{{ route('categoria.index') }}" method="GET">

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group mb-6">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-plus-circle-fill"></i></span>
                                            <input type="text" class="form-control" name="texto" placeholder="Buscar categoria" aria-label="Recipent's username" aria-describedby="button-addon2">
                                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>                
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group mb-6">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-plus-circle-fill"></i></span>
                                            <a href="{{ route('categoria.create')}}" class="btn btn-success">Nueva</a>
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
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categoria as $cat)
                                    <tr>
                                        <td>
                                            <a href="a" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                                            <!-- Button trigger -->
                                            <a href="a" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                        <td>{{ $cat->id_categoria}}</td>
                                        <td>{{ $cat->categoria}}</td>
                                        <td>{{ $cat->descripcion}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                              </table>
                              {{ $categoria->links()}}
                         </div>
                    </div>
                   
                </div>

            </div>
        </div>
    </section>
@endsection