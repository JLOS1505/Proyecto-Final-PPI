<!DOCTYPE html>
<html>
<head>
    <title>Proveedor Creado</title>
</head>
<body>
    <p>Hola <strong>{{ $proveedor->nombre }}</strong>, buen día</p>
    <p>Se ha generado un nuevo proveedor en nuestra página satisfactoriamente con los siguientes detalles:</p>
    <ul>
        <li><strong>Nombre:</strong> {{ $proveedor->nombre }}</li>
        <li><strong>Tipo de Documento:</strong> {{ $proveedor->tipo_documento }}</li>
        <li><strong>Número de Documento:</strong> {{ $proveedor->num_documento }}</li>
        <li><strong>Dirección:</strong> {{ $proveedor->direccion }}</li>
        <li><strong>Teléfono:</strong> {{ $proveedor->telefono }}</li>
        <li><strong>Email:</strong> {{ $proveedor->email }}</li>
    </ul>
    <p>Gracias por su confianza, Saludos!</p>
    <p>Merk-Ditto</p>
</body>
</html>
