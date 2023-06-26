<div>
    <div class="accordion" id="myCollapseMenu">
        <div class="accordion-item">
            <h2 class="accordion-header" id="areaheadingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#areaCollapse" aria-expanded="true" aria-controls="areaCollapse">
                    Районы
                </button>
            </h2>
            <div id="areaCollapse" class=" show" aria-labelledby="areaheadingOne" data-bs-parent="#myCollapseMenu">
                <div class="accordion-body">
                    @foreach($areas as $areaItem)
                    <div class="form-check">
                        <input wire:click="$emit('areaChanged',{{$areaItem->id}})" class="form-check-input" type="checkbox" id="{{$areaItem->title_ru}}">
                        <label class="form-check-label" for="{{$areaItem->title_ru}}">
                            {{$areaItem->title_ru}}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="placeheadingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#placeCollapse" aria-expanded="true" aria-controls="placeCollapse">
                    Места
                </button>
            </h2>
            <div id="placeCollapse" aria-labelledby="placeheadingOne" data-bs-parent="#myCollapseMenu">
                <div class="accordion-body">
                    @foreach($places as $placeItem)
                        <div class="form-check">
                            <input data-geo="{{$placeItem->geocode}}" data-color="{{$placeItem->bg_color}}" wire:click="$emit('placeChange',{{$placeItem->id}})" class="place-check form-check-input" type="checkbox" id="{{$placeItem->title_ru}}">
                            <label class="form-check-label" for="{{$placeItem->title_ru}}">
                                {{$placeItem->title_ru}}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
    <x-leaflet-scripts/>
    <script type="module">
        var map = L.map('map', {preferCanvas: true}).setView([42.315524, 69.586943], 14);

        let areas = {{Js::from($this->areas)}};
        let places = [];
       let selectedAreas = [];
       let selectedPlaces = [];
        document.addEventListener("DOMContentLoaded", () => {
            Livewire.hook('message.processed', (el, component) => {
                selectedAreas = @this.selectedAreas;
                selectedPlaces = @this.selectedPlaces;
                renderMap();
            })})

        function renderMap(){
            cleanMap();
            let renderedArea = areas.filter(areaItem=>
               selectedAreas.includes(areaItem.id)
            );
            renderedArea.forEach(function (area){L.geoJSON(JSON.parse(area.geocode), {style: {color: area.bg_color}}).addTo(map)});
            let renderedPlace = places.filter(placeItem=>
                selectedPlaces.includes(placeItem.id)
            );
            renderedPlace.forEach(function (place){L.geoJSON(JSON.parse(place.geocode), {style: {color: place.bg_color}}).addTo(map)});
            let placesChecked =$('.place-check:checkbox:checked').each(function () {
                var geocode = $(this).attr("data-geo");
                var bg_color = $(this).attr("data-color");
                L.geoJSON(JSON.parse(geocode), {style: {color:bg_color}}).addTo(map)
            });
        }

        function loadMarker(){

        }

        function cleanMap(){
            map.eachLayer(function(layer) {
                if (!!layer.toGeoJSON) {
                    map.removeLayer(layer);
                }
            });
        }

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
    </script>
@endpush
