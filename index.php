<?php
include_once("header.html");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Bitsú</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
        }

        h1, h2, h3 {
            color: #60543a;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            color: #333;
        }

        .bg-light {
            background-color: #9fabc5;
            padding: 40px 20px;
            border-radius: 10px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 40px;
        }

        .col {
            flex: 1;
            min-width: 250px;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        a {
            text-decoration: none;
            color: #60543a;
        }

        a:hover {
            color: #9fabc5;
        }

        button {
            background-color: #60543a;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #9fabc5;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 10px;
        }

        blockquote {
            border-left: 4px solid #60543a;
            padding-left: 20px;
            font-style: italic;
            color: #555;
            margin: 20px 0;
        }

        footer {
            background-color: #60543a;
            color: white;
            text-align: center;
            padding: 5px 0;
            width: 100%;
            max-width: 100%;
            margin-top: 40px;
            border-top: 2px solid #9fabc5;
        }

        footer a {
            color: white;
        }

        footer a:hover {
            color: #9fabc5;
        }
    </style>
</head>
<body>
    <div class="container bg-light">
    <?php
    include_once("banner.html");
    ?>

    <hr>

    <?php
    include_once("menu.php");
    ?>

    <!-------------------------contenido--------------------------------->
    <div class="row">
            <div class="col">
                <h2>Informaci&oacute;n</h2>
                <p>Hotel Bits&uacute; es un elegante hotel dise&ntilde;ado para ofrecer una experiencia &uacute;nica a sus hu&eacute;spedes,
                    combinando modernidad y comodidad con un toque de exclusividad.
                </p>
            </div>
            <div class="col">
                <h2>Ubicaci&oacute;n</h2>
                <p>Situado en un destino tur&iacute;stico privilegiado, cerca de playas de arena blanca y monta&ntilde;as impresionantes.</p>
            </div>
            <div class="col">
                <h2>Concepto y estilo</h2>
                <p>El Hotel Bits&uacute; mezcla dise&ntilde;o contempor&aacute;neo con elementos de lujo sostenible. Su arquitectura
                    presenta l&iacute;neas limpias, materiales reciclables y tecnolog&iacute;as de bajo consumo energ&eacute;tico. La decoraci&oacute;n 
                    interior incluye obras de arte modernas y detalles inspirados en la cultura local.
                </p>
            </div>
            <div class="row">
                <div class="col">
                    <h2>Instalaciones y servicios</h2>
                    <ul>
                        <li><strong>Habitaciones: </strong>desde suites premium con vistas panor&aacute;micas hasta habitaciones est&aacute;ndar
                        equipadas con tecnolog&iacute;a de punta, como control de iluminaci&oacute;n inteligente y sistemas de entretenimiento 
                        personalizados.</li>
                        <li><strong>Gastronom&iacute;a: </strong>restaurantes y bares que ofrecen men&uacute;s elaborados con ingredientes 
                        frescos de origen local, incluyendo opciones gourmet, vegetarianas y veganas.</li>
                        <li><strong>Spa y bienestar: </strong>un spa de lujo con tratamientos relajantes, saunas y &aacute;reas de meditaci&oacute;n.</li>
                        <li><strong>Centro de negocios: </strong>espacios modernos para reuniones y eventos con equipo audiovisual avanzado.</li>
                        <li><strong>Piscina y &aacute;reas de recreo: </strong>piscina infinita, gimnasio de &uacute;ltima generaci&oacute;n
                        y actividades al aire libre como yoga y deportes acu&aacute;ticos.</li>
                        <li><strong>Conectividad: </strong>Wi-Fi de alta velocidad y soporte t&eacute;cnico disponible 24/7.</li>
                    </ul>
                </div>
                <div class="col">
                <h2>Compromiso con la sostenibilidad</h2>
                <p>Hotel Bits&uacute; es ecol&oacute;gico, con paneles solares, programas de reciclaje, y uso eficiente
                    del agua. Adem&aacute;s, colabora con la comunidad local para impulsar el desarrollo sostenible.
                </p>
            </div>
            </div>
            <div class="col">
                <h2>Experiencias &uacute;nicas</h2>
                <p>El hotel ofrece experiencias personalizadas como recorridos culturales, talleres de cocina tradicional 
                    y actividades para toda la familia.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3>Ana L&oacute;pez - Empresaria</h3>
                <p>"Mi estad&iacute;a en el Hotel Bits&uacute; fue inolvidable. La atenci&oacute;n del personal 
                    es impecable, y las instalaciones est&aacute;n dise&ntilde;adas para brindar m&aacute;ximo confort. La piscina infinita
                    es simplemente espectacular, especialmente al atardecer. Sin duda, volver&eacute; en mi pr&oacute;ximo viaje de negocios."</p>
            </div>
            <div class="col">
                <h3>Jorge M&eacute;ndez y Carla P&eacute;rez - Luna de miel</h3>
                <p>"Elegimos el Hotel Bits&uacute; para nuestra luna de miel, y fue la mejor decisi&oacute;n. Desde
                    la decoraci&oacute;n de nuestra suite hasta la cena personalizada frente al mar, todo fue perfecto. Nos sentimos como 
                    en un sue&ntilde;o. Gracias por hacer esta experiencia tan especial."</p>
            </div>
            <div class="col">
                <h3>Sof&iacute;a Torres - Aventurera</h3>
                <p>"Soy amante de los viajes y he estado en muchos hoteles, pero el Hotel Bits&uacute;
                    destaca por su compromiso con la sostenibilidad y el respeto por la comunidad local. Particip&eacute; en una
                    excursi&oacute;n organizada por el hotel y aprend&iacute; mucho sobre la cultura de la regi&oacute;n. ¡Es
                    un lugar que combina lujo y conciencia ambiental!"</p>
            </div>
            <div class="col">
                <h3>Familia G&oacute;mez</h3>
                <p>"El Hotel Bits&uacute; es ideal para familias. Nuestros hijos disfrutaron much&iacute;simo
                    en las actividades recreativas y el personal siempre estuvo atento a nuestras necesidades. Adem&aacute;s, el 
                    restaurante tiene un men&uacute; delicioso y opciones para todos los gustos. Nos llevamos recuerdos inolvidables."</p>
            </div>
            <div class="col">
                <h3>Ra&uacute;l Mart&iacute;nez</h3>
                <p>"Como fot&oacute;grafo busco lugares que me inspiren, y el Hotel Bits&uacute;
                    super&oacute; mis expectativas. La arquitectura, los paisajes y la luz natural crean escenarios perfectos
                    para capturar momentos m&aacute;gicos. Es un para&iacute;so tanto para descansar como para trabajar."</p>
            </div>
        </div>
    <!---------------------------------------------------------------------------------->
    <?php
    include_once("footer.html");
    ?>
    </div>
</body>
</html>