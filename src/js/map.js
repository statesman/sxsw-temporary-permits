var layer = L.tileLayer('http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png',{
  attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="http://cartodb.com/attributions">CartoDB</a>'
});

var map = L.map('map', {
  center: [30.26614700786203,-97.73987889289856],
  zoom: 16,
  minZoom: 12,
  maxZoom: 18
});

map.addLayer(layer);

var icons = {
	2014: L.divIcon({
		html: '<i class="fa fa-map-marker event-2014"></i>',
		className: 'event-marker',
		iconSize: L.point(12,12)
	}),
	2015: L.divIcon({
		html: '<i class="fa fa-map-marker event-2015"></i>',
		className: 'event-marker',
		iconSize: L.point(12,12)
	})
};

var grouped = _.groupBy(mapdata, function(evt){
	return evt.Year;
});

function popupContent(evt) {
  return '<p><strong>' + evt.EventVenueName + '</strong></p>' +
    '<p>' + evt.Address + '</p>' +
    '<p>' + evt.StartDate + ' to ' + evt.EndDate + '</p>';
}

function makeMarker(evt){
	var m = L.marker([evt.Latitude, evt.Longitude],{
		icon: icons[evt.Year],
    riseOnHover: true
	});
  m.bindPopup(popupContent(evt));
  return m;
}

var markers = {
  2014: _.map(grouped[2014], makeMarker),
  2015: _.map(grouped[2015], makeMarker)
};

var group = new L.MarkerClusterGroup({
  showCoverageOnHover: false,
  disableClusteringAtZoom: map.options.maxZoom
});
group.addLayers(markers[2014]).addTo(map);
group.addLayers(markers[2015]).addTo(map);

function setLayers() {
  var years = $('#year-toggle').find('a').toArray();

  group.clearLayers();

  _.each(years, function(el) {
    var $el = $(el);

    if($el.hasClass('selected')) {
      group.addLayers(markers[$el.data('year')]);
    }
  });
}

$('#year-toggle').on('click', 'a', function(e) {
  e.preventDefault();

  $(e.currentTarget).toggleClass('selected');

  setLayers();
});
