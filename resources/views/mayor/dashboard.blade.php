<x-app-layout>
@push('css')
        <style>
            .pie-chart {
                height: 400px;
                margin: 0 auto;
            }
        </style>
    @endpush
    <div class="my-3">
        Общее количество деревьев: {{\App\Models\Marker::count()}}
    </div>
    <div class="row pt-4 mt-2">
        <div id="chartBreed" class="pie-chart"></div>
    </div>
    <div class="row pt-4 mt-2">
        <div id="chartArea" class="pie-chart"></div>
    </div>
    <div class="row pt-4 mt-2">
        <div id="chartSanitary" class="pie-chart"></div>
    </div>



@push('js')
        <script src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
            var dataForBreed = @json($dataForBreed),
                dataForArea = @json($dataForArea),
                dataForSanitary = @json($dataForSanitary);

            window.onload = function() {
                google.load("visualization", "1.1", {
                    packages: ["corechart"],
                    callback: 'drawChart',
                    language: 'ru'
                });
            };

            function drawChart() {
                var breedData = new google.visualization.DataTable(),
                    areaData = new google.visualization.DataTable(),
                    sanitaryData = new google.visualization.DataTable();
                breedData.addColumn('string', 'Name');
                breedData.addColumn('number', 'Count');
                breedData.addRows(dataForBreed);

                areaData.addColumn('string', 'Name');
                areaData.addColumn('number', 'Count');
                areaData.addRows(dataForArea);

                sanitaryData.addColumn('string', 'Name');
                sanitaryData.addColumn('number', 'Count');
                sanitaryData.addRows(dataForSanitary);

                var breedOptions = {
                        pieHole: 0.4,
                        title: 'Распределение насаждений по породному составу',
                        is3D: true,
                        sliceVisibilityThreshold: 0.05
                    },
                    areaOptions = {
                        pieHole: 0.4,
                        title: 'Распределение насаждений по региону',
                        is3D: true
                    },
                    sanitaryOptions = {
                        pieHole: 0.4,
                        title: 'Санитарное состояние зеленых насаждений',
                        is3D: true
                    };
                var chartBreed = new google.visualization.PieChart(document.getElementById('chartBreed')),
                    chartArea = new google.visualization.PieChart(document.getElementById('chartArea')),
                    chartSanitary = new google.visualization.PieChart(document.getElementById('chartSanitary'));
                chartBreed.draw(breedData, breedOptions);
                chartArea.draw(areaData, areaOptions);
                chartSanitary.draw(sanitaryData, sanitaryOptions);
            }
        </script>
    @endpush
</x-app-layout>
