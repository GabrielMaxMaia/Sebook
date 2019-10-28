<?php

$mapa = "<script type='text/javascript' src='https://js.api.here.com/v3/3.1/mapsjs-core.js'></script>
        <script type='text/javascript' src='https://js.api.here.com/v3/3.1/mapsjs-service.js'></script>
        <script type='text/javascript' src='https://js.api.here.com/v3/3.1/mapsjs-ui.js'></script>
        <script type='text/javascript' src='https://js.api.here.com/v3/3.1/mapsjs-mapevents.js'></script>
        <link rel='stylesheet type='text/css' href='https://js.api.here.com/v3/3.1/mapsjs-ui.css'>";

$styleSobrescrito =
"<style>
    section {
        width: 100%;
        position: relative;
        left: 50%;
        margin-left: -32%;
    }
</style>";
?>

	<div style="width: 640px; height: 480px;" id="mapContainer"></div>
    <div id="msg"></div>
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
		var map = new H.Map(document.getElementById('mapContainer'),
			defaultLayers.vector.normal.map,{
			center: {lat:-23.506363, lng:-46.882215},
			zoom: 12,
			pixelRatio: window.devicePixelRatio || 1
		});

		//Criando Marcadores
		var itbEngenho = new H.map.Marker({lat:-23.487558, lng:-46.888370});
        itbEngenho.setData("Engenho");
		map.addObject(itbEngenho);

		var itbBelval= new H.map.Marker({lat:-23.511261, lng:-46.889910});
        itbBelval.setData("Belval");
		map.addObject(itbBelval);

		var itbViana= new H.map.Marker({lat:-23.546118, lng:-46.869870 });
        itbViana.setData("Viana");
		map.addObject(itbViana);

        var mac = new H.map.Marker({lat:-23.492516, lng:  -46.881449 });
        mac.setData("Mac..");
		map.addObject(mac);
		// Add behavior to the map: panning, zooming, dragging.
		var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

		// Create the default UI:
		var ui = H.ui.UI.createDefault(map, defaultLayers, 'pt-BR');

        findNearestMarker();

        function findNearestMarker() {
            
            var minDist = 5000,
                nearest_text = '*None*',
                markerDist,
                // get all objects added to the map
                objects = map.getObjects(),
                len = map.getObjects().length,
                i;

            // iterate over objects and calculate distance between them
            for (i = 0; i < len; i += 1) {
                markerDist = objects[i].getGeometry().distance({lat:-23.492516, lng:  -46.881449 });
                console.log(markerDist + " < " + minDist +" marcador: "+ objects[i].getData() );
                console.log(markerDist < minDist);
                if (markerDist > 0  && markerDist < minDist) {
                    minDist = markerDist;
                    nearest_text = objects[i].getData();
                }
            }
            document.getElementById('msg').innerHTML = 'The nearest marker is: ' + nearest_text;
        }
	</script>