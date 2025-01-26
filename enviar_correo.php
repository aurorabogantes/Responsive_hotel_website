<?php
$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
$apellidos = filter_var($_POST['apellidos'], FILTER_SANITIZE_STRING);
$correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
$consulta = filter_var($_POST['consulta'], FILTER_SANITIZE_STRING);

if(!empty($nombre) && !empty($apellidos) && !empty($correo) && !empty($consulta)){
    $destino = "aurorabogantes@gmail.com";
    $asunto = "Nueva consulta del formulario de contacto";

    $cuerpo = '
    <html>
        <head>
            <title>Consulta del formulario de contacto</title>
        </head>
        <body>
            <h1>Email de: '.$nombre.'</h1>
            <h3>Correo: '.$correo.'</h3>
            <p>'.$consulta.'</p>
        </body>
    </html>
    ';

    $headers = "MIME-Version: 1.0\r\n";
    $headers = "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "From: $nombre <$correo>\r\n";
    $headers .= "Return-path: $destino\r\n";

    mail($destino, $asunto, $cuerpo, $headers);

    echo "Formulario enviado correctamente.";
    
} else {
    echo "Hubo un error al enviar el formulario.";
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enviar correo</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-weight: bold;
        }

        .alert-success {
            background-color: #28a745;
            color: white;
        }

        .alert-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #9fabc5;
            color: #60543A;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }

        .btn:hover {
            background-color: #60543A;
            color: white;
        }

        .btn-container {
            margin-top: 20px;
            text-align: center;
        }

        .btn-volver {
            background-color: #9fabc5;
            color: #60543A;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
        }

        .btn-volver:hover {
            background-color: #60543A;
            color: white;
        }
    </style>
</head>
<body>
    <div class="btn-container">
        <a href="contacto.php" class="btn btn-volver">Volver</a>
    </div>
</body>
</html>