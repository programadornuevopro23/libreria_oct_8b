<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar</title>
</head>

<body>
    @extends('layouts.app')
    @section('content')
        <h1>Editar libro: {{ $libro->nombre }}</h1>

        <form action="{{ route('libros.update', $libro) }}" method="POST">

            <!--Uso obligatorio para usar un formulario en laravel-->
            @csrf
            @method('PUT')

            <input type="text" name="nombre" value="{{ $libro->nombre }}" placeholder="Nombre" class="form=control">
            <br>
            <input type="text" name="autor" value="{{ $libro->autor }}" placeholder="Autor" class="form=control">
            <br>
            <input type="text" name="editorial" value="{{ $libro->editorial }}" placeholder="Editorial"
                class="form=control">
            <br>
            <input type="number" name="precio" value="{{ $libro->precio }}" placeholder="Precio" class="form=control">
            <br>
            <button type="Submit" class="btn btn-success">Guardar</button>
        </form>

        <div class="d-flex justify-content-end">
            <a href="{{ route('libros.index') }}" class="btn btn-danger">
                Volver
            </a>

        </div>
    @endsection

</body>

</html>
