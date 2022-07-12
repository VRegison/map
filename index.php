<?php
include_once "./conexao.php";
?>

<html>

<head>
    <title>Mapa</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <style>
        #map {
            min-height: 100vh;
        }
    </style>
</head>

<body>
    <div>
        <div>
            <div>
                <?php


                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                    <?php
                       $enderecor[] =[ $row['lat'],$row['long']];
                    ?>
                    <?php
                 
                    $json = json_encode($enderecor);
                    ?>

                <?php endwhile ?>




                <div id="map"></div>
            </div>
        </div>
    </div>
    <script>
        var jsonJS = <?= $json ?> ;
        alert('nome: ' + jsonJS);
        var Enderecos = jsonJS.map((item) => {
            return item
        })

        var map = L.map('map').setView([-3.8408785, -38.5266749], 13);
        // console.log(latitude, longitude)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // L.marker(Enderecos).addTo(map)
        //     .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
        //     .openPopup();


        L.Routing.control({
            waypoints: Enderecos,
            lineOptions: {
                styles: [{
                    color: '#2e4ead',
                    opacity: 1,
                    weight: 5
                }]
            }
        }).addTo(map);
    </script>
</body>

</html>