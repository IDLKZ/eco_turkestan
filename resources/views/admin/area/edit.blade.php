<x-app-layout>
    @push('css')
        <link rel='stylesheet' href='https://unpkg.com/leaflet@1.8.0/dist/leaflet.css' crossorigin='' />
        <link rel="stylesheet" href="https://unpkg.com/@geoman-io/leaflet-geoman-free@latest/dist/leaflet-geoman.css" />
        <style>
            #map {
                width: '100%';
                height: 700px;
            }
        </style>
    @endpush
    <div class="container mx-auto py-5">
        <h1 class="mb-4 rounded-lg bg-secondary-100 px-6 py-5 text-base text-secondary-800">Редактировать район</h1>
        <form id="area-form" action="{{route('area.update', $area->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="relative mb-4">
                <input
                    type="text"
                    class="peer block min-h-[auto] w-full rounded border-1"
                    name="title_kz"
                    value="{{$area->title_kz}}"
                    placeholder="Наименование на каз" />
            </div>
            <div class="relative mb-4">
                <input
                    type="text"
                    class="peer block min-h-[auto] w-full rounded border-1"
                    name="title_ru"
                    value="{{$area->title_ru}}"
                    placeholder="Наименование на рус" />
            </div>
            <input type="hidden" name="geocode" id="geo" value="{{$area->geocode}}">

            <div class="relative mb-4">
                <label for="bg_color">Выберите цвет</label>
                <input type="color"
                       id="bg_color"
                       value="{{$area->bg_color}}"
                       class="peer block min-h-[auto] w-full rounded border-1"
                       name="bg_color">
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
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>
        <script src="https://unpkg.com/@geoman-io/leaflet-geoman-free@latest/dist/leaflet-geoman.min.js"></script>
        <script>
            //    Initialize Map
            var map = L.map('map',{preferCanvas:true}).setView([42.315524, 69.586943], 12);
            map.pm.addControls({
                position: 'topleft',
                drawCircle: false,
                drawCircleMarker:false,
                tooltips:true,
                drawPolyline:false,
                dragMode:false,
                cutPolygon:false,
                drawPolygon:true,
                editMode:true,
                drawMarker:false,
                rotateMode:false
            });
            map.pm.setLang('ru');

            let area = {{Js::from($area)}};
            let areas = {{Js::from($areas)}};
            areas.forEach(function (area){
                L.geoJSON(JSON.parse(area.geocode), {
                    style: {
                        color: area.bg_color
                    },
                    onEachFeature: function (feature, layer) {

                        layer.pm.disable();
                        layer.bindTooltip(area.title_ru, { permanent: true, offset: [0, 12] });
                        layer.pm.setOptions({
                            allowEditing:false,
                            allowRemoval:false,
                            allowCutting:false,
                            allowRotation:false,
                            isBase: true,
                        });
                    },

                }).addTo(map)
            })
            let dataPolygons = []
            let editItem = L.geoJSON(JSON.parse(area.geocode), {
                style: {
                    color: area.bg_color
                }
            }).addTo(map)
            //OnCreated
            map.on('pm:create', ({ shape,layer }) => {
                if(shape == "Polygon"){
                    layer.pm.setOptions({
                        allowSelfIntersection:false,
                    });
                    layer.setStyle({color:`${$("#bg_color").val()}`})
                }
            });
            //OnChange
            editItem.on('pm:edit', ({shape, layer}) => {
                if (shape == "Rectangle" || shape == "Polygon") {
                    layer.pm.setOptions({
                        allowSelfIntersection:false,
                    });
                    layer.setStyle({color:`${$("#bg_color").val()}`})
                }
            })

            $("#bg_color").on("change",function (e){
                map.eachLayer(function(itemLayer){
                    if(itemLayer instanceof L.Polygon ){
                        if(!itemLayer.pm.getOptions().isBase){
                           itemLayer.setStyle({color :`${e.target.value}`})
                        }
                    }
                });
            });


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

