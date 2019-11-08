<html>
  <head>
  <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js"
    type="text/javascript" charset="utf-8"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js"
    type="text/javascript" charset="utf-8"></script>
  </head>
  <body>
  <div style="width: 640px; height: 480px" id="mapContainer"></div>
  <script>
    // Initialize the platform object:
    var platform = new H.service.Platform({
    'apikey': 'pNTev5pwXgLcdHoNuFVh3YJmNk9Kr0VB6mdPBvMzVec'
    });

    // Obtain the default map types from the platform object
    var maptypes = platform.createDefaultLayers();

    // Instantiate (and display) a map object:
    var map = new H.Map(
    document.getElementById('mapContainer'),
    maptypes.vector.normal.map,
    {
      zoom: 10,
      center: { lng: -46.88, lat: -23.51 }
    });
  </script>
  </body>
</html>