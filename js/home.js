<!--

var map;
var contador = 0;
var geocoder;
var marcadorHasta = 'http://www.colectivosriocuarto.com/imagenes/hasta.png';
var marcadorDesde = 'http://www.colectivosriocuarto.com/imagenes/desdee.png';
var dibujar;
var markerDesde;
var markerHasta;

var mapOptions = {
          center: new google.maps.LatLng(-33.1265506, -64.3414028),
          zoom: 13,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };

function initialize() { //Inicializa el mapa en Rio Cuarto
        geocoder = new google.maps.Geocoder();        
        map = new google.maps.Map(document.getElementById("map_canvas"),
        mapOptions);

	 var input = (document.getElementById('columna'));
   map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);


  //click listener para poner marcador en mapa     
  google.maps.event.addListener(map, 'click', function(e) { 
    placeMarker(e.latLng, map);
  });
}



// funcion que pone marcador donde se hace click
function placeMarker(position, map) {
 if (contador<2){
  if (contador == 0){
  markerDesde = new google.maps.Marker({
    position: position,
    map: map,
    icon : marcadorDesde,
    draggable: true});
  } else {
    markerHasta = new google.maps.Marker({
      position: position,
      map: map,
      icon : marcadorHasta,
      draggable: true });
  }
  map.panTo(position);
  contador++;
}
}


  // coloca los marcadores en las direcciones buscadas
function codeAddress() {    
        if (markerHasta != null){
            markerHasta.setMap(null);
        }
        if (markerDesde != null){
            markerDesde.setMap(null);
        }
        var address = document.getElementById("origen").value + ",rio cuarto, cordoba";        
        geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                    markerDesde = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location,
                        icon : marcadorDesde,
                        draggable: true
                    });             
                contador++;               
            } else {
                alert('La direccion de origen no se ha encontrado ' + status);
            }
        });
        if (document.getElementById("destino").value != ""){
        var address = document.getElementById("destino").value + ",rio cuarto, cordoba";
        geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                    markerHasta = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location,
                        icon : marcadorHasta,
                        draggable: true,
                    });
                contador++;
            } else {
                alert('La direccion de destino no se ha encontrado ' + status);
            }
        });
    } 
}

  

google.maps.event.addDomListener(window, 'load', initialize);

--> 