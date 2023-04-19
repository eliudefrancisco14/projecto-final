<script>

function setParking(map)
{
   var pointA = { lat: -16.113700, lng: -45.825545 };
   var pointB = { lat: -15.284216, lng: -44.658747 };
   var poinC = { lat: -16.139567, lng: -43.236152 };
   
   setMap(map, pointA);
   setMap(map, pointB);
   setMap(map, poinC);
}

function setParkingMap(map, point)
        {
                var contentString = '<div id="content">'+
                    '<div id="siteNotice">'+
                    '</div>'+
                    '<h1 id="firstHeading" class="firstHeading">Loja Cascais</h1>' +
                    '<div id="bodyContent">'+
                    '<p><b>Morada:</b> Teste' +
                    '<p><b>Horário:</b> Teste 2 ' +
                    '</div>' +
                    '<button onclick="">Obter indicações</button>'
                '</div>';

                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });

                var marker = new google.maps.Marker({
                    position: point,
                    map: map,
                    title: 'Teste'
                });
                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                });
        }

function initMap() {
var mapOptions = {
            zoom: 15, center: new google.maps.LatLng(38.696029, -9.424029)
        }

        map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

setParking(map)
}

  jQuery(document).ready(function () {
        initMap();
    });

</script>

<!-- Rotas  
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rota entre dois pontos</title>
  </head>
  <body>
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <div style="padding: 10px 0 0; clear: both">
      <iframe width="750" scrolling="no" height="350" frameborder="0" id="map" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?saddr=-23.5496447,-46.6339021&daddr=-23.5570003,-46.6612482&output=embed"></iframe>
    </div>
</html>
-->