@extends('layouts.master-auth')

@section('content')
    <form action="/login" method="POST">
        @csrf
        <h1>Iniciar sesión</h1>
        @include('layouts.partials.messages')
        
        {{-- Nombre de usuario --}}
        <div class="mb-3">
            <label for="username" class="form-label">Nombre de usuario</label>
            <input type="text" name="username" class="form-control" id="username">
        </div>
        {{-- Contraseña --}}
        <div class="mb-3">
            <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        {{-- Enlace a register --}}
        <div class="mb-3">
            <a href="/register">Crear cuenta</a>
        </div>
        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
    </form>
@endsection


