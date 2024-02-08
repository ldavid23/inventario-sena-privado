@extends('layouts.app')
@section('content')

<div class="contenedor">
    <div class="mt-2 text-lg-center">
        <h4 class="card-title color mb-3 text-lg-center fw-semibold">Asignacion Anual<i class="bi bi-building-fill-check"></i></h4>
        <p class="fw-semibold text-secondary">Registro y Panel de control de las asignaciones tipo anual</p>
    </div>
    <div class="formulario">
        <form action="{{route('coordinators.post')}}" method="post" class="row needs-validation" novalidate>
            @csrf
            <div class="col-md-4 mb-3">
                <label for="name" class="form-label fw-semibold">Año:</label>
                <input type="text" class="form-control border-2 shadow-sm" id="name" name="name"
                    placeholder="Ingresar nombre y apellidos" required>
                <div class="invalid-feedback fw-medium" class="">
                    <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                </div>
                @if ($errors->has('name'))
                    <div class="text-danger fw-medium small">
                        <i class="bi bi-exclamation-circle"></i>
                        Este campo es obligatorio!
                    </div>
                @endif
            </div>

            <div class="col-md-4 mb-3">
                <label for="identificacion" class="form-label fw-semibold">Valor:</label>
                <input type="number" class="form-control border-2 shadow-sm" id="email" name="email"
                    placeholder="Ingresar número de identificación" required>
                <div class="invalid-feedback fw-medium">
                    <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                </div>
                @if ($errors->has('email'))
                    <div class="text-danger fw-medium">
                        <i class="bi bi-exclamation-circle"></i>
                        Este campo es obligatorio!
                    </div>
                @endif
            </div>

            <div class="col-md-4 mb-3">
                <label for="rol" class="form-label fw-semibold">Funcionario:</label>
                {{-- <input type="text" class="form-control border-2 shadow-sm" id="coordinacion" name="coordinacion"> --}}
                <select name="funcionario_id" id="funcionario_id" class="form-select border-2 shadow-sm" aria-label="Default">
                    <option disabled>Open this select menu</option>

                   {{-- @foreach ($funcionario as $func )



                   <option value="{{$func['id']}}">{{$func->user->name}}</option>


                    @endforeach --}}
                  </select>
                <div class="invalid-feedback fw-medium">
                    <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                </div>
                @if ($errors->has('funcionario_id'))
                    <div class="text-danger fw-medium">
                        <i class="bi bi-exclamation-circle"></i>
                        Debe seleccionar una opción!
                    </div>
                @endif
            </div>

            <div class="text-center mb-2">
                <button type="submit" class="btn btn-success fw-medium sahdow-sm ">Registrar
                    Asignacion <i class="bi bi-person-fill-check"></i></button>
            </div>
        </form>

        <hr class="">

        <div class="table-responsive">
            <table class="table table-bordered tabled-hover table-striped nowrap shadow-sm table-datatable"
                style="width:100%">
                <thead>
                    <tr>
                        <th>Funcionario</th>
                        <th>Identificación</th>
                        <th>Coordinacion</th>
                        <th>Funciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mensuales as $anual)
                    <tr>
                        <td>{{ $anual['coordinator_name'] }}</td>
                        <td>{{ $anual['user_id'] }}</td>
                        <td> coordinacion</td>
                        <td> funciones
                          <button onclick="editCoordinator($coordinator['coordinator_id'])">edit</button>
                          <button>delete</button>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>


    </div>


</div>



@if ($message = Session::get('success'))
<script>
    Swal.fire('Proceso finalizado correctamente!')
</script>
@elseif ($message = Session::get('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error de registro...',
        text: '{{ $message }}',
    })
</script>
@endif
@endsection
