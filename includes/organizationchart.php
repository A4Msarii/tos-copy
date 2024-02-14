
<!DOCTYPE html>
<html>

<head>

    <title>Login Page</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>tos.svg">

    
    <style type="text/css">
        #orgChart {
            width: auto;
            height: 100%;
        }

        #orgChartContainer {
            width: 100%;
            height: 100%;
            overflow: hidden;
            background: white;
        }
    </style>
</head>

<body>
    <!--Navbar-->

    <!-- <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand"><img src="<?php echo BASE_URL; ?>includes/Pages/tos.svg" style="width: 30px; height:30px;"><span style="font-size:large; font-weight:bold;">TOS</span></a>
            <button class="btn btn-outline-success d-flex" type="button" data-bs-toggle="modal" data-bs-target="#LoginModal">Login</button>
        </div>
    </nav> -->
    <br>
    <div id="orgChartContainer">
        <div id="orgChart"></div>
        <center>
            <!-- <input class="btn btn-success" type="button" value="Save" name="saveOrg" id="saveOrg" /> -->
        </center>
    </div>

    <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/organization/jquery.orgchart.js"></script>
    <script type="text/javascript">
        var testData = [{
                id: 1,
                name: 'Main',
                parent: 0,
                type: 'department',
                mainId: 0,
                img: "<?php echo BASE_URL; ?>includes/Pages/avatar/avtar.png"
            },

        ];

        $(document).ready(function() {
            // alert("varun");
            $.ajax({
                url: '<?php echo BASE_URL; ?>includes/fetchOrg.php', // Replace with the actual path to your PHP file
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    if (data.length > 0) {
                        org_chart = $('#orgChart').orgChart({
                            data: data,
                            showControls: true,
                            allowEdit: true,
                            onAddNode: function(node) {
                                log('Created new node on node ' + node.data.id);
                                org_chart.newNode(node.data.id);
                            },
                            onDeleteNode: function(node) {
                                log('Deleted node ' + node.data.id);
                                org_chart.deleteNode(node.data.id);
                            },
                            onClickNode: function(node) {
                                log('Clicked node ' + node.data.id);
                            }

                        });
                    }
                    // alert(data);
                    // testData = data;
                    // console.log(testData);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        });

        $(function() {
            org_chart = $('#orgChart').orgChart({
                data: testData,
                showControls: true,
                allowEdit: true,
                onAddNode: function(node) {
                    log('Created new node on node ' + node.data.id);
                    org_chart.newNode(node.data.id);
                },
                onDeleteNode: function(node) {
                    log('Deleted node ' + node.data.id);
                    org_chart.deleteNode(node.data.id);
                },
                onClickNode: function(node) {
                    log('Clicked node ' + node.data.id);
                }

            });
        });

        // just for example purpose
        function log(text) {

        }
    </script>
</body>

<script>
    $('#saveOrg').on('click', function() {
        var dataToSave = [];
        var parentIds = $('.inputParent');
        var names = $('.inputName');
        // alert(parentIds);

        // Ensure the number of parentIds and names match before saving
        if (parentIds.length !== names.length) {
            console.log('Error: Number of parentIds and names do not match.');
            return;
        }

        // Loop through each set of parent-id and name elements and store them as objects
        for (var i = 0; i < parentIds.length; i++) {
            var parentId = $(parentIds[i]).data('parentid');
            var name = $(names[i]).data('name');
            dataToSave.push({
                parentId: parentId,
                name: name
            });
        }
        // alert(dataToSave);

        // Send the dataToSave array to the server using AJAX
        $.ajax({
            type: 'POST',
            url: '<?php echo BASE_URL; ?>includes/saveOrg.php',
            data: {
                data_to_save: JSON.stringify(dataToSave)
            },
            success: function(response) {
                // alert(response);
                location.reload();
            },
            error: function() {
                alert('Error saving data to the database.');
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Initial scale (1 = no zoom)
        let scale = 1;

        // Function to update the zoom level and scale the chart container
        function updateZoom() {
            $('#orgChart').css('transform', `scale(${scale})`);
        }

        // Mouse scroll event
        $('#orgChartContainer').on('wheel', function(event) {
            // Prevent default scroll behavior
            event.preventDefault();

            // Get the mouse scroll delta (positive for zoom in, negative for zoom out)
            const delta = event.originalEvent.deltaY;

            // Calculate the zoom factor based on the mouse scroll delta
            const zoomFactor = 1 + delta * 0.001;

            // Adjust the scale based on the zoom factor
            scale *= zoomFactor;

            // Apply the updated scale
            updateZoom();
        });
    });
</script>

</html>