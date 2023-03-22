

/*------------------------------------------
  Google Map API
  https://developers.google.com/maps/documentation?hl=fr
------------------------------------------*/

function initMap() {
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 15,
    center: { lat: 44.19858834985041, lng: 0.6318457930048904 },
  });
  const marker = new google.maps.Marker({
    position: { lat: 44.19858834985041, lng: 0.6318457930048904 },
    map: map,
  });
}

window.initMap = initMap;


