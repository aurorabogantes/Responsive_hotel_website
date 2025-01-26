<?php
$conn = new mysqli('localhost', 'root', 'Ab83546392', 'usuarios');
if($conn->connect_error){
    die("Conexión fallida: ".$conn->connect_error);
}

$Usuario = $_POST['usuario'];
$Contraseña = $_POST['password'];

$sql = "SELECT Usuario, Contraseña FROM usuario WHERE Usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $Usuario);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    $row = $result->fetch_assoc();

    if(password_verify($Contraseña, $row['Contraseña'])){
        echo "Bienvenido, $Usuario.";
        header("Location: reservaciones.php");
        exit();
    } else {
        echo "Error: Contraseña incorrecta.";
    }
} else {
    echo "Error: El usuario no existe.";
}

$stmt->close();
$conn->close();
?>