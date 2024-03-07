function initMap() {
    var huanuco = {lat: -9.9306, lng: -76.2421};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: huanuco
    });
    var marker = new google.maps.Marker({
      position: huanuco,
      map: map,
      title: 'Huánuco'
    });
  }