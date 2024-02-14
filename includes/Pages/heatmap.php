
<!DOCTYPE html>
<html>
<head>
    <title>Dummy Data Heatmap</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet.heat@0.2.0/dist/leaflet-heat.js"></script>
</head>
<body>
    <div id="map" style="height: 600px;"></div>
    <script>
        var map = L.map('map').setView([0, 0], 2); // Centered at (0, 0) with zoom level 2

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        // Load dummy data
        var dummyData = <? php include('generate_dummy_data.php'); ?>;

        var heatmapData = dummyData.map(function (item) {
            return [item.lat, item.lng, item.value];
        });

        var heat = L.heatLayer(heatmapData, { radius: 20 }).addTo(map);
    </script>
</body>
</html>
