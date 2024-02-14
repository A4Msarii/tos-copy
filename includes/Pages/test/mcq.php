<div class="accordion" id="accordionExample">
  <?php
  $q4 = "SELECT * FROM exam_question where category='$category_name_id'";
  $st4 = $connect->prepare($q4);
  $st4->execute();

  if ($st4->rowCount() > 0) {
    $re4 = $st4->fetchAll();
    foreach ($re4 as $row4) {
      $type = $row4['type'];
      $difficulty = $row4['difficulty'];
      $option1 = htmlspecialchars($row4['option1'], ENT_QUOTES, 'UTF-8');

      $option2 = htmlspecialchars($row4['option2'], ENT_QUOTES, 'UTF-8');

      $option3 = htmlspecialchars($row4['option3'], ENT_QUOTES, 'UTF-8');

      $option4 = htmlspecialchars($row4['option4'], ENT_QUOTES, 'UTF-8');
      $typeClasses = array(
        'mcq' => '#00c9a7', // Use Bootstrap warning class
        'true_false' => 'violet', // Use Bootstrap success class
        'diagram' => 'orange',
        'digrame' => 'orange' // Use Bootstrap info class
      );
      $typeClass = isset($typeClasses[$type]) ? $typeClasses[$type] : 'bg-secondary';

      $difficultyClasses = array(
        'easy' => 'yellow', // Use Bootstrap warning class
        'medium' => 'green', // Use Bootstrap success class
        'hard' => 'blue',
        'veryhard' => 'red' // Use Bootstrap info class
      );
      $difficultyClasses = isset($difficultyClasses[$difficulty]) ? $difficultyClasses[$difficulty] : 'bg-secondary';

      $doc_in = $row4['document'];
      $doc_name = $connect->prepare("SELECT file_name FROM document_test WHERE id=?");
      $doc_name->execute([$doc_in]);
      $doc2 = $doc_name->fetchColumn();
  ?>
      <div class="accordion-item question-accordian" data-document="<?php echo $doc2; ?>">

        <div class="accordion-header mb-2" id="headingOne<?php echo $row4['id'] ?>">
          <a class="accordion-button text-dark buttontype" role="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo $row4['id'] ?>" aria-expanded="true" aria-controls="collapseOne" style="background-color:#71869d1f; font-size:large; font-weight:bold;">
            <span class="legend-indicator" style="background:<?php echo $typeClass; ?>;width: 20px;height: 20px;" title="<?php echo $row4['type']; ?>"></span>
            <span>
              <?php echo $row4['question']; ?></span>
            <div>
              <span class="badge m-1 type d-none"><?php echo $row4['type']; ?></span>
              <span class="badge m-1 difficulty" style="background-color:<?php echo $difficultyClasses; ?>;color: black;"><?php echo $row4['difficulty']; ?></span>
            </div>
          </a>

        </div>
        <div id="collapseOne<?php echo $row4['id'] ?>" class="accordion-collapse collapse" aria-labelledby="headingOne<?php echo $row4['id'] ?>" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <?php
            if ($type === 'mcq') {
            ?>
              <ul>
                <li class="nav-link">A. <?php echo $option1; ?></li>
                <li class="nav-link">B. <?php echo $option2; ?></li>
                <li class="nav-link">C. <?php echo $option3; ?></li>
                <li class="nav-link">D. <?php echo $option4; ?></li>
              </ul>
              <label style="font-weight: bold; font-size:large;" class="text-dark">Refrence : </label><?php echo $row4['questionRef']; ?><br>
            <?php
            } elseif ($type === 'true_false') {
            ?>
              <ul>
                <li class="nav-link">A. True</li>
                <li class="nav-link">B. False</li>
              </ul>
            <?php
            } elseif ($type === 'diagram' || $type === "digrame") {

            ?>
              <img style="height:300px; width:300px;border-radius:40px;" src="<?php echo BASE_URL; ?>includes/Pages/test/diagram/<?php echo $row4['file_name']; ?>"><br>
            <?php
            }
            if ($type === 'diagram' || $type === "digrame") {
              $decoded_data = unserialize($row4['correst_answer']);
            ?>
              <label style="font-weight: bold; font-size:large;" class="text-dark">Correct Answer : <span class="text-primary">
                  <?php
                  foreach ($decoded_data as $key => $value) {
                    echo "<p>$key: $value</p>";
                  }
                  ?>
                </span></label>
              <label style="font-weight: bold; font-size:large;" class="text-dark">Document : <a href="<?php echo BASE_URL; ?>includes/Pages/test_document/<?php echo $doc2; ?>" target="_blank"><span class="text-primary"><?php echo $doc2; ?></span></a></label>
            <?php } else { ?>

              <label style="font-weight: bold; font-size:large;" class="text-dark">Correct Answer : <span class="text-primary"><?php echo $row4['correst_answer']; ?></span></label>
              <label style="font-weight: bold; font-size:large;" class="text-dark">Document : <a href="<?php echo BASE_URL; ?>includes/Pages/test_document/<?php echo $doc2; ?>" target="_blank"><span class="text-primary"><?php echo $doc2; ?></span></a></label>
            <?php } ?>
            <br><br>
            <?php
            if ($type === 'mcq') {
            ?>
              <a class="btn btn-soft-success editDoc" data-doc="<?php echo $row4['document']; ?>" data-diff="<?php echo $row4['difficulty'] ?>" href="" onclick="document.getElementById('quid').value='<?php echo $row4['id'] ?>';
                          document.getElementById('question_name').value='<?php echo $row4['question']; ?>';
                          document.getElementById('option1').value='<?php echo $option1; ?>';
                          document.getElementById('option2').value='<?php echo $option2; ?>';
                          document.getElementById('option3').value='<?php echo $option3; ?>';
                          document.getElementById('option4').value='<?php echo $option4; ?>';
                          document.getElementById('refrenceQue').value='<?php echo $row4['questionRef']; ?>';
                      " data-bs-toggle="modal" data-bs-target="#editquestion">Edit</a>
              <a class="btn btn-soft-danger" href="<?php echo BASE_URL; ?>includes/Pages/test/mcq-delete.php?id=<?php echo $row4['id'] ?>">Delete</a>
            <?php
            } elseif ($type === 'true_false') {
            ?>
              <a class="btn btn-soft-success editDoc" data-doc="<?php echo $row4['document']; ?>" data-diff="<?php echo $row4['difficulty'] ?>" href="" onclick="document.getElementById('trueFalseId').value='<?php echo $row4['id'] ?>';
                          document.getElementById('questionNameTrueFalse').value='<?php echo $row4['question']; ?>';
                          document.getElementById('trueFalseOption1').value='<?php echo $row4['option1']; ?>';
                          document.getElementById('trueFalseOption2').value='<?php echo $row4['option2']; ?>';
                      " data-bs-toggle="modal" data-bs-target="#editquestiontrue">Edit</a>
              <a class="btn btn-soft-danger" href="<?php echo BASE_URL; ?>includes/Pages/test/mcq-delete.php?id=<?php echo $row4['id'] ?>">Delete</a>
            <?php
            } elseif ($type === 'diagram' || $type === "digrame") {
            ?>
              <a class="btn btn-soft-success editDigram" data-diagramid="<?php echo $row4['id']; ?>" data-diff="<?php echo $row4['difficulty'] ?>" href="" data-bs-toggle="modal" data-bs-target="#editquestiondiagram">Edit</a>
              <a class="btn btn-soft-danger" href="<?php echo BASE_URL; ?>includes/Pages/test/mcq-delete.php?id=<?php echo $row4['id'] ?>">Delete</a>
            <?php
            }
            ?>
          </div>
        </div>

      </div>
  <?php
    }
  }
  ?>
