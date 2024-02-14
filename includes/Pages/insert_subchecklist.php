

<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');

if(isset($_POST["submit_subchecklist"]))
	{
       if(empty($_POST["subchecklist"]))
			{
				
				$_SESSION['warning'] = "checklist Name Required";
                header("Location:mainchecklist.php");
			}
				else
					{
                        $id=$_REQUEST['id'];
						$subitem = $_POST["subchecklist"];
						foreach ($subitem as  $value) 
						{
							$subquery1 ="INSERT INTO subcheclist (`name`,`main_checklist_id`) VALUES ('$value','$id')";
								$substatement1 = $connect->prepare($subquery1);
								$substatement1->execute();
							
							
							
				      }
                      $_SESSION['success'] = "Sublist Inserted Successfully";
                      header("Location:mainchecklist.php");
					}
			}else{
            $_SESSION['danger'] = "Sublist Inserted Successfully";
            header("Location:mainchecklist.php");
            }
?>