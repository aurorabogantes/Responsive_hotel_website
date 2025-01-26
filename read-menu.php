<?php

$nombre = $tipo = $mayordomo = $costo = "";

if(isset($_GET["idHabitacion"]) && !empty(trim($_GET["idHabitacion"]))){
    require_once "conection.php";

    $sql = "SELECT * FROM habitaciones WHERE idHabitacion=?";
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_GET["idHabitacion"]);
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result)==1){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $nombre = $row["Nombre"];
                $tipo = $row["Tipo"];
                $mayordomo = $row["Mayordomo"];
                $costo = $row["Costo"];
            } else {
                header("location: 404.php");
                exit();
            }
        } else {
            echo "Algo salió mal :(";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listado habitaciones</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>

    <style>
        body {
            font: 14px sans-serif;
            background-color: #9FABC5;
            color: #60543A;
        }
        .container {
            margin-top: 50px;
        }
        .page-header {
            color: #60543A;
        }
        .btn-primary {
            background-color: #60543A;
            border-color: #60543A;
        }
        .btn-primary:hover {
            background-color: #9FABC5;
            border-color: #9FABC5;
            color: #60543A;
        }
        .form-control-static {
            color: #60543A;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Datos de la habitaci&oacute;n</h1>
                    </div>
                    <div class="form-group">
                        <label>Habitaci&oacute;n</label>
                        <p class="form-control-static"><?php echo $nombre;?></p>
                    </div>
                    <div class="form-group">
                        <label>Tipo</label>
                        <p class="form-control-static"><?php echo $tipo;?></p>
                    </div>
                    <div class="form-group">
                        <label>Mayordomo</label>
                        <p class="form-control-static"><?php echo $mayordomo;?></p>
                    </div>
                    <div class="form-group">
                        <label>Costo</label>
                        <p class="form-control-static"><?php echo $costo;?></p>
                    </div>
                    <div>
                        <p><a href="catalogo.php" class="btn btn-primary">Volver</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>