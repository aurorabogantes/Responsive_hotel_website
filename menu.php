<?php
session_start(); // Iniciar la sesión
?>

<?php
$colorFondo = "#bbad8f";
?>

<head>
    <style>
        .navbar{
            padding: 15px 0;
        }

        .navbar-nav .nav-item .nav.link{
            font-size: 18px;
            color: white;
        }
        
        .navbar-nav .nav-item .nav.link:hover{
            color: #f1c40f;
        }

        .navbar-brand img{
            width: 40px;
        }
    </style>
</head>
<nav class="navbar navbar-expand-sm" style="background-color: <?php echo $colorFondo; ?>;">
    <button class="nav-toggler" type="button" data-toggle="collapse" data-target="#opciones">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="index.html">
        <img src="Recursos/logo.png" width="30" alt="Org icon">
    </a>

    <div class="collapse navbar-collapse" id="opciones">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="acerca-de.php">Acerca de</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="servicios.php">Servicios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="mapa.php">Mapa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contacto.php">Cont&aacute;ctenos</a>
            </li>
            <?php if (isset($_SESSION['usuario'])): ?>
                <!-- Menú para usuarios autenticados -->
                <li class="nav-item">
                    <a class="nav-link" href="perfil.php">Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Cerrar sesión</a>
                </li>
            <?php else: ?>
                <!-- Menú para usuarios no autenticados -->
                <li class="nav-item">
                    <a class="nav-link" href="registro.php">Registro de usuario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="inicio_sesion.php">Inicio de sesión</a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link" href="inicio_sesion_admin.php">Inicio adminitradores</a>
            </li>
        </ul>
    </div>
</nav>