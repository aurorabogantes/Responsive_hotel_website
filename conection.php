<?php
$servername='localhost';
$database='usuarios';
$username='root';
$password='Ab83546392';
$conn=mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    die("Conexión falló:".mysqli_connect_error());
}else
    echo "Conectamos con éxito";
//mysqli_close($conn);
?>