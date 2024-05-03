@extends('layout.admin')
@section('contenido')
    
<div class="col-md-6">

    <div class="card card-primary">
        <div class="header">
            <h3 class="card-tittle">Nuevo Proveedor</h3>
        </div>


        <form action="{{ route('proveedor.store')}}" method="POST" class="form">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingresa el nombre del proveedor">
                </div>
                <div class="form group">
                    <label for="tipo_documento">Tipo de Documento</label>
                    <select name="tipo_documento" class="form-control" id="tipo_documento">
                            <option value="RFC">RFC</option>
                            <option value="INE">INE</option>
                     </select>
                </div>
                <div class="form group">
                    <label for="num_documento">Número de Documento</label>
                    <input type="text" class="form-control" name="num_documento" id="num_documento" placeholder="Ingresa el número de documento">
                </div>
                <div class="form group">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Ingresa la dirección">
                </div>
                <div class="form group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Ingresa el teléfono">
                </div>
                <div class="form group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Ingresa el correo electrónico">
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