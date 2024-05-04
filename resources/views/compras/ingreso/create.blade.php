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
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                        <button type="reset" class="btn btn-danger me-1 mb-1">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>

@endsection