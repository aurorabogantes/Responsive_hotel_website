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
        $sql = "INSERT INTO habitaciones(Nombre, Tipo, Mayordomo, Costo) VALUES (?,?,?,?)";

        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "ssss", $param_nombre, $param_tipo, $param_mayordomo, $param_costo);

            $param_nombre = $nombre;
            $param_tipo = $tipo;
            $param_mayordomo = $mayordomo;
            $param_costo = $costo;

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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agregar habitaci&oacute;n</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwKDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
                        <h2>Datos de la habitaci&oacute;n a agregar</h2>
                    </div>
                    <p>Por favor completar el formulario para agregar habitaci&oacute;n</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER["PHP_SELF"]));?>" method="post">
                        <div class="form-group <?php echo (!empty($nombre_err)) ? 'has-error' : '';?>">
                            <label>Nombre</label>
                            <input type="text" name="Nombre" class="form-control" value="<?php echo $nombre;?>">
                            <span class="help-block"><?php echo $nombre_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($tipo_err)) ? 'has-error' : '';?>">
                            <label>Tipo</label>
                            <input type="text" name="Tipo" class="form-control" value="<?php echo $tipo;?>">
                            <span class="help-block"><?php echo $tipo_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($mayordomo_err)) ? 'has-error' : '';?>">
                            <label>Mayordomo</label>
                            <input type="text" name="Mayordomo" class="form-control" value="<?php echo $mayordomo;?>">
                            <span class="help-block"><?php echo $mayordomo_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($costo_err)) ? 'has-error' : '';?>">
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