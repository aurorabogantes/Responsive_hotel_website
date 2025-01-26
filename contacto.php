<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contáctenos</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body style="background-color: #9fabc5;">
    <?php include_once("header.html"); ?>

    <nav>
        <?php include_once("menu.php"); ?>
    </nav>

    <!-------------------------contenido--------------------------------->
    <div class="container">
        <h1>Cont&aacute;ctenos</h1>
        <h3>Formulario de contacto</h3>
        <form name="contacto" action="enviar_correo.php" method="post">
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" placeholder="Digite su nombre" required>
            <label for="apellidos">Apellidos: </label>
            <input type="text" name="apellidos" placeholder="Digite ambos apellidos" required>
            <label for="correo">Correo electr&oacute;nico: </label>
            <input type="email" name="correo" placeholder="Digite su correo electr&oacute;nico" required>
            <label for="consulta">¿Cu&aacute;l es su consulta?</label>
            <input type="text" name="consulta" placeholder="Ingrese su consulta" required>
            <button type="submit" title="Presione para enviar el formulario" name="enviar">Enviar</button>
            <button type="reset" title="Presione para borrar el formulario" name="borrar">Cancelar</button>
        </form>
    </div>
    <!---------------------------------------------------------------------------------->
    <?php
    include_once("footer.html");
    ?>
    </div>

    <style>
        body {
            background-color: #9fabc5;
            color: #60543a;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h1, h3 {
            color: #60543a;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form label {
            margin-top: 10px;
            font-weight: bold;
            color: #60543a;
        }

        form input[type="text"],
        form input[type="email"] {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        form button {
            background-color: #60543a;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        form button:hover {
            background-color: #9fabc5;
            color: #60543a;
        }

        form button[type="reset"] {
            background-color: #ddd;
        }

        form button[type="reset"]:hover {
            background-color: #f0f0f0;
        }

        footer {
            max-width: 600px;
            margin: 0 auto;
            color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 10px;
        }

        footer a {
            color: white;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</body>
</html>