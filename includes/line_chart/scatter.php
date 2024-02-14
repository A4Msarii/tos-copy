<!DOCTYPE html>
<html>
<head>
<title>Creating Dynamic Data Graph using PHP and Chart.js</title>
<style type="text/css">
BODY {
    width: 550PX;
}

#chart-container {
    width: 100%;
    height: auto;
}
</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>


</head>
<body>
    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>

    <script>
$(document).ready(function () {
    // call the showGraph function to draw the initial chart
    showGraph();

    // call the fetchData function every 5 seconds to update the chart
    setInterval(function() {
        showGraph();
    }, 5000);
});

function showGraph()
{
    {
        $.ajax({
            url: "get_Data.php",
            dataType: "json",
            success: function(data) {
                var name = [];
                var marks = [];

               for (var i in data) {
                        name.push(data[i].over_all_grade_per);
                        marks.push(data[i].user_id);
                    }

                var chartdata = {
                    labels: name,
                    datasets: [
                        {
                            label: 'Monthly Sales',
                            backgroundColor: 'green',
                            borderColor: '#46d5f1',
                            hoverBackgroundColor: '#CCCCCC',
                            hoverBorderColor: '#666666',
                            data: marks
                        }
                    ]
                };

                var graphTarget = $("#graphCanvas");

                var scatterGraph = new Chart(graphTarget, {
                    type: 'scatter',
                    data: chartdata,
                    options: {
                        scales: {
                            xAxes: [{
                                type: 'category',
                                labels: name
                            }]
                        }
                    }
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Error fetching data: " + textStatus + ", " + errorThrown);
            }
        });
    }
}
</script>


</body>
</html>