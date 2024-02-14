<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="varun">
        <div id="resizable12" class="ui-widget-content drag_and_drop" style="width: 1300px; height:800px; padding: 0.5em; position: relative;z-index:0">
            <img src="/latest/TOS/includes/Pages/draganddropimg/frame1.jpg" alt="Your Image" style="height:800px;width:1300px;border-radius:0px;border:0px solid #000000" class="ui-widget-header">
        </div>
        <div id="resizables7" class="ui-widget-content drag_and_drop ui-resizable ui-draggable ui-draggable-handle" style="padding: 0.5em; position: relative; left: 278px; top: -661px; width: 746px;">
            <h1 style="background-color:#fcfcfc;color:#0d1d40;font-weight: bold;font-family:Times New Roman;font-size:70px">CERTIFICATE</h1>
            <div class="ui-resizable-handle ui-resizable-e" style="z-index: 90;"></div>
            <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
            <div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se" style="z-index: 90;"></div>
        </div>
        <div id="resizables8" class="ui-widget-content drag_and_drop ui-resizable ui-draggable ui-draggable-handle" style="padding: 0.5em; position: relative; left: 754px; top: -655px; width: 369px;">
            <h3 style="background-color:#ffffff;color:#0d1a40;font-weight: bold;font-family:Times New Roman;font-size:20px">Of Achievement</h3>
            <div class="ui-resizable-handle ui-resizable-e" style="z-index: 90;"></div>
            <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
            <div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se" style="z-index: 90;"></div>
        </div>
        <div id="resizables9" class="ui-widget-content drag_and_drop ui-resizable ui-draggable ui-draggable-handle" style="padding: 0.5em; position: relative; left: 118px; top: -703px; width: 336px;">
            <h5 style="background-color:#ffffff;color:#0d1d40;font-weight: bold;font-family:New Century Schoolbook;font-size:15px">This certificate is Proudly Presented To</h5>
            <div class="ui-resizable-handle ui-resizable-e" style="z-index: 90;"></div>
            <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
            <div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se" style="z-index: 90;"></div>
        </div>
        <div id="resizables10" class="ui-widget-content drag_and_drop ui-resizable ui-draggable ui-draggable-handle" style="padding: 0.5em; position: relative; left: 333px; top: -694px; width: 483px;">
            <h1 style="background-color:#fffafa;color:#0d1d40;font-style: italic;;font-family:Comic Sans MS;font-size:50px">students Names</h1>
            <div class="ui-resizable-handle ui-resizable-e" style="z-index: 90;"></div>
            <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
            <div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se" style="z-index: 90;"></div>
        </div>
        <div id="resizables11" class="ui-widget-content drag_and_drop" style="padding: 0.5em; position: relative;">
            <h3 style="background-color:#fffafa;color:#0d1840;font-weight: bold;font-family:Big Caslon;font-size:25px">DATE</h3>
        </div>
        <div id="resizables12" class="ui-widget-content drag_and_drop" style="padding: 0.5em; position: relative;">
            <h3 style="background-color:#fffafa;color:#0d1840;font-weight: bold;font-family:Big Caslon;font-size:20px">SIGNATURE</h3>
        </div>
        <div id="resizable32" class="ui-widget-content drag_and_drop" style="padding: 0.5em; position: relative;">
            <p style="background-color:#ffffff;color:#0d1a40;font-style: italic;;font-family:Optima;font-size:10px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam commodo, libero nec ultrices ultricies, augue libero cursus mi, a sollicitudin purus massa eu nibh. Fusce bibendum erat nec elit hendrerit, sed sollicitudin justo iaculis. Pellentesque fermentum felis a justo facilisis, ac interdum mi ullamcorper. Donec euismod velit ac justo eleifend, ut interdum justo varius. Vivamus eget nunc id velit ultrices venenatis eu vitae nulla. </p>
        </div>
        <div id="resizable21" class="ui-widget-content drag_and_drop" style="padding: 0.5em; position: relative;">
            <hr style="width:100px;border-top: 3px solid #0d1d40;">
        </div>
        <div id="resizable22" class="ui-widget-content drag_and_drop" style="padding: 0.5em; position: relative;">
            <hr style="width:100px;border-top: 3px solid #0d1d40;">
        </div>
        <div id="resizable23" class="ui-widget-content drag_and_drop" style="padding: 0.5em; position: relative;">
            <hr style="width:200px;border-top: 3px solid #0d1845;">
        </div>
        <div id="resizable24" class="ui-widget-content drag_and_drop" style="padding: 0.5em; position: relative;">
            <hr style="width:200px;border-top: 3px solid #0d1845;">
        </div>


    </div>
</body>
<!-- Include jsPDF library  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Include html2canvas library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.3/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>


<script>
    $(document).ready(function() {
        const container = document.getElementById('resizable12');

        // Use html2canvas to capture the container as an image
        html2canvas(container).then(canvas => {
            // Create a new jsPDF instance
            const pdf = new jsPDF('p', 'px', [canvas.width, canvas.height]);

            // Convert the canvas image to a data URL
            const imgData = canvas.toDataURL('image/png');

            // Add the image to the PDF
            pdf.addImage(imgData, 'PNG', 0, 0, canvas.width, canvas.height);

            // Save or display the PDF as needed
            pdf.save('document.pdf');
        });

    });
</script>

</html>