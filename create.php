<?php
require_once "conection.php";

$id = $usuario = $password = $nombre = $apellido1 = $apellido2 = $correo = $telefono = "";
$id_err = $usuario_err = $password_err = $nombre_err = $apellido1_err = $apellido2_err = $correo_err = $telefono_err = "";

if(isset($_POST["idUsuario"]) && !empty($_POST["idUsuario"])){
    $id = $_POST["idUsuario"];

    $input_id = trim($_POST["idUsuario"]);
    if(empty($input_id)){
        $id_err = "Por favor ingrese una identifiación.";
    } elseif(!filter_var($input_id, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^\d{9,15}$/")))){
        $id_err = "Por favor ingrese una identificación válida.";
    } else {
        $id = $input_id;
    }

    $input_usuario = trim($_POST["Usuario"]);
    if(empty($input_usuario)){
        $usuario_err = "Por favor ingrese un usuario.";
    } elseif(!filter_var($input_usuario, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-z0-9\s]+$/")))){
        $usuario_err = "Por favor ingrese un usuario válido.";
    } else {
        $usuario = $input_usuario;
    }

    $input_password = trim($_POST["Contraseña"]);
    if(empty($input_password)){
        $password_err = "Por favor ingrese una contraseña.";
    } else {
        $password = $input_password;
    }

    $input_nombre = trim($_POST["Nombre"]);
    if(empty($input_nombre)){
        $nombre_err = "Por favor ingrese un nombre.";
    } elseif(!filter_var($input_nombre, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/")))){
        $nombre_err = "Por favor ingrese un nombre válido.";
    } else {
         $nombre = $input_nombre;
    }

    $input_apellido1 = trim($_POST["Apellido1"]);
    if(empty($input_apellido1)){
        $apellido1_err = "Por favor ingrese su primer apellido.";
    } elseif(!filter_var($input_apellido1, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/")))){
        $apellido1_err = "Por favor ingrese un apellido válido.";
    } else {
        $apellido1 = $input_apellido1;
    }

    $input_apellido2 = trim($_POST["Apellido2"]);
    if(empty($input_apellido2)){
        $apellido2_err = "Por favor ingrese su segundo apellido.";
    } elseif(!filter_var($input_apellido2, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/")))){
        $apellido2_err = "Por favor ingrese un apellido válido.";
    } else {
        $apellido2 = $input_apellido2;
    }

    $input_correo = trim($_POST["Correo"]);
    if(empty($input_correo)){
        $correo_err = "Por favor ingrese un correo.";
    } elseif(!filter_var($input_correo, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/")))){
        $correo_err = "Por favor ingrese un correo válido.";
    } else {
        $correo = $input_correo;
    }

    $input_telefono = trim($_POST["Telefono"]);
    if(empty($input_telefono)){
        $telefono_err = "Por favor ingrese un número de teléfono.";
    } elseif(!filter_var($input_telefono, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^\d{8}$/")))){
        $telefono_err = "Por favor ingrese un número de teléfono válido.";
    } else {
        $telefono = $input_telefono;
    }

    if(empty($id_err) && empty($usuario_err) && empty($password_err) && empty($nombre_err) && empty($apellido1_err) && empty($apellido2_err) && empty($correo_err) && empty($telefono_err)){
        $sql = "INSERT INTO usuario(idUsuario, Usuario, Contraseña, Nombre, Apellido1, Apellido2, Correo, Telefono) VALUES (?,?,?,?,?,?,?,?)";

        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "isssssss", $param_id, $param_usuario, $param_password, $param_nombre, $param_apellido1, $param_apellido2, $param_correo, $param_telefono);

            $param_id = $id;
            $param_usuario = $usuario;
            $param_password = $password;
            $param_nombre = $nombre;
            $param_apellido1 = $apellido1;
            $param_apellido2 = $apellido2;
            $param_correo = $correo;
            $param_telefono = $telefono;

            if(mysqli_stmt_execute($stmt)){
                header("location: usuarios.php");
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
    <title>Agregar usuario</title>
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
                        <h2>Datos del usuario a agregar</h2>
                    </div>
                    <p>Por favor completar el formulario para agregar usuario</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER["PHP_SELF"]));?>" method="post">
                        <div class="form-group <?php echo (!empty($id_err)) ? 'has-error' : '';?>">
                            <label>C&eacute;dula</label>
                            <input type="number" name="idUsuario" class="form-control" value="<?php echo $id;?>">
                            <span class="help-block"><?php echo $id_err;?></span>
                        </div>
                        <div class="form-group" <?php echo (!empty($usuario_err)) ? 'has-error' : '';?>>
                            <label>Usuario</label>
                            <input type="text" name="Usuario" class="form-control" value="<?php echo $usuario;?>">
                            <span class="help-block"><?php echo $usuario_err;?></span>
                        </div>
                        <div class="form-group" <?php echo (!empty($password_err)) ? 'has-error' : '';?>>
                            <label>Contrase&ntilde;a</label>
                            <input type="password" name="Contraseña" class="form-control" value="<?php echo $password;?>">
                            <span class="help-block"><?php echo $password_err;?></span>
                        </div>
                        <div class="form-group" <?php echo (!empty($nombre_err)) ? 'has-error' : '';?>>
                            <label>Nombre</label>
                            <input type="text" name="Nombre" class="form-control" value="<?php echo $nombre;?>">
                            <span class="help-block"><?php echo $nombre_err;?></span>
                        </div>
                        <div class="form-group" <?php echo (!empty($apellido1_err)) ? 'has-error' : '';?>>
                            <label>Primer apellido</label>
                            <input type="text" name="Apellido1" class="form-control" value="<?php echo $apellido1;?>">
                            <span class="help-block"><?php echo $apellido1_err;?></span>
                        </div>
                        <div class="form-group" <?php echo (!empty($apellido2_err)) ? 'has-error' : '';?>>
                            <label>Segundo apellido</label>
                            <input type="text" name="Apellido2" class="form-control" value="<?php echo $apellido2;?>">
                            <span class="help-block"><?php echo $apellido2_err;?></span>
                        </div>
                        <div class="form-group" <?php echo (!empty($correo_err)) ? 'has-error' : '';?>>
                            <label>Correo</label>
                            <input type="email" name="Correo" class="form-control" value="<?php echo $correo;?>">
                            <span class="help-block"><?php echo $correo_err;?></span>
                        </div>
                        <div class="form-group" <?php echo (!empty($telefono_err)) ? 'has-error' : '';?>>
                            <label>Tel&eacute;fono</label>
                            <input type="number" name="Telefono" class="form-control" value="<?php echo $telefono;?>">
                            <span class="help-block"><?php echo $telefono_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Enviar">
                        <a href="usuarios.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>