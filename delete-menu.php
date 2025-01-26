<?php
if(isset($_POST["idHabitacion"]) && !empty($_POST["idHabitacion"])){
    require_once "conection.php";

    $sql = "DELETE FROM habitaciones WHERE idHabitacion=?";
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_POST["idHabitacion"]);

        if(mysqli_stmt_execute($stmt)){
            header("location: catalogo.php");
        } else {
            header("location: 404.php");
            exit();
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
    <title>Eliminar una habitaci&oacute;n</title>
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
                        <h2>Borrar habitaci&oacute;n</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                        <div class="alert alert-danger fade in">
                            <label>Nombre</label>
                            <input type="hidden" name="idHabitacion" value="<?php echo trim($_GET["idHabitacion"]);?>">
                            <p>¿Est&aacute; seguro que desea borrar el registro?</p>
                        </div>
                        <input type="submit" class="btn btn-danger" value="Si">
                        <a href="catalogo.php" class="btn btn-default">No</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>