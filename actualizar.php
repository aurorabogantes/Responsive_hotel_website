<?php
require_once "conection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idReservas'], $_POST['Estado'])) {
    $idReservas = mysqli_real_escape_string($conn, $_POST['idReservas']);
    $Estado = mysqli_real_escape_string($conn, $_POST['Estado']);

    $sql = "UPDATE reservas SET Estado = '$Estado' WHERE idReservas = $idReservas";

    if (mysqli_query($conn, $sql)) {
        header("Location: reservaciones-admin.php?success=1");
    } else {
        echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    }
}
mysqli_close($conn);
?>
