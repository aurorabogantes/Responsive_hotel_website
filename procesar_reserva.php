<?php
require_once "conection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = mysqli_real_escape_string($conn, $_POST['Nombre']);
    $apellido1 = mysqli_real_escape_string($conn, $_POST['Apellido1']);
    $apellido2 = mysqli_real_escape_string($conn, $_POST['Apellido2']);
    $habitacion = mysqli_real_escape_string($conn, $_POST['Habitacion']);
    $fecha_ingreso = $_POST['Fecha_ingreso'];
    $fecha_salida = $_POST['Fecha_salida'];

    // Validar fechas en el servidor
    $hoy = date('Y-m-d');
    if ($fecha_ingreso < $hoy || $fecha_salida < $hoy) {
        die("<div class='alert alert-danger'>Error: Las fechas no pueden ser en el pasado.</div>");
    }
    if ($fecha_ingreso > $fecha_salida) {
        die("<div class='alert alert-danger'>Error: La fecha de salida debe ser posterior a la fecha de ingreso.</div>");
    }

    $sql = "INSERT INTO reservas (Nombre, Apellido1, Apellido2, Habitación, Fecha_ingreso, Fecha_salida, Fecha_creacion) 
            VALUES ('$nombre', '$apellido1', '$apellido2', '$habitacion', '$fecha_ingreso', '$fecha_salida', NOW())";

    if (mysqli_query($conn, $sql)) {
        echo "<div class='alert alert-success'>Reservación realizada con éxito.</div>";
        echo "<a href='reservaciones.php' class='btn btn-primary'>Volver al formulario</a>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    }

    mysqli_close($conn);
} else {
    echo "<div class='alert alert-warning'>Acceso no permitido.</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservar habitaci&oacute;n</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #9FABC5;
            margin: 0;
            padding: 0;
            color: #60543A;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .btn-primary {
            background-color: #60543A;
            color: #fff;
            border: none;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }

        .btn-primary:hover {
            background-color: #9FABC5;
            color: #60543A;
        }

        .alert {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        .alert-warning {
            background-color: #fff3cd;
            color: #856404;
        }
    </style>
</head>
<body>
    
</body>
</html>