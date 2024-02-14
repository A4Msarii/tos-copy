<?php
include('../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
if(empty($_POST["add_list"]))
			{
				
				$_SESSION['warning'] = "Shop Required";
				header("Location:index.php");
			}

            $user_ides=$_POST['user_ides'];
            
            $lib_id=$_POST['lib_id'];
            $list=$_POST['add_list'];
                        $shop_id = $_POST["shelf_id"];
						foreach ($list as $key => $value) 
						{
							
								$query_shelf ="INSERT INTO shelf_shop(user_id,shelf_id,shop_id,lib_id) VALUES ('$user_ides','$shop_id','$value','$lib_id')";
								$statement_shelf = $connect->prepare($query_shelf);
								$statement_shelf->execute();
								$_SESSION['success'] = "Shop Inserted Successfully";
								header("Location:index.php");
							}
							

				
?>

