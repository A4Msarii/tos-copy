<?php
$course_names11 = "";
$q6 = "SELECT * FROM test_course";
$st6 = $connect->prepare($q6);
$st6->execute();



if ($st6->rowCount() > 0) {
  $re6 = $st6->fetchAll();
  foreach ($re6 as $row6) {
    $course_name_value = $row6['course_name'];
    $course_names11 .= '<option value="' . $row6['id'] . '">' . $course_name_value . '</option>';
  }
} ?>

<div class="row justify-content-center">

  <div class="col-lg-10 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

      <div class="card-body">
      <label style="font-weight:bold;" class="text-dark">Select Category</label>
          <select id="categorySelect" class="form-control">
          <option value="">select category</option>
          <?php echo $course_names11; ?>
          </select>
        <table class="table" id="multiplecate1">
          <?php 
        $stmt = $connect->prepare("SELECT * FROM temp_cat");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Display data as HTML table rows
        foreach ($result as $row) {
            $hashCheck=$row['cat_id'];
            $fetch_hash_name = $connect->prepare("SELECT course_name FROM `test_course` WHERE id=?");
            $fetch_hash_name->execute([$hashCheck]);
            $hash_names = $fetch_hash_name->fetchColumn();
            echo '<tr>';
            echo '<td><input type="text" value="'.$hash_names.'" class="form-control" readonly><input type="hidden" value="'.$row['cat_id'].'" class="form-control" name="examSub[]" readonly></td>';
            echo '<td><input type="text" name="examSubPer[]" class="form-control"></td>';
            echo '</tr>';
        }
       ?>   
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
              <input type="text" name="Easy" value="Easy" class="form-control form-control-md mb-2" readonly />
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
              <input type="text" name="Medium" value="Medium" class="form-control form-control-md mb-2" readonly />
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
              <input type="text" name="hard" value="Hard" class="form-control form-control-md mb-2" readonly />
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
              <input type="text" name="veryhard" value="Very Hard" class="form-control form-control-md mb-2" readonly />
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

