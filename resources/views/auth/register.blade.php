@extends('layouts.master-auth')

@section('content')
    <form action="/register" method="POST">
        @csrf
        <h1>Crear cuenta</h1>
        @include('layouts.partials.messages')

        <div class="form-floating mb-3">
            <input type="text" placeholder="username" name="username" class="form-control" id="username">
            <label for="username" class="form-label">Nombre de usuario</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" placeholder="email" name="email" class="form-control" id="email">
            <label for="email" class="form-label">Correo electrónico</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" placeholder="firstName" name="firstName" class="form-control" id="firstName">
            <label for="firstName" class="form-label">Nombre</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" placeholder="lastName" name="lastName" class="form-control" id="lastName">
            <label for="lastName" class="form-label">Apellido</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" placeholder="password" name="password" class="form-control" id="password">
            <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" placeholder="password_confirmation" name="password_confirmation" class="form-control" id="password_confirmation">
            <label for="password_confirmation" class="col-sm-2 col-form-label">Repetir_contraseña</label>
        </div>
        <div class="mb-3">
            <a href="/login">¿Ya está registrado? Inicie sesión</a>
        </div>
        <input type="submit" class="btn btn-primary" value="Registrarse">
    </form>
@endsection