<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$type=$_REQUEST['type'];

$ctp_id=$_REQUEST['ctp_id'];

$cat=$_REQUEST['cat'];
$sumofmarks=$_REQUEST['sumofmarks'];
$phase_selested=$_REQUEST['phase_selested']?$_REQUEST['phase_selested']:NULL;
$cat_data=$_REQUEST['cat_data']?$_REQUEST['cat_data']:'0';

$marks=$_REQUEST['values'];
$marks_sum = "SELECT SUM(`percent`) FROM type_category_data where type='$type'";
    $statement = $connect->prepare($marks_sum);
    $statement->execute();
    $total = $statement->fetch(PDO::FETCH_NUM); 
    $mark_sum=$total[0];
//     $cal=$mark_sum-$marks;
  //  var_dump($mark_sum);
    
       foreach ($cat as $key =>$cats) 
      {
              $cat_value=$cat_data[$key];
              $marks_value=$marks[$key];
              $phase_selesteds=$phase_selested[$key];
                   if($mark_sum == NULL){
                    $sql = "INSERT INTO type_category_data (type,category,category_phase,category_value,percent) VALUES ('$type','$cats','$phase_selesteds','$cat_value','$marks_value')";
                    $statement = $connect->prepare($sql);
                    $statement->execute();
                       }else if($mark_sum != NULL){
                        $cal=100-$mark_sum;//40
                        var_dump($sumofmarks);
                        var_dump($marks_value);
                        var_dump($cal);//40
                        var_dump($marks_value>=$cal);
                        if($sumofmarks>$cal){
                          if($cal==0){
                            $cal="";
                            $_SESSION['success'] = "Data Inserted Successfully";
                            header("Location:add_type_data.php?type_id=".$type."&ctp=".$ctp_id);  
                              }else{
                            
                            $_SESSION['warning'] = "You can add $cal percent or below..";
                                header("Location:add_type_data.php?type_id=".$type."&ctp=".$ctp_id);  
                              
                          }
                        }else{
                                    $sql = "INSERT INTO type_category_data (type,category,category_phase,category_value,percent) VALUES ('$type','$cats','$phase_selesteds','$cat_value','$marks_value')";
                                    $statement = $connect->prepare($sql);
                                    $statement->execute();
                                    $_SESSION['success'] = "Data Inserted Successfully";
                                    header("Location:add_type_data.php?type_id=".$type."&ctp=".$ctp_id);
                        }
                        
              
            }
        }
           $_SESSION['success'] = "Data Inserted Successfully";
           header("Location:add_type_data.php?type_id=".$type."&ctp=".$ctp_id);      
    
        if($type=="" || $ctp_id=="" || $cat=="" || $cat_data=="" || $marks=""){
          $_SESSION['warning'] = "Data Is Missing";
          header("Location:add_type_data.php?type_id=".$type."&ctp=".$ctp_id);
        }

                        
?>