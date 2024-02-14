
<form method="post" action="insert_exam_role.php">
         <center><h4 class="text-success">Exam for Roles</h4></center>
              <table class="table" id="table-field-mutiple">
                    <tr>
                      
                      <td>
                        <div class="row">
                       
                          <div class="col-md-12 mb-2">

                                    <div class="form-outline">
                                    <label class="text-dark" style="font-weight:bold;">Title Of Exam</label>
                                     <input type="text" class="form-control" name="title" placeholder="Enter title of exam..">
                                    </div>

                                  </div>
                        </div>
                        

                        <div class="row">
                          <div class="col-md-6 mb-3">

                            <div class="form-outline mb-2">
                              <label class="form-label text-dark" for="course" style="font-weight:bold;">Category</label>
                             </div>
                            </div>
                            <div class="col-md-6 mb-3">
                            <div class="form-outline mb-2">
                              <label class="form-label text-dark" for="course" style="font-weight:bold;">Percentage</label>
                            </div>
                           </div>
                           <?php 
                              $q_test_cou = "SELECT * FROM test_course";
                              $st_test_cou = $connect->prepare($q_test_cou);
                              $st_test_cou->execute();
             
                              if ($st_test_cou->rowCount() > 0) {
                                $re_test_cou = $st_test_cou->fetchAll();
                                foreach ($re_test_cou as $row_test_cou) {
                           ?>
                            <div class="col-md-6 mb-3">
                            <div class="form-outline mb-2">
                              <input type="text" id="option1" name="course_name[]" value="<?php echo $row_test_cou['course_name'];?>" class="form-control form-control-md" readonly />
                            </div>
                            </div>
                            <div class="col-md-6 mb-3">
                            <div class="form-outline mb-2">
                              <input list="percentage1" name="percentage[]" placeholder="Percentage" class="form-control form-control-md" />
                              <datalist id="percentage1">
                                  <option value="1">
                                  <option value="2">
                                  <option value="3">
                                  <option value="4">
                                  <option value="5">
                                  <option value="6">
                                  <option value="7">
                                  <option value="8">
                                  <option value="9">
                                  <option value="10">
                                  <option value="11">
                                  <option value="12">
                                  <option value="13">
                                  <option value="14">
                                  <option value="15">
                                  <option value="16">
                                  <option value="17">
                                  <option value="18">
                                  <option value="19">
                                  <option value="20">
                                </datalist>
                                
                            </div>
                            </div>
                            <?php
                            }} ?>
                        </div>
                        
                        <!-- <div class="row">
                          <div class="col-md-4 mb-2">

                            <div class="form-outline">
                              <label class="form-label" for="answers" style="color: black; font-weight:bold;">Correct Answer</label>
                              <input type="text" id="answer" name="answer[]" class="form-control form-control-md" required />
                            </div>

                          </div>
                          <div class="col-md-4 mb-2">

                            <div class="form-outline">
                              <label class="form-label" for="marks" style="color: black; font-weight:bold;">Marks</label>
                              <input type="text" id="marks" name="marks[]" class="form-control form-control-md" required />
                            </div>

                          </div>
                          <div class="col-md-4 mb-2">

                            <div class="form-outline">
                              <label class="form-label" for="course" style="color: black; font-weight:bold;">Difficulty</label>
                              <select class="form-control" required name="difficulty[]" required>
                                <option value="" disabled selected>Select Difficulty</option>
                                <option value="easy">Easy</option>
                                <option value="medium">Medium</option>        
                                <option value="hard">Hard</option>  
                                <option value="veryhard">Very Hard</option>  
                              </select>
                            </div>

                          </div>
                        </div> -->
                      </td>
                      <!-- <td><button type="button" name="add_multiple" id="add_multiple" class="btn btn-soft-primary" style="margin-top: 30px;"><i class="bi bi-plus-circle-fill"></i></button></td> -->
                    </tr>
                  </table>
         
                  <input style="margin:5px; font-weight: bold; font-size:large; float:right;" class="btn btn-success" type="submit" name="saveit" value="Submit">
                        </form>

<script type="text/javascript">
  $(document).ready(function() {


    var html = '<tr>\
                          <td>\
                        <div class="row">\
                          <div class="col-md-12 mb-2">\
                            <div class="form-outline">\
                              <label class="form-label text-dark" for="course" style="font-weight:bold;">Question<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>\
                              <textarea type="text" id="question" name="question[]" class="form-control form-control-md" required /></textarea>\
                            </div>\
                          </div>\
                        </div>\
                        <div class="row">\
                          <div class="col-md-3 mb-2">\
                            <div class="form-outline">\
                              <label class="form-label text-dark" for="course" style="font-weight:bold;">Option 1</label>\
                              <input type="text" id="option1" name="option1[]" class="form-control form-control-md" required />\
                            </div>\
                          </div>\
                          <div class="col-md-3 mb-2">\
                            <div class="form-outline">\
                              <label class="form-label text-dark" for="course" style="font-weight:bold;">Option 2</label>\
                              <input type="text" id="option2" name="option2[]" class="form-control form-control-md" required />\
                            </div>\
                          </div>\
                          <div class="col-md-3 mb-2">\
                            <div class="form-outline">\
                              <label class="form-label text-dark" for="course" style="font-weight:bold;">Option 3</label>\
                              <input type="text" id="option3" name="option3[]" class="form-control form-control-md" required />\
                            </div>\
                          </div>\
                          <div class="col-md-3 mb-2">\
                            <div class="form-outline">\
                              <label class="form-label text-dark" for="course" style="font-weight:bold;">Option 4</label>\
                              <input type="text" id="option4" name="option4[]" class="form-control form-control-md" required />\
                            </div>\
                          </div>\
                        </div>\
                        <div class="row">\
                          <div class="col-md-4 mb-2">\
                            <div class="form-outline">\
                              <label class="form-label text-dark" for="answers" style="font-weight:bold;">Correct Answer</label>\
                              <input type="text" id="answer" name="answer[]" class="form-control form-control-md" required />\
                            </div>\
                          </div>\
                          <div class="col-md-4 mb-2">\
                            <div class="form-outline">\
                              <label class="form-label text-dark" for="marks" style="font-weight:bold;">Marks</label>\
                              <input type="text" id="marks" name="marks[]" class="form-control form-control-md" required />\
                            </div>\
                          </div>\
                          <div class="col-md-4 mb-2">\
                            <div class="form-outline">\
                              <label class="form-label text-dark" for="course" style="font-weight:bold;">Difficulty</label>\
                              <select class="form-control" name="difficulty[]" required>\
                                <option value="" disabled selected>Select Difficulty</option>\
                                <option value="easy">Easy</option>\
                                <option value="medium">Medium</option>\
                                <option value="hard">Hard</option>\
                                <option value="veryhard">Very Hard</option>\
                              </select>\
                            </div>\
                          </div>\
                        </div>\
                      </td>\
                          <td><button type="button" name="remove_course" id="remove_course" class="btn btn-soft-danger" style="margin-top:30px;"><i class="bi bi-dash-circle-fill"></i></button></td>\
                      </tr>'
    var max = 100;
    var a = 1;

    $("#add_multiple").click(function() {
      if (a <= max) {
        $("#table-field-mutiple").append(html);
        a++;
      }
    });
    $("#table-field-mutiple").on('click', '#remove_course', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
</script>