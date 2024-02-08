<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SEGUIMIENTO | CNCA </title>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">

    

    <script src="{{ asset('js/sweetalert2.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
    <header class="banner">
        <div class="container">
            <img src="{{ asset('img/logo.png') }}">
            <h4 class="fs-5 m-2">SERVICIO NACIONAL DE APRENDIZAJE</h4>
        </div>
    </header>
        <main class="card-container">
            <section class="card form">
                <div class="form-title">
                    <h4>CENTRO NACIONAL COLOMBO ALEMAN</h4>
                    <p>SEGUIMIENTO DE INSTRUCTORES</p>
                </div>
                <div class="form-content">
                    <form method="POST" action="{{ route('login') }}"class="mt-3 login needs-validation" novalidate>
                    @csrf

                        <div class="input-with-icon input-content">
                            <label for="email" id="email" class="form-label">Usuario</label>
                            <input id="email" type="number" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  placeholder="Usuario" required>
                            <i class="bi bi-person"></i>


                        </div>

                        <div class="input-with-icon input-content">
                            <label for="password" class="form-label">Contraseña</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Contraseña" required>
                            <i class="bi bi-unlock"></i>
                        </div>


                        <div class="input-button">
                            {{-- <input type="submit" value="INGRESAR"> --}}
                            <input type="submit" class="btn btn-primary ">


                        </div>


                    </form>


                </div>
            </section>
        </main>
        @if (isset($errors) && $errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Usuario no Encontrado',
                text: 'Número de identificación o clave incorrectos!',
            });
        </script>
    @endif
    {{-- </center> --}}

</body>

</html>
