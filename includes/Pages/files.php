<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php'); ?>
<!DOCTYPE html>
<html>

<head>
   <title>Library</title>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width,
                   initial-scale=1" />
   <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
   <style>
      * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
         overflow-x: hidden;
      }

      .window {
         position: absolute;
         width: 100%;
         height: 100%;
         overflow: hidden;
         transform: scale(1);
         transition: all .4s;
      }

      iframe {
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         border: none;
      }

      .active {
         transform: scale(1);
         transition: all .4s;
      }
   </style>
   <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/jquery.min.js"></script>

</head>

<body style="background-color:lightgrey;">


    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>


   <div id="window1" class="window" style="border-radius:20px;box-shadow: 0 4px 8px 0 rgba(255, 255, 255, 1), 0 6px 20px 0 rgba(255, 255, 255, 1); background-color:black;">
      <!-- <h5 id="w2" style="position: absolute;">w1</h5> -->
      <div id="w1" style="position: absolute; height:100%;width:100%;">

      </div>

      <iframe id="iframe1" src="<?php echo BASE_URL; ?>Library/blackBoard.php"></iframe>

   </div>
   <div id="window2" class="window active" style="border-radius:20px;box-shadow: 0 4px 8px 0 rgba(255, 255, 255, 1), 0 6px 20px 0 rgba(255, 255, 255, 1); border:1px solid lightgrey;">
      <!-- <h5 style="position: absolute;z-index:1;" id="w2">w2</h5> -->
      <div id="w2" style="position: absolute; height:100%;width:100%;z-index:1;">
      </div>
      <!-- includes/Pages/tasklog.php -->
      <iframe id="iframe2" src="<?php echo BASE_URL; ?>Library/index.php"></iframe>
   </div>

   <script>
      // Access the first iframe
      var firstIframe = document.getElementById('iframe2');
      var firstIframeDocument = firstIframe.contentDocument || firstIframe.contentWindow.document;
      var grade_sheet = firstIframeDocument.getElementById('grade_sheet');
      grade_sheet.removeAttribute('href');
      var bri = firstIframeDocument.getElementById('bri');
      bri.removeAttribute('href');
      var library = firstIframeDocument.getElementById('library');
      library.removeAttribute('href');
      var scheduling = firstIframeDocument.getElementById('scheduling');
      scheduling.removeAttribute('href');
      var hotwash = firstIframeDocument.getElementById('hotwash');
      hotwash.removeAttribute('href');
   </script>

   <script>
      var clickCount = 0;
      $("#w1").click(function() {
         swapWindows('window1', 'window2');
         $("#w1").css("z-index", "0");
         $("#w2").css("z-index", "1");
         $("#w2").css("transform", "scale(1)");
         $("#w2").css("transition", "all .4s");
      });

      $("#w2").click(function() {
         swapWindows('window2', 'window1');
         $("#w2").css("z-index", "0");
         $("#w1").css("z-index", "1");
      });

      $("#iframe2").on('load', function() {
         var frm = $("#iframe2").get(0);
         var doc = (frm.contentDocument ? frm.contentDocument : frm.contentWindow.document); //here is your document object
         var bdy = doc.body;

         $(bdy).on("click", "*", function(e) {
            var cName = $(e.target).attr("class"); //To get class name
            var cId = $(e.target).attr("id");

            if (cName == 'foldername') {
               var f_Id = $(e.target).attr("value");
               document.cookie = "f_id = " + f_Id;
               // window.location.href = '<?php echo BASE_URL; ?>includes/Pages/fheader1.php?folder_ID=' + f_Id;

               // setTimeout(function() {
               // $("#iframe1").attr("src", "<?php echo BASE_URL; ?>includes/Pages/fheader1.php");
               // swapWindows('window1', 'window2');
               // $("#w2").css("z-index", "1");
               // $("#w1").css("z-index", "0");
               // $("#iframe2")[0].contentWindow.location.reload(true);
               // }, 5000);
            }

            if (cId == 'change_profile') {
               window.location.href = '<?php echo BASE_URL; ?>includes/Pages/profile.php';
            }

            if (cId == 'sign_out') {
               window.location.href = '<?php echo BASE_URL; ?>includes/Pages/logout.php';
            }

            if (cId == 'grade_sheet') {
               window.location.href = '<?php echo BASE_URL; ?>includes/Pages/Home.php';
            }
            if (cId == 'bri') {
               window.location.href = '<?php echo BASE_URL; ?>includes/Pages/apps-bri.php';
            }
            if (cId == 'library') {
               window.location.href = '<?php echo BASE_URL; ?>includes/Pages/files.php';
            }
            if (cId == 'scheduling') {
               window.location.href = '<?php echo BASE_URL; ?>Scheduling/home.php';
            }
            if (cId == 'hotwash') {
               window.location.href = '<?php echo BASE_URL; ?>includes/Pages/hotwash.php';
            }
         });
      });

      var switchClass;
      var clickCount = 0;

      $(document).ready(function() {
         $("#iframe2").on("load", function() {
            var switch1 = $("#iframe2").contents().find('#switch');
            // $("#" + switch1).prop("checked", true );
            switch1.on("click", function() {
               var checkValue = "unchecked";
               localStorage.setItem("toogle","unchecked");
               window.location.href = '<?php echo BASE_URL; ?>Library/index.php?checkValue=' + checkValue;
               // if (clickCount % 2 == 0) {
               //    var frontWindow = document.getElementById("window2");
               //    frontWindow.style.zIndex = "1";
               //    frontWindow.style.left = "0px";
               //    frontWindow.style.top = "0px";
               //    frontWindow.style.width = "100%";
               //    var folderName = $("#iframe2").contents().find('.foldername');
               //    document.cookie = "checked=checked";
               //    folderName.addClass("newWindow");
               //    folderName.removeClass('foldername');
               // } else {
               //    var frontWindow = document.getElementById("window2");
               //    frontWindow.style.zIndex = "1";
               //    frontWindow.style.left = "27px";
               //    frontWindow.style.top = "45px";
               //    frontWindow.style.width = "100%";
               //    document.cookie = "checked=nonchecked";
               //    var folderName = $("#iframe2").contents().find('.newWindow');
               //    folderName.addClass("foldername");
               //    folderName.removeClass('newWindow');
               // }
               // clickCount++;
            });
         })
      })

      // $("#" + switchClass).on('click',function(){
      //    alert("hello");
      // });

      $(document).ready(function() {
         swapWindows('window2', 'window1');
         $("#w2").css("z-index", "0");
         $("#w1").css("z-index", "1");
         $("#iframe1").css("border-radius", "0px");
         $("#iframe2").css("border-radius", "20px");
      });

      function swapWindows(frontWindowId, backWindowId) {

         var frontWindow = document.getElementById(frontWindowId);
         var backWindow = document.getElementById(backWindowId);
         frontWindow.style.zIndex = "1";
         frontWindow.style.left = "27px";
         frontWindow.style.top = "45px";
         frontWindow.style.width = "100%";
         backWindow.style.zIndex = "0";
         backWindow.style.left = "0";
         backWindow.style.top = "0";
         backWindow.style.width = "96%";
      }
   </script>

 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>

</html>