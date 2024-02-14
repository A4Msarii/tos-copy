<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$id=$_REQUEST['id'];

$q3 = "SELECT * FROM studentexam where examId='$id'";
        $st3 = $connect->prepare($q3);
        $st3->execute();

     if($st3->rowCount() > 0)
     {
        $sn=1;
         $re3 = $st3->fetchAll();
        foreach($re3 as $row3)
         {
           echo $std_id=$row3['examSubject'];
            $std_name= $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
            $std_name->execute([$std_id]);
            $get_ins_name= $std_name->fetchColumn();
           ?>
                <tr>
                <td>
                <?php echo $sn++?>
                </td>
                <td>
                    <?php echo $get_ins_name?>
                </td>
                <td>
               <a class="btn btn-soft-danger btn-xs" href="<?php echo BASE_URL;?>includes/Pages/test/delete_users_exam.php?id=<?php echo $row3['id']?>"><i class="bi bi-trash-fill"></i></a>
                </td>
                </tr>

  <?php }
  }
?>