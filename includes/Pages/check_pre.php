<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$get_value=$_REQUEST["values"];
$get_id=$_REQUEST["id"];

$pre_id=$_REQUEST['pre_id']; 
$class_id=$_REQUEST['class_id']; 
$cate1 = "SELECT * FROM prereuisite_data where class_id='$pre_id'and class_table='$class_id' and prereui_id='$get_id' and prereui_table='$get_value'";
$state1 = $connect->prepare($cate1);
$state1->execute();
 if($state1->rowCount()==0)
{
    $in_ch="INSERT INTO prereuisite_data(class_id,class_table,prereui_id,prereui_table) 
    values ('$pre_id','$class_id','$get_id','$get_value')"; 
    $statement = $connect->prepare($in_ch);
    $statement->execute(); 
    echo "data added successfully";
}
else
{
    if($get_value=="actual")
    {
        $q = $connect->prepare("SELECT symbol FROM $get_value WHERE id=?");
        }else if($get_value=="sim")
        {
        $q = $connect->prepare("SELECT shortsim FROM $get_value WHERE id=?");
           }else if($get_value=="academic")
           {
             $q = $connect->prepare("SELECT shortacademic FROM $get_value WHERE id=?");
                }else if($get_value=="academic")
                {
                 $q = $connect->prepare("SELECT shorttest FROM $get_value WHERE id=?");
                    }
                         $q->execute([$get_id]);
                         $name = $q->fetchColumn();
    echo $name." already exist";
}


?>