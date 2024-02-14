<?php
ob_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
$stud_db_id = $_REQUEST['stud_db_id'];
$phases_id = $_REQUEST['phases_id'];
$course_id = $_REQUEST['course_id'];
$class_id = $_REQUEST['class_id'];
$class_name = $_REQUEST['class_name'];
$overall_grade = $_REQUEST['overall_grade'];
$overall_grade_per = $_REQUEST['overall_grade_per'];
$overall_data = $_REQUEST['overall_data'];
$comment = $_REQUEST['comment'];
$hashoff=$_REQUEST['hashoff'];
$hashoff_value=$_REQUEST['hashoff_value'];
$get_clone_ides=$_REQUEST['get_clone_ides'];
$instructor_id = $_REQUEST['instructor_ides'];
$ac_id= $_REQUEST['ac_id'];
$itemd=$_REQUEST['item'];
$subitemd=$_REQUEST['subitem'];
$add_list=$_REQUEST['add_list'];
 $add_list1=$_REQUEST['add_list1'];
 $add_list_acc=$_REQUEST['add_list_acc'];
 $add_list_acc1=$_REQUEST['add_list_acc1'];
 $grad_id=$_REQUEST['grad_id'];
$add_clear   = $_REQUEST['add_clear'];
$item_types=$_REQUEST['item_types'];
$item_ids=$_REQUEST['item_ids'];
$grades1=$_REQUEST['grades'];
$ide=$_REQUEST['cl_data'];
//clear clearance
foreach($ide as $id){
    $query_ac ="INSERT INTO clearance_student_id (clearance_id,stud_id,class_id,class_table,clone_cid) VALUES ('$id','$stud_db_id','$class_id','$class_name','$get_clone_ides')";
    $statement_ac = $connect->prepare($query_ac);
    $statement_ac->execute();
    } 
