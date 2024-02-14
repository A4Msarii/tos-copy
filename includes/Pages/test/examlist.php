<div class="row justify-content-center">

  <div class="col-lg-12 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <!-- Header -->

      <!-- Body -->
      <div class="card-body">


        <table class="table table-striped table-bordered" id="examlisttable">
          <input style="margin:5px;" class="form-control" type="text" id="examlistsearch" onkeyup="examlistsearch()" placeholder="Search for Course.." title="Type in a name">
          <thead class="bg-dark">
            <th class="text-white">Sr No</th>
            <th class="text-white">Exam Name</th>
            <th class="text-white">Question</th>
        
            <th class="text-white">Code</th>
            <th class="text-white" colspan="2">Action</th>
           </thead>
          <tbody>
            <?php 
             $q_exam_list = "SELECT * FROM exam_question_ist group by exam_id,code order by id desc";
             $st_exam_list = $connect->prepare($q_exam_list);
             $st_exam_list->execute();
           
             if ($st_exam_list->rowCount() > 0) {
              $sn_v=1;
               $re_exam_list = $st_exam_list->fetchAll();
               foreach ($re_exam_list as $row_exam_list) {
                 $id_exam=$row_exam_list['exam_id'];
                 $code_exam=$row_exam_list['code'];
                 if($code_exam==""){
                  $code_val="No Code";
                 }else{
                  $code_val=$code_exam;
                 }
                $fetch_exams_name = $connect->prepare("SELECT examName FROM `examname` WHERE id=?");
                    $fetch_exams_name->execute([$id_exam]);
                    $exams_names = $fetch_exams_name->fetchColumn();
                    $fetch_exams_name1 = $connect->prepare("SELECT course_id FROM `examname` WHERE id=?");
                    $fetch_exams_name1->execute([$id_exam]);
                    $exams_names1 = $fetch_exams_name1->fetchColumn();
                    $exam_name="";   
                         if($exams_names1==""){
                    $exam_name=$exams_names;
                  }else{
                $exam_name1=$exams_names;
                $fetch_exam_name = $connect->query("SELECT shorttest FROM test WHERE id = '$exam_name1'");
                $exam_name = $fetch_exam_name->fetchColumn();
              }
            ?>
             <tr>  
                <td><?php echo $sn_v++; ?></td>
                <td><?php echo $exam_name; ?></td>
                <td><button class="btn btn-primary btn-sm get_question_data" data-bs-toggle="modal" data-bs-target="#view_questions" id="<?php echo $row_exam_list['exam_id']; ?>">View questions</button></td>
                <td><?php echo $code_val; ?></td>
                <td> <a class="btn btn-soft-danger btn-xs" href="<?php echo BASE_URL;?>includes/Pages/test/examdelete.php?id=<?php echo $row_exam_list['exam_id']?>"><i class="bi bi-trash-fill"></i></a></td>
               </tr>
               <?php }
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
<!-- Modal For give academic-->
<div class="modal fade" id="view_questions" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Select Student to give class</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="col">
                <table class="table table-bordered table-striped" id="student_fetch1">
                    <thead class="bg-dark">
                      <tr>
                        
                        <th class="text-white">SN no.</th>
                        <th class="text-white">Questions</th>
                        <th class="text-white">correst answer</th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
             
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>


<script>
    $(document).on("click", ".get_question_data", function() {
      var id = $(this).attr('id');
      
      $.ajax({
        type: 'POST',
        url: '<?php echo BASE_URL;?>includes/Pages/test/fetch_question.php',
        data: 'id=' + id,
        success: function(response) {
          $('#student_fetch1 tbody').empty();
          $("#student_fetch1 tbody").append(response);

        }
      });
    });
  </script>