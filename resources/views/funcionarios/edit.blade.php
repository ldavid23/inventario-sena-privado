<div class="modal fade" id="edit{{ $row->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 color" id="staticBackdropLabel">Modificar Información <i
                        class="bi bi-pencil-square"></i></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('funcionarios.update', $row->id) }}" method="POST"id="formEdit{{ $row->id }}"  class="needs-validation" novalidate>
                @csrf
                <div class="modal-body">
                    <div class="container-fluid row me-0">
                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label fw-semibold">Nombre Completo:</label>
                            <input type="text" class="form-control border-2 shadow-sm" id="nombre" name="nombre"  value="{{$row->user->name}}"
                                placeholder="Ingresar nombre y apellidos" required>
                            <div class="invalid-feedback fw-medium" class="">
                                <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                            </div>
                            @if ($errors->has('nombre'))
                            <div class="text-danger fw-medium small">
                                <i class="bi bi-exclamation-circle"></i>
                                Este campo es obligatorio!
                            </div>
                            @endif
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="identificacion" class="form-label fw-semibold">Número de
                                Identificación:</label>
                            <input type="number" class="form-control border-2 shadow-sm" id="email" name="email" value="{{$row->user->email}}"
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


                        <div class="col-md-6 mb-3">
                            <label for="rol" class="form-label fw-semibold">Coordinacion: </label>
                            <select class="form-select border-2 shadow-sm" id="coordinacion_id" name="coordinacion_id"
                                required>
                                <option selected value="{{$row->coordinacion_id}}">{{$row->coordinaciones->coordinacion}}</option>

                                @foreach ($coordinaciones as $rows)
                                @if($rows->id !== $row->coordinacion_id)
                                <option value="{{ $rows->id}}">{{ $rows->coordinacion }}</option>

                                @endif
                                @endforeach
                            </select>
                            <div class="invalid-feedback fw-medium">
                                <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                            </div>
                            @if ($errors->has('coordinacion_id'))
                            <div class="text-danger fw-medium">
                                <i class="bi bi-exclamation-circle"></i>
                                Debe seleccionar una opción!
                            </div>
                            @endif
                        </div>


                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label fw-semibold">Fecha Inicio:</label>
                            <input type="date" class="form-control border-2 shadow-sm" id="start_date" name="start_date" value="{{$row->start_date}}"
                                placeholder="Ingresar nombre y apellidos" required>
                            <div class="invalid-feedback fw-medium" class="">
                                <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                            </div>
                            @if ($errors->has('start_date'))
                            <div class="text-danger fw-medium small">
                                <i class="bi bi-exclamation-circle"></i>
                                Este campo es obligatorio!
                            </div>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label fw-semibold">Fecha Terminacion:</label>
                            <input type="date" class="form-control border-2 shadow-sm" id="close_date" name="close_date" value="{{$row->start_date}}"
                                placeholder="Ingresar nombre y apellidos" required>
                            <div class="invalid-feedback fw-medium" class="">
                                <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                            </div>
                            @if ($errors->has('close_date'))
                            <div class="text-danger fw-medium small">
                                <i class="bi bi-exclamation-circle"></i>
                                Este campo es obligatorio!
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-sm btn-success" onclick="validarForm({{ $row->id }})">Modificar</button>
                </div>
            </form>
        </div>
    </div>
</div>

