@extends('layouts.app')
@section('content')
    <div class="contenedor">
        <div class="mt-2 text-lg-center">
            <h4 class="card-title color mb-1 text-lg-center fw-semibold">Fechas Entrega De Evaluaciones <i
                    class="bi bi-bar-chart"></i></h4>
            <p class="fw-semibold text-secondary mb-5">Registro automatizado de las fehcas de entrega de evaluaciones por
                instructor</p>
        </div>

        <div class="m-2">
            <div class="d-flex">
                <div class="container mt-2 row">
                    <div class="col-md-4 mb-4">
                        <label for="rol" class="form-label fw-semibold">Funcionario:</label>
                        <select class="form-select border-2 shadow-sm" id="funcionario_id" name="funcionario_id" required>
                            <option selected disabled value="">Seleccionar Opción...</option>
                            @foreach ($funcionarios as $row)
                                <option value="{{ $row->id }}">{{ $row->user->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback fw-medium">
                            <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label d-block fw-semibold">Fecha Inicial:</label>
                        <input type="date" id="fechaInicial" class="form-control border-2 shadow-sm">
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label d-block fw-semibold">Año:</label>
                        <input type="number" id="anio" min="2022" max="2100" value="0"
                            class="form-control border-2 shadow-sm">
                    </div>

                    <div class="text-center mb-3 mt-3 ">
                        <button id="generar-eventos" class="btn btn-success fw-semibold shadow-sm"
                            onclick="generarFechas()">Generar
                            Eventos <i class="bi bi-calendar-plus"></i></button>
                    </div>

                </div>
            </div>



            <hr class="d-none" id='separador'>
            <div class="container">
                <div id="calendario">

                </div>
            </div>

            <div class="container mt-4">
                <form id="miFormulario" action="{{ route('guardar_fechas') }}" method="POST">
                    @csrf
                    <div id="contenedorFechas" class="row"></div>
                    <div class="col-md-4">
                        <input type="hidden" id="fechas_generadas" name="fechas_generadas">
                    </div>
                    <input type="hidden" id="funcionario" name="funcionario">
                    <div class="text-center">
                        <button type="submit" id="btnEnviarFechas"
                            class="btn btn-success fw-semibold shadow-sm d-none mt-4">
                            Agregar Fechas </button>
                    </div>

                </form>
            </div>

        </div>
    </div>

    <script>
        function generarFechas() {

            var fechaInicialInput = document.getElementById("fechaInicial");
            var anioInput = document.getElementById("anio");
            var selectInput = document.getElementById("funcionario_id");
            var contenedorFechasGeneradasDiv = document.getElementById("contenedorFechas");
            var fechasGeneradasInput = document.getElementById('fechas_generadas');
            var contenedor = document.getElementById('funcionario');
            var contadorFechas = 0;
            var fechasGeneradas = [];
            var hr = document.getElementById('separador');

            if (selectInput.value.trim() === "" || selectInput.value.trim() === "" || anioInput.value.trim() === "") {
                Swal.fire({
                    title: "Fechas No Generadas",
                    text: "Recuerdo rellenar los todos los campos",
                    icon: "error"
                });
            } else {
                var fechaInicial = new Date(fechaInicialInput.value);
                var anioSeleccionado = parseInt(anioInput.value);
                contenedorFechasGeneradasDiv.innerHTML = '';
                var fecha = new Date(fechaInicial);
                while (fecha.getFullYear() === anioSeleccionado) {
                    var input = document.createElement("input");
                    input.type = "date";
                    input.value = fecha.toISOString().substr(0, 10);
                    input.className = " form-control border-2 shadow-sm mb-2 w-2";
                    var indice = fechasGeneradas.length;
                    input.id = "fecha" + indice;
                    var divContenedor = document.createElement("div");
                    divContenedor.className = "mt-3 d-none";
                    divContenedor.appendChild(input);
                    contenedorFechasGeneradasDiv.appendChild(divContenedor);
                    contadorFechas++;
                    fechasGeneradas.push(fecha.toISOString().substr(0, 10));
                    fecha.setDate(fecha.getDate() + 14);
                }
                if (contadorFechas == 0) {
                    Swal.fire({
                        title: "Fechas No Generadas",
                        text: "Recuerdo rellenar los todos los campos",
                        icon: "error"
                    });
                } else {
                    Swal.fire({
                        title: "Fechas Generadas",
                        text: "Se generaron " + contadorFechas + " fechas.",
                        icon: "success"
                    });
                    var button = document.getElementById('btnEnviarFechas')
                    button.classList.remove('d-none');
                    hr.classList.remove('d-none');
                    fechasGeneradasInput.value = JSON.stringify(fechasGeneradas);
                    var fechasGeneradasInput = document.getElementById('fechas_generadas');
                    var fechasGeneradas = JSON.parse(fechasGeneradasInput.value);
                    contenedor.value = selectInput.value;
                    var obtenido = document.getElementById('funcionario');
                    var funcionario = JSON.parse(obtenido.value);
                    var calendarEl = document.getElementById('calendario');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        events: fechasGeneradas.map(function(fecha, index) {
                            return {
                                title: 'Evento',
                                start: fecha,
                                allDay: true,
                                locale: 'es',
                                inputId: "fecha" + index,
                            };
                        }),
                        editable: true,
                        eventDrop: function(info) {
                            var inputId = info.event.extendedProps.inputId;
                            var nuevaFecha = info.event.start;
                            document.getElementById(inputId).value = nuevaFecha.toISOString().substr(0, 10);
                            var inputNumero = parseInt(inputId.replace('fecha', ''));
                            var indice = fechasGeneradas.indexOf(fechasGeneradas[inputNumero]);
                            fechasGeneradas[indice] = nuevaFecha.toISOString().substr(0, 10);
                            Swal.fire({
                                height: 200,
                                position: "top-end",
                                icon: "success",
                                title: "Fecha Actualizada",
                                showConfirmButton: false,
                                timer: 2500
                            });
                            fechasGeneradasInput.value = JSON.stringify(fechasGeneradas);

                        }
                    });
                    calendar.render();
                    var fechasValidas = true;
                    fechasGeneradas.forEach(function(fecha) {
                        var date = new Date(fecha);
                        if (isNaN(date.getTime())) {
                            fechasValidas = false;
                        }
                    });
                    if (fechasValidas) {
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', '/guardar-fechas');
                        xhr.setRequestHeader('Content-Type', 'application/json');
                        xhr.onload = function() {
                            if (xhr.status === 200) {
                                console.log('Fechas guardadas correctamente');
                            } else {
                                console.error('Error al guardar las fechas');
                            }
                        };
                        var datos = {
                            fechas: fechasGeneradas,
                            funcionario: selectInput.value
                        };
                        xhr.send(JSON.stringify(datos));
                    } else {
                        console.error('Una o más fechas no son válidas');
                    }

                }
            }
        }
    </script>

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
