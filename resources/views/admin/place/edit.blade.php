<x-app-layout>
    @push('css')
        <x-leaflet-styles></x-leaflet-styles>
    @endpush
    <div class="container mx-auto py-5">
        <h1 class="mb-4 rounded-lg bg-secondary-100 px-6 py-5 text-base text-secondary-800">Изменить место {{$place->title_ru}}</h1>
        <form id="area-form" action="{{route('place.update',$place->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="relative mb-4">
                <input
                    type="text"
                    disabled
                    class="peer block min-h-[auto] w-full rounded border-1"
                    value="{{$area->title_ru}}"
                />
            </div>
            <div class="relative mb-4">
                <input
                    type="text"
                    class="peer block min-h-[auto] w-full rounded border-1"
                    name="title_kz"
                    placeholder="Наименование на каз"
                    value="{{$place->title_kz}}"
                />
            </div>
            <div class="relative mb-4">
                <input
                    type="text"
                    class="peer block min-h-[auto] w-full rounded border-1"
                    name="title_ru"
                    placeholder="Наименование на рус"
                    value="{{$place->title_ru}}"

                />
            </div>
            <input type="hidden" name="geocode" id="geo" value="{{$place->geocode}}">

            <div class="relative mb-4">
                <label for="bg_color">Выберите цвет</label>
                <input type="color"
                       id="bg_color"
                       class="peer block min-h-[auto] w-full rounded border-1"
                       name="bg_color"
                        value="{{$place->bg_color}}"
                >
            </div>

            <div class="relative mb-4">
                <div id='map'></div>
            </div>

            <button
                id="submit-map"
                type="submit"
                class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                Обновить
            </button>
        </form>

    </div>

    @push('js')
        <x-leaflet-scripts></x-leaflet-scripts>
        <script>

            //    Initialize Map
            var map = L.map('map',{preferCanvas:true}).setView([42.315524, 69.586943], 12);
            map.pm.addControls({
                position: 'topleft',
                drawCircle: false,
                drawCircleMarker:false,
                tooltips:true,
                drawPolyline:false,
                drawRectangle: false,
                dragMode:false,
                cutPolygon:false,
                drawPolygon:true,
                editMode:true,
                drawMarker:false,
                rotateMode:false
            });
            map.pm.setLang('ru');

            let activeAreaGeo = {{Js::from($area)}};
            let activePlace = {{Js::from($place)}};
            let places = {{Js::from($places)}};
            let dataPolygons = []


            initialize_map();

            function initialize_map() {
                if(activeAreaGeo){
                    changeActiveArea(activeAreaGeo,true)
                }
                if(places.length > 0){
                    places.forEach(
                        placeItem => changeActiveArea(placeItem)
                    )
                }
                if(activePlace){
                    changeActiveArea(activePlace,false,false);
                }
            }


            function changeActiveArea(area,isArea = false,isBase = true){
                if(area != null){
                    L.geoJSON(JSON.parse(area.geocode), {
                        style: {
                            color: area.bg_color
                        },
                        onEachFeature: function (feature, layer) {
                            if(isArea){
                                activeAreaGeo = layer;
                            }
                            layer.bindTooltip(area.title_ru, { permanent: true, offset: [0, 12] });
                            if(isBase){
                                layer.pm.setOptions({
                                    allowEditing:false,
                                    allowRemoval:false,
                                    allowCutting:false,
                                    allowRotation:false,
                                    isBase: true,
                                    isArea:isArea,
                                    id:Date.now()
                                });
                            }
                            else{
                                layer.on('pm:change', ({layer, latlngs, shape}) => {
                                    checkInBounds(layer);
                                })
                            }

                        },

                    }).addTo(map)
                }
            }

            //OnCreated
            map.on('pm:create', ({ shape,layer }) => {
                if(shape == "Polygon"){
                    layer.pm.setOptions({
                        allowSelfIntersection:false,
                        id:Date.now()
                    });
                    layer.setStyle({color:`${$("#bg_color").val()}`})
                    checkInBounds(layer);
                    layer.on('pm:change', ({layer, latlngs, shape}) => {
                        checkInBounds(layer);
                    })
                }
            });

            //Event when color changes
            $("#bg_color").on("change",function (e){
                map.eachLayer(function(itemLayer){
                    if(itemLayer instanceof L.Polygon ){
                        if(!itemLayer.pm.getOptions().isBase){
                            itemLayer.setStyle({color :`${$("#bg_color").val()}`})
                        }
                    }
                });
            });
            //Check if in selectedArea
            function checkInBounds(layer){
                if(activeAreaGeo){
                    if(turf.booleanContains(activeAreaGeo.toGeoJSON(),layer.toGeoJSON())){
                        return true;
                    }
                }
                layer.remove();
            }
            //Action when save it
            $("#submit-map").on("click",function (e) {
                e.preventDefault();
                map.eachLayer(function(itemLayer){
                    if(itemLayer instanceof L.Polygon ){
                        if(!itemLayer.pm.getOptions().isBase){
                            const polygon = itemLayer.toGeoJSON();
                            dataPolygons.push(polygon)
                            $("#geo").attr("value",JSON.stringify(dataPolygons));
                        }
                    }
                });
                $("#area-form").submit();
            })

            // L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/satellite-streets-v9/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoid2VwbGF5a3oyMDIwIiwiYSI6ImNrcTRxd3I3czB2eHgydm8wOHR2NW40OTEifQ.a08RNc7xB3Tm1pGai2NNCQ', {subdomains:['mt0','mt1','mt2','mt3'], maxZoom:25}).addTo(map);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

        </script>
    @endpush
</x-app-layout>

