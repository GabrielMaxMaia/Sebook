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
    // Initialize the platform object:
    var platform = new H.service.Platform({
      'apikey': 'pNTev5pwXgLcdHoNuFVh3YJmNk9Kr0VB6mdPBvMzVec'
    });
    var defaultLayers = platform.createDefaultLayers();

    // Instantiate the map:
    var map = new H.Map(
      document.getElementById('mapContainer'),
      defaultLayers.vector.normal.map,
      {
        zoom: 14,
        center: { lng: -46.88, lat: -23.51 }
      });

    // Create the default UI:
    var ui = H.ui.UI.createDefault(map, defaultLayers);

    // Add behavior to the map: panning, zooming, dragging.
		var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

  </script>
  </body>
</html>
