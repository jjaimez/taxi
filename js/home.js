<!--

var map;
var contador = 0;
var geocoder;
var marcadorHasta = 'http://www.colectivosriocuarto.com/imagenes/hasta.png';
var marcadorDesde = 'http://www.colectivosriocuarto.com/imagenes/desdee.png';
var dibujar;
var markerDesde;
var markerHasta;
var lat_origen;
var lng_origen;
var lat_destino = null;
var lng_destino = null;


function refreshData(ids) { 
  $('#agrupar').prepend($('<div>').load('auxindes.php?id='+ids));
}

function empezarIntervalo(ids){
  window.setInterval(refreshData(ids), 5000);
}

var mapOptions = {
          center: new google.maps.LatLng(-33.1265506, -64.3414028),
          zoom: 13,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };

function validarDatos(){
  if (document.getElementById("origen").value == ""){
    alert("ingrese la direccion de origen por favor");
  } else {
    if (document.getElementById("pasajeros").value == "") {
      alert("ingrese la cantidad de pasajeros por favor");
    } else {
       document.getElementById("lat_origen").value = markerDesde.getPosition().lat();
       document.getElementById("lng_origen").value = markerDesde.getPosition().lng();
      if (document.getElementById("destino").value != ""){
         document.getElementById("lat_destino").value = markerHasta.getPosition().lat();
         document.getElementById("lng_destino").value = markerHasta.getPosition().lng();
      }
      document.getElementById("formulario").submit();
    }
  }
}


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
 if (contador<1){  
  markerDesde = new google.maps.Marker({
    position: position,
    map: map,
    icon : marcadorDesde,
    draggable: true});  
  map.panTo(position);
  contador++;
  codeLatLng(markerDesde,"origen");
   google.maps.event.addListener(markerDesde,'dragend',function(event) {
     codeLatLng(markerDesde,"origen");
    });
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

  
function codeLatLng(marcador,destino) {
    var latlng = marcador.getPosition(); 
         geocoder.geocode({'latLng': latlng}, function(results, status) {
  if (status == google.maps.GeocoderStatus.OK) {
    if (results[0]) {
      document.getElementById(destino).value=results[0].formatted_address;
    }
  } else {
    document.getElementById(destino).value='No resolved address';
  }
      });
}    


google.maps.event.addDomListener(window, 'load', initialize);

--> 
