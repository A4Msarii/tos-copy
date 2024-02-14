   <style>
        #loader {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
/*            background: rgba(255, 255, 255, 0.7);*/
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
       .loader {
  margin: auto;
  border: 20px solid #C3D7E3; /* Adjusted the lighter blue shade */
  border-radius: 50%;
  border-top: 20px solid #2787f5; /* Changed the top border color to a darker blue shade */
  width: 200px;
  height: 200px;
  animation: spinner 4s linear infinite;
}

@keyframes spinner {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
    </style>

<div id="loader">
        <div class="loader">
            
        </div>
        <!-- Loading... -->
    </div>

<script>
        window.onbeforeunload = function () {
            document.getElementById('loader').style.display = 'block';
             document.getElementById('contentmain').style.display = 'none';
              document.getElementById('header-hide').style.display = 'none';
        };
    </script>
