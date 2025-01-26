htm

<?php
require('conection.php');

$query = "SELECT idReservas, CONCAT(Nombre, ' ', Apellido1, ' ', Apellido2) AS Cliente, 
                 Habitación, Fecha_ingreso, Fecha_salida, Estado, 
                 DATEDIFF(Fecha_ingreso, NOW()) AS DiasFaltantes
          FROM reservas
          WHERE Estado IN ('Pendiente', 'Realizada')
          ORDER BY Fecha_ingreso ASC";
$result = $conn->query($query);

if($result){
    $reservas = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $reservas = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Reservaciones</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style>
        body {
            background-color: #9fabc5;
            font-family: Arial, sans-serif;
            font-size: 18px;
        }
        .container {
            margin-top: 50px;
            padding: 40px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #60543A;
            font-size: 32px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            text-align: center;
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #60543A;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .btn {
            border-radius: 10px;
            font-size: 18px;
            padding: 10px 20px;
            margin-top: 10px;
        }
        .btn-primary {
            background-color: #60543A;
            color: white;
            border: none;
        }
        .btn-primary:hover {
            background-color: #9fabc5;
            color: #60543A;
        }
        .btn-volver {
            background-color: #9fabc5;
            color: #60543A;
            border: none;
        }
        .btn-volver:hover {
            background-color: #60543A;
            color: white;
        }
        .exportar-pdf {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Historial de Reservaciones</h2>

    <div class="exportar-pdf">
        <a href="exportar_historial.php" class="btn btn-primary">Exportar a PDF</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Habitación</th>
                <th>Fecha de ingreso</th>
                <th>Fecha de salida</th>
                <th>Estado</th>
                <th>D&iacute;as restantes</th>
                <th>Acciones</th>
            </tr>
        </thead>
    <tbody>
        <?php
        foreach($reservas as $reserva){
            echo "<tr>";
            echo "<td>{$reserva['idReservas']}</td>";
            echo "<td>{$reserva['Cliente']}</td>";
            echo "<td>{$reserva['Habitación']}</td>";
            echo "<td>{$reserva['Fecha_ingreso']}</td>";
            echo "<td>{$reserva['Fecha_salida']}</td>";
            echo "<td>{$reserva['Estado']}</td>";
            echo "<td>";
            echo $reserva['Estado'] == 'Pendiente' ? "{$reserva['DiasFaltantes']} días" : "-";
            echo "</td>";
            echo "<td>";
            if($reserva['Estado'] == 'Pendiente'){
                echo "<button onclick=\"confirmarCancelacion({$reserva['idReservas']})\">Cancelar</button>";
            }
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
    </table>

    <div>
        <a href="reservaciones.php" class="btn btn-volver">Volver</a>
    </div>
</div>

<script>
    function confirmarCancelacion(id){
        if(confirm('¿Está seguro de que desea cancelar esta reservación?')){
            window.location.href = `cancelar_reserva.php?id=${id}`;
        }
    }
</script>
</body>
</html>