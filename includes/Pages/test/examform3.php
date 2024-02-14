<div class="row justify-content-center">

  <div class="col-lg-10 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

      <div class="card-body">
        <div class="row">
          <div class="col-md-6 mb-3">

            <div class="form-outline mb-2">
              <label class="form-label text-dark" for="course" style="color: black; font-weight:bold;">Select repeatation</label>
              <select class="form-control" id="cat_dropdown1" name="exam_Types">
                <option value="" disabled>Select</option>
                <option value="once">Once</option>
                <option value="repeat">Repeat</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-outline mb-2">
              <label class="form-label text-dark" for="course" style="font-weight:bold;">Result</label>
              <select class="form-control" name="type_reult">
                <option value="show">Show Result</option>
                <option value="hide">Hide Result</option>
              </select>
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-md-6 mb-3">

            <div class="form-outline mb-2">
              <label class="form-label text-dark" for="course" style="font-weight:bold;">Minimum Passing Value</label>
              <input type="number" name="passing_marks" class="form-control" oninput="checkMarks(this)">
              <p class="error-message" style="color: red;"></p>
            </div>
          </div>
          <div class="col-md-6 mb-3">

            <div class="form-outline mb-2">
              <label class="form-label text-dark" for="course" style="font-weight:bold;">Type Of Exam</label>
              <select class="form-control" name="type_Exam">
                <option value="Open_Book">Open Book</option>
                <option value="closed">closed</option>
              </select>
            </div>
          </div>

        </div>
        <div class="row">
          <div class="col-md-6 mb-3">

            <div class="form-outline mb-2">
              <label class="form-label text-dark" for="course" style="font-weight:bold;">Need Code To start exam</label>
         <select class="form-control" name="code">
          <option value="" disabled>Select Option</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
         </select>
            </div>
          </div>
          </div>
      </div>
      <!-- End Body -->
      <hr style="margin:0px;">
        <div class="button" style="margin: 20px;">
          <button class="btn btn-primary previous-button" style="font-size: large; font-weight:bold; float: left;">Previous</a>
          <button class="btn btn-primary next-button" style="font-size: large; font-weight:bold; float: right;">Next</a>
        </div>
    </div>
    <!-- End Card -->
  </div>
</div>

<script>
  function checkMarks(input) {
    const errorMessage = input.nextElementSibling; // Get the next sibling (error message)
    const value = input.valueAsNumber;
    const marksVal = document.getElementById("total_marks_question").value;

    if (value > marksVal) {
      errorMessage.textContent = 'Minimum Value Will be Less Than Total Marks.';
      input.setCustomValidity('Invalid input');
    } else {
      errorMessage.textContent = '';
      input.setCustomValidity('');
    }
  }
</script>