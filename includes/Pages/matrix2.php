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
                        <div id="myChart" class="chart--container">

                        </div>
                    </div>
                </div>
                <!-- End Col -->
            </div>

        </div>
    </div>
    <!-- End Card -->
</div>
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
                        <div id="myChart1" class="chart--container">
                        </div>
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
                    <div class="col-12">
                        <div id="myChart2" class="chart--container"></div>
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

                    <div class="col-12">
                        <div id="mychart3"></div>
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
                    <div class="col-12">
                        <div id="mychart4"></div>
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

                    <div class="col-8">
                        <div id="mychart5"></div>
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
                    <div class="col-8">
                        <div id="mychart6"></div>
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
<script src="https://cdn.zingchart.com/zingchart.min.js"></script>
<script>
    $(document).ready(function() {
        let classData, actualgraph, simgraph,academicgraph,testgraph;
        const ctpId = <?php echo $std_course1 ?>;
        $.ajax({
            type: 'POST',
            url: '<?php echo BASE_URL; ?>includes/Pages/fetchAllClasses.php',
            data: {
                ctpId: ctpId,
            },
            success: function(response) {
                // console.log(response);
                classData = JSON.parse(response);

                // CHART CONFIG
                // -----------------------------
                let chartConfig = {
                    type: "mixed",
                    title: {
                        text: "Sample Burndown Chart",
                        align: "left",
                        marginLeft: "23%",
                    },
                    legend: {
                        adjustLayout: true,
                        verticalAlign: "middle",
                    },
                    scaleX: {
                        labels: classData, // one label for every datapoint
                    },
                    scaleY: {
                        guide: {
                            // dashed lines
                            visible: false,
                        },
                        label: {
                            text: "Remaing effort (hours)",
                            fontSize: "14px",
                        },
                    },
                    scaleY2: {
                        label: {
                            text: "Remaing and completed tasks",
                            fontSize: "14px",
                        },
                        maxValue: 100,
                        minValue: 0,
                        step: 25, // can define scale step values or default
                    },
                    crosshairX: {
                        lineColor: "#424242",
                        lineGapSize: "4px",
                        lineStyle: "dotted",
                        plotLabel: {
                            padding: "15px",
                            backgroundColor: "white",
                            bold: true,
                            borderColor: "#e3e3e3",
                            borderRadius: "5px",
                            fontColor: "#2f2f2f",
                            fontFamily: "Lato",
                            fontSize: "12px",
                            shadow: true,
                            shadowAlpha: 0.2,
                            shadowBlur: 5,
                            shadowColor: "#a1a1a1",
                            shadowDistance: 4,
                            textAlign: "left",
                        },
                        scaleLabel: {
                            backgroundColor: "#424242",
                        },
                    },
                    series: [{
                            type: "bubble",
                            text: "Remaining Tasks",
                            values: [35, 42, 67, 89, 25, 34, 67, 85].sort().reverse(),
                            lineColor: "#42a5f5",
                            marker: {
                                type: "circle",
                                backgroundColor: "#5c6bc0",
                            },
                            scales: "scale-x, scale-y",
                        },
                        {
                            type: "line",
                            text: "Remaining Effort",
                            values: [
                                35, 100, 200, 42, 67, 89, 25, 34, 67, 85, 400
                            ].sort().reverse(),
                            marker: {
                                visible: true
                            },
                            scales: "scale-x, scale-y",
                        },
                    ],
                };

                // RENDER CHARTS
                // -----------------------------
                zingchart.render({
                    id: "myChart",
                    data: chartConfig,
                    height: "100%",
                    width: "100%",
                });
            }
        });

        $.ajax({
            type: 'POST',
            url: '<?php echo BASE_URL; ?>includes/Pages/fetchAllClasses.php',
            data: {
                actual: ctpId,
            },
            success: function(response) {
                // console.log(response);
                actualgraph = JSON.parse(response);

                var myConfig = {
                    "type": "line",
                    "utc": true,
                    "title": {
                        "text": "Webpage Analytics",
                        "font-size": "24px",
                        "adjust-layout": true
                    },
                    "plotarea": {
                        "margin": "dynamic 45 60 dynamic",
                    },
                    "legend": {
                        "layout": "float",
                        "background-color": "none",
                        "border-width": 0,
                        "shadow": 0,
                        "align": "center",
                        "adjust-layout": true,
                        "toggle-action": "remove",
                        "item": {
                            "padding": 7,
                            "marginRight": 17,
                            "cursor": "hand"
                        }
                    },
                    "scale-x": {
                        "min-value": 1383292800000,
                        "shadow": 0,
                        "step": 3600000,
                        "transform": {
                            "type": "date",
                            "all": "%D, %d %M<br />%h:%i %A",
                            "item": {
                                "visible": false
                            }
                        },
                        "label": {
                            "visible": false
                        },
                        "minor-ticks": 0
                    },
                    "scale-y": {
                        "line-color": "#f6f7f8",
                        "shadow": 0,
                        "guide": {
                            "line-style": "dashed"
                        },
                        "label": {
                            "text": "Page Views",
                        },
                        "minor-ticks": 0,
                        "thousands-separator": ","
                    },
                    "crosshair-x": {
                        "line-color": "#efefef",
                        "plot-label": {
                            "border-radius": "5px",
                            "border-width": "1px",
                            "border-color": "#f6f7f8",
                            "padding": "10px",
                            "font-weight": "bold"
                        },
                        "scale-label": {
                            "font-color": "#000",
                            "background-color": "#f6f7f8",
                            "border-radius": "5px"
                        }
                    },
                    "tooltip": {
                        "visible": false
                    },
                    "plot": {
                        "highlight": true,
                        "tooltip-text": "%t views: %v<br>%k",
                        "shadow": 0,
                        "line-width": "2px",
                        "marker": {
                            "type": "circle",
                            "size": 3
                        },
                        "highlight-state": {
                            "line-width": 3
                        },
                        "animation": {
                            "effect": 1,
                            "sequence": 2,
                            "speed": 100,
                        }
                    },
                    "series": [{
                        "values": actualgraph,
                        "text": "Pricing",
                        "line-color": "#007790",
                        "legend-item": {
                            "background-color": "#007790",
                            "borderRadius": 5,
                            "font-color": "white"
                        },
                        "legend-marker": {
                            "visible": false
                        },
                        "marker": {
                            "background-color": "#007790",
                            "border-width": 1,
                            "shadow": 0,
                            "border-color": "#69dbf1"
                        },
                        "highlight-marker": {
                            "size": 6,
                            "background-color": "#007790",
                        }
                    }]
                };

                zingchart.render({
                    id: 'myChart1',
                    data: myConfig,
                    height: '100%',
                    width: '100%'
                });
            }
        });

        $.ajax({
            type: 'POST',
            url: '<?php echo BASE_URL; ?>includes/Pages/fetchAllClasses.php',
            data: {
                sim: ctpId,
            },
            success: function(response) {
                // console.log(response);
                simgraph = JSON.parse(response);

                var myConfig = {
                    type: 'line',
                    title: {
                        text: 'Sim All classes',
                        fontSize: 24,
                        color: '#5d7d9a'
                    },
                    legend: {
                        draggable: true,
                    },
                    scaleX: {
                        // set scale label
                        label: {
                            text: 'Days'
                        },
                        // convert text on scale indices
                        labels: simgraph
                    },
                    scaleY: {
                        // scale label with unicode character
                        label: {
                            text: 'Score'
                        }
                    },
                    plot: {
                        // animation docs here:
                        // https://www.zingchart.com/docs/tutorials/design-and-styling/chart-animation/#animation__effect
                        animation: {
                            effect: 'ANIMATION_EXPAND_BOTTOM',
                            method: 'ANIMATION_STRONG_EASE_OUT',
                            sequence: 'ANIMATION_BY_NODE',
                            speed: 275,
                        }
                    },
                    series: [{
                        // plot 1 values, linear data
                        values: simgraph,
                        text: 'Week 1',
                        backgroundColor: '#4d80a6'
                    }, ]
                };

                // render chart with width and height to
                // fill the parent container CSS dimensions
                zingchart.render({
                    id: 'myChart2',
                    data: myConfig,
                    height: '100%',
                    width: '100%'
                });
            }
        });

        $.ajax({
            type: 'POST',
            url: '<?php echo BASE_URL; ?>includes/Pages/fetchAllClasses.php',
            data: {
                academic: ctpId,
            },
            success: function(response) {
                // console.log(response);
                academicgraph = JSON.parse(response);
                let myConfig1 = {
                    type: 'line',
                    title: {
                        text: 'Data Basics',
                        fontSize: 24,
                    },
                    legend: {
                        draggable: true,
                    },
                    scaleX: {
                        // Set scale label
                        label: {
                            text: 'Days'
                        },
                        // Convert text on scale indices
                        labels: academicgraph,
                    },
                    scaleY: {
                        // Scale label with unicode character
                        label: {
                            text: 'Temperature (°F)'
                        }
                    },
                    plot: {
                        animation: {
                            effect: 'ANIMATION_EXPAND_BOTTOM',
                            method: 'ANIMATION_STRONG_EASE_OUT',
                            sequence: 'ANIMATION_BY_NODE',
                            speed: 275,
                        }
                    },
                    series: [{
                        // Plot 1 values, linear data
                        values: academicgraph,
                        text: 'Week 1',
                    }, ]
                };

                // Render Method[3]
                zingchart.render({
                    id: 'mychart3',
                    data: myConfig1,
                });
            }
        });

        $.ajax({
            type: 'POST',
            url: '<?php echo BASE_URL; ?>includes/Pages/fetchAllClasses.php',
            data: {
                test: ctpId,
            },
            success: function(response) {
                // console.log(response);
                testgraph = JSON.parse(response);
                let myConfig2 = {
                    type: 'line',
                    title: {
                        text: 'Data Basics',
                        fontSize: 24,
                    },
                    legend: {
                        draggable: true,
                    },
                    scaleX: {
                        // Set scale label
                        label: {
                            text: 'Days'
                        },
                        // Convert text on scale indices
                        labels: testgraph,
                    },
                    scaleY: {
                        // Scale label with unicode character
                        label: {
                            text: 'Temperature (°F)'
                        }
                    },
                    plot: {
                        animation: {
                            effect: 'ANIMATION_EXPAND_BOTTOM',
                            method: 'ANIMATION_STRONG_EASE_OUT',
                            sequence: 'ANIMATION_BY_NODE',
                            speed: 275,
                        }
                    },
                    series: [{
                        // Plot 1 values, linear data
                        values: testgraph,
                        text: 'Week 1',
                    }, ]
                };

                // Render Method[3]
                zingchart.render({
                    id: 'mychart4',
                    data: myConfig2,
                });
            }
        });

    });
</script>