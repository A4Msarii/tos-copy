<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$id=$_REQUEST['id'];

$q3 = "SELECT * FROM users";
        $st3 = $connect->prepare($q3);
        $st3->execute();

     if($st3->rowCount() > 0)
     {
        $sn=1;
         $re3 = $st3->fetchAll();
        foreach($re3 as $row3){
            $st=$row3['id'];
        $sql = "SELECT count(*) FROM `studentexam` WHERE examId = '$id' and examSubject='$st'";
        $result = $connect->prepare($sql);
        $result->execute();
        $number_of_rows = $result->fetchColumn();
       if($number_of_rows==0){
           ?>
                <tr>
                <td>
               <input type="checkbox" name="person[]" value="<?php echo $row3['id'] ?>"> 
                </td>
                <td>
                    <?php echo $row3['nickname']; ?>
                </td>
                 </tr>

  <?php }
        }
  }
?>