<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>test</title>
</head>
<body>
<a href="C:\xampp\htdocs\latest\TOS\Grade_Sheet\Database\">hello</a>

<table class="table table-striped table-bordered" id="file">
                            <input style="margin:5px;" class="form-control" type="text" id="search" onkeyup="file()" placeholder="Search for files.." title="Type in a name">
                            <thead class="bg-dark">
                              <th class="text-light">Sr No</th>
                              <!-- <th class="text-light">File Names</th> -->
                              <th class="text-light">Uploaded Files</th>
                              <th class="text-light">View</th>
                              <th class="text-light">Action</th>
                            </thead>
                             <?php
                            // $output ="";
                            $query1_ff = "SELECT * FROM files";
                            $statement1_ff = $connect->prepare($query1_ff);
                            $statement1_ff->execute();
                            if ($statement1_ff->rowCount() > 0) {
                              $result1_ff = $statement1_ff->fetchAll();
                              $sn = 1;
                              foreach ($result1_ff as $row) {
                                $filename = "";
                                $id = $row['id']; ?>
                                <tr>
                                  <td style="width:50px;"><?php echo $sn++; ?></td>

                                  <td class="get_url_val"><?php
                                      if ($row['type'] == "") { ?>
                                      <a href="files/<?php echo $row['name'] ?>" target="_blank"><?php echo $row['name'] ?></a>
                                  
                                    <?php } else {
                                    ?>
                                      
                                      <a href="<?php echo $row['name']; ?>">hello</a>
                                      <button class="btn btn-soft-primary btn-sm"  title="copy link" id="<?php echo $row['id']?>" data-bs-toggle="modal" data-bs-target="#url1"><i class="bi bi-files"></i></button>
                                    <?php
                                      }
                                    ?>
                                  </td>
                                  <td><?php if ($row['name'] != "" && $row['type'] != "") {
                                        echo "-";
                                      ?>
                                    <?php } else {
                                    ?>
                                      <a href="files/<?php echo $row['name']; ?>" target="_blank">View</a>
                                    <?php
                                      } ?>
                                  </td>
                                  <td>
                                    <a href="delet_file.php?id=<?php echo $id ?>"><i style="color:red;" class="bi bi-trash-fill"></i></a>

                                  </td>
                                </tr>
                              <?php
                              }
                            } else { ?>
                              <tr>
                                <td colspan='3' style="text-align:center">
                                  No data
                                </td>
                              </tr>
                            <?php }
                            ?>
                          </table>
</body>
</html>