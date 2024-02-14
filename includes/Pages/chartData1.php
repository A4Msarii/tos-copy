<?php
// Generate random data for the line chart
$lineData = [];
for ($i = 1; $i <= 10; $i++) {
    $lineData[] = [
        'x' => $i,
        'y' => rand(10, 50),
    ];
}

// Generate random data for the bubble chart
$bubbleData = [];
for ($i = 1; $i <= 10; $i++) {
    $bubbleData[] = [
        'x' => rand(1, 10),
        'y' => rand(1, 10),
        'r' => rand(10, 30),
    ];
}

// Create an array to hold both datasets
$chartData = [
    'line' => $lineData,
    'bubble' => $bubbleData,
];

// Convert the data to JSON format
echo json_encode($chartData);
?>
