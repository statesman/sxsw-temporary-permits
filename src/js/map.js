var layer = L.tileLayer('http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png',{
  attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="http://cartodb.com/attributions">CartoDB</a>'
});

var map = L.map('map', {
  center: [30.264071306509358,-97.74001836776733],
  zoom: 15,
  minZoom: 12,
  maxZoom: 17
});

map.addLayer(layer);

var grouped = _.groupBy(mapdata, function(evt){
	return evt.Year;
});

function makeIcon(evt) {
  var icon;

  if(evt.Year === 2014) {
    icon = 'circle';
  }
  else if(evt.Year === 2015 && evt.Status === 'In Review') {
    icon = 'asterisk';
  }
  else {
    icon = 'square';
  }

  return new L.divIcon({
		html: '<i class="fa fa-' + icon + ' event-' + evt.Year + '"></i>',
		className: 'event-marker',
		iconSize: L.point(12,12)
	});
}

function popupContent(evt) {
  return '<p><strong>' + evt.EventVenueName + '</strong></p>' +
    '<p>' + evt.Address + '</p>' +
    '<p>' + evt.StartDate + ' to ' + evt.EndDate + '</p>';
}

function makeMarker(evt){
	var m = L.marker([evt.Latitude, evt.Longitude],{
		icon: makeIcon(evt),
    riseOnHover: true
	});
  m.bindPopup(popupContent(evt));
  return m;
}

var markers2014 = _.map(grouped[2014], makeMarker);
var markers2015 = _.map(grouped[2015], makeMarker);

var layers = {
  2014: L.layerGroup(markers2014).addTo(map),
  2015: L.layerGroup(markers2015).addTo(map)
};

function setLayers() {
  var years = $('#year-toggle').find('a').toArray();

  _.each(years, function(el) {
    var $el = $(el),
        markerLayer = layers[$el.data('year')];

    if($el.hasClass('selected') && !map.hasLayer(markerLayer)) {
      map.addLayer(markerLayer);
    }
    else if (!$el.hasClass('selected') && map.hasLayer(markerLayer)) {
      map.removeLayer(markerLayer);
    }
  });
}

$('#year-toggle').on('click', 'a', function(e) {
  e.preventDefault();

  $(e.currentTarget).toggleClass('selected');

  setLayers();
});
