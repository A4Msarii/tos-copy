
<div class="row justify-content-center">

  <div class="col-lg-10 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
    <form action="insert_exam_data.php" method="post">
      <div class="card-body">
        <table class="table">
          <tr>
            <td>
               <label class="form-label text-dark" style="font-weight:bold;">Select Role</label>
              <select class="form-control select_roles_test" name="exam_for" required>
                <option value="" disabled>Select Role/people</option>
                <?php echo $roles_values; ?>
                <option value="par">particular User</option>
                <option value="course">Course</option>
                <option value="everyone">Everyone</option>
                <option value="dep">Department</option>
              </select>
            </td>
            <td id="not_Ctp_test">
              <label class="form-label text-dark" style="font-weight:bold;">Exam Name</label>
              <input type="text" name="exam_name" class="form-control" >
            </td>
            <td id="course" style="display:none">
              <label class="form-label text-dark" style="font-weight:bold;">Select Course</label>
             <select class="form-control" name="course_id" id="select_course_test">
              <option value="0" disabled>Select Course</option>
              <?php echo $course_name_es; ?>
             </select>
            </td>

          </tr>
          <tr>
            <td>
              <label class="form-label text-dark" style="font-weight:bold;">Number Of question</label>
              <input type="number" name="question_number" class="form-control" required>
            </td>
            <td>
              <label class="form-label text-dark" style="font-weight:bold;">Total marks</label>
              <input type="number" name="total_marks" class="form-control" id="total_marks_question" required>
            </td>
            </tr>
            <tr>
            <td>
              <label class="form-label text-dark" style="font-weight:bold;">Select Marks type</label>
              <select class="form-control" id="select_marks_types" required name="marks_type">
              <option value="" selected disabled>Select Marks Type</option>
              <option value="Equal">Equal distribute</option>
              <option value="manual">manual distribute</option>
              </select>
            </td>
            <td style="display:none" id="user_idded">
              <label class="form-label text-dark" style="font-weight:bold;">user name</label>
              <input type="text" class="form-control" id="username-input" placeholder="Type to search for usernames">
              <div id="suggestions">
              </div>
            </td>
             <td id="Ctp_test" style="display:none" >
              <label class="form-label text-dark"  style="font-weight:bold;">Select Exam Name</label>
              <select id="fetch_tets_class" class="form-control" name="exam_names">
                
              </select>
            </td>
            <td id="dep_fetch" style="display:none">
              <label class="form-label text-dark" style="font-weight:bold;">Select Department Name</label>
              <select class="form-control" name="exam_dep">
                <?php echo $dep_values; ?>
              </select>
            </td>
          </tr>
        </table>
      </div>
      <!-- End Body -->
    </div>
    <!-- End Card -->
  </div>
</div>