<div class="row justify-content-center">

  <div class="col-lg-10 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

      <div class="card-body">
        <table class="table" id="table-field-multiplecate">
          <tr>
            <td style="width: 50%;">
              <label style="font-weight:bold;" class="text-dark">Category</label>
              <div class="form-outline mb-2" style="width:auto;">
                        <select class="form-control text-dark" id="cat_dropdown1" name="examSub[]" required>
                          <option value="" disabled>select category</option>
                          <?php echo $course_names11; ?>
                        </select>
                      </div>
            </td>
            <td style="width: 50%;">
              <label style="font-weight:bold;" class="text-dark">Percenatage</label>
              <div class="form-outline mb-2" style="width:auto;">
                        <input type="number" name="examSubPer[]" placeholder="Percentage" class="form-control form-control-md marks-input catPer" min="0" max="100" value="0" oninput="checkInput(this)" required>
                        <p class="error-message" style="color: red;"></p>
                      </div>
            </td>
            <td><button style="margin:30px;" type="button" name="add_cate" id="add_cate" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="row justify-content-center">

  <div class="col-lg-10 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

      <div class="card-body">
         
         <table class="table" id="table-field-multipletype">
          <tr>
            <td style="width: 50%;">
              <label style="font-weight:bold;" class="text-dark">Type</label>
              <div class="form-outline mb-2">
                        <select class="form-control text-dark" id="cat_dropdown1" name="examType[]" required>
                          <option value="" disabled>select category</option>
                          <option value="mcq">Multiple Choice Question(MCQ)</option>
                          <option value="trueOrFalse">True Or False</option>
                          <option value="digrame">Diagram Labeling</option>
                        </select>
                      </div>
            </td>
            <td style="width: 50%;">
              <label style="font-weight:bold;" class="text-dark">Percenatage</label>
              <div class="form-outline mb-2">
                        <input type="number" name="examTypePer[]" placeholder="Percentage" class="form-control form-control-md marks-input typePer" min="0" max="100" value="0" oninput="checkInput(this)" required>
                        <p class="error-message" style="color: red;"></p>
                      </div>
            </td>
            <td><button style="margin:30px;" type="button" name="add_type" id="add_type" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
          </tr>
        </table>
</div>
</div>
</div>
</div>

<div class="row justify-content-center">

  <div class="col-lg-10 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

      <div class="card-body">

        <div class="row">
          <div class="col-md-6 mb-3">

            <div class="form-outline mb-2">
              <label class="form-label text-dark" style="font-weight:bold;">Difficulty</label>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-outline mb-2">
              <label class="form-label text-dark" style="font-weight:bold;">Percentage</label>
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <div class="form-outline mb-2">
              <input type="text" id="option1" name="Easy[]" value="Easy" class="form-control form-control-md mb-2" readonly />
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-outline mb-2">
              <input type="number" name="percentageEasy" placeholder="Percentage" class="form-control form-control-md marks-input diffPer" min="0" max="100" value="25" oninput="checkInput(this)" />
              <p class="error-message" style="color: red;"></p>
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <div class="form-outline mb-2">
              <input type="text" id="option1" name="Medium" value="Medium" class="form-control form-control-md mb-2" readonly />
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-outline mb-2">
              <input type="number" name="percentageMedium" value="25" placeholder="Percentage" class="form-control form-control-md marks-input diffPer" min="0" max="100" oninput="checkInput(this)" />
              <p class="error-message" style="color: red;"></p>
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <div class="form-outline mb-2">
              <input type="text" id="option1" name="hard" value="Hard" class="form-control form-control-md mb-2" readonly />
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-outline mb-2">
              <input type="number" name="percentagehard" value="25" placeholder="Percentage" class="form-control form-control-md marks-input diffPer" min="0" max="100" oninput="checkInput(this)" />
              <p class="error-message" style="color: red;"></p>
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <div class="form-outline mb-2">
              <input type="text" id="option1" name="veryhard" value="Very Hard" class="form-control form-control-md mb-2" readonly />
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-outline mb-2">
              <input type="number" name="percentageveryhard" value="25" placeholder="Percentage" class="form-control form-control-md marks-input diffPer" min="0" max="100" oninput="checkInput(this)" />
              <p class="error-message" style="color: red;"></p>
            </div>
          </div>

        </div>

      </div>
      <!-- End Body -->
    </div>
    <!-- End Card -->
  </div>
</div>

