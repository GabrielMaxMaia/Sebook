<html>

<head>

	<meta name="viewport" content="initial-scale=1.0, width=device-width" />

    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>

    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
    
</head>


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

		// Get default map types from the platform object:
		var defaultLayers = platform.createDefaultLayers();

		// Instantiate the map:
		var map = new H.Map(
			document.getElementById('mapContainer'),
			defaultLayers.vector.normal.map, {
				zoom: 12,
				center: {
					lng: -46.90,
					lat: -23.50
				} //
			});

		// Create the parameters for the geocoding request:
		var geocodingParams = {
			searchText: 'Rua do ITB do Engenho Novo 238,  Barueri'
		};

		// Define a callback function to process the geocoding response:
		var onResult = function(result) {
			var locations = result.Response.View[0].Result,
				position,
				marker;
			// Add a marker for each location found
			for (i = 0; i < locations.length; i++) {
				position = {
					lat: locations[i].Location.DisplayPosition.Latitude,
					lng: locations[i].Location.DisplayPosition.Longitude
				};
				marker = new H.map.Marker(position);
				map.addObject(marker);
			}
		};


	
		// Add behavior to the map: panning, zooming, dragging.
		var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

		// Get an instance of the geocoding service:
		var geocoder = platform.getGeocodingService();

		// Call the geocode method with the geocoding parameters,
		// the callback and an error callback function (called if a
		// communication error occurs):
		geocoder.geocode(geocodingParams, onResult, function(e) {
			alert(e);
		});
		// Create the default UI:
		var ui = H.ui.UI.createDefault(map, defaultLayers, 'pt-BR');
	</script>
</body>

</html>