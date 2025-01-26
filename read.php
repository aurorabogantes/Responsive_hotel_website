<?php
// Inicializar las variables con valores por defecto para evitar el uso de variables no definidas
$Usuario = $Nombre = $Apellido1 = $Apellido2 = $Correo = $Telefono = "";

if(isset($_GET["idUsuario"]) && !empty(trim($_GET["idUsuario"]))){
    require_once "conection.php";

    $sql="SELECT * FROM usuario WHERE idUsuario=?";
    if($stmt=mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt,"i",$param_idUsuario);
        $param_idUsuario=trim($_GET["idUsuario"]);
        if(mysqli_stmt_execute($stmt)){
            $result=mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result)==1){
                $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
                $Usuario=$row["Usuario"];
                $Nombre=$row["Nombre"];
                $Apellido1=$row["Apellido1"];
                $Apellido2=$row["Apellido2"];
                $Correo=$row["Correo"];
                $Telefono=$row["Telefono"];
            }else{
                header("location: 404.php");
                exit();
            }
        }else{
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
    <title>Listado usuarios</title>
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
                        <h1>Datos del usuario</h1>
                    </div>
                    <div class="form-group">
                        <label>Usuario</label>
                        <p class="form-control-static"><?php echo $Usuario;?></p>
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <p class="form-control-static"><?php echo $Nombre;?></p>
                    </div>
                    <div class="form-group">
                        <label>Apellido1</label>
                        <p class="form-control-static"><?php echo $Apellido1;?></p>
                    </div>
                    <div class="form-group">
                        <label>Apellido2</label>
                        <p class="form-control-static"><?php echo $Apellido2;?></p>
                    </div>
                    <div class="form-group">
                        <label>Correo</label>
                        <p class="form-control-static"><?php echo $Correo;?></p>
                    </div>
                    <div class="form-group">
                        <label>Telefono</label>
                        <p class="form-control-static"><?php echo $Telefono;?></p>
                    </div>
                    <div>
                        <p><a href="usuarios.php" class="btn btn-primary">Volver</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
