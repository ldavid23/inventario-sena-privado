@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Instructores</h2>

    <div class="card-body">
    <form id="miFormulario" method="POST" action="{{ route('instructors') }}">
        @csrf
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"  id="email" placeholder="Ingrese su dirección de correo" value="{{ old('email') }}" required autocomplete="email" autofocus>

          @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror

    </div>

        <div class="col-md-4 mb-3">
          <label for="codigoInput" class="form-label">Tel/Cel</label>
          <input type="tel" class="form-control" id="codigoInput" pattern="[0-9]{10}" placeholder="Ingrese su n° de contacto" required>
        </div>

        <div class="col-md-4 mb-3">
          <label for="fechaInput" class="form-label">Fecha de inicio</label>
          <input type="date" class="form-control" id="fechaInput" required>
        </div>

        <div class="col-md-4 mb-3">
          <label for="salidaInput" class="form-label">Fecha de cierre</label>
          <input type="date" class="form-control" id="salidaInput" required>
        </div>


        <div class="col-md-12 text-center">
          <button class="btn btn-primary" onclick="alertac()">Ingresar</button>
        </div>
      </div>
    </form>
  </div>
