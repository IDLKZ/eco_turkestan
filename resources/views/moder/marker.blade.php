<x-app-layout>
    @push('css')
        <x-leaflet-styles/>
        <style>
            .modal-block {
                display: none;
                width: 40%;
                padding: 15px;
            }
            select {width: 100%}
        </style>
    @endpush
    <div class="container mx-auto py-5">
        <h1 class="mb-4 rounded-lg bg-secondary-100 px-6 py-5 text-base text-secondary-800">Посадить дерево</h1>
        <div class="mb-4 flex flex-row">
            <div style="width: 60%">
                <div id='map'></div>
            </div>

            <div class="modal-block">
                <livewire:moder.modal-marker />
            </div>
        </div>

    </div>

    @push('js')
        <x-leaflet-scripts/>

        <script>
            //    Initialize Map
            const dataPolygons = [],
                place = {{Js::from($place)}},
                map = L.map('map', {preferCanvas: true}).setView([42.315524, 69.586943], 14),
                cable = L.geoJSON(JSON.parse(place.geocode), {
                    style: {
                        color: place.bg_color
                    }
                }).addTo(map),
                MARKERS_MAX = 1;

                map.fitBounds(cable.getBounds())

            // a layer group, used here like a container for markers
            var markersGroup = L.layerGroup();
            map.addLayer(markersGroup);

            var greenIcon = L.icon({
                iconUrl: '/images/leaf-green.png',
                shadowUrl: '/images/leaf-shadow.png',

                iconSize:     [38, 95], // size of the icon
                shadowSize:   [50, 64], // size of the shadow
                iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
                shadowAnchor: [4, 62],  // the same for the shadow
                popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
            });

            map.on('click', function(e) {
                // get the count of currently displayed markers
                var markersCount = markersGroup.getLayers().length;

                if (markersCount < MARKERS_MAX) {
                    var marker = L.marker(e.latlng, {icon: greenIcon}).addTo(markersGroup);
                    $('.modal-block').css('display', 'block')
                    return;
                } else {
                    $('.modal-block').css('display', 'none')
                }

                // remove the markers when MARKERS_MAX is reached
                markersGroup.clearLayers();
            });
            // L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/satellite-streets-v9/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoid2VwbGF5a3oyMDIwIiwiYSI6ImNrcTRxd3I3czB2eHgydm8wOHR2NW40OTEifQ.a08RNc7xB3Tm1pGai2NNCQ', {subdomains:['mt0','mt1','mt2','mt3'], maxZoom:25}).addTo(map);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {maxZoom: 25}).addTo(map);

        </script>
    @endpush
</x-app-layout>
