<x-app-layout>
@push('css')
        <style>
            .pie-chart {
                height: 400px;
                margin: 0 auto;
            }
        </style>
    @endpush
    <div class="col-lg-12">
        <div class="row mb-3">
            <div class="col-xl-6">
                <section class="card card-featured-left card-featured-primary mb-3">
                    <div class="card-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-primary">
                                    <i class="fa-solid fa-globe"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Кол-во районов</h4>
                                    <div class="info">
                                        <strong class="amount">{{\App\Models\Area::count()}}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-xl-6">
                <section class="card card-featured-left card-featured-secondary">
                    <div class="card-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-secondary">
                                    <i class="fa-solid fa-map-location-dot"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Кол-во мест</h4>
                                    <div class="info">
                                        <strong class="amount">{{\App\Models\Place::count()}}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <section class="card card-featured-left card-featured-tertiary mb-3">
                    <div class="card-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-tertiary">
                                    <i class="fa-solid fa-tree"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Кол-во посадок</h4>
                                    <div class="info">
                                        <strong class="amount">{{\App\Models\Marker::count()}}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-xl-6">
                <section class="card card-featured-left card-featured-quaternary">
                    <div class="card-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-quaternary">
                                    <i class="fa fa-pie-chart"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Кол-во пород</h4>
                                    <div class="info">
                                        <strong class="amount">{{\App\Models\Breed::count()}}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div class="row pt-4 mt-2">
        <div id="chartArea" class="pie-chart"></div>
    </div>
    <div class="row pt-4 mt-2">
        <div id="chartBreed" class="pie-chart"></div>
    </div>
    <div class="row pt-4 mt-2">
        <div id="chartSanitary" class="pie-chart"></div>
    </div>



@push('js')
        <script src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
            let dataForBreed = @json($dataForBreed),
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
                let breedData = new google.visualization.DataTable(),
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

                let breedOptions = {
                        pieHole: 0.4,
                        title: 'Распределение насаждений по породному составу',
                        is3D: true,
                        sliceVisibilityThreshold: 0.02
                    },
                    areaOptions = {
                        pieHole: 0.4,
                        title: 'Распределение насаждений по региону',
                        is3D: true
                    },
                    sanitaryOptions = {
                        pieHole: 0.4,
                        title: 'Санитарное состояние зеленых насаждений',
                        is3D: true,
                        slices: {
                            0: { color: 'green' },
                            1: { color: 'orange' },
                            2: { color: 'red'}
                        }
                    };
                let chartBreed = new google.visualization.PieChart(document.getElementById('chartBreed')),
                    chartArea = new google.visualization.PieChart(document.getElementById('chartArea')),
                    chartSanitary = new google.visualization.PieChart(document.getElementById('chartSanitary'));
                chartBreed.draw(breedData, breedOptions);
                chartArea.draw(areaData, areaOptions);
                chartSanitary.draw(sanitaryData, sanitaryOptions);
            }
        </script>
    @endpush
</x-app-layout>
