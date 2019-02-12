<!DOCTYPE html>
<html >

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Design System for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  
  <title>Portal</title>

  <?php include_once '../segmentos/headPublico.php';  ?>
  
  
</head>

<body>

  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <?php include_once '../segmentos/headerPublico.php';  ?>
  
  <main>
     
      
      <!--contenido-->
    
      <?php include_once '../funcionesPublico/login.php'; ?>
      
      
      
      <?php include_once '../segmentos/footerPublico.php'; ?>
      
    
  </main>
  
  <!--footer-->
  
  <?php include_once '../segmentos/footerPublico.php'; ?>

  
  <!--core js-->
  
  
   <?php include_once '../segmentos/footerJs.php'; ?>


   <style>
    #map {
    widh: 50px;
    height: 600px; }
   </style>


   <script>

  var map = L.map('map').
  setView([41.66, -4.72],
  14);
  map.scrollWheelZoom.disable();


  L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
  	attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  var control = L.Routing.control({
  	waypoints: [
  		L.latLng(-30.602101, -71.197494),
  		L.latLng(-30.370477, -70.610299)
  	],
      routeWhileDragging: true,
      reverseWaypoints: true,
      showAlternatives: true,
      altLineOptions: {
          styles: [
              {color: 'black', opacity: 0.15, weight: 9},
              {color: 'white', opacity: 0.8, weight: 6},
              {color: 'blue', opacity: 0.5, weight: 2}
          ]
      }
  }).addTo(map);

  L.Routing.errorControl(control).addTo(map);

  L.Routing.Formatter = L.Class.extend({
  	options: {
  		language: 'sp'
  	}
  });

   </script>



</body>

</html>
