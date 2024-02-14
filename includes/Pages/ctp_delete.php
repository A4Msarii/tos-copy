<?php 

echo $CTPid=$_REQUEST['CTPid'];
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
//actual,acedemic,cleatance data,phase,sim,test,newcourse,emergency_data,item,mark_distribution
echo $delete=$_REQUEST['delete'];

$password=md5($delete);
$q="SELECT * from users where password='$password' AND role='super admin'";
$statement = $connect->prepare($q);
$statement->execute();

if($statement->rowCount() > 0){
$sql = "DELETE FROM ctppage WHERE CTPid='$CTPid'";
$statement = $connect->prepare($sql);
$statement->execute();
$query1 = "DELETE FROM phase WHERE ctp='$CTPid'";
$statement1 = $connect->prepare($query1);
$statement1->execute();    
$query2 = "DELETE FROM actual WHERE ctp='$CTPid'";
$statement2 = $connect->prepare($query2);
$statement2->execute();
$query3 = "DELETE FROM academic WHERE ctp='$CTPid'";
$statement3 = $connect->prepare($query3);
$statement3->execute();
$query4 = "DELETE FROM sim WHERE ctp='$CTPid'";
$statement4 = $connect->prepare($query4);
$statement4->execute();
$query5 = "DELETE FROM test WHERE ctp='$CTPid'";
$statement5 = $connect->prepare($query5);
$statement5->execute();
$query6 = "DELETE FROM newcourse WHERE CourseName='$CTPid'";
$statement6 = $connect->prepare($query6);
$statement6->execute();
$query7 = "DELETE FROM clearance_data WHERE course_id='$CTPid'";
$statement7 = $connect->prepare($query7);
$statement7->execute();
$query8 = "DELETE FROM emergency_data WHERE course_id='$CTPid'";
$statement8 = $connect->prepare($query8);
$statement8->execute();
$query9 = "DELETE FROM gradesheet WHERE course_id='$CTPid'";
$statement9 = $connect->prepare($query9);
$statement9->execute();
$query10 = "DELETE FROM item WHERE course_id='$CTPid'";
$statement10 = $connect->prepare($query10);
$statement10->execute();
$query11 = "DELETE FROM mark_distribution WHERE ctp='$CTPid'";
$statement11 = $connect->prepare($query11);
$statement11->execute();
$query12 = "DELETE FROM qual_data WHERE course_id='$CTPid'";
$statement12 = $connect->prepare($query12);
$statement12->execute();
$query13 = "DELETE FROM subitem WHERE course_id='$CTPid'";
$statement13 = $connect->prepare($query13);
$statement13->execute();
$query14 = "DELETE FROM type_data WHERE ctp='$CTPid'";
$statement14 = $connect->prepare($query14);
$statement14->execute();
         $_SESSION['danger'] = "CTP Deleted Successfully";
         header('Location:usersinfo.php');
}else{
    $_SESSION['danger'] = "Can't Deleted";
         header('Location:usersinfo.php');
}
     
?>