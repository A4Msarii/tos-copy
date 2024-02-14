<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
if(isset($_POST["savegroup"]))
	{
       if(empty($_POST["group"]))
			{
				$_SESSION['warning'] = "Group Name Required";
				header("Location:add_group.php");
			}elseif(empty($_POST["ctp"])){
				
				$_SESSION['warning'] = "Select CTP First";
				header("Location:add_group.php");
			}
				else
					{
						$ctp=$_POST['ctp'];
						$group = $_POST["group"];
						foreach ($group as $key => $value) 
						{
							$sym_group=$group[$key];
							$que_g = "SELECT groupname FROM groups where groupname='$sym_group' and course_id='$ctp'";
							$stat_g = $connect->prepare($que_g);
						    $stat_g->execute();
							
							if($stat_g->rowCount() == 0)
						    {
								$query_g ="INSERT INTO groups (groupname,course_id) VALUES ('".$value."','$ctp')";
								$statement_g = $connect->prepare($query_g);
								$statement_g->execute();
								$_SESSION['success'] = "Group Inserted Successfully";
								header("Location:add_group.php");
							}
							else
							{
								
								$_SESSION['info'] = "This Data Already Exist.. Please Enter New Group";
								header("Location:add_group.php");
							}

					}

}			}
?>