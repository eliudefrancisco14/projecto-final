// This example displays a marker at the center of Australia.
// When the user clicks the marker, an info window opens.
function initMap() {
  const uluru = { lat: -25.363, lng: 131.044 };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 4,
    center: uluru,
  });
  const contentString =
    '<div id="content">' +
    '<h1>Uluru</h1>' +
    "</div>";
  const infowindow = new google.maps.InfoWindow({
    content: contentString,
    ariaLabel: "Uluru",
  });
  const marker = new google.maps.Marker({
    position: uluru,
    map,
    title: "Uluru (Ayers Rock)",
  });

  marker.addListener("click", () => {
    infowindow.open({
      anchor: marker,
      map,
    });
  });
}

window.initMap = initMap;


// Adicionar botão no infowindow

function initMap() {
    const uluru = { lat: -25.363, lng: 131.044 };
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 4,
      center: uluru,
    });
    const contentString =
      '<div id="content">' +
      '<h1>Uluru</h1>' +
      '<button id="send-data-btn">Enviar Dados</button>' +
      "</div>";
    const infowindow = new google.maps.InfoWindow({
      content: contentString,
      ariaLabel: "Uluru",
    });
    const marker = new google.maps.Marker({
      position: uluru,
      map,
      title: "Uluru (Ayers Rock)",
    });
  
    marker.addListener("click", () => {
      infowindow.open({
        anchor: marker,
        map,
      });
      
      // Adicione um listener de eventos para o botão "Enviar Dados"
      document.getElementById("send-data-btn").addEventListener("click", () => {
        // Aqui você pode adicionar a lógica para enviar dados para a base de dados
        console.log("Dados enviados para a base de dados!");
      });
    });
  }
  
  window.initMap = initMap;