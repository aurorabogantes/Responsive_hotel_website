<body>
    <?php include_once("header.html"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Habitaciones</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>

    <style>
        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn-volver {
            background-color: #60543A;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 10px;
        }

        .btn-volver:hover {
            background-color: #9fabc5;
            color: #60543A;
        }
    </style>

    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body style="background-color: #fff8e7;">
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-med-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Habitaciones</h2>
                        <a href="create-menu.php" class="btn btn-success pull-right">Agregar Nueva Habitaci&oacute;n</a>
                    </div>
                    <?php
                    require_once "conection.php";
                    $sql = "SELECT * FROM habitaciones";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result)>0){
                            echo "<table class='table table-bordered table-striped'>";
                            echo "<thead>";
                                echo "<tr>";
                                    echo "<th>#</th>";
                                    echo "<th>Nombre</th>";
                                    echo "<th>Tipo</th>";
                                    echo "<th>Mayordomo</th>";
                                    echo "<th>Costo</th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                    echo "<td>".$row['idHabitacion']."</td>";
                                    echo "<td>".$row['Nombre']."</td>";
                                    echo "<td>".$row['Tipo']."</td>";
                                    echo "<td>".$row['Mayordomo']."</td>";
                                    echo "<td>".$row['Costo']."</td>";
                                    echo "<td>";
                                    echo "<a href='read-menu.php?idHabitacion=".$row['idHabitacion']."' title='Ver' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                    echo "<a href='update-menu.php?idHabitacion=".$row['idHabitacion']."' title='Editar' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                    echo "<a href='delete-menu.php?idHabitacion=".$row['idHabitacion']."' title='Eliminar' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                    echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            mysqli_free_result($result);
                        } else {
                            echo "<p class='lead'>No se encontraron registros</p>";
                        }
                    } else {
                        echo "Error: no se puede ejecutar el $sql".mysqli_error($conn);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-container">
        <a href="dashboard.php" class="btn btn-volver">Volver</a>
    </div>
    <?php
    include_once("footer.html");
    ?>
</body>
</html>