</div>





<div class="modal fade" id="editquestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row" method="post" action="<?php echo BASE_URL; ?>includes/Pages/test/editQuestion.php">
          <input class="form-control" type="hidden" name="mcqExamId" value=" " id="quid">
          <!-- Question -->
          <div class="col-12">
            <label class="form-label">Question</label>
            <input class="form-control" type="text" value="" placeholder="Write a question" id="question_name" name="questionName">
          </div>

          <!-- Answer options START -->
          <div class="col-6">
            <label class="form-label">Option 1</label>
            <input class="form-control" type="text" value="" placeholder="Write a option" id="option1" name="option1">
          </div>

          <div class="col-6">
            <label class="form-label">Option 2</label>
            <input class="form-control" type="text" value="" placeholder="Write a option" id="option2" name="option2">
          </div>

          <div class="col-6">
            <label class="form-label">Option 3</label>
            <input class="form-control" type="text" value="" placeholder="Write a option" id="option3" name="option3">
          </div>

          <div class="col-6">
            <label class="form-label">Option 4</label>
            <input class="form-control" type="text" value="" placeholder="Write a option" id="option4" name="option4">
          </div>

          <div class="col-6">
            <label class="form-label">Select Documnet</label>
            <select name="questionDocument" id="" class="form form-control examDocu">
              <option value="" selected>--Select Document--</option>
              <?php
              $fetchDoc = $connect->query("SELECT * FROM document_test");
              while ($fetchDocData = $fetchDoc->fetch()) {
              ?>
                <option value="<?php echo $fetchDocData['id']; ?>"><?php echo $fetchDocData['file_name']; ?></option>
              <?php
              }
              ?>
            </select>
          </div>

          

          <div class="col-6">
            <label class="form-label">Select Diffculty</label>
            <select name="questionDiffculty" id="" class="form form-control examDiffcu">
              <option value="" selected>--Select Diffculty--</option>
              <option value="easy">Easy</option>
              <option value="medium">Medium</option>
              <option value="hard">Hard</option>
              <option value="veryhard">Very Hard</option>
            </select>
          </div>

          <!-- <div class="row"> -->
            <div class="col-12">

              <div class="form-outline">
                <label class="form-label text-dark" for="course" style="font-weight:bold;">Refrence For Question<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                <textarea type="text" id="refrenceQue" name="refrenceQue" class="form-control form-control-md" required></textarea>
              </div>

            </div>
          <!-- </div> -->

          <!-- Answer options END -->
          <hr>
          <button type="submit" class="btn btn-success" style="font-size:large; font-weight:bold; float: right;" name="editMcqQuestion">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="editquestiontrue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row" method="post" action="<?php echo BASE_URL; ?>includes/Pages/test/editQuestion.php">
          <input class="form-control" type="hidden" name="trueFalseId" value=" " id="trueFalseId">
          <!-- Question -->
          <div class="col-12">
            <label class="form-label">Question</label>
            <input class="form-control" type="text" value="" placeholder="Write a question" id="questionNameTrueFalse" name="questionNameTrueFalse">
          </div>

          <!-- Answer options START -->
          <div class="col-6">
            <label class="form-label">Option 1</label>
            <input class="form-control" type="text" value="" placeholder="Write a option" id="trueFalseOption1" name="trueFalseOption1">
          </div>

          <div class="col-6">
            <label class="form-label">Option 2</label>
            <input class="form-control" type="text" value="" placeholder="Write a option" id="trueFalseOption2" name="trueFalseOption2">
          </div>

          <div class="col-6">
            <label class="form-label">Select Documnet</label>
            <select name="questionDocument" id="" class="form form-control examDocu">
              <option value="" selected>--Select Document--</option>
              <?php
              $fetchDoc = $connect->query("SELECT * FROM document_test");
              while ($fetchDocData = $fetchDoc->fetch()) {
              ?>
                <option value="<?php echo $fetchDocData['id']; ?>"><?php echo $fetchDocData['file_name']; ?></option>
              <?php
              }
              ?>
            </select>
          </div>

          <div class="col-6">
            <label class="form-label">Select Diffculty</label>
            <select name="questionDiffculty" id="" class="form form-control examDiffcu">
              <option value="" selected>--Select Diffculty--</option>
              <option value="easy">Easy</option>
              <option value="medium">Medium</option>
              <option value="hard">Hard</option>
              <option value="veryhard">Very Hard</option>
            </select>
          </div>
          <!-- Answer options END -->
          <hr>
          <button type="submit" class="btn btn-success" style="font-size:large; font-weight:bold; float: right;" name="editTrueFalseQuestion">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editquestiondiagram" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/test/editQuestion.php">
          <div id="fetchDiaData" class="row"></div>
          <hr>
          <button type="submit" class="btn btn-success" style="font-size:large; font-weight:bold; float: right;" name="editDigramQuestion">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(".editDoc").on("click", function() {
    const docId = $(this).data("doc");
    const examDiff = $(this).data("diff")
    var newOption = $('<option>', {
      value: examDiff,
      text: examDiff,
      selected: 'selected' // Add the selected attribute
    });

    // Append the new option to the select element
    $('#mySelect').append(newOption);
    $.ajax({
      type: 'POST',
      url: "<?php echo BASE_URL ?>includes/Pages/test/fetchExamDocument.php",
      data: {
        docId: docId,
      },
      dataType: "html",

      success: function(resultData) {
        $(".examDocu").append(resultData);
        $(".examDiffcu").append(newOption);
      }
    });
  });
</script>

<script>
  $(".editDigram").on("click", function() {
    const digramId = $(this).data("diagramid");
    $.ajax({
      type: 'POST',
      url: "<?php echo BASE_URL ?>includes/Pages/test/fetchExamDocument.php",
      data: {
        digramId: digramId,
      },
      dataType: "html",

      success: function(resultData) {
        $("#fetchDiaData").empty();
        $("#fetchDiaData").html(resultData);
        // $(".fetchDiaData").append(newOption);
      }
    });
  })
</script>