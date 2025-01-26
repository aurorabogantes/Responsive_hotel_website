<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservar Habitación</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style>
        body {
            background-color: #9fabc5;
            font-family: Arial, sans-serif;
            font-size: 18px; /* Aumentar tamaño global de la fuente */
        }
        .container {
            margin-top: 50px;
            padding: 40px; /* Aumentar el padding para más espacio */
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .text-center {
            margin-bottom: 30px;
            color: #60543A;
            font-size: 32px; /* Aumentar tamaño del título */
        }
        .btn-back, .btn-primary, .btn-secondary, .btn-success {
            size: 50px;
            font-size: 30px; /* Tamaño más grande de texto */
            padding: 15px 30px; /* Aumento de padding */
            height: auto;
            width: auto;
            border-radius: 10px; /* Bordes redondeados */
            margin-right: 10px;
            margin-bottom: 20px;
        }
        .btn-back {
            margin-bottom: 30px;
            background-color: #60543A;
            color: white;
            border: none;
        }
        .btn-back:hover {
            background-color: #9fabc5;
            color: #60543A;
        }
        .btn-primary, .btn-secondary, .btn-success {
            background-color: #60543A;
            color: white;
            border: none;
        }
        .btn-primary:hover, .btn-secondary:hover, .btn-success:hover {
            background-color: #9fabc5;
            color: #60543A;
        }
        label {
            color: #60543A;
            font-weight: bold;
            font-size: 20px; /* Aumentar tamaño de las etiquetas */
        }
        .form-control {
            margin-bottom: 20px;
            border: 1px solid #60543A;
            font-size: 18px; /* Aumentar tamaño de los campos de texto */
            padding: 20px; /* Aumentar padding dentro de los campos de texto */
        }
        .form-control::placeholder {
            font-size: 18px; /* Aumentar tamaño del placeholder */
            color: #aaa; /* Cambiar color del placeholder */
        }
        .footer {
            font-size: 20px; /* Aumentar tamaño de la letra del footer */
            text-align: center;
            padding: 20px;
            background-color: #60543A;
            color: white;
        }
        span {
            font-size: 3rem;
            color: red;
        }
    </style>
    <script>
        // Validar fechas en el cliente
        function validarFechas() {
            const hoy = new Date().toISOString().split('T')[0];
            const fechaIngreso = document.getElementById('Fecha_ingreso').value;
            const fechaSalida = document.getElementById('Fecha_salida').value;

            if (fechaIngreso < hoy || fechaSalida < hoy) {
                alert('Las fechas no pueden ser en el pasado.');
                return false;
            }
            if (fechaIngreso > fechaSalida) {
                alert('La fecha de salida debe ser posterior a la fecha de ingreso.');
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <?php include_once("header.html"); ?>

    <div class="historial">
        <a href="historial.php" class="btn btn-primary btn-lg">Abrir Historial</a>
    </div>
    <div>
        <a href="update-usuario.php" class="btn btn-secondary btn-lg">Actualizar Registro</a>

    </div>
    <div class="container">
        <h2 class="text-center">Reservar Habitación</h2>
        <a href="index.php" class="btn btn-primary btn-back btn-lg">Volver al men&uacute; principal</a>
        <form action="procesar_reserva.php" method="post" onsubmit="return validarFechas()">
            <div class="form-group">
                <label for="Nombre">Nombre:</label>
                <input type="text" name="Nombre" id="Nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Apellido1">Primer Apellido:</label>
                <input type="text" name="Apellido1" id="Apellido1" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Apellido2">Segundo Apellido:</label>
                <input type="text" name="Apellido2" id="Apellido2" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Habitacion">Tipo de Habitación:</label>
                <select name="Habitacion" id="Habitacion" class="form-control" required>
                    <option value="Estandar">Est&aacute;ndar</option>
                    <option value="Superior">Superior</option>
                    <option value="Suite">Suite</option>
                    <option value="Bungalow">Bungalow</option>
                    <option value="Villa">Villa</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Fecha_ingreso">Fecha de Ingreso:</label>
                <input type="date" name="Fecha_ingreso" id="Fecha_ingreso" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Fecha_salida">Fecha de Salida:</label>
                <input type="date" name="Fecha_salida" id="Fecha_salida" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success btn-lg">Reservar</button>
        </form>
    </div>
    <?php include_once("footer.html"); ?>
</body>
</html>