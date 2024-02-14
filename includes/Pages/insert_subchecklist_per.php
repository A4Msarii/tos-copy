

<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
if(isset($_POST["submit_subchecklist"]))
	{
       if(empty($_POST["subchecklist"]))
			{
				
				$_SESSION['warning'] = "checklist Name Required";
                header("Location:per_checklist.php");
			}
				else
					{
						$user_id=$_SESSION['login_id'];
                        $id=$_REQUEST['id'];
						$subitem = $_POST["subchecklist"];
						foreach ($subitem as  $value) 
						{
							$subquery1 ="INSERT INTO per_subchecklist (user_id,name,main_checklist_id,date) VALUES ('$user_id','$value','$id',NOW())";
								$substatement1 = $connect->prepare($subquery1);
								$substatement1->execute();
							
							
							
				      }
                      $_SESSION['success'] = "Subcheck list Inserted Successfully";
                      header("Location:per_checklist.php");
					}
			}else{
            $_SESSION['danger'] = "SubCheck list Inserted Successfully";
            header("Location:per_checklist.php");
            }
?>