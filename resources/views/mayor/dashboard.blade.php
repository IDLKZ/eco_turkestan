<x-app-layout>
@push('css')
        <style>
            .pie-chart {
                height: 400px;
                margin: 0 auto;
            }
        </style>
    @endpush
    <div class="row pt-4 mt-2">
        <div id="chartDiv" class="pie-chart"></div>
    </div>



@push('js')
        <script src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
            var subjectData = @json($subjectData);

            window.onload = function() {
                google.load("visualization", "1.1", {
                    packages: ["corechart"],
                    callback: 'drawChart'
                });
            };

            function drawChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Pizza');
                data.addColumn('number', 'Populartiy');
                data.addRows(subjectData);

                var options = {
                    pieHole: 0.4,
                    title: 'Распределение насаждений по породному составу',
                    is3D: true
                };
                var chart = new google.visualization.PieChart(document.getElementById('chartDiv'));
                chart.draw(data, options);
            }
        </script>
    @endpush
</x-app-layout>
