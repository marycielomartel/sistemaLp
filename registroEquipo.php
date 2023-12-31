  <?php
    session_start();
    if(!isset($_SESSION["usuario"])){
      header("location: login.php");
      exit;
    }
    if($_SESSION["rol"]!="administrador"){
    header("location: bienvenido.php");
    exit;
  }
  ?>

  <!DOCTYPE html>
    <html lang="en">
  <div class="container-fluid welcome-container d-flex justify-content-between align-items-center text-light py-3">
    <h1 class="m-0">Hola, bienvenido <?php echo $_SESSION["usuario"]; ?></h1>
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
              <link rel="stylesheet" type="text/css" href="css/component.css" />
              <!-- Tweaks for older IEs-->
              <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

              <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      
          </head>
            <!-- body -->
            <body class="main-layout in_page">
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
                      margin: 50px auto; /* Ajustado el margen superior e inferior */
                      background-color: #fff;
                      padding: 40px; /* Aumentado el tamaño del área de relleno */
                      border-radius: 8px;
                      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                  }

                  form input {
                      margin-bottom: 20px;
                      width: 100%;
                      padding: 15px; /* Aumentado el tamaño del área de relleno de los inputs */
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
              <div class="gallery">
              <div class="container">
                  <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                      <h2 class="text-center">Formulario de Equipos</h2>
                      <div class="form-group">
                          <input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre del equipo" required>
                      </div>
                      <div class="form-group">
                          <input type="text" name="descripcion" class="form-control" placeholder="Ingrese la descripción del equipo" required>
                      </div>
                      <div class="form-group">
                          <input type="number" name="cantidad" class="form-control" placeholder="Ingrese la cantidad del equipo" required>
                      </div>
                      <div class="form-group">
                          <input type="text" name="estado" class="form-control" placeholder="Ingrese el estado del equipo" required>
                      </div>
                      <div class="form-group">
                          <input type="submit" class="btn btn-primary btn-block" value="Guardar">
                      </div>
                  </form>
                  <?php
                      if (!empty($_POST)) {
                          $nombre = $_POST["nombre"];
                          $descripcion = $_POST["descripcion"];
                          $cantidad = $_POST["cantidad"];
                          $estado = $_POST["estado"];

                          require_once "Controladores/EquipoControlador.php";
                          $uce = new EquipoControlador();
                          $mensaje = $uce->guardar($nombre, $descripcion, $cantidad, $estado);

                          if ($mensaje === "Equipo Registrado Correctamente") {
                            echo "<div class='alert alert-success' role='alert'>Equipo registrado correctamente</div>";
                        } else {
                            echo "<div class='alert alert-danger' role='alert'>$mensaje</div>";
                        }

                          if ($mensaje === "Equipo Registrado Correctamente") {
                              echo "<script>
                                      Swal.fire({
                                          title: 'Éxito',
                                          text: 'Equipo registrado correctamente',
                                          icon: 'success',
                                          confirmButtonText: 'OK'
                                      }).then((result) => {
                                          // Redirige a otra página o realiza otras acciones si es necesario
                                          window.location.href = 'mostrarEquipo.php';
                                      });
                                    </script>";
                          } else {
                              echo "<script>
                                      Swal.fire({
                                          title: 'Error',
                                          text: 'Error al registrar el equipo',
                                          icon: 'error',
                                          confirmButtonText: 'OK'
                                      });
                                    </script>";
                          }
                      }
                      ?>
                 
              </div>
              </div>
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
                        <p  class="variat pad_roght2"> El conocimiento es poder. Facilitamos la obtención de recursos tecnológicos y espacios para potenciar el aprendizaje y la investigación.
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
