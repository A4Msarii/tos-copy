<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>

<!DOCTYPE html>
<html>

<head>
  <title>Descipline Category</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                    initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

</head>

<body>
 
    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>

<div id="header-hide">
  <?php
  include(ROOT_PATH . 'includes/head_navbar.php');
  $course = "";
  $ctp = "";
  ?></div>
<!--Input categorys-->
<!--Main contect We need to insert data here-->
<main id="content" role="main" class="main">
  <!-- Content -->
  <div>
    <div class="content container-fluid" style="height: 30rem;">
      <!-- Page Header -->
      <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
      <div class="page-header" style="padding: 0px;">
        <h1 class="text-success">Descipline Category</h1>
      </div>
      <!-- End Page Header -->
    </div>
  </div>
  <!-- End Content -->

  <!-- Content -->
  <div class="content container-fluid" style="margin-top: -20rem;">

    <div class="row justify-content-center">

      <div class="col-lg-10 mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
          <!-- Header -->
          <div class="card-header card-header-content-center" style="display:none;">

          </div>
          <!-- End Header -->

          <!-- Body -->
          <div class="card-body">
           
            <center>
              <form class="insert-categorys" id="category_form" method="post" action="insert_desc_category.php" style="width:700px;">
                <div class="input-field">
                  <table class="table table-bordered" id="table-field-depcate">
                    <tr>
                      <td style="text-align: center;"><input type="text" placeholder="Enter category" name="category[]" id="categoryval" class="form-control" value="" required /> </td>
                      <td style="text-align: center;"><input type="text" placeholder="Enter Marks" name="marks[]" id="categoryval" class="form-control" value="" required /> </td>
                      <td style="width:20px;"><button type="button" name="add_category" id="add_category" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                    </tr>
                  </table>
                </div>
                <center>
                  <button style="margin:5px;" class="btn btn-success" type="submit" id="category_submit" name="savecategory">Submit</button>
                </center>
              </form>
            </center>

            <!--category Table-->



            <table class="table table-striped table-bordered table-hover" id="categorytable">
              <input style="margin:5px;" class="form-control" type="text" id="categorysearch" onkeyup="category()" placeholder="Search for categorys.." title="Type in a name">
              <thead class="bg-dark">
                <th class="text-white">Sr No</th>
                <th class="text-white">Category</th>
                <th class="text-white">Marks</th>
                <th class="text-white" colspan="2">Action</th>
              </thead>
              <?php

              $output1 = "";
              $query1 = "SELECT * FROM desccate";
              $statement1 = $connect->prepare($query1);
              $statement1->execute();
              if ($statement1->rowCount() > 0) {
                $result1 = $statement1->fetchAll();
                $sn1 = 1;
                foreach ($result1 as $row1) {
                  $id = $row1["id"];
              ?>
                  <tr>

                    <td><?php echo $sn1++; ?></td>
                    <td><a style="color:black; text-decoration:underline;" href="category-view.php?category_id=<?php echo urlencode(base64_encode($row1['id'])) ?>&category=<?php echo urlencode(base64_encode($row1['category'])) ?>&ctp=<?php echo urlencode(base64_encode($ctp)) ?>"><?php echo $row1['category']; ?></a></td>
                    <td><?php echo $row1['marks']; ?></td>
                    <td><a class="btn btn-soft-success btn-xs" href="" onclick="document.getElementById('cid').value='<?php echo $row1['id'] ?>';
                                        document.getElementById('category_name').value='<?php echo $row1['category']; ?>';document.getElementById('category_marks').value='<?php echo $row1['marks']; ?>';
                                      " data-bs-toggle="modal" data-bs-target="#editcategory"><i class="bi bi-pen-fill"></i></a>


                      <a class="btn btn-soft-danger btn-xs" href="desccategory-delete.php?id=<?php echo $id ?>"><i class="bi bi-trash-fill"></i></a>

                      </a>

                    </td>
                  </tr>
              <?php
                }
              }
              ?>
            </table>
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

<!-- edit category modal -->
<div class="modal fade" id="editcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Category</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
          <form method="post" action="edit_desccategory.php">
            <input class="form-control" type="hidden" name="id" value="" id="cid">
            <label class="text-dark" style="float:left;">Category Name</label>
            <input class="form-control" type="text" name="category" value="" id="category_name">
            <label class="text-dark" style="float:left;">Marks</label>
            <input class="form-control" type="text" name="mark" value="" id="category_marks">
            <input style="margin:5px; float: right;" class="btn btn-success" type="submit" name="saveit" value="Submit">
          </form>
        </center>
      </div>
    </div>
  </div>
</div>

<!-- add color modal modal -->
<div class="modal fade" id="color_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Add Color</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
          <form action="<?php echo BASE_URL; ?>includes/Pages/insert_color.php">
            <input class="form-control" type="hidden" name="id" value="" id="pp_id">
            <label for="color" style="font-size:large; font-weight:bold;">Select a color for Division:</label><br>
            <input type="color" id="color" name="favcolor" required><br>
            <hr>
            <input type="submit" class="btn btn-success" style="float:right;" name="category_color">
          </form>
 
        </center>
      </div>
    </div>
  </div>
</div>

<!-- add duration modal modal -->
<div class="modal fade" id="add_duration" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Add Duration</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
           <form action="<?php echo BASE_URL; ?>includes/Pages/insert_category.php">
            <input class="form-control" type="hidden" name="durationId" value="" id="d_id">
            <input class="form-control" type="hidden" name="ctp_du" value="<?php echo $course_du?>">
            <input class="form-control" type="hidden" name="ctp_id" value="<?php echo $ctp?>">
            <input class="form-control" type="number" id="duration" name="duration" required><br>
            <hr>
            <input type="submit" class="btn btn-success" style="float:right;" name="saveDuration" />
          </form>

        </center>
      </div>
    </div>
  </div>
</div>


<!-- edit category modal -->
<div class="modal fade" id="objective" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Add Objective</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
          <form method="post" action="insert_objective.php" style="width:80%;">
            <?php if (isset($_SESSION['ctp_value'])) { ?>
              <input class="form-control" type="hidden" name="ctp" value="<?php echo $ctp ?>">
            <?php } ?>
            <input class="form-control" type="hidden" name="id" value="" id="pid">
            <!-- <input class="form-control" type="" name="id" value="" id="p_name"> -->
            <!-- <input class="form-control" type="text" name="objective"> -->
            <textarea class="form-control" type="text" name="objective"></textarea>
            <input style="margin:5px;" class="btn btn-success" type="submit" name="saveit" value="Submit">
          </form>
        </center>
      </div>
    </div>
  </div>
</div>




<!--Script for add multiple categorys-->

<script type="text/javascript">
  $(document).ready(function() {


    var html = '<tr>\
	                        <td style="text-align: center;"><input type="text" placeholder="Enter category" name="category[]" id="categoryval" class="form-control" value="" required/> </td>\
                          <td style="text-align: center;"><input type="text" placeholder="Enter Marks" name="marks[]" id="categoryval" class="form-control" value="" required/> </td>\
	                        <td><button type="button" name="remove_actual" id="remove_category" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
	                    </tr>'
    var max = 100;
    var a = 1;

    $("#add_category").click(function() {
      if (a <= max) {
        $("#table-field-depcate").append(html);
        a++;
      }
    });
    $("#table-field-depcate").on('click', '#remove_category', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
</script>


<script>
  function category() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("categorysearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("categorytable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
</script>


 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>

</html>