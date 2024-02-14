<?php $document_test = "";
$q90 = "SELECT * FROM document_test";
$st90 = $connect->prepare($q90);
$st90->execute();

if ($st90->rowCount() > 0) {
  $re90 = $st90->fetchAll();
  foreach ($re90 as $row90) {
   $document_test .= '<option value="' . $row90['id'] . '">' .$row90['title'] .' - '.$row90['year'].'</option>';
  }
}
?>
<div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->

            <!-- Body -->
            <div class="card-body">
              <!-- Nav -->
                  <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="create_question-tab" href="#create_question" data-bs-toggle="pill" data-bs-target="#create_question" role="tab" aria-controls="create_question" aria-selected="true">
                        <div class="d-flex align-items-center">
                          Create
                        </div>
                      </a>
                     </li>
                    <li class="nav-item">
                      <a class="nav-link" id="" href="<?php echo BASE_URL;?>includes/Pages/mutliple_fetching.php" aria-selected="false">
                        
                          Edit
                        
                      </a>
                    </li>
                  </ul>
                  <!-- End Nav -->
                  <hr>

                  <div class="tab-content">
                    <div class="tab-pane fade show active" id="create_question" role="tabpanel" aria-labelledby="create_question-tab">
                    
                          <table class="table">
                            <tr>
                              <td>
                                <div class="row">
                                  <div class="col-md-12 mb-2">

                                    <div class="form-outline">
                                     
                                  <label class="text-dark" style="font-weight:bold;"> Type of question</label>
                                      <select class="form-control" id="cat_dropdown">
                                        <option value="">Select type</option>
                                      <option value="Multi">Multiple Choice Questions(Mcq)</option>
                                      <option value="true_false">True Or False</option>        
                                      <option value="dia">Diagram Labelling</option>  
                                    </select>
                                    </div>

                                  </div>
                                </div>
                            </td>
                          </tr>
                         </table><hr>
                         <?php
                  $d_value = "";
                  if (isset($_COOKIE['dropdown_val1'])) {
                    $d_value = $_COOKIE['dropdown_val1'];
                    if ($d_value == "Multi") {
                       include "Multiple_choose_question.php";
                    } elseif ($d_value == "true_false") {
                       include "test/true_false.php";
                    }
                    elseif ($d_value == "dia") {
                     include "diagram.php";
                    }
                  }
  
                  ?>
                       
                    </div>

                  <div class="tab-pane fade" id="edit_question" role="tabpanel" aria-labelledby="edit_question-tab">
                    <p>Edit Questions</p>
                  </div>
                </div>
              
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>