//insert grades of extra item


                //#################################################3
                //additional add accomlish insert
                if(isset($grad_id)){
                   
                    foreach($add_list as $data_id){
                    $sql_add = "INSERT INTO additional_task(Item,gradesheet_id,Stud_id,type,clone_id) VALUES ('$data_id','$grad_id','$stud_db_id','item','$get_clone_ides')";
                    $statement_add = $connect->prepare($sql_add);
                    $statement_add->execute();
                    }
                foreach($add_list1 as $data_id1){
                    $sql_add1 = "INSERT INTO additional_task(Item,gradesheet_id,Stud_id,type,clone_id) VALUES ('$data_id1','$grad_id','$stud_db_id','subitem','$get_clone_ides')";
                    $statement_add1 = $connect->prepare($sql_add1);
                    $statement_add1->execute();
                    }
                    foreach($add_list_acc as $data_id2){
                    $sql_add2 = "INSERT INTO accomplish_task(Item_ac,gradsheet_id,Stud_ac,Type,clone_id) VALUES ('$data_id2','$grad_id','$stud_db_id','item','$get_clone_ides')";

                    $statement_add2 = $connect->prepare($sql_add2);
                
                    $statement_add2->execute();
                }
                foreach($add_list_acc1 as $data_id3){
                    $sql_add3 = "INSERT INTO accomplish_task(Item_ac,gradsheet_id,Stud_ac,Type,clone_id) VALUES ('$data_id3','$grad_id','$stud_db_id','subitem','$get_clone_ides')";

                    $statement_add3 = $connect->prepare($sql_add3);
                
                    $statement_add3->execute();
                }
                
                }
                    //##########################################
                    // update additional clear
                    foreach($add_clear as $ides){
                        $query_ad="UPDATE `additional_task`
                        SET `assign_class`='$class_id',`assign_class_table`='$class_name',`assign_class_table_cloneid`='$get_clone_ides'
                        WHERE `ad_id`='$ides'";
                        $statement_ad = $connect->prepare($query_ad);
                        $statement_ad->execute();
                        
                        }
                        //update accomplish clear
                        foreach($ac_id as $ides1){
                            $query_ac="UPDATE `accomplish_task`
                            SET `assign_class`='$class_id',`assign_class_table`='$class_name',`assign_class_table_cloneid`='$get_clone_ides'
                            WHERE `ac_id`='$ides1'";
                            
                            $statement_ac = $connect->prepare($query_ac);
                            $statement_ac->execute();
                            }

                        //###################################################333333
                    // add extra item
                    if(isset($grad_id)){
                    foreach($itemd as $items){
                     $sql522 = "SELECT count(*) FROM `extra_item_subitem_cl` WHERE item_id='$items' AND data_type='item' and cloneid='$get_clone_ides' and user_id='$stud_db_id' and grade_id='$grad_id'";
                        $result522 = $connect->prepare($sql522);
                        $result522->execute();
                        $number_of_rows122 = $result522->fetchColumn();
                        if($number_of_rows122==0){
                        $sql_hash = "INSERT INTO  extra_item_subitem_cl (item_id,user_id,class_id,class,data_type,cloneid,grade_id) VALUES ('$items','$stud_db_id','$class_id','$class_name','item','$get_clone_ides','$grad_id')";
                        $statement_hash = $connect->prepare($sql_hash);
                        $statement_hash->execute();
                        }
                    }
                    // add extra subitem
                    foreach($subitemd as $subitems){
                        $sql521 = "SELECT count(*) FROM `extra_item_subitem_cl` WHERE item_id='$subitems' AND data_type='subitem' and cloneid='$get_clone_ides' and user_id='$stud_db_id' and grade_id='$grad_id'";
                        $result521 = $connect->prepare($sql521);
                        $result521->execute();
                        $number_of_rows121 = $result521->fetchColumn();
                        if($number_of_rows121==0){
                        $sql_hash1 = "INSERT INTO  extra_item_subitem_cl (item_id,user_id,class_id,class,data_type,cloneid,grade_id) VALUES ('$subitems','$stud_db_id','$class_id','$class_name','subitem','$get_clone_ides','$grad_id')";
                        $statement_hash1 = $connect->prepare($sql_hash1);
                        $statement_hash1->execute();
                    }
                    }
                }
                   //extra item grading
                    foreach($item_types as $ie=>$index1){
                        $item_get=$item_ids[$ie];
                        $grades=$index1.$item_get;
                         $finals=$grades1[$grades];
                         
                        $sql153 = "SELECT count(*) FROM `extra_item_subitem_grades_cl` WHERE user_id='$stud_db_id' AND item_id='$item_get' and type='$index1' and cloneid='$get_clone_ides'";
                        $result153 = $connect->prepare($sql153);
                        $result153->execute();
                        $number_of_rows112 = $result153->fetchColumn();
                         if ($number_of_rows112 > 0) {
                           $sql12 = "UPDATE `extra_item_subitem_grades_cl`
                                          SET  `grade`='$finals'
                                          WHERE user_id='$stud_db_id' AND item_id='$item_get' and type='$index1' and cloneid='$get_clone_ides'";
                          
                           $statement12 = $connect->prepare($sql12);
                           $statement12->execute();
                       } else {
                            $sql_b1 = "INSERT INTO extra_item_subitem_grades_cl (user_id,item_id,grade,date,type,cloneid) VALUES ('$stud_db_id','$item_get','$finals',NOW(),'$index1','$get_clone_ides')";
                           $statement_b1 = $connect->prepare($sql_b1);
                           $statement_b1->execute();
                        }
                       }
                      //#########################################
                    //insert /update hashoff clone grades
                    foreach($hashoff as $hashoffs=>$val){
                        
                            $hashoff_values=$hashoff_value[$hashoffs];
                             echo $hashoff_values;
                            $sql51 = "SELECT count(*) FROM `gradsheet_final_hashoff_cl` WHERE user_id='$stud_db_id' AND class_id='$class_id' and class_name='$class_name' and hash_off='$val' and cloneid='$get_clone_ides'";
                            $result51 = $connect->prepare($sql51);
                            $result51->execute();
                            $number_of_rows11 = $result51->fetchColumn();
                            if ($number_of_rows11 > 0) {
                                $sql = "UPDATE `gradsheet_final_hashoff_cl`
                                SET hash_off_value='$hashoff_values'
                                WHERE user_id='$stud_db_id' AND class_id='$class_id' and class_name='$class_name' and hash_off='$val' and cloneid='$get_clone_ides'";
                                $statement = $connect->prepare($sql);
                                $statement->execute();
                            }else{
                                $sql_hash = "INSERT INTO  gradsheet_final_hashoff_cl (user_id,class_id,class_name,hash_off,hash_off_value,cloneid) VALUES ('$stud_db_id','$class_id','$class_name','$val','$hashoff_values','$get_clone_ides')";
                                $statement_hash = $connect->prepare($sql_hash);
                               $statement_hash->execute();
                            }
                        }
  
