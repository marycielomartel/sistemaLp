<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script>
        // Función para gestionar el despliegue del menú de Inventario
        function toggleInventarioMenu() {
            var inventarioMenu = document.getElementById("navbarDropdownInventarioMenu");
            inventarioMenu.classList.toggle("show");
        }
    </script>
    <style>
        body {
            background-color: #e5f7ff; /* Celeste claro */
        }
        .navbar {
            background-color: #63a4ff; /* Azul celeste */
        }
        .navbar-brand {
            color: white;
            font-size: 24px; /* Aumenta el tamaño del título del panel de administrador */
        }
        .navbar-toggler-icon {
            background-color: white;
        }
        .navbar-nav .nav-link {
            color: white;
        }
        .navbar-nav .nav-link:hover {
            color: #cce5ff; /* Azul más claro al pasar el ratón */
        }
        .btn-outline-danger {
            color: #fff;
            border-color: #dc3545;
        }
        .btn-outline-danger:hover {
            color: #dc3545;
            background-color: #fff;
            border-color: #dc3545;
        }

         /* Estilo del menú desplegable */
         .dropdown-menu {
            background-color: #63a4ff; /* Azul celeste */
        }
        .dropdown-item {
            color: #fff;
        }
        .dropdown-item:hover {
            background-color: #cce5ff; /* Azul más claro al pasar el ratón */
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <?php if ($_SESSION["rol"] == "administrador") { ?>
            <!-- Panel de Administrador -->
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Panel de Administrador</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown" onmouseleave="cerrarMenu('navbarDropdownInventarioMenu')">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownInventario" role="button" aria-haspopup="true" aria-expanded="false" onclick="toggleInventarioMenu()">
                                Inventario
                            </a>
                            <ul class="dropdown-menu" id="navbarDropdownInventarioMenu">
                                <li><a class="dropdown-item" href='registroInventario.php'>Registrar Inventario</a></li>
                                <li><a class="dropdown-item" href='mostrarInventario.php'>Mostrar Inventario</a></li>
                            </ul>
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
        </div>
        <?php } ?>
        <?php if ($_SESSION["rol"] == "alumno") { ?>
            <!-- Panel de Usuario -->
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Panel de Usuario</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="mostrarEquipo.php">Mostrar Equipos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mostrarLaboratorio.php">Mostrar Laboratorios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="registroPrestamo.php">Prestar Equipos Informaticos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="registroReserva.php">Reservar Laboratorio</a>
                        </li>
                    </ul>
                </div>
            </div>
        <?php } ?>
        <div class="ml-auto">
            <a class="btn btn-outline-danger" href="logout.php">Salir</a>
        </div>
    </div>
</nav>
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

</body>
</html>
