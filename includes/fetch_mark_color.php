<?php 

include('connect.php');
 $val=$_POST['val'];
 //for U grade
 $sql1 = "SELECT * FROM `percentage` WHERE id='1'";
 $sql1_prepare = $connect->prepare($sql1);
 $result1 = $connect->query($sql1);
 $datas1 = $result1->fetch(PDO::FETCH_ASSOC);
 $percentage1=$datas1['percentage'];
 
  //for F grade
  $sql2 = "SELECT * FROM `percentage` WHERE id='2'";
  $sql2_prepare = $connect->prepare($sql2);
  $result2 = $connect->query($sql2);
  $datas2 = $result2->fetch(PDO::FETCH_ASSOC);
 $percentage2=$datas2['percentage'];
 
  //for G grade
  $sql3 = "SELECT * FROM `percentage` WHERE id='3'";
  $sql3_prepare = $connect->prepare($sql3);
  $result3 = $connect->query($sql3);
  $datas3 = $result3->fetch(PDO::FETCH_ASSOC);
 $percentage3=$datas3['percentage'];
 
  //for V grade
  $sql4 = "SELECT * FROM `percentage` WHERE id='4'";
  $sql4_prepare = $connect->prepare($sql4);
  $result4 = $connect->query($sql4);
  $datas4 = $result4->fetch(PDO::FETCH_ASSOC);
 $percentage4=$datas4['percentage'];

  //for E grade
  $sql5 = "SELECT * FROM `percentage` WHERE id='5'";
  $sql5_prepare = $connect->prepare($sql5);
  $result5 = $connect->query($sql5);
  $datas5 = $result5->fetch(PDO::FETCH_ASSOC);
 $percentage5=$datas5['percentage'];

   //for N grade
   if($val == "0"){
    echo "N";
   }
   if($val > 0 && $val <= $percentage1){
    echo "U";
   }
   if($val > $percentage1 && $val <= $percentage2){
    echo "F";
   }
   if($val > $percentage2 && $val <= $percentage3){
    echo "G";
   }
   if($val > $percentage3 && $val <= $percentage4){
    echo "V";
   }
   if($val > $percentage4 && $val <= $percentage5){
    echo "E";
   }
   
?>