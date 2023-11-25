<?php
  session_start();
  if(!isset($_SESSION["usuario"])){
   header("location: login.php");
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
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      <script>
        // Función para gestionar el despliegue del menú de Inventario
        function toggleInventarioMenu() {
            var inventarioMenu = document.getElementById("navbarDropdownInventarioMenu");
            inventarioMenu.classList.toggle("show");
        }
      </script>

   </head>
   <!-- body -->
   <body class="main-layout">
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
                                 <li class="nav-item active">
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
                                 <li class="nav-item active">
                                    <a class="nav-link" href="index.php">Home</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link " aria-current="page" href="mostrarEquipo.php">Mostrar Equipos</a>
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
      <!-- banner -->
      <?php if ($_SESSION["rol"] == "alumno") { ?>
      <!-- Panel de Alumno -->
      <section class="banner_main">
         <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
               <li data-target="#myCarousel" data-slide-to="1"></li>
               <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <div class="carousel-caption relative">
                        <div class="row">
                           <div class="col-md-7 offset-md-5">
                              <div class="text-bg">
                                 <h1> Espacios <br>de laboratorio</h1>
                                 <span>Impulsando la investigación y el aprendizaje con laboratorios especializados diseñados para inspirar el descubrimiento y la experimentación.</span>
                                 <a class="read_more" href='registroReserva.php' href="Javascript:void(0)">Reservar</a>
                                 
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="carousel-caption relative">
                        <div class="row">
                           <div class="col-md-7 offset-md-5">
                              <div class="text-bg">
                                 <h1> Equipos <br>Tecnologicos</h1>
                                 <span>Inspira tu creatividad con nuestra colección de equipos tecnológicos diseñados para desbloquear tu potencial creativo.</span>
                                 <a class="read_more" href='registroPrestamo.php'>Prestamo</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
            </a>
         </div>
      </section>
      <?php } ?> 
      <!-- end banner -->
      <!-- gallery -->
      <div id="gallery"  class="gallery">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage"> <br>
                     <h2>Espacios <span class="green">de Laboratorio</span></h2>
                     <p>Comprometidos con la excelencia, nuestros laboratorios ofrecen un entorno ideal para el descubrimiento y el progreso científico.</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4 col-sm-6">
                  <div class="gallery_text"> 
                     <div class="galleryh3">
                        <h3>Espacios de Coordinación</h3>
                        <p>Espacios destinados para reuniones y <br>
                           coordinación entre estudiantes, <br>
                           profesores o equipos. <br>
                        </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="images/galeria1.jpg" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="images/galeria2.jpg" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="images/galeria3.jpg" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="images/galeria4.jpg" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div class="gallery_text">
                     <div class="galleryh3">
                        <h3>Laboratorios Tecnológicos</h3>
                        <p>Laboratorios equipados  <br>
                           con tecnología avanzada, adecuados <br>
                           para carreras que requieran  <br>
                           potentes recursos informáticos. <br>
                        </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div class="gallery_text">
                     <div class="galleryh3">
                        <h3>Laboratorios de  <br>
                            Aplicaciones Básicas </h3>
                        <p>Laboratorios con computadoras  <br>
                           estándar para realiza tareas  <br>
                           comunes como procesamiento de texto,  <br>
                           presentaciones y navegación web.
                        </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="images/galeria5.jpg" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="images/galeria6.jpg" alt="#"/></figure>
                  </div>
               </div>
            </div>
            <div class="col-md-12">
               <div class="d-flex justify-content-center">
                  <a class="read_more" href= "mostrarLaboratorio.php" href="Javascript:void(0)">Ver todo</a>
               </div>
            </div>
         </div>
      </div>
     
      <!-- end gallery -->
   
      <!-- latest news -->
      <div  class="latest_news">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Equipos <span class="green">de Laboratorio</span></h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4 offset-md-2">
                  <div id="new" class="news_box">
                     <div class="news_img">
                        <figure><img src="images/blog1.jpg" alt="#"/></figure>
                     </div>
                     <div class="news_room">
                        <span>Post By :oficina de informatica</span>
               
                        <h3>PC de Alto Rendimiento</h3>
                        <p>Especificaciones Técnicas: <br>
                           Procesador: Intel Core i7 de 10a generación <br>
                           Tarjeta Gráfica: NVIDIA GeForce RTX 3070 <br>
                           Memoria RAM: 16 GB DDR4 <br>
                           Almacenamiento: SSD 512 GB  </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 ">
                  <div id="new" class="news_box">
                     <div class="news_img mr_le">
                        <figure><img src="images/blog2.jpg" alt="#"/></figure>
                     </div>
                     <div class="news_room">
                        <span>Post By :oficina de informatica</span>
                        
                        <h3>Laptop para trabajos simples</h3>
                        <p>Especificaciones Técnicas: <br>
                           Procesador: Intel Core i5 de 11a generación <br>
                           Memoria RAM: 16 GB DDR4<br>
                           Almacenamiento: SSD 512 GB<br>
                           Duración de la Batería: Hasta 10 horas <br>
                           Sistema Operativo: Windows 11  </p>
                     </div>
                  </div>
               </div>
            </div>
               <div class="col-md-12">
                           <a class="read_more" href= "mostrarEquipo.php" href="Javascript:void(0)"> Ver mas</a>
               </div>
         </div>
      </div>
      <!-- end latest news -->
     
   
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="mostrarEquipo.php">Equipos</a></li>
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