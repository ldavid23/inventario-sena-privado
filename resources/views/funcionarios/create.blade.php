        <!-- Modal -->
        <div class="modal fade modal-lg" id="modalId" tabindex="-1" role="dialog"
            aria-labelledby="modalTitleId"aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Registrar Funcionario <i class="bi bi-person-fill-add"></i>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('coordinators.post') }}" method="post" class="row needs-validation"
                        novalidate>
                        @csrf
                        <div class="modal-body">
                            <div class="container-fluid row">

                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label fw-semibold">Nombre Completo:</label>
                                    <input type="text" class="form-control border-2 shadow-sm" id="name"
                                        name="name" placeholder="Ingresar nombre y apellidos" required>
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

                                <div class="col-md-6 mb-3">
                                    <label for="identificacion" class="form-label fw-semibold">Número de
                                        Identificación:</label>
                                    <input type="number" class="form-control border-2 shadow-sm" id="email"
                                        name="email" placeholder="Ingresar número de identificación" required>
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
                                    <label for="name" class="form-label fw-semibold">Correo Electronico:</label>
                                    <input type="text" class="form-control border-2 shadow-sm" id="correo"
                                        name="correo" placeholder="Ingresar nombre y apellidos" required>
                                    <div class="invalid-feedback fw-medium" class="">
                                        <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                                    </div>
                                    @if ($errors->has('correo'))
                                        <div class="text-danger fw-medium small">
                                            <i class="bi bi-exclamation-circle"></i>
                                            Este campo es obligatorio!
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="rol" class="form-label fw-semibold">Coordinacion: </label>
                                    <select class="form-select border-2 shadow-sm"
                                        id="coordinacion_id"name="coordinacion_id" required>
                                        <option selected disabled value="">Seleccionar Opción...</option>
                                        {{-- @foreach ($personal as $row)
                                 <option value="{{ $row['id']}}">{{ $row['name'] }}</option>
                             @endforeach --}}
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

                                <div class="col-md-4 mb-3">
                                    <label for="name" class="form-label fw-semibold">Nombre Completo:</label>
                                    <input type="number" class="form-control border-2 shadow-sm" id="telefono"
                                        name="telefono" placeholder="Ingresar nombre y apellidos" required>
                                    <div class="invalid-feedback fw-medium" class="">
                                        <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                                    </div>
                                    @if ($errors->has('telefono'))
                                        <div class="text-danger fw-medium small">
                                            <i class="bi bi-exclamation-circle"></i>
                                            Este campo es obligatorio!
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="name" class="form-label fw-semibold">Fecha Inicio:</label>
                                    <input type="date" class="form-control border-2 shadow-sm" id="start_date"
                                        name="start_date" placeholder="Ingresar nombre y apellidos" required>
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
                                <div class="col-md-4 mb-3">
                                    <label for="name" class="form-label fw-semibold">Fecha Terminacion:</label>
                                    <input type="date" class="form-control border-2 shadow-sm" id="end_date"
                                        name="end_date" placeholder="Ingresar nombre y apellidos" required>
                                    <div class="invalid-feedback fw-medium" class="">
                                        <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                                    </div>
                                    @if ($errors->has('end_date'))
                                        <div class="text-danger fw-medium small">
                                            <i class="bi bi-exclamation-circle"></i>
                                            Este campo es obligatorio!
                                        </div>
                                    @endif
                                </div>




                            </div>
                        </div>
                        <div class="container">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Cerrar
                                </button>
                                <button type="submit" class="btn btn-success fw-medium sahdow-sm ">Guardar</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