$get_data= "SELECT * FROM cloned_gradesheet where user_id='$stud_db_id' AND phase_id='$phases_id' AND course_id='$course_id' AND class_id='$class_id' AND class='$class_name' and cloned_id='$get_clone_ides'";
$get_datast= $connect->prepare($get_data);
$get_datast->execute();
if($get_datast->rowCount() > 0)
{
   
    $status='0';
    
    $query = "UPDATE `cloned_gradesheet`
              SET `over_all_grade` = :overall_grade,
                  `over_all_grade_per` = :overall_grade_per,
                  `over_all_comment` = :overall_data,
                  `comments` = :comment,
                  `status` = :status1
              WHERE user_id = :stud_db_id
                AND phase_id = :phases_id
                AND course_id = :course_id
                AND class_id = :class_id
                AND class = :class_name
                AND cloned_id = :cloned_id";
    
    
    
    // Prepare the SQL statement
    $statement = $connect->prepare($query);
    
    
    
    // Bind the parameters
    $statement->bindParam(':overall_grade', $overall_grade);
    $statement->bindParam(':overall_grade_per', $overall_grade_per);
    $statement->bindParam(':overall_data', $overall_data);
    $statement->bindParam(':comment', $comment);
    $statement->bindParam(':status1',$status);
    $statement->bindParam(':stud_db_id', $stud_db_id);
    $statement->bindParam(':phases_id', $phases_id);
    $statement->bindParam(':course_id', $course_id);
    $statement->bindParam(':class_id', $class_id);
    $statement->bindParam(':class_name', $class_name);
    $statement->bindParam(':cloned_id', $get_clone_ides);
    
    
    
    // Execute the prepared statement
    $statement->execute();
  
    $value = array();
    $value1 = array();
    $value2 = array();
    $std_idie = $_REQUEST['std_idies']; //ite id from item table
   
    $std_sub = $_REQUEST['std_sub']; //item or subitem

    $items_id = $_REQUEST['items_id'];

    $grade = $_REQUEST['grade'];
    
   
         //insert /update item clone grades
    foreach ($std_idie as $index => $values) {
        $values;
        $item_ids = $items_id[$index];
        $subjects = $std_sub[$index];
        $grade_c = $subjects . $values;
        $final_grade = $grade[$grade_c];
        if($subjects == "item"){
              
            $sql2 = "SELECT count(*) FROM `item_clone_gradesheet` WHERE user_id='$stud_db_id' AND item_id='$item_ids' and cloned_id='$get_clone_ides'"; 
            $result3 = $connect->prepare($sql2); 
            $result3->execute(); 
            $number_of_rows = $result3->fetchColumn(); 
            if($number_of_rows > 0)
            {
           $sql="UPDATE `item_clone_gradesheet`
           SET  `grade`='$final_grade'
           WHERE user_id='$stud_db_id' AND item_id='$item_ids' and cloned_id='$get_clone_ides'";
            // echo $sql;
           $statement = $connect->prepare($sql);
            $statement->execute();
            }else{
             echo  $sql_a = "INSERT INTO item_clone_gradesheet (user_id,item_id,grade,cloned_id,date) VALUES ('$stud_db_id','$item_ids','$final_grade','$get_clone_ides',NOW())";
              // echo $sql_a;
              $statement_a = $connect->prepare($sql_a);
             $statement_a->execute();
            }
          }else{
            $sql5 = "SELECT count(*) FROM `subitem_cloned_gradesheet` WHERE user_id='$stud_db_id' AND subitem_id='$item_ids' and cloned_id='$get_clone_ides'"; 
            $result5 = $connect->prepare($sql5); 
            $result5->execute(); 
            $number_of_rows1 = $result5->fetchColumn(); 
            if($number_of_rows1 > 0)
            {
             $sql1="UPDATE `subitem_cloned_gradesheet`
             SET  `grade`='$final_grade'
             WHERE user_id='$stud_db_id' AND subitem_id='$item_ids' and cloned_id='$get_clone_ides'";
            // echo $sql1;
             $statement1 = $connect->prepare($sql1);
             $statement1->execute();
            }else{
              $sql_b = "INSERT INTO subitem_cloned_gradesheet (user_id,subitem_id,grade,cloned_id,date) VALUES ('$stud_db_id','$item_ids','$final_grade','$get_clone_ides',NOW())";
              //  echo $sql_b;
              $statement_b = $connect->prepare($sql_b);
               $statement_b->execute();
            }
}
    }

    $error = "<div class='alert alert-success'>Gradsheet updated Successfully..</div>";
    header("location: itemsubitemcl.php?error=" . $error);
    exit;
  
} else {
    $error = "<div class='alert alert-warning'>Please select above details first..</div>";
    header("location: itemsubitemcl.php?error=" . $error);
    exit;
}

    ?>