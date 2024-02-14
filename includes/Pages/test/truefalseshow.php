<div class="accordion" id="accordionExample">
  <?php
  $q4 = "SELECT * FROM exam_question where type='true_false'";
  $st4 = $connect->prepare($q4);
  $st4->execute();

  if ($st4->rowCount() > 0) {
    $re4 = $st4->fetchAll();
    foreach ($re4 as $row4) {
  ?>
      <div class="accordion-item">

        <div class="accordion-header mb-2" id="headingOne<?php echo $row4['id'] ?>">
          <a class="accordion-button text-dark" role="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo $row4['id'] ?>" aria-expanded="true" aria-controls="collapseOne" style="background-color:#71869d1f; font-size:large; font-weight:bold;">
            <?php echo $row4['question']; ?>
          </a>
        </div>
        <div id="collapseOne<?php echo $row4['id'] ?>" class="accordion-collapse collapse" aria-labelledby="headingOne<?php echo $row4['id'] ?>" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <ul>
              <li class="nav-link"><input type="radio" style="margin: 5px;">True</li>
              <li class="nav-link"><input type="radio" style="margin:5px;">False</li>
            </ul>
            <label style="font-weight: bold; font-size:large;" class="text-dark">Correct Answer : <span class="text-primary"><?php echo $row4['correst_answer']; ?></span></label><br><br>
            <a class="btn btn-soft-success" href="" onclick="document.getElementById('trueFalseId').value='<?php echo $row4['id'] ?>';
                          document.getElementById('questionNameTrueFalse').value='<?php echo $row4['question']; ?>';
                          document.getElementById('trueFalseOption1').value='<?php echo $row4['option1']; ?>';
                          document.getElementById('trueFalseOption2').value='<?php echo $row4['option2']; ?>';
                      " data-bs-toggle="modal" data-bs-target="#editquestiontrue">Edit</a>
            <a class="btn btn-soft-danger" href="<?php echo BASE_URL; ?>includes/Pages/test/mcq-delete.php?id=<?php echo $row4['id'] ?>">Delete</a>
          </div>
        </div>

      </div>
  <?php
    }
  }
  ?>
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
          <input class="form-control" type="text" name="trueFalseId" value=" " id="trueFalseId">
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
          <!-- Answer options END -->
          <hr>
          <button type="submit" class="btn btn-success" style="font-size:large; font-weight:bold; float: right;" name="editTrueFalseQuestion">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>