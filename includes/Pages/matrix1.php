<!--All graph-->
<div class="row">

    <div class="col-lg-12 mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <div class="card-body">
                <h6 class="card-subtitle text-success">Main</h6>
                <hr class="text-success">
                <div class="row align-items-center gx-2 mb-2">
                    <div class="col-12">
                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                    </div>
                </div>
                <!-- End Col -->
            </div>

        </div>
    </div>
    <!-- End Card -->
</div>

<!--first row end-->

<!--sepearte graph-->
<div class="row">
    <div class="col-sm-6 mb-3">
        <!-- Card -->
        <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <div class="card-body">
                <h1 class="card-subtitle text-success"><a class="text-success" href="">Actual</a></h1>
                <hr class="text-success">

                <div class="row align-items-center gx-2 mb-1">

                    <div class="col-12">

                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- End Card -->
    </div>

    <div class="col-sm-6 mb-3">
        <!-- Card -->
        <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <div class="card-body">
                <h1 class="card-subtitle"><a href="" class="text-success">Sim</a></h1>
                <hr class="text-success">

                <div class="row align-items-center gx-2 mb-1">
                    <div class="col">
                    </div>
                    <!-- End Col -->

                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- End Card -->
    </div>

</div>
<!-- End Stats -->


<!--sepearte graph 2-->
<div class="row">
    <div class="col-sm-6 mb-3">
        <!-- Card -->
        <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <div class="card-body">
                <h1 class="card-subtitle text-success"><a class="text-success" href="">Academic</a></h1>
                <hr class="text-success">

                <div class="row align-items-center gx-2 mb-1">

                    <div class="col">
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- End Card -->
    </div>

    <div class="col-sm-6 mb-3">
        <!-- Card -->
        <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <div class="card-body">
                <h1 class="card-subtitle"><a href="" class="text-success">Test</a></h1>
                <hr class="text-success">

                <div class="row align-items-center gx-2 mb-1">
                    <div class="col">
                    </div>
                    <!-- End Col -->

                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- End Card -->
    </div>

</div>
<!-- End Stats -->


<!--sepearte graph 3-->
<div class="row">
    <div class="col-sm-6 mb-3">
        <!-- Card -->
        <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <div class="card-body">
                <h1 class="card-subtitle text-success"><a class="text-success" href="">Descipline</a></h1>
                <hr class="text-success">

                <div class="row align-items-center gx-2 mb-1">

                    <div class="col">
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- End Card -->
    </div>

    <div class="col-sm-6 mb-3">
        <!-- Card -->
        <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <div class="card-body">
                <h1 class="card-subtitle"><a href="" class="text-success">Memo</a></h1>
                <hr class="text-success">

                <div class="row align-items-center gx-2 mb-1">
                    <div class="col">
                    </div>
                    <!-- End Col -->

                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- End Card -->
    </div>

</div>
<!-- End Stats -->

<!-- scripts for graph  -->
<script src="<?php echo BASE_URL; ?>assets/js/canvasjs.min.js"></script>
<script>
    window.onload = function() {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            zoomEnabled: true,
            theme: "light2",
            title: {
                text: "Employment in Agriculture vs Agri-Land and Population"
            },
            axisX: {
                title: "Employment - Agriculture",
                suffix: "%",
                minimum: 0,
                maximum: 61,
                gridThickness: 1
            },
            axisY: {
                title: "Agricultural Land (million sq.km)",
                suffix: "mn"
            },
            data: [{
                type: "bubble",
                toolTipContent: "<b>{name}</b><br/>Employment: {x}% <br/> Agri-Land: {y}mn sq. km<br/> Population: {z}mn",
                dataPoints: [{
                        x: 39.6,
                        y: 5.225,
                        z: 1347,
                        name: "China"
                    },
                    {
                        x: 3.3,
                        y: 4.17,
                        z: 21.49,
                        name: "Australia"
                    },
                    {
                        x: 1.5,
                        y: 4.043,
                        z: 304.09,
                        name: "US"
                    },
                    {
                        x: 17.4,
                        y: 2.647,
                        z: 2.64,
                        name: "Brazil"
                    },
                    {
                        x: 8.6,
                        y: 2.154,
                        z: 141.95,
                        name: "Russia"
                    },
                    {
                        x: 52.98,
                        y: 1.797,
                        z: 1190.86,
                        name: "India"
                    },
                    {
                        x: 4.3,
                        y: 1.735,
                        z: 26.16,
                        name: "Saudi Arabia"
                    },
                    {
                        x: 1.21,
                        y: 1.41,
                        z: 39.71,
                        name: "Argentina"
                    },
                    {
                        x: 5.7,
                        y: .993,
                        z: 48.79,
                        name: "SA"
                    },
                    {
                        x: 13.1,
                        y: 1.02,
                        z: 110.42,
                        name: "Mexico"
                    },
                    {
                        x: 2.4,
                        y: .676,
                        z: 33.31,
                        name: "Canada"
                    },
                    {
                        x: 2.8,
                        y: .293,
                        z: 64.37,
                        name: "France"
                    },
                    {
                        x: 3.8,
                        y: .46,
                        z: 127.70,
                        name: "Japan"
                    },
                    {
                        x: 40.3,
                        y: .52,
                        z: 234.95,
                        name: "Indonesia"
                    },
                    {
                        x: 42.3,
                        y: .197,
                        z: 68.26,
                        name: "Thailand"
                    },
                    {
                        x: 31.6,
                        y: .35,
                        z: 78.12,
                        name: "Egypt"
                    },
                    {
                        x: 1.1,
                        y: .176,
                        z: 61.39,
                        name: "U.K"
                    },
                    {
                        x: 3.7,
                        y: .144,
                        z: 59.83,
                        name: "Italy"
                    },
                    {
                        x: 1.8,
                        y: .169,
                        z: 82.11,
                        name: "Germany"
                    }
                ]
            }]
        });
        chart.render();

    }
</script>