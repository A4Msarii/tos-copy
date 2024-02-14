<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
$ctid = $_REQUEST['ctid'];
$vehcate="";
$ins = "";
$q211 = "SELECT * FROM roles";
$st211 = $connect->prepare($q211);
$st211->execute();
$re211 = $st211->fetchAll();
foreach ($re211 as $row211) {
   $row211['id'];
   $roled=unserialize($row211['permission']);
  if(isset($roled['phasemanager'])){
if($roled['phasemanager']==1){
    $roled=$row211['roles'];
$q223 = "SELECT * FROM users where role='$roled'";
$st223 = $connect->prepare($q223);
$st223->execute();
if ($st223->rowCount() > 0) {
  $re223 = $st223->fetchAll();
  foreach ($re223 as $row2) {
     $ins .= '<option value="' . $row2['id'] . '">' . $row2['nickname'] . '</option>';
   }
   }
    }
     }
  
}
$std1 = "";
$select_std = "SELECT * FROM users where role='student'";
$select_std_st = $connect->prepare($select_std);
$select_std_st->execute();

 if ($select_std_st->rowCount() > 0) {
  $result_select_std = $select_std_st->fetchAll();
  foreach ($result_select_std as $row_select_std) {
      $check_id = $row_select_std['id'];
      $check_std1 = "SELECT Courseid FROM newcourse where StudentNames='$check_id'";
      $check_std1st = $connect->prepare($check_std1);
      $check_std1st->execute();
      if ($check_std1st->rowCount() <= 0) {
          $std1 .= '<option value="' . $row_select_std['id'] . '">' . $row_select_std['name'] . '</option>';
      }
  }
}

$query = "SELECT * FROM newcourse where Courseid='$ctid'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach ($result as $row1) {
    $vec=$row1['CourseManager'];
    $fetch_std_name1 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
    $fetch_std_name1->execute([$vec]);
    $std_name1 = $fetch_std_name1->fetchColumn();
        
                    echo '<input class="form-control" type="text" name="Crsid" value="'.$row1['Courseid'].'" id="Course_id" readonly hidden>
                      <label class="form-label text-dark" style="font-weight:bold; margin:5px;" hidden>Course Name :</label class="form-label text-dark">
                      <input class="form-control" type="text" name="Course_Name" value="'.$row1['CourseName'].'" id="Course_Name" hidden>
                      <label class="form-label text-dark" style="font-weight:bold; margin:5px;" hidden>Course Code :</label class="form-label text-dark">
                      <input class="form-control" type="text" name="Course_Code" value="'.$row1['CourseCode'].'" id="Course_Code" hidden>
                      <label class="form-label text-dark" style="font-weight:bold; margin:5px;">Course Date :</label class="form-label text-dark">
                      <input class="form-control" type="date" name="Course_Date" value="'.$row1['CourseDate'].'" id="Course_Date">
                      <label class="form-label text-dark" style="font-weight:bold; margin:5px;">Nick Name :</label class="form-label text-dark">
                      <input class="form-control" type="text" name="Nick_name" value="'.$row1['nick_name'].'" id="Symbol_">
                
                      <label class="form-label text-dark" style="font-weight:bold; margin:5px;">Student Name :</label class="form-label text-dark">
                      <select multiple class="form-control" name="Student_Names[]" id="Student_Names1">
              
                         '.$std1.'
                      </select>
                      <label class="form-label text-dark" style="font-weight:bold; margin:5px;">Course Manager:</label class="form-label text-dark">
                      <select id="Course_Manager" class="form-control" value="" name="Course_Manager">
                      <option value="'.$row1['CourseManager'].'" selected >'.$std_name1.'</option>
                        '.$ins.'
                      </select>
           
                      <br>
                      <input class="btn btn-success" type="submit" name="submit1" value="Submit">';

}
?>
