<x-app-layout>
    @push('css')
        <x-leaflet-styles/>
        <style>
            #map {
                min-height: 600px;
            }
            .collapse{
                visibility: visible!important;
            }
        </style>
    @endpush
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Все деревья
            </h2>
        </x-slot>
        <div class="container mx-auto py-3">
            <div class="row">
                <div class="col-md-9 relative mb-4">
                    <div id='map'></div>
                </div>
                <div class="col-md-3 relative mb-4">
                    <livewire:sidebar-filter></livewire:sidebar-filter>
                </div>
            </div>
        </div>

        @push('js')
            <x-leaflet-scripts/>

            <script type="module">
                //    Initialize Map
                var map = L.map('map', {preferCanvas: true}).setView([42.315524, 69.586943], 14);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
            </script>
        @endpush
</x-app-layout>
