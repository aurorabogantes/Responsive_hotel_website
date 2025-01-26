<?php
$conn = new mysqli('localhost', 'root', 'Ab83546392', 'usuarios');
if($conn->connect_error){
    die("Conexión fallida: ".$conn->connect_error);
}

$idUsuario = $_POST['id'];
$Usuario = $_POST['usuario'];
$Contraseña = $_POST['password'];
$Nombre = $_POST['nombre'];
$Apellido1 = $_POST['apellido1'];
$Apellido2 = $_POST['apellido2'];
$Correo = $_POST['correo'];
$Telefono = $_POST['telefono'];

//verificar si el usuario ya existe
$sql = "SELECT * FROM usuario WHERE idUsuario = ? OR Usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $id, $usuario);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    echo "Error: El id o usuario ya existe.";
} else {
    $sql = "INSERT INTO usuario (idUsuario, Usuario, Contraseña, Nombre, Apellido1, Apellido2, Correo, Telefono)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('isssssss', $idUsuario, $Usuario, $Contraseña, $Nombre, $Apellido1, $Apellido2, $Correo, $Telefono);

    if($stmt->execute()){
        echo "Usuario registrado con éxito.";
        ?>
        <p>Regresa a la <a href="index.php" class="btn">p&aacute;gina de inicio</a></p>
        <?php
    } else {
        echo "Error al registrar el usuario: ". $stmt->error;
    }
}
$stmt->close();
$conn->close();
?>