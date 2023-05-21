<x-app-layout>
    @push('css')
        <x-leaflet-styles/>
        <style>
            #map {height: 300px}
            select {width: 100%}
        </style>
    @endpush
    <div class="container mx-auto py-5">
        <h1 class="mb-4 rounded-lg bg-secondary-100 px-6 py-5 text-base text-secondary-800">Посадить дерево</h1>
        <div class="mb-4">
            <div class="mb-2">
                @error('geocode')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
                <div id='map'></div>
            </div>

            <div class="modal-block">
                <form action="{{route('store-marker')}}" method="post">
                    @csrf
                    <livewire:moder.modal-marker />
                    <input type="hidden" id="geo" name="geocode[]">
                    <input type="hidden" name="place_id" value="{{$place->id}}">
                    <div class="mb-2">
                        <button
                            class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                            Сохранить
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>

    @push('js')
        <x-leaflet-scripts/>

        <script>


            //    Initialize Map
            var activeGeoPlace;
            const dataPolygons = [],
                place = {{Js::from($place)}},
                markers = {{Js::from($place->markers)}},
                map = L.map('map', {preferCanvas: true}).setView([42.315524, 69.586943], 14),
                cable = L.geoJSON(JSON.parse(place.geocode), {
                    style: {
                        color: place.bg_color
                    },
                    onEachFeature: function (feature, layer) {
                        activeGeoPlace = layer;

                    },
                }).addTo(map),
                greenIcon = L.icon({
                    iconUrl: '/images/leaf-green.png',
                    shadowUrl: '/images/leaf-shadow.png',
                    iconSize:     [38, 95], // size of the icon
                    shadowSize:   [50, 64], // size of the shadow
                    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
                    shadowAnchor: [4, 62],  // the same for the shadow
                    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
                }),
                MARKERS_MAX = 20,
                MARKERS_DATA = [];

                map.fitBounds(cable.getBounds())

            // a layer group, used here like a container for markers
            var markersGroup = L.layerGroup();
            map.addLayer(markersGroup);

            markers.forEach(function (marker) {
                L.marker(JSON.parse(marker.geocode), {icon: greenIcon}).addTo(map)
            })

            map.on('click', function(e) {
                // get the count of currently displayed markers
                const markersCount = markersGroup.getLayers().length;

                if (markersCount < MARKERS_MAX) {
                    var marker = L.marker(e.latlng, {icon: greenIcon}).addTo(markersGroup);
                    checkInBounds(marker);
                    markersGroup.getLayers().forEach(function (e){
                        if (!MARKERS_DATA.includes(e.getLatLng())) {
                            MARKERS_DATA.push(e.getLatLng())
                        }
                    });
                    $('#geo').attr('value', JSON.stringify(MARKERS_DATA))
                    return;
                }

                // remove the markers when MARKERS_MAX is reached
                markersGroup.clearLayers();
            });

            //Check if in selectedArea
            function checkInBounds(layer){
                if(activeGeoPlace){
                    if(turf.booleanContains(activeGeoPlace.toGeoJSON(),layer.toGeoJSON())){
                        return true;
                    }
                }
                layer.remove();
            }


            // L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/satellite-streets-v9/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoid2VwbGF5a3oyMDIwIiwiYSI6ImNrcTRxd3I3czB2eHgydm8wOHR2NW40OTEifQ.a08RNc7xB3Tm1pGai2NNCQ', {subdomains:['mt0','mt1','mt2','mt3'], maxZoom:25}).addTo(map);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {maxZoom: 25}).addTo(map);

        </script>
    @endpush
</x-app-layout>
