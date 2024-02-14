<!DOCTYPE html>
<html>

<head>
    <title>Mixed Line and Bubble Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div style="width: 80%; margin: 0 auto;">
        <canvas id="mixed-chart"></canvas>
    </div>
    <script>
        // Use AJAX to fetch data from your PHP script
        fetch('chartData1.php')
            .then(response => response.json())
            .then(data => {
                // Create the mixed chart using Chart.js
                var customLabelsX = ['adr1', 'adr2', 'adr3', 'adr4', 'adr5', 'adr6', 'adr7', 'adr8', 'adr9', 'adr10'];

                // Custom labels for the y-axis
                var customLabelsY = ['50', '60', '70', '80', '90', '100'];

                // Create the mixed chart using Chart.js
                var ctx = document.getElementById('mixed-chart').getContext('2d');
                var mixedChart = new Chart(ctx, {
                    type: 'scatter', // Use 'scatter' type for the bubble chart
                    data: {
                        datasets: [{
                                label: 'Line Data',
                                data: data.line, // Line chart data
                                borderColor: 'rgba(75, 192, 192, 1)',
                                backgroundColor: 'rgba(0, 0, 0, 0)', // Transparent fill for the line chart
                                yAxisID: 'line-y-axis',
                                showLine: true, // Show the line for the line chart
                                pointRadius: 0, // Set pointRadius to 0 to hide data points
                            },
                            {
                                label: 'Bubble Data',
                                data: data.bubble, // Bubble chart data
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                pointRadius: 5,
                                pointHoverRadius: 10,
                            },
                        ],
                    },
                    options: {
                        scales: {
                            x: {
                                type: 'category', // Use 'category' type for custom x-axis labels
                                position: 'bottom',
                                labels: customLabelsX, // Set custom labels for x-axis
                            },
                            'line-y-axis': {
                                type: 'linear',
                                position: 'left',
                                min: 50, // Set the minimum value for the y-axis
                                max: 100, // Set the maximum value for the y-axis
                                stepSize: 10, // Set the step size between ticks
                                ticks: {
                                    callback: function(value) {
                                        return value + '%'; // Add '%' symbol to y-axis labels
                                    }
                                }
                            },
                        },
                    },
                })
            });
    </script>
</body>

</html>