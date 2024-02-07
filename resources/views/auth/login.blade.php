<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seguimiento | CNCA </title>
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
    <center>
        <main class="main card-container">
            <section class="carding">
                <img src="{{ asset('img/Ilustracion.svg') }}" alt="">
            </section>
    
            <section class="card form">
                <div class="form-title">
                    <h4>CENTRO NACIONAL COLOMBO ALEMAN</h4>
                    <p>SEGUIMIENTO DE INSTRUCTORES</p>
                </div>
                <div class="form-content">
                    <form action="" method="post">
                        <div class="input-with-icon input-content">
                            <label for="" class="form-label">Usuario</label>
                            <input type="text" placeholder="Usuario">
                            <i class="bi bi-person"></i>
    
                        </div>
    
                        <div class="input-with-icon input-content">
                            <label for="" class="form-label">Contraseña</label>
                            <input type="text" placeholder="Contraseña">
                            <i class="bi bi-unlock"></i>
                        </div>

                        
                        <div class="input-button">
                            <input type="submit" value="INGRESAR">
                        </div>
                    

                    </form>
    
    
                </div>
            </section>
        </main>   
    </center>

</body>

</html>
