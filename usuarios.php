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
            background-color: #9FABC5;
            color: #60543A;
        }

        .container {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .page-header {
            border-bottom: 2px solid #60543A;
        }

        .btn-success {
            background-color: #60543A;
            border-color: #60543A;
        }

        .btn-success:hover {
            background-color: #9FABC5;
            border-color: #9FABC5;
            color: #60543A;
        }

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
        }

        .btn-volver:hover {
            background-color: #9fabc5;
            color: #60543A;
        }

        table {
            background-color: #fff;
        }

        th {
            background-color: #60543A;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #d9d9d9;
        }

        a {
            color: #60543A;
        }

        a:hover {
            color: #9FABC5;
        }

        footer{
            color: #fff;
        }

        footer a {
            color: white;
        }

        footer a:hover {
            color: #9fabc5;
        }
    </style>

    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-med-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Usuarios</h2>
                        <a href="create.php" class="btn btn-success pull-right">Agregar Nuevo Usuario</a>
                    </div>
                    <?php
                    require_once "conection.php";
                    $sql="SELECT * FROM usuario";
                    if($result=mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result)>0){
                            echo "<table class='table table-bordered table-striped'>";
                            echo "<thead>";
                                echo "<tr>";
                                    echo "<th>#</th>";
                                    echo "<th>Usuario</th>";
                                    echo "<th>Nombre</th>";
                                    echo "<th>Apellido1</th>";
                                    echo "<th>Apellido2</th>";
                                    echo "<th>Correo</th>";
                                    echo "<th>Telefono</th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while($row=mysqli_fetch_array($result)){
                                echo "<tr>";
                                    echo "<td>".$row['idUsuario']."</td>";
                                    echo "<td>".$row['Usuario']."</td>";
                                    echo "<td>".$row['Nombre']."</td>";
                                    echo "<td>".$row['Apellido1']."</td>";
                                    echo "<td>".$row['Apellido2']."</td>";
                                    echo "<td>".$row['Correo']."</td>";
                                    echo "<td>".$row['Telefono']."</td>";
                                    echo "<td>";
                                    echo "<a href='read.php?idUsuario=".$row['idUsuario']."' title='Ver' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                    echo "<a href='update.php?idUsuario=".$row['idUsuario']."' title='Editar' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                    echo "<a href='delete.php?idUsuario=".$row['idUsuario']."' title='Eliminar' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                    echo "</td>";

                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            mysqli_free_result($result);
                        }else{
                            echo "<p class='lead'>No se encontraron registros</p>";
                        }
                    }else{
                        echo  "Error: no se puede ejecutar el $sql".mysqli_error($conn);
                    }
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-container">
        <div>
            <a href="dashboard.php" class="btn btn-volver">Volver</a>
        </div>
    </div>
    <?php
    include_once("footer.html");
    ?>
</body>
</html>