<?php

session_start();
if (!isset($_SESSION["usuario"])) {
    header("location: login.php");
}
if ($_SESSION["rol"] != "alumno") {
    header("location: index.php");
}

?>
<?php
require_once "Controladores/ReservaControlador.php";
$uc = new ReservaControlador();
$laboratorios= $uc->mostrarLab();

if (!empty($_POST)) {
    $idUsuario = $_POST["idUsuario"];
    $idLaboratorio = $_POST["idLaboratorio"];
    $fechaInicio = $_POST["fechaInicio"];
    $fechaFin = $_POST["fechaFin"];
    $horarios = $_POST["horarios"];

    echo $uc->guardar($idUsuario, $idLaboratorio, $fechaInicio, $fechaFin, $horarios);
}
?>
<!DOCTYPE html>
<html lang="en">
    <div class="container-fluid welcome-container d-flex align-items-center justify-content-between">
        <h1>Hola, bienvenido <?php echo $_SESSION["usuario"]; ?></h1>
        <a class="btn btn-outline-danger" href="logout.php">Salir</a>
    </div>

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
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      <script>
        // Función para gestionar el despliegue del menú de Inventario
        function toggleInventarioMenu() {
            var inventarioMenu = document.getElementById("navbarDropdownInventarioMenu");
            inventarioMenu.classList.toggle("show");
        }
      </script>

   </head>
   <!-- body -->
   <body class="main-layout in_page">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
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
                              <a href="index.php"><img src="images/logo.png" alt="#" /></a>
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
        
        .container {
            margin-top: 50px;
        }
        th, td {
            text-align: center;
        }
        th {
            background-color: #34BF98;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .actions a {
            color: #dc3545;
            margin-left: 10px;
        }
        h1{
          text-align: center;
          font-size: 4rem;
        }
        .editar-link {
            color:  #34BF98 !important;
        }
        
            
    </style>

<div class="container mt-4">
        <div class="row">
            <div class="col-md-4 offset-md-4 rounded-4">
                <div class="card">
                    <div class="card-body">
                    <h3 class="text-center">Registrar Reserva</h3>
                    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                        <input class="form-control" type="number" name="idUsuario" placeholder="Ingrese idUsuario" ><br>
                        <select  class="form-select" aria-label="Default select example" name="idLaboratorio" id="" require>
                        <option value="">Selecciona un laboratorio</option>
                        <?php 
                        
                        foreach ($laboratorios as $laboratorio) : ?>
                                    <option value="<?php echo $laboratorio['id']; ?>"><?php echo $laboratorio['nombre']; ?></option>
                                <?php endforeach; ?>
                        </select><br>
                        <label for="">Ingrese Fecha de Inicio</label></br>
                        <input  class="form-control" type="date" name="fechaInicio" required/><br>
                        <label for="">Ingrese Fecha de Fin</label></br>
                        <input  class="form-control" type="date" name="fechaFin" required/><br>
                        <input  class="form-control" type="text" name="horarios" placeholder="Ingrese Horarios" required/><br>
                        <div class="form-group text-center  mt-3">
                         <input type="submit" class="btn btn-primary" value="Guardar"/><br>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div><br>

    </body>
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
                     <p  class="variat pad_roght2"> El conocimiento es poder. Facilitamos la obtención de recursos tecnológicos y espacios para potenciar el aprendizaje y la investigación.
                     </p>
                  </div>
                  <div class="col-md-3 col-sm-6">
                     <h3>Enlaces Rápidos</h3>
                     <ul class="link_menu">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="mostrarEquipos.php">Equipos</a></li>
                        <li><a href="mostrarLaboratorio.php">Laboratorio</a></li>
                   
                     </ul>
                  </div>
                  <div class="col-md-3 col-sm-6">
                     <h3>Nuestro Diseño</h3>
                     <p  class="variat">  Inspiramos el diseño para un aprendizaje innovador y eficiente, transformando la educación mediante la tecnología y la investigación.
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
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
   <script>
    
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