L.mapbox.accessToken = 'pk.eyJ1Ijoic3RhdGNvbWRhdGEiLCJhIjoiMEl4Q2tORSJ9.OVrsYEltm0OrjOiOhcFmCQ';
var map = L.map('map', {center: [33.7550,-84.3900], zoom: 10, minZoom: 13 , maxZoom: 16});  //map variable to hold map object rendering inside #map div
L.mapbox.tileLayer('mapbox.light').addTo(map); //this adds the base tile layer background (we've picked mapbox.light)