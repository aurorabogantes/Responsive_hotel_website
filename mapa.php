<?php
include_once("header.html");
?>

<body>
    <?php
    include_once("menu.php");
    ?>

    <!-------------------------contenido--------------------------------->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Mapa con Google Maps</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #9fabc5;
                color: #fff;
                margin: 0;
                padding: 0;
            }
            
            h1 {
                text-align: center;
                font-size: 3rem;
                color: #60543a;
            }

            #map {
                height: 500px;
                width: 80%;
                margin: 20px auto;
                border: 3px solid #60543a;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }

            .container {
                display: flex;
                justify-content: center;
                flex-direction: column;
                align-items: center;
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <h1>Ubicaci&oacute;n del hotel</h1>
        <div id="map"></div>
        <script>
            function initMap(){
                var coord = {lat: 10.287878545961105, lng: -85.85054015875718};
                var map = new google.maps.Map(document.getElementById('map'),{
                    zoom: 10,
                    center: coord
                });
                var marker = new google.maps.Marker({
                    position: coord,
                    map: map
                });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=initMap"></script>
    <!---------------------------------------------------------------------------------->
    <?php
    include_once("footer.html");
    ?>
    </div>
</body>
</html>