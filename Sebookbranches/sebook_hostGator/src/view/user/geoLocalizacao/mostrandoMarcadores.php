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

		// Get default map types from the platform object:
		var defaultLayers = platform.createDefaultLayers();

		navigator.geolocation.getCurrentPosition(function(position) {

        var latitude   = position.coords.latitude;
		var longitude  = position.coords.longitude;

		// Instantiate the map:
		var map = new H.Map(document.getElementById('mapContainer'),
			defaultLayers.vector.normal.map,{
			center: {lat:latitude, lng:longitude},
			zoom: 12,
			pixelRatio: window.devicePixelRatio || 1
		});
		//Criando Marcadores

		var itbEngenho = new H.map.Marker({lat:-23.487558, lng:-46.888370});
		map.addObject(itbEngenho);

		var itbBelval= new H.map.Marker({lat:-23.511261, lng:-46.889910});
		map.addObject(itbBelval);

		var itbViana= new H.map.Marker({lat:-23.546118, lng:-46.869870 });
		map.addObject(itbViana);

		
		// Add behavior to the map: panning, zooming, dragging.
		var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

		// Create the default UI:
		var ui = H.ui.UI.createDefault(map, defaultLayers, 'pt-BR');

	});


		






	</script>
</body>

</html>
