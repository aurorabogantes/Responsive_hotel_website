<?php
include_once("header.html");
?>

<body>
    <?php
    include_once("menu.php");
    ?>

<?php
$conn = new mysqli('localhost', 'root', 'Ab83546392', 'usuarios');
if($conn->connect_error){
    die("Conexión fallida: ".$conn->connect_error);
}

$Usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$Contraseña = isset($_POST['password']) ? $_POST['password'] : '';

$sql = "SELECT Usuario, Contraseña FROM usuario WHERE Usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $Usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si el usuario y la contraseña son correctos
    if ($Usuario === 'administrador' && $Contraseña === 'admin123') {
        echo "Bienvenido, $Usuario.";
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error: Usuario o Contraseña incorrectos.";
    }
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario administrador</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style>
        body {
            background-color: #9fabc5;
            color: #ffffff;
        }
        .container {
            margin-top: 50px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .page-header h2 {
            color: #60543a;
        }
        .btn-primary {
            background-color: #60543a;
            border-color: #60543a;
        }
        .btn-primary:hover {
            background-color: #9fabc5;
            border-color: #9fabc5;
        }
        .form-group label {
            color: #60543a;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h2>Sección administrativa</h2>
        </div>
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Ingresar</button>
        </form>
    </div>

<?php
    include_once("footer.html");
    ?>
    </div>
</body>
</html>