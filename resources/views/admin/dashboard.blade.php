<x-app-layout>
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
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Кол-во пользователей</h4>
                                    <div class="info">
                                        <strong class="amount">{{\App\Models\User::count()}}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <section class="card">
        <header class="card-header">
            <div class="card-actions">
                <a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
                <a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
            </div>

            <h2 class="card-title">Best Seller</h2>
            <p class="card-subtitle">Customize the graphs as much as you want, there are so many options and features to display information using Porto Admin Template.</p>
        </header>
        <div class="card-body">

            <!-- Flot: Basic -->
            <div class="chart chart-md" id="flotDashBasic" style="padding: 0px; position: relative;"><canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 717.5px; height: 350px;" width="717" height="350"></canvas><div class="flot-text" style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;"><div style="position: absolute; max-width: 65px; top: 327px; left: 33px; text-align: center;" class="flot-tick-label tickLabel">0</div><div style="position: absolute; max-width: 65px; top: 327px; left: 102px; text-align: center;" class="flot-tick-label tickLabel">1</div><div style="position: absolute; max-width: 65px; top: 327px; left: 168px; text-align: center;" class="flot-tick-label tickLabel">2</div><div style="position: absolute; max-width: 65px; top: 327px; left: 235px; text-align: center;" class="flot-tick-label tickLabel">3</div><div style="position: absolute; max-width: 65px; top: 327px; left: 302px; text-align: center;" class="flot-tick-label tickLabel">4</div><div style="position: absolute; max-width: 65px; top: 327px; left: 369px; text-align: center;" class="flot-tick-label tickLabel">5</div><div style="position: absolute; max-width: 65px; top: 327px; left: 437px; text-align: center;" class="flot-tick-label tickLabel">6</div><div style="position: absolute; max-width: 65px; top: 327px; left: 504px; text-align: center;" class="flot-tick-label tickLabel">7</div><div style="position: absolute; max-width: 65px; top: 327px; left: 571px; text-align: center;" class="flot-tick-label tickLabel">8</div><div style="position: absolute; max-width: 65px; top: 327px; left: 639px; text-align: center;" class="flot-tick-label tickLabel">9</div><div style="position: absolute; max-width: 65px; top: 327px; left: 704px; text-align: center;" class="flot-tick-label tickLabel">10</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;"><div style="position: absolute; top: 301px; left: 14px; text-align: right;" class="flot-tick-label tickLabel">0</div><div style="position: absolute; top: 226px; left: 7px; text-align: right;" class="flot-tick-label tickLabel">50</div><div style="position: absolute; top: 151px; left: 4px; text-align: right;" class="flot-tick-label tickLabel">100</div><div style="position: absolute; top: 75px; left: 4px; text-align: right;" class="flot-tick-label tickLabel">150</div><div style="position: absolute; top: 0px; left: 1px; text-align: right;" class="flot-tick-label tickLabel">200</div></div></div><canvas class="flot-overlay" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 717.5px; height: 350px;" width="717" height="350"></canvas><div class="legend"><div style="position: absolute; width: 59.4333px; height: 72px; top: 16px; right: 13px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:16px;right:13px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #0088cc;overflow:hidden"></div></div></td><td class="legendLabel">Series 1</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #2baab1;overflow:hidden"></div></div></td><td class="legendLabel">Series 2</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #734ba9;overflow:hidden"></div></div></td><td class="legendLabel">Series 3</td></tr></tbody></table></div></div>
            <script>

                var flotDashBasicData = [{
                    data: [
                        [0, 170],
                        [1, 169],
                        [2, 173],
                        [3, 188],
                        [4, 147],
                        [5, 113],
                        [6, 128],
                        [7, 169],
                        [8, 173],
                        [9, 128],
                        [10, 128]
                    ],
                    label: "Series 1",
                    color: "#0088cc"
                }, {
                    data: [
                        [0, 115],
                        [1, 124],
                        [2, 114],
                        [3, 121],
                        [4, 115],
                        [5, 83],
                        [6, 102],
                        [7, 148],
                        [8, 147],
                        [9, 103],
                        [10, 113]
                    ],
                    label: "Series 2",
                    color: "#2baab1"
                }, {
                    data: [
                        [0, 70],
                        [1, 69],
                        [2, 73],
                        [3, 88],
                        [4, 47],
                        [5, 13],
                        [6, 28],
                        [7, 69],
                        [8, 73],
                        [9, 28],
                        [10, 28]
                    ],
                    label: "Series 3",
                    color: "#734ba9"
                }];

                // See: js/examples/examples.dashboard.js for more settings.

            </script>

        </div>
    </section>
</x-app-layout>
