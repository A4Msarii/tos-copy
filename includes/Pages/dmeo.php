<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Resizable and Draggable</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>
    #resizable { width: 150px; height: 150px; padding: 0.5em; position: relative; }
    #resizable h3 { text-align: center; margin: 0; }
    #draggable-container { width: 400px; height: 400px; position: relative; border: 1px solid #ccc; }
  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
    $(function() {
      $("#resizable").resizable();
      $("#resizable").draggable({
        containment: "#draggable-container" // Set the containment to the specific area.
      });
    });
  </script>
</head>
<body>
 
<div id="draggable-container">
  <div id="resizable" class="ui-widget-content">
    <h3 class="ui-widget-header">Resizable and Draggable</h3>
  </div>
</div>
 
</body>
</html>
