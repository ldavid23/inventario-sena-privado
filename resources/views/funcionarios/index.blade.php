@extends('layouts.app')

@section('content')
    <div class="contenedor">
        <div class="mt-2 text-lg-center">
            <h4 class="card-title color mb-1 text-lg-center fw-semibold">Funcionarios De Seguimiento <i
                    class="bi bi-person"></i></h4>
            <p class="fw-semibold text-secondary">Registro y Panel de control de los diferentes coordinaciones</p>
        </div>

        <div class="ms-3 mt-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success fw-medium shadow-sm" data-bs-toggle="modal" data-bs-target="#modalId">
                Registrar Funcionario <i class="bi bi-person-fill-add"></i>
            </button>

        </div>
        <hr class="m-3">

        <div class="table-responsive m-3">
            <table class="table table-bordered tabled-hover table-striped nowrap shadow-sm table-datatable"
                style="width:100%">
                <thead>
                    <tr>
                        <th>Funcionario</th>
                        <th>Identificación</th>
                        <th>Coordinacion</th>
                        <th>Fecha Inico</th>
                        <th>Fecha Fin</th>
                        <th>Funciones</th>
                    </tr>
                </thead>
                <tbody>
                      @foreach ($funcionarios as $row)
                <tr>
                    <td>{{ $row->user->name }}</td>
                    <td>{{ $row->user->email}}</td>
                    <td> {{$row->coordinaciones->coordinacion}}</td>
                    <td>{{$row->start_date}}</td>
                    <td>{{$row->close_date}}</td>
                    <td class="d-flex">
                        <button type="button" class="btn btn-warning btn-sm fw-semibold me-2"
                            data-bs-toggle="modal" data-bs-target="#edit{{ $row->id }}">
                            Editar <i class="bi bi-pencil-square"></i>
                        </button>
                        <form id="eliminarForm" action="{{ route('funcionarios.destroy', $row->id) }}" method="POST">
                            @csrf
                            <button type="button" class="btn btn-danger modificar btn-sm" id="editarBtn">Eliminar <i
                                class="bi bi-trash3"></i> </button>
                          </form>
                    </td>

                </tr>
                @include('funcionarios.edit')
            @endforeach
            </table>
        </div>

        @include('funcionarios.create')



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
