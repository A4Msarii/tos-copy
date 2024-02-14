<!DOCTYPE html>
<html>
<head>
    <title>Interactive Drawing</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        #container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: black;
        }

        #myCanvas {
            border: 2px solid #333;
            background-color: #fff;
            cursor: crosshair;
        }

        #controls {
            margin-top: 10px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .color-button {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: none;
            cursor: pointer;
        }

        #clear-button,
        #undo-button {
            padding: 8px 12px;
            border: none;
            background-color: #f44336;
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }

        /* Custom File Input Styles */
        .file-input-container {
            position: relative;
            width: 200px;
            height: 40px;
            overflow: hidden;
            background-color: #f44336;
            color: #fff;
            border-radius: 4px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            margin-top: 20px;
        }

        #image-input {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }
    </style>
    
</head>
<body>
    <div id="container">
        <canvas id="myCanvas" width="1200" height="700"></canvas>

        <div id="controls">
            <button class="color-button" onclick="setColor('black')" style="background-color: black;"></button>
            <button class="color-button" onclick="setColor('red')" style="background-color: red;"></button>
            <button class="color-button" onclick="setColor('blue')" style="background-color: blue;"></button>
            <button class="color-button" onclick="setColor('green')" style="background-color: green;"></button>
            <button class="color-button" onclick="setColor('yellow')" style="background-color: yellow;"></button>
            <button id="clear-button" onclick="clearCanvas()">Clear</button>
            <button id="undo-button" onclick="undoLast()">Undo</button>
            <button id="redo-button" onclick="redoLast()">Redo</button>
        </div>
        <div class="file-input-container" onclick="document.getElementById('image-input').click();">
            Browse
            <input type="file" id="image-input" accept="image/*" style="display: none;" onchange="loadImage(event)">
        </div>
        
    </div>

    <script>
        var canvas = document.getElementById("myCanvas");
        var ctx = canvas.getContext("2d");
    
        ctx.lineWidth = 10;
        ctx.lineCap = "round";
        ctx.strokeStyle = "black";
    
        var isDrawing = false;
        var x = 0;
        var y = 0;
        var paths = [];
        var redoStack = [];
        var imageData = null;

        function startDrawing(event) {
            isDrawing = true;
            if (event.type === 'mousedown') {
                x = event.clientX - canvas.offsetLeft;
                y = event.clientY - canvas.offsetTop;
            } else {
                var touch = event.touches[0];
                x = touch.clientX - canvas.offsetLeft;
                y = touch.clientY - canvas.offsetTop;
            }
            paths.push([{ "x": x, "y": y, "color": ctx.strokeStyle }]);
            ctx.beginPath();
            ctx.moveTo(x, y);
        }
    
        function stopDrawing(event) {
            if (isDrawing) {
                isDrawing = false;
            }
        }
    
        function draw(event)
        {
            if (!isDrawing) return;
            if (event.type === 'mousemove') {
                x = event.clientX - canvas.offsetLeft;
                y = event.clientY - canvas.offsetTop;
            } else {
                var touch = event.touches[0];
                x = touch.clientX - canvas.offsetLeft;
                y = touch.clientY - canvas.offsetTop;
            }
            var currentPath = paths[paths.length - 1];
            currentPath.push({ "x": x, "y": y, "color": ctx.strokeStyle });
            ctx.lineTo(x, y);
            ctx.stroke();
        }

        function setColor(color) {
            ctx.strokeStyle = color;
        }

        function clearCanvas() {
    paths = [];
    redoStack = [];
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    if (imageData) {
        ctx.putImageData(imageData, 0, 0);
    }
}

        function undoLast() {
            if (paths.length > 0) {
                redoStack.push(paths.pop());
                redrawCanvas();
            }
        }

        function redoLast() {
            if (redoStack.length > 0) {
                paths.push(redoStack.pop());
                redrawCanvas();
            }
        }

        function redrawCanvas() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    if (imageData) {
        ctx.putImageData(imageData, 0, 0);
    }
    paths.forEach(function (path) {
        ctx.beginPath();
        ctx.moveTo(path[0].x, path[0].y);
        ctx.strokeStyle = path[0].color;
        for (let i = 1; i < path.length; i++) {
            ctx.lineTo(path[i].x, path[i].y);
            ctx.strokeStyle = path[i].color;
            ctx.stroke();
        }
    });
}

        var imageInput = document.getElementById("image-input");

        function loadImage(event) {
            var file = event.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var img = new Image();
                    img.onload = function () {
                        ctx.clearRect(0, 0, canvas.width, canvas.height);
                        ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
                        imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
                        paths = [];
                        redoStack = [];
                    };
                    img.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }

        canvas.addEventListener("mousedown", startDrawing);
        canvas.addEventListener("mouseup", stopDrawing);
        canvas.addEventListener("mousemove", draw);
        canvas.addEventListener("touchstart", startDrawing);
        canvas.addEventListener("touchend", stopDrawing);
        canvas.addEventListener("touchmove", draw);

        imageInput.addEventListener("change", loadImage);
    </script>
</body>
</html>
