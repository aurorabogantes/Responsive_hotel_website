<?php
require_once "conection.php";

$nombre = $tipo = $mayordomo = $costo = "";
$nombre_err = $tipo_err = $mayordomo_err = $costo_err = "";

if(isset($_POST["idHabitacion"]) && !empty($_POST["idHabitacion"])){
    $id = $_POST["idHabitacion"];
    
    $input_nombre = trim($_POST["Nombre"]);
    if(empty($input_nombre)){
        $nombre_err = "Por favor ingrese un nombre.";
    } elseif(!filter_var($input_nombre, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/")))){
        $nombre_err = "Por favor ingrese un nombre válido.";
    } else {
        $nombre = $input_nombre;
    }

    $input_tipo = trim($_POST["Tipo"]);
    if(empty($input_tipo)){
        $tipo_err = "Por favor ingrese el tipo de habitación.";
    } elseif(!filter_var($input_tipo, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/")))){
        $tipo_err = "Por favor ingrese un tipo válido.";
    } else {
        $tipo = $input_tipo;
    }

    $input_mayordomo = trim($_POST["Mayordomo"]);
    if(empty($input_mayordomo)){
        $mayordomo_err = "Por favor ingrese el mayordomo.";
    } elseif(!filter_var($input_mayordomo, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/")))){
        $mayordomo_err = "Por favor ingrese un mayordomo válido.";
    } else {
        $mayordomo = $input_mayordomo;
    }

    $input_costo = trim($_POST["Costo"]);
    if(empty($input_costo)){
        $costo_err = "Por favor ingrese el costo.";
    } else {
        $costo = $input_costo;
    }

    if(empty($nombre_err) && empty($tipo_err) && empty($mayordomo_err) && empty($costo_err)){
        $sql = "UPDATE habitaciones SET Nombre=?, Tipo=?, Mayordomo=?, Costo=? WHERE idHabitacion=?";

        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "ssssi", $param_nombre, $param_tipo, $param_mayordomo, $param_costo, $param_id);
            $param_nombre = $nombre;
            $param_tipo = $tipo;
            $param_mayordomo = $mayordomo;
            $param_costo = $costo;
            $param_id = $id;

            if(mysqli_stmt_execute($stmt)){
                header("location: catalogo.php");
                exit();
            } else {
                echo "Algo salió mal :(";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
} else {
    if(isset($_GET["idHabitacion"]) && !empty(trim($_GET["idHabitacion"]))){
        $id = trim($_GET["idHabitacion"]);

        $sql = "SELECT * FROM habitaciones WHERE idHabitacion = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            $param_id = $id;

            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){
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
    } else {
        header("location: 404.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Registro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .container{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Actualizar Registro</h2>
                    </div>
                    <p>Edite los valores de entrada y env&iacute;e para actualizar el registro.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($nombre_err)) ? 'has-error' : ''; ?>">
                            <label>Nombre</label>
                            <input type="text" name="Nombre" class="form-control" value="<?php echo $nombre;?>">
                            <span class="help-block"><?php echo $nombre_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($tipo_err)) ? 'has-error' : ''; ?>">
                            <label>Tipo</label>
                            <input type="text" name="Tipo" class="form-control" value="<?php echo $tipo;?>">
                            <span class="help-block"><?php echo $tipo_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($mayordomo_err)) ? 'has-error' : ''; ?>">
                            <label>Mayordomo</label>
                            <input type="text" name="Mayordomo" class="form-control" value="<?php echo $mayordomo;?>">
                            <span class="help-block"><?php echo $mayordomo_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($costo_err)) ? 'has-error' : ''; ?>">
                            <label>Costo</label>
                            <input type="number" name="Costo" class="form-control" value="<?php echo $costo;?>">
                            <span class="help-block"><?php echo $costo_err;?></span>
                        </div>
                        <input type="hidden" name="idHabitacion" value="<?php echo $id;?>">
                        <input type="submit" class="btn btn-primary" value="Enviar">
                        <a href="catalogo.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>