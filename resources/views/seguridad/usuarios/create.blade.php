@extends('layout.admin')
@section('contenido')
    
<div class="col-md-6">

    <div class="card card-primary">
        <div class="header">
            <h3 class="card-tittle">Nuevo usuario</h3>
        </div>


        <form action="{{ route('usuarios.store')}}" method="post" class="form">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingresa el nombre del usuario">
                </div>
                <div class="form group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Ingresa el correo electrónico">
                </div>
                <div class="form group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Ingresa la contraseña">
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