

<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
if(isset($_POST["Insert_subitem"]))
	{
       if(empty($_POST["subitem"]))
			{
				
				$_SESSION['warning'] = "SubItem Name Required";
			}
				else
					{
						$subitem = $_POST["subitem"];
						foreach ($subitem as $key => $value) 
						{
							$subsym=$subitem[$key];
							$subque1 = "SELECT subitem FROM sub_item where subitem='$subsym'";
							$substat1 = $connect->prepare($subque1);
						    $substat1->execute();
							var_dump($substat1->rowCount() == 0);
							if($substat1->rowCount() == 0)
						    {
								$subquery1 ="INSERT INTO sub_item (subitem) VALUES ('".$value."')";
								$substatement1 = $connect->prepare($subquery1);
								$substatement1->execute();
								$_SESSION['success'] = "SubItem Inserted Successfully";
								header("Location:add_item_subitem.php");
							}
							else
							{
								
								$_SESSION['info'] = "This Data Already Exist.. Please Enter New SubItem";
								header("Location:add_item_subitem.php");
							}
				    }

					}
			}
?>