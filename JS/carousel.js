function initMap() {
    // Coordenadas de la ubicación que deseas mostrar
    var myLatLng = {lat: 40.712776, lng: -74.005974}; // Por ejemplo, Nueva York
    
    // Crear un nuevo mapa en el contenedor con ID 'map'
    var map = new google.maps.Map(document.getElementById('map'), {
      center: myLatLng, // Centrar el mapa en las coordenadas especificadas
      zoom: 15 // Establecer el nivel de zoom (0 = mundo, 15 = calle)
    });
    
    // Crear un marcador en las coordenadas especificadas
    var marker = new google.maps.Marker({
      position: myLatLng, // Posición del marcador
      map: map, // Mapa en el que se va a colocar el marcador
      title: 'Mi Ubicación' // Título del marcador (opcional)
    });
  }