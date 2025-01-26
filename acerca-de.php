<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenidos</title>
</head>
<body>
    <?php include_once("header.html"); ?>

    <nav>
        <?php include_once("menu.php"); ?>
    </nav>

    <!-------------------------contenido--------------------------------->
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <div class="card">
                    <h3 class="card-title">Misi&oacute;n</h3>
                    <p class="card-text">Brindar experiencias memorables a nuestros hu&eacute;spedes, ofreciendo un servicio de excelencia y hospitalidad personalizada en un entorno acogedor. Nos comprometemos a superar las expectativas, creando un espacio donde la comodidad y el bienestar sean nuestra prioridad, y cada visita se convierta en una estancia inolvidable.</p>
                </div>
            </div>
            <div class="col-sm">
                <div class="card">
                    <h3 class="card-title">Valores</h3>
                    <ul class="card-text">
                        <li><strong>Calidad: </strong>compromiso con la excelencia en cada detalle, asegurando que nuestros servicios superen las expectativas de los hu&eacute;spedes.</li>
                        <li><strong>Hospitalidad: </strong>fomentar un ambiente c&aacute;lido y acogedor, tratando a cada cliente con respeto, cortes&iacute;a y atenci&oacute;n personalizada.</li>
                        <li><strong>Integridad: </strong>actuar con transparencia y &eacute;tica en todas nuestras interacciones, garantizando la confianza y lealtad de nuestros clientes y empleados.</li>
                        <li><strong>Innovaci&oacute;n: </strong>buscar constantemente nuevas formas de mejorar la experiencia del hu&eacute;sped y optimizar nuestros servicios.</li>
                        <li><strong>Responsabilidad: </strong>cuidar el medio ambiente y la comunidad local, promoviendo pr&aacute;cticas sostenibles y responsables en todas nuestras operaciones.</li>
                    </ul>
                </div>
            </div>
            <div class="col-sm">
                <div class="card">
                    <h3 class="card-title">Visi&oacute;n</h3>
                    <p class="card-text">Ser reconocidos como el l&iacute;der en la industria de la hospitalidad, distinguidos por nuestra atenci&oacute;n al detalle, innovaci&oacute;n en servicios y un compromiso constante con la calidad. Aspiramos a ser la primera opci&oacute;n para viajeros, ofreciendo un refugio que combina el lujo con un servicio c&aacute;lido y aut&eacute;ntico, en un entorno que promueve el descanso y la satisfacci&oacute;n total del cliente.</p>
                </div>
            </div>
        </div>
    </div>
    <!---------------------------------------------------------------------------------->
    <?php
    include_once("footer.html");
    ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            font-size: 1.5rem;
            color: #60543a;
            margin-bottom: 15px;
        }

        .card-text {
            font-size: 1rem;
            line-height: 1.6;
            color: #555;
        }

        .row {
            display: flex;
            justify-content: space-between;
            gap: 30px;
        }

        .col-sm {
            flex: 1;
            min-width: 280px;
        }

        ul.card-text {
            list-style-type: none;
            padding-left: 0;
        }

        ul.card-text li {
            margin-bottom: 10px;
        }

        ul.card-text li strong {
            color: #60543a;
        }

        h3 {
            font-size: 1.8rem;
            font-weight: bold;
            color: #60543a;
            margin-bottom: 10px;
        }

        .container {
            margin-top: 40px;
        }

        nav {
            margin-bottom: 20px;

        }footer {
            max-width: 1200px;
            margin: 0 auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 10px;
        }

        footer a {
            color: white;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
    </div>
</body>
</html>