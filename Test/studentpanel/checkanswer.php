<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

          
?>
<!DOCTYPE html>
<html>

<head>
  <title>Check Answer</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/test.png">

  

</head>

<body>
  <?php 
  include (ROOT_PATH. 'Test/ts_loader.php');
  ?>
  <div id="header-hide">
    <?php
    include(ROOT_PATH . 'includes/head_navbar.php');
    $exam_ides=$_REQUEST['id'];
    $r_id=$_REQUEST['r_id'];
    $user_id1="";
                 if($_REQUEST['user_id']!=""){
                  $user_id1=$_REQUEST['user_id'];
                 }else{
                  $user_id1=$user_id;
                 }
             
    $query = "SELECT * FROM examname WHERE id = '$exam_ides'";
$result = $connect->query($query);

if ($result) {
    $row = $result->fetch(PDO::FETCH_ASSOC);
   if($row['course_id']!=""){
      $exam_names=$row['examName'];
      $fetch_exam_name = $connect->query("SELECT `shorttest` FROM test WHERE id = '$exam_names'");
      $exam_namesd = $fetch_exam_name->fetchColumn();
    }else{
      $exam_namesd=$row['examName'];
    }
    $questionNumberes = $row['questionNumber'];
    $exam_Types = $row['exam_Types'];
    $total_marks = $row['total_marks'];
}
 
    if($exam_Types=="once"){
      $fetch_correct = $connect->query("SELECT `correct_answer` FROM test_updates WHERE exam_id = '$exam_ides' and user_id='$user_id1'");
      $count_correct = $fetch_correct->fetchColumn();
      $fetch_correct_marks_got = $connect->query("SELECT `marks_got` FROM test_updates WHERE exam_id = '$exam_ides' and user_id='$user_id1'");
      $count_correct_marks = $fetch_correct_marks_got->fetchColumn();
     }else{
      $fetch_correct = $connect->query("SELECT `correct_answer` FROM test_updates WHERE exam_id = '$exam_ides' and user_id='$user_id1' and repeat_id='$r_id'");
      $count_correct = $fetch_correct->fetchColumn();
      $fetch_correct_marks_got = $connect->query("SELECT `marks_got` FROM test_updates WHERE exam_id = '$exam_ides' and user_id='$user_id1' and repeat_id='$r_id'");
      $count_correct_marks = $fetch_correct_marks_got->fetchColumn();
     }
    ?>
  </div>
  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="padding: 0px;">
          <h1 class="text-secondary">Check Answers</h1>
        </div>
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -20rem;">

      <div class="row justify-content-center">

        <div class="col-lg-12 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <div class="card-header card-header-content-between" style="border-bottom: 2px solid lightgray;background-image: url('<?php echo BASE_URL; ?>assets/img/1920x400/img2.jpg');">
               <h1 class="text-black" style="font-size: xxx-large;font-family: cursive;"><?php echo $exam_namesd; ?></h1>
               <span class="badge bg-secondary rounded-pill" style="font-size:x-large;">Score :<?php echo $count_correct." / ".$questionNumberes; ?></span>  
                  <h3 class="text-black">Marks :<?php echo $count_correct_marks." / ".$total_marks; ?></h3>  
            </div>
             <div class="card-body">
              <div id="quizmain">
                <div id="quizcontainer container-fluid">
                  <?php 
                
                
                  $question_val="";
                  $fetch_type_q_name="";
                 $q4 = "SELECT * FROM exam_question_ist where exam_id='$exam_ides'";
                 $st4 = $connect->prepare($q4);
                 $st4->execute();

                 if ($st4->rowCount() > 0) {
                   $re4 = $st4->fetchAll();
                   foreach ($re4 as $row4) {
                    $q_id=$row4['id'];
                    $q_ides=$row4['question_id'];
                    $query_ques = "SELECT * FROM exam_question WHERE id = '$q_ides'";
                          $result_ques = $connect->query($query_ques);

                          if ($result_ques) {
                            foreach ($result_ques as $row_ques) {
                               $question_val = $row_ques['question'];
                              $fetch_type_q_name = $row_ques['type'];
                              $correct_an_main = $row_ques['correst_answer'];
                              $option1 = htmlspecialchars($row_ques['option1'], ENT_QUOTES, 'UTF-8');
                              $option2 = htmlspecialchars($row_ques['option2'], ENT_QUOTES, 'UTF-8');
                              $option3 = htmlspecialchars($row_ques['option3'], ENT_QUOTES, 'UTF-8');
                              $option4 = htmlspecialchars($row_ques['option4'], ENT_QUOTES, 'UTF-8');
                            }
                      }

                      if($exam_Types=="once"){
                        $studet_an = $connect->query("SELECT `answer` FROM exam_answers_once_test WHERE exam_id = '$exam_ides' and user_id='$user_id1' and question='$q_id'");
                       $studet_an_corr = $studet_an->fetchColumn();
                      }else{
                        $studet_an = $connect->query("SELECT `answer` FROM exam_answers_repeat_test WHERE exam_id = '$exam_ides' and user_id='$user_id1' and question='$q_id' and repeat_id='$r_id'");
                        $studet_an_corr = $studet_an->fetchColumn();
                      }
                ?>
                  <div class="row" id="<?php echo $row4['id'] ?>">
                    <h3 class="text-dark"><?php echo $question_val;?></h3>
                  </div>
                  <div class="row">
                    <?php 
                    if($fetch_type_q_name=="mcq"){
                    ?>
                    
                    <?php 
                    $html_val="";$html_val1="";$color_div="bg-soft-secondary";$html_val2="";
                    if($correct_an_main!="a" && $studet_an_corr=="a"){
                      $color_div="bg-soft-danger";
                     $html_val = '<i class="bi bi-x-lg text-danger m-2" style="font-size:x-large;"></i>
                      <span style="float:right;" class="badge bg-danger text-white">Wrong Answer</span>';?>
                      <?php }else if($correct_an_main=="a" && $studet_an_corr=="a"){ 
                         $color_div="bg-soft-success";
                      $html_val1 = '<i class="bi bi-check-lg text-success m-2" style="font-size:x-large;"></i><span style="float:right;" class="badge bg-success text-white">Correct Answer</span>'; ?><?php }else if($correct_an_main=="a" && $studet_an_corr!="a"){ 
                        $color_div="bg-soft-success";
                        $html_val2 ='<i class="bi bi-check-lg text-success m-2" style="font-size:x-large;"></i><span style="float:right;" class="badge bg-success text-white">Correct Answer</span>';?>
                     <?php }?>
                     <div class='radiocontainer col-12 mb-1 <?php echo $color_div;?>' id='label1' style="padding: 10px; font-size: larger;"></i><?php echo $option1;?>
                        <?php echo $html_val;echo $html_val1;echo $html_val2;?>
                     </div>

                     <?php $html_val="";$html_val1="";$color_div="bg-soft-secondary";$html_val2="";
                     if($correct_an_main!="b" && $studet_an_corr=="b"){
                      $color_div="bg-soft-danger";
                     $html_val = '<i class="bi bi-x-lg text-danger m-2" style="font-size:x-large;"></i>
                      <span style="float:right;" class="badge bg-danger text-white">Wrong Answer</span>';?>
                      <?php }else if($correct_an_main=="b" && $studet_an_corr=="b"){ 
                         $color_div="bg-soft-success";
                      $html_val1 = '<i class="bi bi-check-lg text-success m-2" style="font-size:x-large;"></i><span style="float:right;" class="badge bg-success text-white">Correct Answer</span>'; ?><?php }else if($correct_an_main=="b" && $studet_an_corr!="b"){ 
                        $color_div="bg-soft-success";
                        $html_val2 ='<i class="bi bi-check-lg text-success m-2" style="font-size:x-large;"></i><span style="float:right;" class="badge bg-success text-white">Correct Answer</span>';?>
                     <?php }?>
                     <div class='radiocontainer col-12 mb-1 <?php echo $color_div;?>' id='label1' style="padding: 10px; font-size: larger;"></i><?php echo $option2;?>
                        <?php echo $html_val;echo $html_val1;echo $html_val2;?>
                     </div>

                     
                      
                     <?php 
                     $html_val="";$html_val1="";$color_div="bg-soft-secondary";$html_val2="";
                     if($correct_an_main!="c" && $studet_an_corr=="c"){
                      $color_div="bg-soft-danger";
                     $html_val = '<i class="bi bi-x-lg text-danger m-1"></i>
                      <span style="float:right;" class="badge bg-danger text-white">Wrong Answer</span>';?>
                      <?php }else if($correct_an_main=="c" && $studet_an_corr=="c"){ 
                         $color_div="bg-soft-success";
                      $html_val1 = '<i class="bi bi-check-lg text-success m-2" style="font-size:x-large;"></i><span style="float:right;" class="badge bg-success text-white">Correct Answer</span>'; ?><?php }else if($correct_an_main=="c" && $studet_an_corr!="c"){ 
                        $color_div="bg-soft-success";
                        $html_val2 ='<i class="bi bi-check-lg text-success m-2" style="font-size:x-large;"></i><span style="float:right;" class="badge bg-success text-white">Correct Answer</span>';?>
                     <?php }?>
                     <div class='radiocontainer col-12 mb-1 <?php echo $color_div;?>' id='label1' style="padding: 10px; font-size: larger;"></i><?php echo $option3;?>
                        <?php echo $html_val;echo $html_val1;echo $html_val2;?>
                     </div>

                    <?php $html_val="";$html_val1="";$color_div="bg-soft-secondary";$html_val2="";
                     if($correct_an_main!="d" && $studet_an_corr=="d"){
                      $color_div="bg-soft-danger";
                     $html_val = '<i class="bi bi-x-lg text-danger m-2" style="font-size:x-large;"></i>
                      <span style="float:right;" class="badge bg-danger text-white">Wrong Answer</span>';?>
                      <?php }else if($correct_an_main=="d" && $studet_an_corr=="d"){ 
                         $color_div="bg-soft-success";
                      $html_val1 = '<i class="bi bi-check-lg text-success m-2" style="font-size:x-large;"></i><span style="float:right;" class="badge bg-success text-white">Correct Answer</span>'; ?><?php }else if($correct_an_main=="d" && $studet_an_corr!="d"){ 
                        $color_div="bg-soft-success";
                        $html_val2 ='<i class="bi bi-check-lg text-success m-2" style="font-size:x-large;"></i><span style="float:right;" class="badge bg-success text-white">Correct Answer</span>';?>
                     <?php }?>
                     <div class='radiocontainer col-12 mb-1 <?php echo $color_div;?>' id='label1' style="padding: 10px; font-size: larger;"></i><?php echo $option4;?>
                        <?php echo $html_val;echo $html_val1;echo $html_val2;?>
                     </div>
                     <!-- </div> -->
                    <?php }else if($fetch_type_q_name=="true_false"){
                      ?>
                    <?php 
                     $html_val="";$html_val1="";$color_div="bg-soft-secondary";$html_val2="";
                     if($correct_an_main!="true" && $studet_an_corr=="true"){
                      $color_div="bg-soft-danger";
                     $html_val = '<i class="bi bi-x-lg text-danger m-2" style="font-size:x-large;"></i>
                      <span style="float:right;" class="badge bg-danger text-white">Wrong Answer</span>';?>
                      <?php }else if($correct_an_main=="true" && $studet_an_corr=="true"){ 
                         $color_div="bg-soft-success";
                      $html_val1 = '<i class="bi bi-check-lg text-success m-2" style="font-size:x-large;"></i><span style="float:right;" class="badge bg-success text-white">Correct Answer</span>'; ?>
                      <?php }else if($correct_an_main=="true" && $studet_an_corr!="true"){ 
                        $color_div="bg-soft-success";
                        $html_val2 ='<i class="bi bi-check-lg text-success m-2" style="font-size:x-large;"></i><span style="float:right;" class="badge bg-success text-white">Correct Answer</span>';?>
                     <?php }?>
                     <div class='radiocontainer col-12 mb-1 <?php echo $color_div;?>' id='label1' style="padding: 10px; font-size: larger;"></i>True
                        <?php echo $html_val;echo $html_val1;echo $html_val2;?>
                     </div><?php
                     $html_val="";$html_val1="";$color_div="bg-soft-secondary";$html_val2="";
                     if($correct_an_main!="false" && $studet_an_corr=="false"){
                      $color_div="bg-soft-danger";
                     $html_val = '<i class="bi bi-x-lg text-danger m-2" style="font-size:x-large;"></i>
                      <span style="float:right;" class="badge bg-danger text-white">Wrong Answer</span>';?>
                      <?php }else if($correct_an_main=="false" && $studet_an_corr=="false"){ 
                         $color_div="bg-soft-success";
                      $html_val1 = '<i class="bi bi-check-lg text-success m-2" style="font-size:x-large;"></i><span style="float:right;" class="badge bg-success text-white">Correct Answer</span>'; ?>
                      <?php }else if($correct_an_main=="false" && $studet_an_corr!="false"){ 
                        $color_div="bg-soft-success";
                        $html_val2 ='<i class="bi bi-check-lg text-success m-2" style="font-size:x-large;"></i><span style="float:right;" class="badge bg-success text-white">Correct Answer</span>';?>
                     <?php }?>
                     <div class='radiocontainer col-12 mb-1 <?php echo $color_div;?>' id='label1' style="padding: 10px; font-size: larger;"></i>False
                        <?php echo $html_val;echo $html_val1;echo $html_val2;?>
                     </div>
                   <?php
                    } ?>
                  </div>
                    <hr>
                        
                    <?php
                   }
                  }
              ?>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>


    <!-- End Row -->
    </div>
    <!-- End Content -->

  </main>




 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>

</body>


</html>