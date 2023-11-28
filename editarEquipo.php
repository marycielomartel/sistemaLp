<?php
include_once("Controladores/equipoControlador.php");

session_start();
$id = "";
$nombre = "";
$descripcion = "";
$cantidad = "";
$estado = "";


if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $equipoControlador = new EquipoControlador();
    $equipoData = $equipoControlador->obtenerId($id);


    if ($equipoData) {
        $nombre = $equipoData['nombre'];
        $descripcion = $equipoData['descripcion'];
        $cantidad = $equipoData['cantidad'];
        $estado = $equipoData['estado'];
    } else {
        echo "El equipo no existe o no se puede editar.";
        exit;
    }
}
if (isset($_POST['enviar'])) {

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $estado = $_POST['estado'];

    $equipoControlador = new EquipoControlador();
    $resultado = $equipoControlador->editar($id, $nombre, $descripcion, $cantidad, $estado);

    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Prestamos/Reservas</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout in_page">
    <!-- loader  -->
    <div class="container welcome-container d-flex align-items-center justify-content-between">
        <h1>Hola, bienvenido <?php echo $_SESSION["usuario"]; ?></h1>
        <a class="btn btn-outline-danger" href="logout.php">Salir</a>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="index.html"><img src="images/logo.png" alt="#" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <?php if ($_SESSION["rol"] == "administrador") { ?>
                            <!-- Panel de Administrador -->
                            <div class="col-md-10 offset-md-1">
                                <nav class="navigation navbar navbar-expand-md navbar-dark ">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarsExample04">
                                        <ul class="navbar-nav mr-auto">
                                            <li class="nav-item ">
                                                <a class="nav-link" href="index.php">Home</a>
                                            </li>
                                            <li class="nav-item dropdown" onmouseleave="cerrarMenu('navbarDropdownEquipoMenu')">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownEquipo" role="button" aria-haspopup="true" aria-expanded="false" onclick="toggleEquipoMenu()">
                                                    Equipos
                                                </a>
                                                <ul class="dropdown-menu" id="navbarDropdownEquipoMenu">
                                                    <li><a class="dropdown-item" href='registroEquipo.php'>Registrar Equipo</a></li>
                                                    <li><a class="dropdown-item" href='mostrarEquipo.php'>Mostrar Equipo</a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-item dropdown" onmouseleave="cerrarMenu('navbarDropdownLaboratorioMenu')">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownLaboratorio" role="button" aria-haspopup="true" aria-expanded="false" onclick="toggleLaboratorioMenu()">
                                                    Laboratorios
                                                </a>
                                                <ul class="dropdown-menu" id="navbarDropdownLaboratorioMenu">
                                                    <li><a class="dropdown-item" href='registroLaboratorio.php'>Registrar Laboratorio</a></li>
                                                    <li><a class="dropdown-item" href='mostrarLaboratorio.php'>Mostrar Laboratorio</a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href='mostrarPrestamo.php'>Mostrar Prestamos</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href='mostrarReserva.php'>Mostrar Reservas</a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        <?php } ?>
                    </div>


                    <div class="container-fluid">
                        <?php if ($_SESSION["rol"] == "alumno") { ?>
                            <!-- Panel de Alumno -->
                            <div class="col-md-10 offset-md-1">
                                <nav class="navigation navbar navbar-expand-md navbar-dark ">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarsExample04">
                                        <ul class="navbar-nav mr-auto">
                                            <li class="nav-item ">
                                                <a class="nav-link" href="index.php">Home</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active" aria-current="page" href="mostrarEquipo.php">Mostrar Equipos</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="mostrarLaboratorio.php">Mostrar Laboratorios</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href='registroPrestamo.php'>Realizar Prestamos</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href='registroReserva.php'>Realizar Reservas</a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        <?php } ?>

                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- end header inner -->
    <!-- end header -->
    <!-- Laboratorios -->

    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        form {
            max-width: 600px;
            max-height: 800px;
            margin: 50px auto;
            /* Ajustado el margen superior e inferior */
            background-color: #fff;
            padding: 40px;
            /* Aumentado el tamaño del área de relleno */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form input {
            margin-bottom: 20px;
            width: 100%;
            padding: 15px;
            /* Aumentado el tamaño del área de relleno de los inputs */
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        form h2 {
            margin-bottom: 30px;
            text-align: center;
        }

        form .form-group {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <h1 class="text-center">Editar Equipo</h1>
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <input type="text" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>"><br>
        <input type="text" name="descripcion" value="<?php echo $descripcion; ?>"><br>
        <input type="text" name="cantidad" value="<?php echo $cantidad; ?>"><br>
        <select class="form-select" name="estado" aria-label="Default select example" require>
        <option selected value="<?php echo $estado; ?>"><?php echo $estado; ?></option>
        <option value="Disponible">Disponible</option>
        <option value="Ocupado">Ocupado</option>
        </select><br>
        <input type="submit" name="enviar" value="Actualizar"><br> 
        
        <a href="mostrarEquipo.php">Regresar</a>
    </form>
    </body>

<!--  footer -->
<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class=" col-md-3 col-sm-6">
                    <ul class="social_icon">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                    <p class="variat pad_roght2"> Impulsando la investigación y el aprendizaje con laboratorios especializados diseñados para inspirar el descubrimiento y la experimentación
                    </p>
                </div>
                <div class=" col-md-3 col-sm-6">
                    <h3>¡Permítenos Ayudarte! </h3>
                    <p class="variat pad_roght2"> El conocimiento es poder. Facilitamos la obtención de recursos tecnológicos y espacios para potenciar el aprendizaje y la investigación.
                    </p>
                </div>
                <div class="col-md-3 col-sm-6">
                    <h3>Enlaces Rápidos</h3>
                    <ul class="link_menu">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">Equipos</a></li>
                        <li><a href="service.html">Laboratorio</a></li>

                    </ul>
                </div>
                <div class="col-md-3 col-sm-6">
                    <h3>Nuestro Diseño</h3>
                    <p class="variat"> Inspiramos el diseño para un aprendizaje innovador y eficiente, transformando la educación mediante la tecnología y la investigación.
                    </p>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <p>© 2019 All Rights Reserved. Design by <a href="https://html.design/"> Free Html Templates</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->
<!-- Javascript files-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>
<!-- sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>

<script>
    function toggleInventarioMenu() {
        var inventarioMenu = document.getElementById("navbarDropdownInventarioMenu");
        inventarioMenu.classList.toggle("show");
    }

    function toggleEquipoMenu() {
        var equipoMenu = document.getElementById("navbarDropdownEquipoMenu");
        equipoMenu.classList.toggle("show");
    }

    function toggleLaboratorioMenu() {
        var laboratorioMenu = document.getElementById("navbarDropdownLaboratorioMenu");
        laboratorioMenu.classList.toggle("show");
    }

    function cerrarMenu(menuId) {
        var menu = document.getElementById(menuId);
        menu.classList.remove("show");
    }
</script>

</html>