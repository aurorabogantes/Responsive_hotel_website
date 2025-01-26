<?php
require_once "conection.php";

$sql = "SELECT idReservas, Nombre, Apellido1, Apellido2, Habitación, Fecha_ingreso, Fecha_salida, Estado 
        FROM reservas
        ORDER BY Fecha_creacion DESC LIMIT 5";

if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table class='table table-bordered table-hover'>";
        echo "<thead class='thead-light'>";
        echo "<tr>";
        echo "<th>Nombre</th>";
        echo "<th>Primer Apellido</th>";
        echo "<th>Segundo Apellido</th>";
        echo "<th>Tipo de Habitación</th>";
        echo "<th>Fecha de ingreso</th>";
        echo "<th>Fecha de salida</th>";
        echo "<th>Estado</th>";
        echo "<th>Acción</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['Nombre'] . "</td>";
            echo "<td>" . ucfirst($row['Apellido1']) . "</td>";
            echo "<td>" . $row['Apellido2'] . "</td>";
            echo "<td>" . $row['Habitación'] . "</td>";
            echo "<td>" . $row['Fecha_ingreso'] . "</td>";
            echo "<td>" . $row['Fecha_salida'] . "</td>";
            echo "<td>" . $row['Estado'] . "</td>";
            echo "<td>";
            echo "<form action='actualizar.php' method='POST' style='display:inline;'>";
            echo "<input type='hidden' name='idReservas' value='" . $row['idReservas'] . "'>";
            echo "<select name='Estado' class='form-control'>";
            echo "<option value='Pendiente' " . ($row['Estado'] == 'Pendiente' ? "selected" : "") . ">Pendiente</option>";
            echo "<option value='Realizada' " . ($row['Estado'] == 'Realizada' ? "selected" : "") . ">Realizada</option>";
            echo "<option value='Cancelada' " . ($row['Estado'] == 'Cancelada' ? "selected" : "") . ">Cancelada</option>";
            echo "</select>";
            echo "<button type='submit' class='btn btn-success btn-sm'>Actualizar</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<div class='alert alert-warning'>No se encontraron reservaciones registradas.</div>";
    }
} else {
    echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservaciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }
        
        .custom-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #9fabc5;
        }

        .custom-thead {
            background-color: #60543A;
            color: white;
        }

        .custom-table th, .custom-table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .custom-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .btn {
            background-color: #60543A;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #4a3b2b;
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

        .alert {
            padding: 10px;
            margin-top: 20px;
            border-radius: 5px;
            font-weight: bold;
        }

        .alert-warning {
            background-color: #ffc107;
            color: #856404;
        }

        .alert-danger {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
<div class="btn-container">
        <a href="dashboard.php" class="btn btn-volver">Volver</a>
</div>
<?php
    include_once("footer.html");
?>
</body>
</html>