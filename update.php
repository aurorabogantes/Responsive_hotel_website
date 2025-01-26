<?php
require_once "conection.php";

$usuario = $contraseña= $nombre = $apellido1 = $apellido2 = $correo = $telefono = "";
$usuario_err = $contraseña_err= $nombre_err = $apellido1_err = $apellido2_err = $correo_err = $telefono_err = "";
 
// se revisan datos recibidos.
//isset comprueba que no es null y que no es vacia
if(isset($_POST["idUsuario"]) && !empty($_POST["idUsuario"])){
    // Get hidden input value
    $idUsuario = $_POST["idUsuario"];
    
    // Validamos name
    $input_usuario = trim($_POST["Usuario"]);
    if(empty($input_usuario)){
        $usuario_err = "Por favor ingrese un usuario.";
    } elseif(!filter_var($input_usuario, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-z0-9\s]+$/")))){
        $usuario_err = "Por favor ingrese un nombre válido.";
    } else{
        $usuario = $input_usuario;
    }

    $input_contraseña = trim($_POST["Contraseña"]);
    if(empty($input_contraseña)){
        $contraseña_err = "Por favor ingrese una contraseña.";
    } else{
        $contraseña = $input_contraseña;
    }
    
    // Validamos puesto
    $input_nombre = trim($_POST["Nombre"]);
    if(empty($input_nombre)){
        $nombre_err = "Por favor digite un nombre";     
    } elseif(!filter_var($input_nombre, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/")))){
        $nombre_err = "Por favor ingrese un nombre válido.";
    }else{
        $nombre = $input_nombre;
    }

    $input_apellido1 = trim($_POST["Apellido1"]);
    if(empty($input_apellido1)){
        $apellido1_err = "Por favor digite un apellido";     
    } elseif(!filter_var($input_apellido1, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/")))){
        $apellido1_err = "Por favor ingrese un apellido válido.";
    }else{
        $apellido1 = $input_apellido1;
    }

    $input_apellido2 = trim($_POST["Apellido2"]);
    if(empty($input_apellido2)){
        $apellido2_err = "Por favor digite un apellido";     
    } elseif(!filter_var($input_apellido2, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/")))){
        $apellido2_err = "Por favor ingrese un apellido válido.";
    }else{
        $apellido2 = $input_apellido2;
    }

    $input_correo = trim($_POST["Correo"]);
    if(empty($input_correo)){
        $correo_err = "Por favor digite un correo";     
    } elseif(!filter_var($input_correo, FILTER_VALIDATE_EMAIL, array("options"=>array("regexp"=>"/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/")))){
        $correo_err = "Por favor ingrese un correo válido.";
    }else{
        $correo = $input_correo;
    }

    $input_telefono = trim($_POST["Telefono"]);
    if(empty($input_telefono)){
        $telefono_err = "Por favor digite un telefono";     
    } elseif(!filter_var($input_telefono, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^\d{8}$/")))){
        $telefono_err = "Por favor ingrese un telefono válido.";
    }else{
        $telefono = $input_telefono;
    }

    if(empty($usuario_err) && empty($contraseña_err) && empty($nombre_err) && empty($apellido1_err) && empty($apellido2_err) && empty($correo_err) && empty($telefono_err)){
        $sql = "UPDATE usuario SET Usuario=?, Contraseña=?, Nombre=?, Apellido1=?, Apellido2=?, Correo=?, Telefono=? WHERE idUsuario=?";

        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "sssssssi", $param_usuario, $param_contraseña, $param_nombre, $param_apellido1, $param_apellido2, $param_correo, $param_telefono, $param_id);
            $param_usuario = $usuario;
            $param_contraseña = $contraseña;
            $param_nombre = $nombre;
            $param_apellido1= $apellido1;
            $param_apellido2 = $apellido2;
            $param_correo = $correo;
            $param_telefono = $telefono;
            $param_id = $idUsuario;

            if(mysqli_stmt_execute($stmt)){
                header("location: update-usuario.php");
                exit();
            } else {
                echo "Algo salió mal :(";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
} else {
    if(isset($_GET["idUsuario"]) && !empty(trim($_GET["idUsuario"]))){
        $idUsuario = trim($_GET["idUsuario"]);

        $sql = "SELECT * FROM usuario WHERE idUsuario = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $param_idUsuario);
            $param_idUsuario = $idUsuario;

            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    $usuario = $row["Usuario"];
                    $contraseña = $row["Contraseña"];
                    $nombre = $row["Nombre"];
                    $apellido1 = $row["Apellido1"];
                    $apellido2 = $row["Apellido2"];
                    $correo = $row["Correo"];
                    $telefono = $row["Telefono"];
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
                    <p>Edite los valores de entrada y envíe para actualizar el registro.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group <?php echo (!empty($usuario_err)) ? 'has-error' : ''; ?>">
                            <label>Usuario</label>
                            <input type="text" name="Usuario" class="form-control" value="<?php echo $usuario; ?>">
                            <span class="help-block"><?php echo $usuario_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($contraseña_err)) ? 'has-error' : ''; ?>">
                            <label>Contraseña</label>
                            <input type="password" name="Contraseña"  class="form-control" value="<?php echo $contraseña; ?>">
                            <span class="help-block"><?php echo $contraseña_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($nombre_err)) ? 'has-error' : ''; ?>">
                            <label>Nombre</label>
                            <input type="text" name="Nombre" class="form-control" value="<?php echo $nombre; ?>">
                            <span class="help-block"><?php echo $nombre_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($apellido1_err)) ? 'has-error' : ''; ?>">
                            <label>Primer apellido</label>
                            <input type="text" name="Apellido1" class="form-control" value="<?php echo $apellido1; ?>">
                            <span class="help-block"><?php echo $apellido1_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($apellido2_err)) ? 'has-error' : ''; ?>">
                            <label>Segundo apellido</label>
                            <input type="text" name="Apellido2" class="form-control" value="<?php echo $apellido2; ?>">
                            <span class="help-block"><?php echo $apellido2_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($correo_err)) ? 'has-error' : ''; ?>">
                            <label>Correo</label>
                            <input type="mail" name="Correo" class="form-control" value="<?php echo $correo; ?>">
                            <span class="help-block"><?php echo $correo_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($telefono_err)) ? 'has-error' : ''; ?>">
                            <label>Telefono</label>
                            <input type="number" name="Telefono" class="form-control" value="<?php echo $telefono; ?>">
                            <span class="help-block"><?php echo $telefono_err;?></span>
                        </div>
                        <input type="hidden" name="idUsuario" value="<?php echo $idUsuario;?>">
                        <input type="submit" class="btn btn-primary" value="Enviar">
                        <a href="usuarios.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>