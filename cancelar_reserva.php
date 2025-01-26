<?php
require('conection.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "UPDATE reservas SET Estado = 'Cancelada' WHERE idReservas = ?";
    $stmt = $conn->prepare($query);

    if($stmt){
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "Error al preparar la consulta.";
    }
} else {
    echo "ID no proporcionado.";
}

header("Location: historial.php");
exit;
?>