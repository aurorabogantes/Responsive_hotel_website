<?php
ob_start();
ini_set('display_errors', 0);
error_reporting(0);

require('dompdf/autoload.inc.php');
require('conection.php');

// Consulta a la base de datos
$query = "SELECT idReservas, CONCAT(Nombre, ' ', Apellido1, ' ', Apellido2) AS Cliente, 
                 Habitación, Fecha_ingreso, Fecha_salida, Estado, 
                 DATEDIFF(Fecha_ingreso, NOW()) AS DiasFaltantes
          FROM reservas
          WHERE Estado IN ('Pendiente', 'Realizada')
          ORDER BY Fecha_ingreso ASC";
$result = $conn->query($query);
$reservas = $result->fetch_all(MYSQLI_ASSOC);

// Crear el contenido HTML para el PDF
$html = '<h2>Historial de Reservaciones</h2>';
$html .= '<table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Cliente</th>
                    <th>Habitación</th>
                    <th>Ingreso</th>
                    <th>Salida</th>
                    <th>Estado</th>
                    <th>Días</th>
                </tr>
            </thead>
            <tbody>';

foreach ($reservas as $reserva) {
    $dias = $reserva['Estado'] == 'Pendiente' ? $reserva['DiasFaltantes'] : '-';
    $html .= '<tr>
                <td>' . $reserva['idReservas'] . '</td>
                <td>' . $reserva['Cliente'] . '</td>
                <td>' . $reserva['Habitación'] . '</td>
                <td>' . $reserva['Fecha_ingreso'] . '</td>
                <td>' . $reserva['Fecha_salida'] . '</td>
                <td>' . $reserva['Estado'] . '</td>
                <td>' . $dias . '</td>
              </tr>';
}

$html .= '</tbody></table>';

// Iniciar DOMPDF
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$dompdf = new Dompdf($options);

// Cargar el contenido HTML
$dompdf->loadHtml($html);

// (Opcional) Configurar tamaño de la página
$dompdf->setPaper('A4', 'portrait');

// Renderizar el PDF
$dompdf->render();

// Forzar la descarga del archivo PDF
$dompdf->stream('historial.pdf', array('Attachment' => 1));

?>
