var layer = L.tileLayer('http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png',{
  attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="http://cartodb.com/attributions">CartoDB</a>'
});

var map = L.map('map', {center: [30.259662,-97.749328], zoom: 10, minZoom: 13 , maxZoom: 16});  //map variable to hold map object rendering inside #map div

map.addLayer(layer);

var icons = {
	2014: L.divIcon({
		html: '<i class="fa fa-circle event-2014"></i>',
		className: '',
		iconSize: L.point(12,12)
	}),
	2015: L.divIcon({
		html: '<i class="fa fa-circle event-2015"></i>',
		className: '',
		iconSize: L.point(12,12)
	})
};

var grouped = _.groupBy(mapdata, function(evt){
	return evt.Year;
});

function makeMarker(evt){
	return L.marker([evt.Latitude, evt.Longitude],{
		icon: icons[evt.Year] 
	});
}

var markers2014 = _.map(grouped[2014], makeMarker);

var markers2015 = _.map(grouped[2015], makeMarker);

var layer2014 = L.layerGroup(markers2014)
    .addTo(map);



var layer2015 = L.layerGroup(markers2015)
    .addTo(map);
