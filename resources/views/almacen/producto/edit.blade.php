@extends('layout.admin')
@section('contenido')
    
<div class="col-md-6">

    <div class="card card-primary">
        <div class="header">
            <h3 class="card-tittle">Editar categoría {{ $categoria->categoria}}</h3>
        </div>


        <form action="{{ route('categoria.update', $categoria->id_categoria)}}" method="post" class="form">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group">
                    <label for="categoria">Nombre</label>
                    <input type="text" class="form-control" name="categoria" id="categoria" value="{{$categoria->categoria}}" placeholder="Ingresa el nombre de la categoría">
                </div>
                <div class="form group">
                    <label for="descripcion">Descripción</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{$categoria->descripcion}}" placeholder="Ingresa la descripción">
                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                    <button type="reset" class="btn btn-danger me-1 mb-1">Cancelar</button>
                </div>
            </div>
        </form>
    </div>

</div>

@endsection