<html>
  <head>
  <meta name="viewport" content="initial-scale=1.0, width=device-width" />

  <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
  <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
  <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
  <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>

  <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />


  </head>
  <body>
  <div style="width: 640px; height: 480px" id="mapContainer"></div>
  <script>

    // Instantiate a map and platform object:
var platform = new H.service.Platform({
  'apikey': 'pNTev5pwXgLcdHoNuFVh3YJmNk9Kr0VB6mdPBvMzVec'
});
// Retrieve the target element for the map:
var targetElement = document.getElementById('mapContainer');

// Get the default map types from the platform object:
var defaultLayers = platform.createDefaultLayers();

// Instantiate the map:
var map = new H.Map(
  document.getElementById('mapContainer'),
  defaultLayers.vector.normal.map,
  {
    zoom: 25,
    center: { lng: -46.88, lat: -23.51 }
  });
  // add a resize listener to make sure that the map occupies the whole container
  window.addEventListener('resize', () => map.getViewPort().resize());
  // Create the parameters for the routing request:
  var routingParameters = {
    // The routing mode:
    'mode': 'fastest;car',
    // The start point of the route:
    'waypoint0': 'geo!-23.48787788,-46.88855141',
    // The end point of the route:
    'waypoint1': 'geo!-23.49759442,-46.87628031',
    // To retrieve the shape of the route we choose the route
    // representation mode 'display'
    'representation': 'display'
  };

// Define a callback function to process the routing response:
var onResult = function(result) {
  var route,
  routeShape,
  startPoint,
  endPoint,
  linestring;
  if(result.response.route) {
  // Pick the first route from the response:
  route = result.response.route[0];
  // Pick the route's shape:
  routeShape = route.shape;

  // Create a linestring to use as a point source for the route line
  linestring = new H.geo.LineString();

  // Push all the points in the shape into the linestring:
  routeShape.forEach(function(point) {
  var parts = point.split(',');
  linestring.pushLatLngAlt(parts[0], parts[1]);
  });

  // Retrieve the mapped positions of the requested waypoints:
  startPoint = route.waypoint[0].mappedPosition;
  endPoint = route.waypoint[1].mappedPosition;

  // Create a polyline to display the route:
  var routeOutline = new H.map.Polyline(linestring, {
  style: {
  lineWidth: 10,
  strokeColor: 'rgba(0, 128, 255, 0.7)',
  lineTailCap: 'arrow-tail',
  lineHeadCap: 'arrow-head'
  }
});
// Create a patterned polyline:
var routeArrows = new H.map.Polyline(linestring, {
  style: {
  lineWidth: 10,
  fillColor: 'white',
  strokeColor: 'rgba(255, 255, 255, 1)',
  lineDash: [0, 2],
  lineTailCap: 'arrow-tail',
  lineHeadCap: 'arrow-head' }
  }
);

var routeLine = new H.map.Group();
routeLine.addObjects([routeOutline, routeArrows]);
  // Create a marker for the start point:
  var startMarker = new H.map.Marker({
  lat: startPoint.latitude,
  lng: startPoint.longitude
  });

  // Create a marker for the end point:
  var endMarker = new H.map.Marker({
  lat: endPoint.latitude,
  lng: endPoint.longitude
  });

  // Add the route polyline and the two markers to the map:
  map.addObjects([routeLine, startMarker, endMarker]);

  // Set the map's viewport to make the whole route visible:
  map.getViewModel().setLookAtData({bounds: routeLine.getBoundingBox()});


  }
};

// Get an instance of the routing service:
var router = platform.getRoutingService();

// Call calculateRoute() with the routing parameters,
// the callback and an error callback function (called if a
// communication error occurs):
router.calculateRoute(routingParameters, onResult,
  function(error) {
  alert(error.message);
  });
  // Create the default UI:
  var ui = H.ui.UI.createDefault(map, defaultLayers, 'pt-BR');
  // Add behavior to the map: panning, zooming, dragging.
  var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

  </script>
  </body>
</html>
