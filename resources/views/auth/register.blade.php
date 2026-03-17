<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REGISTRO</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
        <h1>REGISTRO USUARIOS</h1>
        <form action="{{ route('registro.store') }}" method="POST">
            @csrf

            <input type="text" name="name" placeholder="Nombre" required>
            <br>
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <br>
            <input type="text" name="phone" placeholder="Teléfono">
            <br>
            <input type="password" name="password" placeholder="Contraseña" required>
            <br>
            <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña"  required>
            <br>
            <button type="submit" class="btn btn-success"> Guardar</button>
        </form>
    @endsection
</body>
</html>