<script>
  function checkInput(input) {
    const errorMessage = input.nextElementSibling; // Get the next sibling (error message)
    const value = input.valueAsNumber;

    if (value < 0 || value > 100) {
      errorMessage.textContent = 'Marks must be between 0 and 100.';
      input.setCustomValidity('Invalid input');
    } else {
      errorMessage.textContent = '';
      input.setCustomValidity('');
    }
  }
  const inputBoxes1 = document.querySelectorAll('.catPer');

  inputBoxes1.forEach((input) => {
    input.addEventListener('input', () => {
      let errorMessage = input.nextElementSibling;
      // Initialize a variable to store the sum of values
      let sum = 0;

      // Loop through each input box and add its value to the sum
      inputBoxes1.forEach((box) => {
        const value = parseFloat(box.value) || 0; // Convert input value to a number, default to 0 if NaN
        sum += value;
      });

      // Check if the sum exceeds 100 and display a message accordingly
      if (sum > 100) {
        errorMessage.textContent = "You can't enter a total value more than 100.";
      } else {
        // resultElement.textContent = `Total value: ${sum}`;
        errorMessage.textContent = "";
      }
    });
  });

  const inputBoxes2 = document.querySelectorAll('.diffPer');

  inputBoxes2.forEach((input) => {
    input.addEventListener('input', () => {
      let errorMessage = input.nextElementSibling;
      // Initialize a variable to store the sum of values
      let sum = 0;

      // Loop through each input box and add its value to the sum
      inputBoxes2.forEach((box) => {
        const value = parseFloat(box.value) || 0; // Convert input value to a number, default to 0 if NaN
        sum += value;
      });

      // Check if the sum exceeds 100 and display a message accordingly
      if (sum > 100) {
        errorMessage.textContent = "You can't enter a total value more than 100.";
      } else {
        // resultElement.textContent = `Total value: ${sum}`;
        errorMessage.textContent = "";
      }
    });
  });

  const inputBoxes3 = document.querySelectorAll('.typePer');

  inputBoxes3.forEach((input) => {
    input.addEventListener('input', () => {
      let errorMessage = input.nextElementSibling;
      // Initialize a variable to store the sum of values
      let sum = 0;

      // Loop through each input box and add its value to the sum
      inputBoxes3.forEach((box) => {
        const value = parseFloat(box.value) || 0; // Convert input value to a number, default to 0 if NaN
        sum += value;
      });

      // Check if the sum exceeds 100 and display a message accordingly
      if (sum > 100) {
        errorMessage.textContent = "You can't enter a total value more than 100.";
      } else {
        // resultElement.textContent = `Total value: ${sum}`;
        errorMessage.textContent = "";
      }
    });
  });

  $(document).ready(function() {
    // append category
    $(document).on('click', '#addctegory', function() {
      var html = ``;
      $('.append-category').append(html);
    })

    $(document).on('click', '#addtype', function() {
      var html = ``;
      $('.append-type').append(html);
    })
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {


    var html = '<tr>\
              <td style="width: 50%;">\
              <label style="font-weight:bold;" class="text-dark">Type</label>\
              <div class="form-outline mb-2">\
                        <select class="form-control text-dark" id="cat_dropdown1" name="examType[]" required>\
                          <option value="" disabled>select category</option>\
                          <option value="mcq">Multiple Choice Question(MCQ)</option>\
                          <option value="trueOrFalse">True Or False</option>\
                          <option value="digrame">Diagram Labeling</option>\
                        </select>\
                      </div>\
            </td>\
            <td style="width: 50%;">\
              <label style="font-weight:bold;" class="text-dark">Percenatage</label>\
              <div class="form-outline mb-2">\
                        <input type="number" name="examTypePer[]" placeholder="Percentage" class="form-control form-control-md marks-input typePer" min="0" max="100" value="0" oninput="checkInput(this)" required>\
                        <p class="error-message" style="color: red;"></p>\
                      </div>\
            </td>\
                <td>\
                  <button style="margin:30px;" type="button" name="remove_type" id="remove_type" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button>\
                </td>\
                      </tr>'
    var max = 100;
    var a = 1;

    $("#add_type").click(function() {
      if (a <= max) {
        $("#table-field-multipletype").append(html);
        a++;
      }
    });
    $("#table-field-multipletype").on('click', '#remove_type', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {


    var html = '<tr>\
              <td style="width: 50%;">\
              <label style="font-weight:bold;" class="text-dark">Category</label>\
              <div class="form-outline mb-2">\
                        <select class="form-control text-dark" id="cat_dropdown1" name="examSub[]" required>\
                          <option value="" disabled>select category</option>\
                          <?php echo $course_names11; ?>
                        </select>\
                      </div>\
            </td>\
            <td style="width: 50%;">\
              <label style="font-weight:bold;" class="text-dark">Percenatage</label>\
              <div class="form-outline mb-2">\
                        <input type="number" name="examSubPer[]" placeholder="Percentage" class="form-control form-control-md marks-input catPer" min="0" max="100" value="0" oninput="checkInput(this)" required>\
                        <p class="error-message" style="color: red;"></p>\
                      </div>\
            </td>\
                <td>\
                  <button style="margin:30px;" type="button" name="remove_cate" id="remove_cate" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button>\
                </td>\
                      </tr>'
    var max = 100;
    var a = 1;

    $("#add_cate").click(function() {
      if (a <= max) {
        $("#table-field-multiplecate").append(html);
        a++;
      }
    });
    $("#table-field-multiplecate").on('click', '#remove_cate', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
</script>