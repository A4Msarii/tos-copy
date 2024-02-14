<style type="text/css">
  /* CSS to style the input boxes */
.form-control.generated-input {
    width: 21%; /* Adjust the width as needed to fit 4 input boxes per row */
    display: inline-block;
    margin-right: 2%; /* Add some margin to separate the input boxes */
}

</style>
<form method="post" action="<?php echo BASE_URL;?>includes/Pages/test/insert_diagram_form.php" enctype="multipart/form-data">
         <center><h4 class="text-success">Diagram Labelling</h4></center>
              <table class="table" id="table-field-diagram">
                    <tr>
                      
                      <td>
                        <div class="col-md-12 mb-2">

                                    <div class="form-outline">
                                    <label class="text-dark" style="font-weight:bold;">Select Course</label>
                                      <select class="form-control" name="course" required>
                                    
                                                <?php  echo $course_names11; ?>
                                  </select>
                                    </div>

                                  </div>
                        <div class="row">
                          <input type="hidden" value="diagram" name="type">
                          <div class="col-md-12 mb-2">

                            <div class="form-outline">
                              <label class="form-label text-dark" for="course" style="font-weight:bold;">Question<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                              <textarea type="text" id="question" name="question[]" class="form-control form-control-md" required></textarea>
                            </div>

                          </div>
                          <div class="col-md-3 mb-2">

                            <div class="form-outline">
                              <label class="form-label text-dark" for="course" style="font-weight:bold;">Add Image<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                              <input type="file" id="file" name="file[]" accept="image/*" class="form-control form-control-md" required>
                            </div>

                          </div>
                          
                          <div class="col-md-3 mb-2">

                            <div class="form-outline">
                               <label for="labels" class="form-label text-dark" style="font-weight:bold;">Select How many Labels</label><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span>        
                               <select class="form-control test_lables" name="lables_number">
                               <option value="" disabled>Select</option>
                               <?php for ($i = 1; $i <= 25; $i++) { ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
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
                          <div class="col-md-12 mb-2">
                            <div class="form-outline">
                                <div id="inputContainer">
                                    <!-- Inputs will be dynamically added here -->
                                </div>
                            </div>
                        </div>

                        </div>
                      </td>
                      <!-- <td><button type="button" name="add_diagram" id="add_diagram" class="btn btn-soft-primary" style="margin-top: 30px;"><i class="bi bi-plus-circle-fill"></i></button></td> -->
                    </tr>
                  </table>
          

                  <input style="margin:5px; font-weight: bold; font-size:large; float:right;" class="btn btn-success" type="submit" name="saveit" value="Submit">
                        </form>


    <script type="text/javascript">
  $(document).ready(function() {


    var html = `
  <tr>
    <td>
      <div class="row">
        <div class="col-md-12 mb-2">
          <div class="form-outline">
            <label class="form-label text-dark" for="course" style="font-weight:bold;">Question<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
            <textarea type="text" id="question" name="question[]" class="form-control form-control-md" required></textarea>
          </div>
        </div>
        <div class="col-md-3 mb-2">
          <div class="form-outline">
            <label class="form-label text-dark" for="course" style="font-weight:bold;">Add Image<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
            <input type="file" id="file" name="file[]" class="form-control form-control-md" required>
          </div>
        </div>
       <div class="col-md-3 mb-2">
          <div class="form-outline">
            <label for="labels" class="form-label text-dark" style="font-weight:bold;">Labels (comma-separated):<i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></label>
            <input type="text" name="labels[]" id="number" class="form-control form-control-md" required>
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
            <label class="form-label text-dark" for="course" style="font-weight:bold;">Document<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
            <select class="form-control" required name="document[]" required>
              <option value="" disabled selected>Select Document</option>
              <?php echo $document_test?>
            </select>
          </div>
        </div>
      </div>
    </td>
    <td><button type="button" name="remove_diagram" id="remove_diagram" class="btn btn-soft-danger" style="margin-top:30px;"><i class="bi bi-dash-circle-fill"></i></button></td>
  </tr>
`;

    var max = 100;
    var a = 1;

    $("#add_diagram").click(function() {
      if (a <= max) {
        $("#table-field-diagram").append(html);
        a++;
      }
    });
    $("#table-field-diagram").on('click', '#remove_diagram', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
</script>
<script>
    var inputContainer = $('#inputContainer');
    var inputsPerRow = 4; // Set the number of inputs per row

    $(".test_lables").on("change", function() {
        var selectedValue = $(this).val();
        inputContainer.empty();

        for (var i = 1; i <= selectedValue; i++) {
            var label = $('<label>').text(String.fromCharCode(96 + i) + ": ");
            var input = $('<input type="text" class="form-control generated-input mb-2" name="labels_value[]" required>');

            inputContainer.append(label);
            inputContainer.append(input);

            if (i % inputsPerRow === 0) {
                // Add a new line break after every 'inputsPerRow' inputs
                inputContainer.append('<br>');
            }
        }
    });
</script>
