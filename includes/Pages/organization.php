<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

?>

<!DOCTYPE html>
<html>

<head>
  <title>Organization Chart</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                    initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
  <link href="<?php echo BASE_URL; ?>assets/organization/jquery.orgchart.css" media="all" rel="stylesheet" type="text/css" />

  <style type="text/css">
    .node {
      height: 190px !important;
      width: 155px !important;
      background-color: white !important;
    }
  </style>

</head>
<body>
 
    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
  
<div id="header-hide">
  <?php
  include(ROOT_PATH . 'includes/head_navbar.php');

  ?></div>
<!--Input Phases-->
<!--Main contect We need to insert data here-->
<main id="content" role="main" class="main">
  <!-- Content -->
  <div>
    <div class="content container-fluid" style="height: 30rem;">
      <!-- Page Header -->
      <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
      <div class="page-header" style="padding: 0px;">
        <h1 class="text-success">Organization Chart</h1>
      </div>
      <!-- End Page Header -->
    </div>
  </div>
  <!-- End Content -->

  <!-- Content -->
  <!--student info-->
  <div class="content container-fluid" style="margin-top: -20rem;">

    <div class="row justify-content-center">

      <div class="col-lg-10 mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card card-hover-shadow" style="border:0.001rem solid #dddddd; height: 100%;">

          <!-- Body -->
          <div class="card-body" style="overflow: scroll; height:100%;">
            <button style="float:right;" id="exportButton" type="button" class="btn btn-success btn-sm">Export to Word</button><br><hr>
            <?php include('../organizationchart.php'); ?>
            <!-- <div id="orgChartContainer">
              <div id="orgChart"></div>
              <hr>
              <center>
                <input class="btn btn-success" type="button" value="Save" name="saveOrg" id="saveOrg" />
              </center>
            </div> -->
          </div>
          <!-- End Body -->
        </div>
        <!-- End Card -->
      </div>
    </div>
    <!-- End Row -->
  </div>
  <!-- End Content -->

</main>

<!-- <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/organization/jquery.orgchart.js"></script> -->
<!-- <script type="text/javascript">
  var testData = [{
      id: 1,
      name: 'Main',
      parent: 0
    },

  ];

  $(document).ready(function() { 
    // alert("varun");
    $.ajax({
      url: '<?php echo BASE_URL; ?>includes/fetchOrg.php', // Replace with the actual path to your PHP file
      dataType: 'json',
      success: function(data) {
        if ($ = data.length > 0) {
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
    alert(parentIds);

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
    alert(dataToSave);

    // Send the dataToSave array to the server using AJAX
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/saveOrg.php',
      data: {
        data_to_save: JSON.stringify(dataToSave)
      },
      success: function(response) {
        // alert(response);
      },
      error: function() {
        alert('Error saving data to the database.');
      }
    });
  });
</script>

-->


</body>

<script src="<?php echo BASE_URL; ?>assets/exportWord/src/FileSaver.js"></script>
<script src="<?php echo BASE_URL; ?>assets/exportWord/src/html2canvas.min.js"></script>

<script>
  // Function to extract content from a specific div (including images)
  async function extractDivContent(divId) {
    const div = document.getElementById(divId);

    const table = div.querySelector('table');
    table.style.border = '1px solid black';


    $(".fetchDetail").css("display","none");
    $(".selectDrp").css("display","none");
    $(".org-add-button").css("display","none");
    $(".org-del-button").css("display","none");

    // To export images, we use html2canvas library to convert the div into an image
    const canvas = await html2canvas(div);
    const image = canvas.toDataURL('image/png');
    $("table").css("display","none");

    return {
      tableContent: table.outerHTML,
      image
    };
  }

  // Function to export the content to a Word document
  function exportToWord() {
    const divId = 'orgChartContainer';
    extractDivContent(divId).then(({
      tableContent,
      image
    }) => {
      const content = `
                <div>
                    ${tableContent}
                    <img src="${image}" />
                </div>
            `;

      const blob = new Blob([content], {
        type: 'application/msword'
      });
      const filename = 'orgChart.doc';
      saveAs(blob, filename);
      location.reload();
    });
  }

  // Attach click event listener to the export button
  document.getElementById('exportButton').addEventListener('click', exportToWord);
</script>

 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>
</html>