<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Warning Category</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,
                   initial-scale=1" />
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
</head>


<body>
   
<?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>

    <div class="modal fade" id="showCapData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="shid" name="shop">
                    <table class="table table-bordered table-striped table-hover src-table1" id="itemtablesearch">
                        <input style="margin:5px;" class="form-control" type="text" id="listsearch" onkeyup="listindivitual()" placeholder="Search for Category.." title="Type in a name">
                        <thead class="bg-dark">
                            <th class="text-light">Id</th>
                            <th class="text-light">Category</th>
                            <th class="text-light">Type(only for phase)</th>
                            <th class="text-light">Category data</th>
                            <th class="text-light">Action</th>
                        </thead>
                        <tbody id="capData">

                        </tbody>
                    </table>
                    <hr>
                </div>
            </div>
        </div>
    </div>

    <div id="header-hide">
        <?php

        include ROOT_PATH . 'includes/head_navbar.php';
        $output = "";
        $type_id = "Select type";
        $ctp = "Select Ctp";
        if (isset($_GET['ctp'])) {
            $_SESSION['cap_ctp'] = $ctp = urldecode(base64_decode($_GET['ctp']));
            $ctp_id_data = "SELECT * FROM ctppage where CTPid='$ctp'";
            $statement = $connect->prepare($ctp_id_data);
            $statement->execute();

            if ($statement->rowCount() > 0) {
                $result = $statement->fetchAll();
                $sn = 1;
                foreach ($result as $row) {
                    $ctp_name = $row['course'];
                }
            }
        } else if (isset($_SESSION['cap_ctp'])) {
            $ctp = $_SESSION['cap_ctp'];
            $ctp_id_data = "SELECT * FROM ctppage where CTPid='$ctp'";
            $statement = $connect->prepare($ctp_id_data);
            $statement->execute();

            if ($statement->rowCount() > 0) {
                $result = $statement->fetchAll();
                $sn = 1;
                foreach ($result as $row) {
                    $ctp_name = $row['course'];
                }
            }
        }
        if (isset($_GET['warning_id'])) {
            $_SESSION['warning_id_page'] = $warning_id = $_GET['warning_id'];
            $warning_id_data = "SELECT * FROM warning_data where id='$warning_id'";
            $statement = $connect->prepare($warning_id_data);
            $statement->execute();

            if ($statement->rowCount() > 0) {
                $result = $statement->fetchAll();
                $sn = 1;
                foreach ($result as $row) {
                    $warning_name = $row['warning_name'];
                    // $type_mark=$row['marks'];
                }
            }
        } else if (isset($_SESSION['warning_id_page'])) {
            $warning_id = $_SESSION['warning_id_page'];
            $warning_id_data = "SELECT * FROM warning_data where id='$warning_id'";
            $statement = $connect->prepare($warning_id_data);
            $statement->execute();

            if ($statement->rowCount() > 0) {
                $result = $statement->fetchAll();
                $sn = 1;
                foreach ($result as $row) {
                    $warning_name = $row['warning_name'];
                    // $type_mark=$row['marks'];
                }
            }
        }





        ?>
        <script>
            $(document).on("click", ".edit_cat_war", function() {
                var id = $(this).attr('id');
                $("#get_cat_id").val(id);
                if (id) {
                    $.ajax({
                        type: 'POST',
                        url: 'fetch_cat_detail.php',
                        data: 'id=' + id,
                        success: function(response) {
                            $('#get_creted_form').empty();
                            $("#get_creted_form").append(response);
                        }
                    });
                }
            });
        </script>
    </div>

    <!--Main contect We need to insert data here-->
    <main id="content" role="main" class="main">
        <!-- Content -->
        <div>
            <div class="content container-fluid" style="height: 25rem;">

            </div>
        </div>
        <!-- End Content -->

        <!-- Content -->
        <div class="content container-fluid" style="margin-top: -22rem;">

            <div class="row justify-content-center">

                <div class="col-lg-12 mb-3 mb-lg-5">
                    <!-- Card -->
                    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <center>
                                <div class="col-10">

                                    <input type="hidden" id="ctp_value1" value="<?php echo $std_course1 ?>">

                                    <form method="post" action="insertAssignWarning.php" enctype="multipart/form-data">
                                        <table style="width:100%;">
                                            <center>
                                                <tr>
                                                    <td>
                                                        <label class="form-label" style="color:black; font-weight:bold;">Type</label>
                                                        <input style="background-color: #bfcfe09e;" type="text" class="form-control" placeholder="Enter Type here.." readonly value="<?php echo $warning_name; ?>">
                                                        <label class="form-label" style="color:black; font-weight:bold;">Attachment</label>
                                                        <select class="form-select fileOpt" aria-label="Default select example" style="margin-bottom:25px;" id="fileOptChecklist" name="fileMethod">
                                                            <option selected>Select File Method</option>
                                                            <!-- <option value="addNewPage">New Page</option> -->
                                                            <option value="addFile">Attachment</option>
                                                            <option value="addFileLoca">Drive Link</option>
                                                            <option value="addFileLink">Link</option>
                                                        </select>
                                                        <div class="multipleFile" style="width:80%;display:none;">
                                                            <div class="input-field">
                                                                <table class="table table-bordered">

                                                                    <tr>
                                                                        <td style="text-align: center;"><label for="exampleInputPassword1" style="color:black; font-weight:bold;">Choose Files</label>
                                                                            <input type="file" class="form-control" name="file" id="" />
                                                                        </td>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="insert-phases phase_form" style="width:80%;display:none;">
                                                            <div class="input-field">
                                                                <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Drive Link</label>
                                                                <table class="table table-bordered" id="table-field">
                                                                    <tr>
                                                                        <td style="text-align: center;"><input type="text" placeholder="Link" name="phase" id="phaseval" class="form-control" value="" /> </td>
                                                                        <td style="text-align: center;"><input type="text" placeholder="Link Name" name="phaseName" id="phasename" class="form-control" value="" /> </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="insert-phases filelink" style="width:80%;display:none;">
                                                            <div class="input-field">
                                                                <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Online Link</label>
                                                                <table class="table table-bordered" id="table-field-link">
                                                                    <tr>
                                                                        <td style="text-align: center;"><input type="text" placeholder="Link" name="link" id="linkval" class="form-control" value="" /> </td>
                                                                        <td style="text-align: center;"><input type="text" placeholder="Link Name" name="linkName" id="linkname" class="form-control" value="" /> </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </td>


                                                </tr>
                                            </center>
                                        </table>

                                        <br>


                                        <label class="form-label" style="color:black; font-weight:bold;">Individual Categories</label>

                                        <input type="hidden" name="user_Id" value="<?php echo $fetchuser_id; ?>">
                                        <table class="table table-bordered" id="table-field-test1" style="width:100%;">

                                            <?php if (isset($_GET['warning_id']) || isset($_SESSION['warning_id_page'])) { ?>
                                                <input type="hidden" id="warning_value" name="warning" value="<?php echo $warning_id ?>">
                                            <?php } ?>
                                            <tr>
                                                <td>

                                                    <select name="cat[]" class="select_Cat" style="border: 1px solid LightGray;border-radius:4px;padding:10px">
                                                        <option value="" disabled selected>-select value-</option>
                                                        <option value="actual">Actual</option>
                                                        <option value="sim">Sim</option>
                                                        <option value="test">Test</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </td>

                                                <td>
                                                    <div id="showdropselect_Cat">
                                                        <select name="cat_data[]" class="fetched_cat_dataselect_Cat" style="border: 1px solid LightGray;border-radius:4px;padding:10px;">
                                                            <option selected value="0" disabled>-select category-</option>
                                                        </select>
                                                    </div>
                                                    <div id="showotherselect_Cat" style="display:none">
                                                        <textarea name="other[]" class="fetched_cat_data_otherselect_Cat">
                                                        </textarea>
                                                    </div>
                                                </td>

                                                <td>
                                                    <button type="button" name="add_phase" id="add_phase" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button>
                                                </td>
                                            </tr>
                                        </table>
                                        <br>
                                        <input type="submit" class="btn btn-success" id="submit_cat" name="submit_in">
                                        <br>
                                    </form>
                                    <br>


                                </div>
                            </center>
                        </div>

                        <!-- End Body -->
                    </div>
                    <!-- End Card -->
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- End Content -->

    </main>

    <script>
        setTimeout(function() {
            document.getElementById('info-category').style.display = 'none';
            /* or
            var item = document.getElementById('info-message')
            item.parentNode.removeChild(item);
            */
        }, 4000);
    </script>


    <script>
        function listindivitual() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("listsearch");
            filter = input.value.toUpperCase();
            table = document.getElementById("itemtablesearch");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>



    <script type="text/javascript">
        $(document).ready(function() {

            var max = 80;
            var a = 1;

            $("#add_phase").click(function() {
                if (a <= max) {
                    var html = '<tr class="second_all_data">\
							<td>\
              <div id="firstdivselect_Cat' + a + '">\
                            <select name="cat[]" class="select_Cat' + a + '" style="border: 1px solid LightGray;border-radius:4px;padding:10px" required>\
                            <option value="" disabled selected>-select value-</option>\
                            <option value="actual">Actual</option>\
                            <option value="sim">Sim</option>\
                            <option value="test">Test</option>\
                            <option value="other">Other</option>\
                            </select>\
                            <div>\
                            </td>\
                             <td>\
                            <div id="showdropselect_Cat' + a + '">\
                            <select name="cat_data[]" class="fetched_cat_dataselect_Cat' + a + '" style="border: 1px solid LightGray;border-radius:4px;padding:10px;">\
                            <option selected value="0">-select category-</option>\
                            </select>\
                            </div>\
                            <div id="showotherselect_Cat' + a + '" style="display:none">\
                                                        <textarea name="other[]" class="fetched_cat_data_otherselect_Cat' + a + '">\
                                                        </textarea>\
                                                    </div>\
                            </td>\
							<td><button type="button" name="remove_actual" id="remove_phase' + a + '" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button>\
                            <br><center><a class="addbuttonselect_Cat' + a + '" style="display:none"><i class="bi bi-plus-circle-fill"></i></a></center>\
              </td>\
						</tr>';
                    $("#table-field-test1").append(html);
                    a++;

                    $("#table-field-test1").on('click', '#remove_phase' + a, function() {
                        $(this).closest('tr').remove();
                        a--;
                    });
                }
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $("#table-field-test1").on("change", "select", function() {
                var Class1;
                var Class1 = this.className;
                var cat_Sel = $(this).val();
                var dis_Ctp1 = $("#ctp_value1").val();
                if (cat_Sel == "actual" || cat_Sel == "sim" || cat_Sel == "test") {
                    $("#showdrop" + Class1).show();
                    $("#showother" + Class1).hide();
                    $.ajax({
                        type: 'POST',
                        url: 'selec_ctp_dis2.php',
                        data: 'cat=' + cat_Sel + '&ctp=' + dis_Ctp1,
                        success: function(response) {

                            $('.fetched_cat_data' + Class1).empty();
                            $('.fetched_cat_data' + Class1).append(response);

                        }
                    });
                }
                if (cat_Sel == "other") {
                    $("#showdrop" + Class1).hide();
                    $("#showother" + Class1).show();
                }
            });

        });
    </script>

    <!--Footer-->
    <footer id="contenthome" role="footer" class="footer">
        <?php include ROOT_PATH . 'includes/footer2.php'; ?>
    </footer>
 <script src="<?php echo BASE_URL; ?>includes/Pages/loading.js"></script>
</body>

</html>