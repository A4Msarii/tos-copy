<?php
	
	if(ISSET($_POST['search'])){
		$date1 = date("Y-m-d", strtotime($_POST['date1']));
		$date2 = date("Y-m-d", strtotime($_POST['date2']));
        $class_name="";
		$query = "SELECT * FROM `gradesheet` WHERE date(`date`) BETWEEN '$date1' AND '$date2' AND user_id='$student'";
            $statement = $connect->prepare($query);
            $statement->execute();

            if($statement->rowCount() > 0)
                {
                    $result = $statement->fetchAll();
					$sn=1;
                    foreach($result as $row)
                    	// $row['user_id']=$userid;
                    {
                    // student name
                    $std_name=$row['user_id'];
                                $stud_name= $connect->prepare("SELECT name FROM users WHERE id=?");
                                $stud_name->execute([$std_name]);
                                $name1 = $stud_name->fetchColumn();
                    // Instrauctor name
                    $std_in=$row['instructor'];
                                $instr_name= $connect->prepare("SELECT name FROM users WHERE id=?");
                                $instr_name->execute([$std_in]);
                                $name2 = $instr_name->fetchColumn();
                    // Course name
                    $std_cor=$row['course_id'];
                                $cor_name= $connect->prepare("SELECT course FROM ctppage WHERE CTPid=?");
                                $cor_name->execute([$std_cor]);
                                $name3 = $cor_name->fetchColumn();
                        $table=$row['class'];
                    $std_class=$row['class_id'];
                                $class_name= $connect->prepare("SELECT symbol FROM actual WHERE id=?");
                                $class_name->execute([$std_class]);
                                $name4 = $class_name->fetchColumn();
                    }
?>
	<tr>
		<td><?php echo $sn++;?></td>
		<td><?php echo $name1?></td>
		<td><?php echo $row['class']?></td>
		<td><a style="margin:5px;" id="cl_sy" class="'.$class.'" href="<?php echo BASE_URL;?>includes/Pages/newgradesheet.php?class=<?php echo $name4?>&per=100&id=<?php echo $row['class_id']?>&Phase_id=<?php echo $row['phase_id']?>&class_name=actual"><?php echo $name4?></a></td>
		<td><?php echo $name2?></td>
		<td><?php echo $name3?></td>
		<td><?php echo $row['time']?></td>
		<td><?php echo $row['date']?></td>
		<td><?php echo $row['over_all_grade']?></td>
		<td><?php echo $row['over_all_grade_per']?></td>

	</tr>
<?php
			}
		}else{
			echo'
			<tr>
				<td colspan = "4"><center>Record Not Found</center></td>
			</tr>';
		}
	
?>
	
<?php
		
	
?>