
<form method="post" action="<?php echo BASE_URL;?>includes/Pages/insert_exa_tf.php" enctype="multipart/form-data">
         <center><h4 class="text-success">True Or False</h4></center>
              <table class="table" id="table-field-mutiple">
                    <tr>
                      
                      <td>
                         <div class="col-md-12 mb-2">

                                    <div class="form-outline">
                                    <label class="text-dark" style="font-weight:bold;">Select Course</label>
                                      <select class="form-control" name="course">
                                    
                                                <?php  echo $course_names11; ?>
                                  </select>
                                    </div>

                                  </div>
                        <div class="row">
                          <input type="hidden" value="true_false" name="type">
                          <div class="col-md-12 mb-2">

                            <div class="form-outline">
                              <label class="form-label text-dark" for="course" style="font-weight:bold;">Question<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                              <textarea type="text" id="question" name="question[]" class="form-control form-control-md" required></textarea>
                            </div>

                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="col-md-3 mb-2">

                            <div class="form-outline">
                              <label class="form-label text-dark" for="answers" style="font-weight:bold;">Correct Answer</label>
                              <select class="form-control" name="correct_answer[]" required>
                                <option value="" disabled>Select Answer</option>
                                <option value="true">True</option>
                                <option value="false">False</option>        
                              </select>
                            </div>

                          </div>
                          <div class="col-md-3 mb-2">

                            <div class="form-outline">
                              <label class="form-label text-dark" for="course" style="font-weight:bold;">Difficulty</label>
                              <select class="form-control" required name="difficulty[]">
                                <option value="" disabled>Select Difficulty</option>
                                <option value="easy">Easy</option>
                                <option value="medium">Medium</option>        
                                <option value="hard">Hard</option>  
                                <option value="veryhard">Very Hard</option>  
                              </select>
                            </div>

                          </div>
                          <div class="col-md-3 mb-2">
                               <div class="form-outline">
                              <label class="form-label text-dark" for="course" style="font-weight:bold;">Document</label>
                              <select class="form-control" name="document[]">
                                <option value="" disabled selected>Select Document</option>
                                <?php echo $document_test?>
                              </select>
                            </div>

                            </div>
                            <div class="col-md-3 mb-2">
            <div class="form-outline">
              <label class="form-label text-dark" for="course" style="font-weight:bold;">Add Image<span style="color:red;">&nbsp;(Optional)</span></label>
              <input type="file" id="" name="trueFalseFile[]" class="form-control form-control-md" />
            </div>

          </div>
                        </div>
                      </td>
                      <td><button type="button" name="add_multiple" id="add_multiple" class="btn btn-soft-primary" style="margin-top: 30px;"><i class="bi bi-plus-circle-fill"></i></button></td>
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
                              <label class="form-label text-dark" for="answers" style="font-weight:bold;">Correct Answer</label>\
                              <select class="form-control" name="correct_answer[]" required>\
                                <option value="" disabled>Select Answer</option>\
                                <option value="true">True</option>\
                                <option value="false">False</option></select>\
                            </div>\
                          </div>\
                         <div class="col-md-3 mb-2">\
                            <div class="form-outline">\
                              <label class="form-label text-dark" for="course" style="font-weight:bold;">Difficulty</label>\
                              <select class="form-control" name="difficulty[]" required>\
                                <option value="" disabled>Select Difficulty</option>\
                                <option value="easy">Easy</option>\
                                <option value="medium">Medium</option>\
                                <option value="hard">Hard</option>\
                                <option value="veryhard">Very Hard</option>\
                              </select>\
                            </div>\
                          </div>\
                          <div class="col-md-3 mb-2">\
                            <div class="form-outline">\
                              <label class="form-label text-dark" for="course" style="font-weight:bold;">Document</label>\
                              <select class="form-control" name="document[]">\
                                <option value="" disabled selected>Select Document</option>\
                                <?php echo $document_test?>
                              </select>\
                            </div>\
                          </div>\
                          <div class="col-md-3 mb-2">\
                            <div class="form-outline">\
                            <label class="form-label text-dark" for="course" style="font-weight:bold;">Add Image<span style="color:red;">&nbsp;(Optional)</span></label>\
                            <input type="file" id="" name="trueFalseFile[]" class="form-control form-control-md" />\
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