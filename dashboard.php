<body>
    <?php include_once("header.html"); ?>

<?php
require_once "conection.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $Usuario = $_POST['usuario'];
    $Contraseña = $_POST['password'];

    if($Usuario === 'administrador' && $Contraseña === 'admin123'){
        $_SESSION['usuario'] = $Usuario;
        echo "Bienvenido";
    } else {
         echo "Usuario o contraseña incorrectos.";
         echo "<script>window.location.href='admin.html';</script>";
         exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario administrador</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style>
        body {
            background-color: #9fabc5; /* Fondo general */
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .page-header h2 {
            color: #60543A; /* Título principal */
            font-weight: bold;
        }

        .alert-info {
            background-color: #60543A;
            color: white;
            border: none;
        }

        .btn-group .btn {
            background-color: #60543A;
            color: white;
            border: none;
        }

        .btn-group .btn:hover {
            background-color: #9fabc5;
            color: #60543A;
        }

        .btn-danger {
            background-color: #9fabc5;
            color: #60543A;
            border: none;
        }

        .btn-danger:hover {
            background-color: #60543A;
            color: white;
        }

        .text-right a {
            font-weight: bold;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h2>Secci&oacute;n administrativa</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                    <p>Bienvenido administrador. Men&uacute;:</p>
                </div>
                <div class="btn-group btn-group-justified">
                    <a href="usuarios.php" class="btn btn-primary">Administraci&oacute;n de usuarios</a>
                    <a href="catalogo.php" class="btn btn-success">Administraci&oacute;n de habitaciones</a>
                    <a href="reservaciones-admin.php" class="btn btn-warning">Administrar reservaciones</a>
                    <a href="index.php" class="btn btn-warning">Volver al men&uacute;</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once("footer.html");
    ?>
</body>
</html>