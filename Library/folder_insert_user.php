<?php
include('../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
if(empty($_POST["add_folder"]))
			{
				$_SESSION['danger'] = "Folders required..";
				header("Location:index.php");
			}

            $shop_id=$_POST['shop_ides'];
            $shelf_ides=$_POST['shelf_ides'];
            $userid=$_POST['userid'];
            $lib_id=$_POST['lib_id'];
            $add_folder=$_POST['add_folder'];
                       foreach ($add_folder as $key => $value) 
						{
							
								$query_shelf ="INSERT INTO folder_shop_user(folder_id,shelf_id,user_id,shop_id,lib_id) VALUES ('$value','$shelf_ides','$userid','$shop_id','$lib_id')";
								$statement_shelf = $connect->prepare($query_shelf);
								$statement_shelf->execute();
								$_SESSION['success'] = "Folder added Inserted successfully..";
								header("Location:index.php");
							}
							

				
?>

