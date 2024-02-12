@extends('layouts.app')
@section('content')
    <div class="contenedor">
        <div class="mt-2 text-lg-center">
            <h4 class="card-title color mb-1 text-lg-center fw-semibold">Coordinaciones - Encargados <i
                    class="bi bi-building-fill-check"></i></h4>
            <p class="fw-semibold text-secondary mb-5">Registro y Panel de control de los diferentes coordinaciones</p>
        </div>

        <div class="m-2">
            <div class="d-flex">
                <div class="container mt-2 row">
                    <div class="col-md-4">
                        <label for="fecha-inicial">Fecha Inicial:</label>
                        <input type="date" id="fechaInicial" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="form-label d-block">Año:</label>
                        <input type="number" id="anio" min="2022" max="2100" value="2022"
                            class="form-control">
                    </div>
                    <div class="container mt-4">
                        <div class="col-md-4">
                            <button id="generar-eventos" class="btn btn-primary" onclick="generarFechas()">Generar
                                Eventos</button>
                        </div>
                    </div>

                </div>
            </div>



            <hr class="">

            <div class="container mt-4">
                <form id="miFormulario" action="{{ route('guardar_fechas') }}" method="POST">
                    @csrf
                    <div id="contenedorFechas" class="w-1"></div>
                    <input type="hidden" id="fechas_generadas" name="fechas_generadas">
                    <button type="submit" id="btnEnviarFechas" class="btn btn-primary d-none"> Agregar Fechas </button>
                </form>
            </div>



        </div>
    </div>

    <script>
        // Función para generar fechas
        function generarFechas() {
            var fechaInicialInput = document.getElementById("fechaInicial");
            var anioInput = document.getElementById("anio");
            var contenedorFechasGeneradasDiv = document.getElementById("contenedorFechas");
            var fechasGeneradasInput = document.getElementById('fechas_generadas');
            var contadorFechas = 0; // Variable para almacenar el número de fechas generadas
            var fechasGeneradas = []; // Array para almacenar las fechas generadas

            // Obtener fecha inicial
            var fechaInicial = new Date(fechaInicialInput.value);
            var anioSeleccionado = parseInt(anioInput.value);

            // Limpiar fechas generadas previamente
            contenedorFechasGeneradasDiv.innerHTML = '';

            // Generar fechas cada 15 días para el año seleccionado
            var fecha = new Date(fechaInicial);
            while (fecha.getFullYear() === anioSeleccionado) {
                var input = document.createElement("input");
                input.type = "date";
                input.value = fecha.toISOString().substr(0, 10);
                input.classList.add("form-control");
                input.classList.add("border-2");
                input.classList.add("shadow-sm");
                input.classList.add("mb-2");
                input.classList.add("w-2");



                input.id = "fecha" + contadorFechas;

                var divContenedor = document.createElement("div");
                divContenedor.classList.add("d-flex");
                divContenedor.classList.add("mt-3");
                divContenedor.classList.add("row");
                divContenedor.classList.add("d-flex");



                divContenedor.appendChild(input);
                contenedorFechasGeneradasDiv.appendChild(divContenedor);

                contadorFechas++; // Incrementar el contador de fechas generadas
                fechasGeneradas.push(fecha.toISOString().substr(0, 10)); // Agregar la fecha al array

                // Añadir 15 días a la fecha
                fecha.setDate(fecha.getDate() + 15);
            }

            // Mostrar el número de fechas generadas
            // alert("Se generaron " + contadorFechas + " fechas.");

            Swal.fire({
                title: "Fechas Generadas",
                text: "Se generaron " + contadorFechas + " fechas.",
                icon: "success"
            });


            var button = document.getElementById('btnEnviarFechas')
            button.classList.remove('d-none');

            // Almacenar todas las fechas generadas en el input oculto
            fechasGeneradasInput.value = JSON.stringify(fechasGeneradas);


            // Obtener las fechas generadas del input oculto
            var fechasGeneradasInput = document.getElementById('fechas_generadas');
            var fechasGeneradas = JSON.parse(fechasGeneradasInput.value);

            // Verificar si todas las fechas son válidas
            var fechasValidas = true;
            fechasGeneradas.forEach(function(fecha) {
                var date = new Date(fecha);
                if (isNaN(date.getTime())) {
                    // La fecha no es válida
                    fechasValidas = false;
                }
            });

            if (fechasValidas) {
                // Todas las fechas son válidas, enviarlas al servidor
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
                xhr.send(JSON.stringify({
                    fechas: fechasGeneradas
                }));
            } else {
                // Al menos una de las fechas no es válida, mostrar un mensaje de error
                console.error('Una o más fechas no son válidas');
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
