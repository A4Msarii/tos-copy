<!DOCTYPE html>
<html>
<head>
<title>Creating Dynamic Data Graph using PHP and Chart.js</title>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>

<style type="text/css">
    #chart-container {
    width: 100%;
    height: 20%;
}

</style>
</head>
<body>
    <div id="chart-container">
        <canvas id="graphCanvas" style="height:400px;"></canvas>
    </div>

    <script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph() {
    $.post("data.php", function (data) {
        var name = [];
        var marks = [];

        for (var i in data) {
            name.push(data[i].name);
            marks.push(data[i].over_all_grade_per);
        }

        var chartdata = {
            labels: name,
            datasets: [
                {
                    label: 'Student Marks',
                    backgroundColor: '#49e2ff',
                    borderColor: '#46d5f1',
                    hoverBackgroundColor: '#CCCCCC',
                    hoverBorderColor: '#666666',
                    data: marks
                }
            ]
        };

        var graphTarget = $("#graphCanvas");
        var barGraph = new Chart(graphTarget, {
            type: 'line',
            data: chartdata
        });
    });
}


        </script>

</body>
</html>