<!doctype html5>
<html lang="pt">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
     <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
   integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
   crossorigin=""></script>
    <title>Projeto Dandara</title>
  </head>
  <body>
    <div class="row container form-and-map">
      <div class="col-sm-12 col-lg-5">
          <div id="mapid"></div>
      </div>

    <script>
      var mymap = L.map('mapid').setView([-23.5489, -46.6388], 4);
      L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1Ijoicm9taXMwNSIsImEiOiJjandzYjRsd3cwNmR4NGFtcTllaTczZXhlIn0.KL_TDmmdHqBm5lFV9MF5dw', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'your.mapbox.access.token'
}).addTo(mymap);



     var greenIcon = L.icon({
    iconUrl: 'img/leaf-green.png',
    shadowUrl: 'img/leaf-shadow.png',

    iconSize:     [38, 95], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});
     fetch('http://localhost/DandaraProject/api.php')
        .then(function(response) {
           return response.json()
          
        })
        .then(data => {

          data.forEach(dados=> {
            let lat = dados.latitude
            let long = dados.longitude
            let relato = dados.relato
            L.marker([lat, long], {icon: greenIcon}).addTo(mymap).bindPopup(relato);;
          })

        

        })
      
   

    


    </script>


    <div class="col-sm-12 col-lg-5 ml-auto">
    <form action="relato.php" method="post">

      <script type="text/javascript">
        navigator.geolocation.getCurrentPosition(function(position) {
                var lat = position.coords.latitude
                var long = position.coords.longitude
                
                document.getElementById('latitude').value = lat

                 document.getElementById('longitude').value = long

                
});
      </script>


        <div class="form-group">
          <label class="white-title" for="nome">Nome</label>
          <input type="text" name="nome" class="form-control"   placeholder="Digite seu nome">
          <input type="hidden" name="latitude" class="form-control" id="latitude"  value="<?php  echo $latitude; ?>">
           <input type="hidden" name="longitude" class="form-control" id="longitude" value="<?php echo $longitude ?>">
      </div>
      <div class="form-group">
        <label  class="white-title" for="relato">Escreva aqui seu relato</label>
         <textarea name="relato" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
      </div>
      <input type="submit" class="btn btn-purple" value="Poste seu relato">
    </form>



  </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js" ></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>