@auth
   <script>
      console.log("logado");
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-8.820940, 13.250683),
          zoom: 14
        });
        var infoWindow = new google.maps.InfoWindow;

        
        // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };

          infoWindow.setPosition(pos);
          infoWindow.setContent("Eu estou aqui.");
          infoWindow.open(map);
          map.setCenter(pos);
          
        },
        () => {
          handleLocationError(true, infoWindow, map.getCenter());
        }
      );
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }

        
        // Change this depending on the name of your PHP or XML file
        downloadUrl('/map/resultado', function(data) {
          var xml = data.responseXML;
          var markers = xml.documentElement.getElementsByTagName('marker');

          Array.prototype.forEach.call(markers, function(markerElem) {
            var name = markerElem.getAttribute('name');
            var address = markerElem.getAttribute('address');
            var type = markerElem.getAttribute('type');
            var gas = markerElem.getAttribute('gas');
            var gol = markerElem.getAttribute('gol');
            
            var point = new google.maps.LatLng(
                parseFloat(markerElem.getAttribute('lat')),
                parseFloat(markerElem.getAttribute('lng')));

            var infowincontent = document.createElement('div');
            var strong = document.createElement('strong');
            strong.textContent = name
            infowincontent.appendChild(strong);
            infowincontent.appendChild(document.createElement('br'));
              
            var text = document.createElement('text');
            text.textContent = address
            infowincontent.appendChild(text);
            infowincontent.appendChild(document.createElement('br'));
            

            var p = document.createElement('span');
            if (gas == 1) {
              p.textContent = "Tem gasolina";
              infowincontent.appendChild(p);
            }else if(gas == 0){
              p.textContent = "N/Tem gasolina";
              infowincontent.appendChild(p);
            }
            infowincontent.appendChild(document.createElement('br'));


            var p2 = document.createElement('span');
            if (gol == 1) {
              p2.textContent = "Tem gasoleo";
              infowincontent.appendChild(p2);
            }else if(gol == 0){
              p2.textContent = "N/Tem gasoleo";
              infowincontent.appendChild(p2);
            }

            console.log(p);
            console.log(p2);
            var icon = customLabel[type] || {};
            //var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
            var marker = new google.maps.Marker({
              map: map,
              position: point,
              label: icon.label,
              //icon: iconBase + 'gas_stations.png'
            });
            marker.addListener('click', function() {
              infoWindow.setContent(infowincontent);
              infoWindow.open(map, marker);
            });
          });
          
        });
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(
          browserHasGeolocation
            ? "Error: The Geolocation service failed."
            : "Error: Your browser doesn't support geolocation."
        );
        infoWindow.open(map);
      }
    

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}

    /*
      class AutocompleteDirectionsHandler {
        map;
        originPlaceId;
        destinationPlaceId;
        travelMode;
        directionsService;
        directionsRenderer;
        constructor(map) {
          this.map = map;
          this.originPlaceId = "";
          this.destinationPlaceId = "";
          this.travelMode = google.maps.TravelMode.WALKING;
          this.directionsService = new google.maps.DirectionsService();
          this.directionsRenderer = new google.maps.DirectionsRenderer();
          this.directionsRenderer.setMap(map);

          const originInput = document.getElementById("origin-input");
          const destinationInput = document.getElementById("destination-input");
          const modeSelector = document.getElementById("mode-selector");
          // Specify just the place data fields that you need.
          const originAutocomplete = new google.maps.places.Autocomplete(
            originInput,
            { fields: ["place_id"] }
          );
          // Specify just the place data fields that you need.
          const destinationAutocomplete = new google.maps.places.Autocomplete(
            destinationInput,
            { fields: ["place_id"] }
          );

          this.setupClickListener(
            "changemode-walking",
            google.maps.TravelMode.WALKING
          );
          this.setupClickListener(
            "changemode-transit",
            google.maps.TravelMode.TRANSIT
          );
          this.setupClickListener(
            "changemode-driving",
            google.maps.TravelMode.DRIVING
          );
          this.setupPlaceChangedListener(originAutocomplete, "ORIG");
          this.setupPlaceChangedListener(destinationAutocomplete, "DEST");
          this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
          this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(
            destinationInput
          );
          this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
        }
        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        setupClickListener(id, mode) {
          const radioButton = document.getElementById(id);

          radioButton.addEventListener("click", () => {
            this.travelMode = mode;
            this.route();
          });
        }
        setupPlaceChangedListener(autocomplete, mode) {
          autocomplete.bindTo("bounds", this.map);
          autocomplete.addListener("place_changed", () => {
            const place = autocomplete.getPlace();

            if (!place.place_id) {
              window.alert("Please select an option from the dropdown list.");
              return;
            }

            if (mode === "ORIG") {
              this.originPlaceId = place.place_id;
            } else {
              this.destinationPlaceId = place.place_id;
            }

            this.route();
          });
        }
        route() {
          if (!this.originPlaceId || !this.destinationPlaceId) {
            return;
          }

          const me = this;

          this.directionsService.route(
            {
              origin: { placeId: this.originPlaceId },
              destination: { placeId: this.destinationPlaceId },
              travelMode: this.travelMode,
            },
            (response, status) => {
              if (status === "OK") {
                me.directionsRenderer.setDirections(response);
              } else {
                window.alert("Directions request failed due to " + status);
              }
            }
          );
        }
      }
    */

    /**End Directions */

  </script> 
@else

<script>
  console.log("nao logado");
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-8.820940, 13.250683),
          zoom: 14
        });
        var infoWindow = new google.maps.InfoWindow;

        
        // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };

          infoWindow.setPosition(pos);
          infoWindow.setContent("Eu estou aqui.");
          infoWindow.open(map);
          map.setCenter(pos);
          
        },
        () => {
          handleLocationError(true, infoWindow, map.getCenter());
        }
      );
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }

        
        // Change this depending on the name of your PHP or XML file
        downloadUrl('/map/resultado', function(data) {
          var xml = data.responseXML;
          var markers = xml.documentElement.getElementsByTagName('marker');

          Array.prototype.forEach.call(markers, function(markerElem) {
            var name = markerElem.getAttribute('name');
            var address = markerElem.getAttribute('address');
            var type = markerElem.getAttribute('type');
            var gas = markerElem.getAttribute('gas');
            var gol = markerElem.getAttribute('gol');
            
            var point = new google.maps.LatLng(
                parseFloat(markerElem.getAttribute('lat')),
                parseFloat(markerElem.getAttribute('lng')));

            var infowincontent = document.createElement('div');
            var strong = document.createElement('strong');
            strong.textContent = name
            infowincontent.appendChild(strong);
            infowincontent.appendChild(document.createElement('br'));
              
            var text = document.createElement('text');
            text.textContent = address
            infowincontent.appendChild(text);
            
            var icon = customLabel[type] || {};
            //var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
            var marker = new google.maps.Marker({
              map: map,
              position: point,
              label: icon.label,
              //icon: iconBase + 'gas_stations.png'
            });
            marker.addListener('click', function() {
              infoWindow.setContent(infowincontent);
              infoWindow.open(map, marker);
            });
          });
          
        });
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(
          browserHasGeolocation
            ? "Error: The Geolocation service failed."
            : "Error: Your browser doesn't support geolocation."
        );
        infoWindow.open(map);
      }
    

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}


  </script> 
    
@endauth



<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3vhl_f3wKssqMMdazuuW20KkvVsOnhzs&callback=initMap">
</script>
