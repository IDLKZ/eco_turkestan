<x-app-layout>
    @push('css')
        <x-leaflet-styles/>
        <style>
            #map {height: 300px}
            select {width: 100%}
            /*#geo_denied {display: none}*/
        </style>
    @endpush
    <div class="container mx-auto py-5">
        <h1 class="mb-4 rounded-lg bg-secondary-100 px-6 py-5 text-base text-secondary-800">Посадить дерево</h1>
        <div class="mb-4" id="geo_permission">
            <div class="mb-2">
                @error('geocode')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
                <div id='map'></div>
            </div>

            <div class="modal-block">
                <form action="{{route('trees.store')}}" method="post">
                    @csrf
                    <livewire:moder.modal-marker />
                    <input type="hidden" id="geo" name="geocode[]">
                    <input type="hidden" name="place_id" value="{{$place->id}}">
                    <input type="hidden" name="area_id" value="{{$place->area->id}}">
                    <input type="hidden" id="lat" name="lat">
                    <input type="hidden" id="lng" name="lng">
                    <div class="mb-2">
                        <button
                            class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                            Сохранить
                        </button>
                    </div>
                </form>

            </div>
        </div>
{{--        <div id="geo_denied" class="mb-4 rounded-lg bg-danger-100 px-6 py-5 text-base text-danger-700">--}}
{{--            Разрешите доступ к вашему местоположению! (Обновите страницу)--}}
{{--        </div>--}}
    </div>

    @push('js')
        <x-leaflet-scripts/>
{{--        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js" integrity="sha512-efAcjYoYT0sXxQRtxGY37CKYmqsFVOIwMApaEbrxJr4RwqVVGw8o+Lfh/+59TU07+suZn1BWq4fDl5fdgyCNkw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
            <script>
                // $('#height').inputmask({"mask": "999"});
                // $('#diameter').inputmask({"mask": "99"});
                // $('#age').inputmask({"mask": "999"});
            </script>
            <script type="module">
            //    Initialize Map
            var userId = {{\Illuminate\Support\Facades\Auth::id()}};
            var activeGeoPlace;
            const currentPosition = [],
                area = {{Js::from($place->area)}},
                place = {{Js::from($place)}},
                markers = {{Js::from([])}},
                map = L.map('map', {preferCanvas: true}).setView([42.315524, 69.586943], 14),
                cable = L.geoJSON(JSON.parse(area.geocode), {
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

            window.onload = function() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(setPosition);
                    navigator.geolocation.watchPosition(function (e) {
                        let coordinates = JSON.stringify({"lat":e.coords.latitude,"lng":e.coords.longitude});
                        axios.get('/api/get-user-location/'+userId+'/'+ coordinates +'').then(response => {

                        });
                    });
                } else {
                    alert("Geolocation not supported by browser.");
                }

            }

            // a layer group, used here like a container for markers
            var markersGroup = L.layerGroup();
            map.addLayer(markersGroup);
            if(markers.length<20){
                markers.forEach(function (marker) {
                    L.marker(JSON.parse(marker.geocode), {icon: greenIcon}).addTo(map)
                })
            }

            function errorCallBack() {
                $('#geo_permission').css('display', 'none');
                $('#geo_denied').css('display', 'block');
            }

            function setPosition(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                currentPosition['lat'] = latitude;
                currentPosition['lng'] = longitude;
                $('#lat').attr('value', JSON.stringify(latitude))
                $('#lng').attr('value', JSON.stringify(longitude))
            }
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
