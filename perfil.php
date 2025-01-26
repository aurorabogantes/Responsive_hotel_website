<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: inicio_sesion.php");
    exit();
}

$conn = new mysqli('localhost', 'root', 'Ab83546392', 'usuarios');
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Usuario = $_POST['usuario'];
    $Nombre = $_POST['nombre'];
    $Apellido1 = $_POST['apellido1'];
    $Apellido2 = $_POST['apellido2'];
    $Correo = $_POST['correo'];
    $Telefono = $_POST['telefono'];

    $sql = "UPDATE usuario SET Usuario = ?, Nombre = ?, Apellido1 = ?, Apellido2 = ?, Correo = ?, Telefono = ? WHERE idUsuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssi', $Usuario, $Nombre, $Apellido1, $Apellido2, $Correo, $Telefono, $_SESSION['id']);

    if ($stmt->execute()) {
        echo "Información actualizada con éxito.";
    } else {
        echo "Error al actualizar la información: " . $stmt->error;
    }

    $stmt->close();
}

$sql = "SELECT * FROM usuario WHERE idUsuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$result = $stmt->get_result();
$Usuario = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perfil de Usuario</title>
</head>
<body>
<   h1>Perfil de Usuario</h1>
    <form method="POST" action="perfil.php">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" value="<?php echo htmlspecialchars($Usuario['usuario']); ?>" required><br>

        <label for="contraseña">Contraseña:</label>
        <input type="text" name="contraseña" value="<?php echo htmlspecialchars($Usuario['password']); ?>" required><br>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($Usuario['nombre']); ?>" required><br>
        
        <label for="apellido1">Primer Apellido:</label>
        <input type="text" name="apellido1" value="<?php echo htmlspecialchars($Usuario['apellido1']); ?>" required><br>
        
        <label for="apellido2">Segundo Apellido:</label>
        <input type="text" name="apellido2" value="<?php echo htmlspecialchars($Usuario['apellido2']); ?>" required><br>
        
        <label for="correo">Correo Electrónico:</label>
        <input type="email" name="correo" value="<?php echo htmlspecialchars($Usuario['correo']); ?>" required><br>
        
        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" value="<?php echo htmlspecialchars($Usuario['telefono']); ?>" required><br>
        
        <button type="submit">Actualizar Información</button>
    </form>
</body>
</html>