<div class="row justify-content-center">

  <div class="col-lg-10 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <!-- Header -->

      <!-- Body -->
      <div class="card-body">
        <form action="<?php echo BASE_URL;?>includes/Pages/insert_Course_test.php" method="post">
          <table class="table" id="table-field-course">
            <tr>

              <td>
                <div class="row">
                  <div class="col-md-6 mb-2">

                    <div class="form-outline">
                      <label class="form-label text-dark" for="course" style="font-weight:bold;">Category Name<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                      <input type="text" id="course_name_id" name="course[]" class="form-control form-control-md" required />
                    </div>

                  </div>
                  <div class="col-md-6 mb-2">

                    <div class="form-outline">
                      <label class="form-label text-dark" for="symbol" style="font-weight:bold;">Category Description</label>
                      <input type="text" id="description" name="description[]" class="form-control form-control-md" required />
                    </div>

                  </div>

                </div>
              </td>
              <td><button type="button" name="add_course" id="add_course" class="btn btn-soft-primary" style="margin-top: 30px;"><i class="bi bi-plus-circle-fill"></i></button></td>
            </tr>
          </table>
          <center><input type="submit" class="btn btn-success" style="font-size:large; font-weight:bold;"></center>
        </form>
        <hr>

        <table class="table table-striped table-bordered" id="categorytable">
          <input style="margin:5px;" class="form-control" type="text" id="categorysearch" onkeyup="categorysearch()" placeholder="Search for Course.." title="Type in a name">
          <thead class="bg-dark">
            <th class="text-white">Sr No</th>
            <th class="text-white">Category Name</th>
            <th class="text-white">Description</th>

            <th class="text-white" colspan="2">Action</th>
          </thead>
          <tbody>
            <?php
            $query_heatmap = "SELECT * FROM test_course";
            $statement_heatmap = $connect->prepare($query_heatmap);
            $statement_heatmap->execute();
            $sn_val = 1;
            $result_heatmap = $statement_heatmap->fetchAll();
            foreach ($result_heatmap as $row_heatmap) {
            ?>
              <tr>
                <td><?php echo $sn_val++; ?></td>
                <td><?php echo $row_heatmap['course_name']; ?></td>
                <td><?php echo $row_heatmap['course_description']; ?></td>

                <td><a class="btn btn-soft-success btn-xs" href="" onclick="document.getElementById('phid').value='<?php echo $row_heatmap['id'] ?>';
                                        document.getElementById('course_name').value='<?php echo $row_heatmap['course_name']; ?>';
                                        document.getElementById('descriptioncate').value='<?php echo $row_heatmap['course_description']; ?>';" data-bs-toggle="modal" data-bs-target="#editcou"><i class="bi bi-pen-fill"></i></a>
                  <a class="btn btn-soft-danger btn-xs" href="course_testdelete.php?id=<?php echo $row_heatmap['id'] ?>"><i class="bi bi-trash-fill"></i></a>

                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>

      
      </div>
      <!-- End Body -->
    </div>
    <!-- End Card -->
  </div>
</div>


<div class="modal fade" id="editcou" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Category</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form method="post" action="<?php echo BASE_URL;?>includes/Pages/edit_course_test.php">
            <div class="row">
              <div class="col-md-12">
              <input class="form-control" type="hidden" name="id" value="" id="phid">
              
                <label class="text-dark">Course Name</label>
                <input class="form-control" type="text" name="course_name" value="" id="course_name" placeholder="Insert Category">
              </div>
              <div class="col-md-12">
                <label class="text-dark">Course Description</label>
                <input class="form-control" type="text" name="course_dec" value="" id="descriptioncate" placeholder="Add Description">
              </div>
          </div><hr>
          <input style="margin:5px; font-weight: bold; font-size:large; float:right;" class="btn btn-success" type="submit" name="saveit" value="Submit">
          </form>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
  $(document).ready(function() {


    var html = '<tr>\
                          <td>\
                        <div class="row">\
                        <div class="col-md-6 mb-2">\
                          <div class="form-outline">\
                            <input type="text" id="course_name_id" name="course[]" class="form-control form-control-md" placeholder="Insert Category" required />\
                          </div>\
                        </div>\
                        <div class="col-md-6 mb-2">\
                          <div class="form-outline">\
                            <input type="text" id="description" name="description[]" class="form-control form-control-md" placeholder="Add Decription"/>\
                          </div>\
                        </div>\
                       </div>\
                      </td>\
                          <td><button type="button" name="remove_course" id="remove_course" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                      </tr>'
    var max = 100;
    var a = 1;

    $("#add_course").click(function() {
      if (a <= max) {
        $("#table-field-course").append(html);
        a++;
      }
    });
    $("#table-field-course").on('click', '#remove_course', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
</script>

<script>
  $(".fetchExamDetail").on("click", function() {
    const examId = $(this).data("exam");
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/test/insert_exam_data.php',
      data: {
        examId: examId,
      },
      success: function(response) {
        $("#examDEtail").empty();
        $("#examDEtail").html(response);
      }
    });
  });
</script>

<script>
  function categorysearch() {
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