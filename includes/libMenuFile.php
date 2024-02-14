<div class="toogle">
        <?php include ROOT_PATH . "Library/file_dropdown.php" ?>
    </div>
<?php

$lib_id = 1;
if (isset($_GET['library'])) {
    $lib = "Main";
    $_SESSION['library_value'] = $lib = urldecode(base64_decode($_GET['library']));
} else if (isset($_SESSION['library_value'])) {
    $lib = $_SESSION['library_value'];
} else {
    $lib = "Main";
}

?>


    <?php if ($lib == "Main") {
        if ($role == "super admin") {
            $remClass = "";
        } else {
            $remClass = "display:none;";
        }
    ?>

        
            <?php
            $query71 = "SELECT * FROM user_files where menu_type='files'";
            $statement71 = $connect->prepare($query71);
            $statement71->execute();
            $result71 = $statement71->fetchAll();
            foreach ($result71 as $row71) {
                $row71['type_id'];
                $string = $row71['filename'];
                $url = BASE_URL . 'includes/Pages/files/' . $string;
                if ($row71['type'] == 'pdf') {
                    echo '<span style="width: auto; margin-right:1px;" onclick="window.open(\'' . $url . '\', \'_blank\');" class="btn iconBtn btn-soft-primary btn-sm" title="' . $row71['filename'] . '">' .  substr($string, 0, 8) . '</span><a href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row71['id'] . '" style="' . $remClass . '"><i style="position:relative;top:-10px;right:15px;cursor:pointer;display:none;" class="bi bi-x-circle text-danger"></i></a>';
                } elseif ($row71['type'] == 'docx' || $row71['type'] == 'pptx' || $row71['type'] == 'xlsx') {
                    echo '<span style="width: auto;margin-right:1px;" class="docxLink_shel btn iconBtn btn-soft-primary btn-sm" name="' . $row71['filename'] . '" value="' . $row71['type'] . '" title="' . $row71['filename'] . '">' .  substr($string, 0, 8) . '</span><a style="' . $remClass . '" href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row71['id'] . '"><i style="position:relative;top:-10px;right:15px;cursor:pointer;display:none;" class="bi bi-x-circle text-danger"></i></a>';
                } elseif ($row71['type'] == 'png' || $row71['type'] == 'jpg' || $row71['type'] == 'gif' || $row71['type'] == 'jpeg' || $row71['type'] == 'svg' || $row71['type'] == 'bmp' || $row71['type'] == 'mp4') {
                    echo '<span style="width: auto;margin-right:1px;" onclick="window.open(\'' . $url . '\', \'_blank\');" class="btn iconBtn btn-soft-primary btn-sm" title="' . $row71['filename'] . '">' .  substr($string, 0, 8) . '</span><a style="' . $remClass . '" href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row71['id'] . '"><i style="position:relative;top:-10px;right:15px;cursor:pointer;display:none;" class="bi bi-x-circle text-danger"></i></a>';
                } elseif ($row71['type'] == 'online') {
                    $fName = $row71['filename'];
                    $lName = $row71['lastName'];
                    echo '<span style="width: auto;margin-right:1px;" class="btn iconBtn btn-soft-primary btn-sm openLink" title="' . $row71['filename'] . '">' .  substr($lName, 0, 8) . '</span><a style="' . $remClass . '" href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row71['id'] . '"><i style="position:relative;top:-10px;right:15px;cursor:pointer;display:none;" class="bi bi-x-circle text-danger"></i></a>';
                } elseif ($row71['type'] == 'offline') {
                    $fName = $row71['filename'];
                    $lName = $row71['lastName'];
                    echo '<span style="width: auto;margin-right:1px;" class="btn iconBtn btn-soft-primary btn-sm driveLink1" value="' . $row71['filename'] . '">' .  substr($lName, 0, 8) . '</span><a style="' . $remClass . '" href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row71['id'] . '"><i style="position:relative;top:-10px;right:15px;cursor:pointer;display:none;" class="bi bi-x-circle text-danger"></i></a>';
                }
            }
            ?>

            <?php
            $query1_fm70 = "SELECT * FROM file_menu_name where type_menu='menu'";
            $statement1_fm70 = $connect->prepare($query1_fm70);
            $statement1_fm70->execute();
            if ($statement1_fm70->rowCount() > 0) {
                $result1_fm70 = $statement1_fm70->fetchAll();
                foreach ($result1_fm70 as $row390) {
                    $m_id = $row390['id'];
            ?>
                    <div class="dropdown dropdown1 addBreifFile" style="margin-right: -10px; margin-top:10px;display: inline-block;width:auto;" value="<?php echo $row390['id']; ?>" name="0" data-custom="NULL" onmouseover="showDropdown(this)" onmouseout="hideDropdown(this)" data-class="menu<?php echo $row390['id']; ?>" data-color="<?php if ($row390['color'] == "") {
                                                                                                                                                                                                                                                                                                                                                echo "gray";
                                                                                                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                                                                                                                echo $row390['color'];
                                                                                                                                                                                                                                                                                                                                            } ?>">
                        <span type="span" class="iconBtn btn-sm dropdown-toggle menu<?php echo $row390['id']; ?>" id="navbarNotificationsDropdown" data-bs-toggle="dropdown">
                            <?php echo $row390['menu_name'] ?>
                        </span>
                        <?php
                        if ($_SESSION['role'] == 'super admin') {
                        ?>
                            <a href="<?php echo BASE_URL; ?>Library/removeFiles.php?menuId=<?php echo $row390['id']; ?>"><i style="position:relative;top:-10px;right:15px;cursor:pointer;display:none;" class="bi bi-x-circle text-danger"></i></a>
                        <?php } ?>
                        <div class="dropdown-menu dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="width: 20rem; position:absolute;top:30px;left:14.1px;z-index:1;">
                            <!-- Header -->
                            <?php
                            if ($_SESSION['role'] == "super admin") {
                            ?>
                                <div class="card-header card-header-content-between">
                                    <i style="font-size:20px; margin-top:-25px;margin-left:-30px;" onclick="document.getElementById('me_id').value='<?php echo $row390['id'] ?>';document.getElementById('me_ty').value='<?php echo $row390['type_menu'] ?>';" class="bi bi-plus-circle-fill btn" data-bs-toggle="modal" data-bs-target="#selectfiles"></i>
                                </div>
                            <?php } ?>
                            <div class="card-body-height">
                                <?php
                                $query1_fm701 = "SELECT * FROM user_files where menu_type='menu' and type_id='$m_id'";
                                $statement1_fm701 = $connect->prepare($query1_fm701);
                                $statement1_fm701->execute();
                                if ($statement1_fm701->rowCount() > 0) {
                                    $result1_fm701 = $statement1_fm701->fetchAll();
                                    foreach ($result1_fm701 as $row3901) {
                                        if ($row3901['type'] == 'pdf') {
                                            echo '
                                  <a href="' . BASE_URL . 'includes/Pages/files/' . $row3901['filename'] . '" class="nav-link ahstyle rounded-2" target="_blank">' . $row3901['filename'] . '</a></a> <a style="' . $remClass . '" href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row3901['id'] . '"><i style="position:relative;top:-40px;right:-270px;z-index:3000" class="bi bi-x-circle text-danger"></i></a>';
                                        } elseif ($row3901['type'] == 'offline') {
                                            echo '<div class="offline driveLink1 row d-flex justify-content-center"></div>
                                <a href="#" class="offline nav-link ahstyle rounded-2"  value="' . $row3901['filename'] . '">' . $row3901['filename'] . '</a> </a> <a style="' . $remClass . '" href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row3901['id'] . '"><i style="position:relative;top:-40px;right:-270px;z-index:3000" class="bi bi-x-circle text-danger"></i></a>';
                                        } elseif ($row3901['type'] == 'online') {
                                            echo '
                                <a attr="' . $row3901['filename'] . '" class="openLink nav-link ahstyle rounded-2">' . $row3901['lastName'] . '</a></a> <a style="' . $remClass . '" href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row3901['id'] . '"><i style="position:relative;top:-40px;right:-270px;z-index:3000" class="bi bi-x-circle text-danger"></i></a>';
                                        } elseif ($row3901['type'] == 'docx' || $row3901['type'] == 'pptx' || $row3901['type'] == 'xlsx') {
                                            echo '<div class="docxLink_shel row d-flex justify-content-center" name="' . $row3901['filename'] . '" value="' . $row3901['type'] . '"><div class="col-11">
                                <a href="#" class="nav-link ahstyle rounded-2">' . $row3901['filename'] . '</a></a> <a style="' . $remClass . '" href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row3901['id'] . '"><i style="position:relative;top:-40px;right:-270px;z-index:3000" class="bi bi-x-circle text-danger"></i></a> </div></div>';
                                        } elseif ($row3901['type'] == 'png' || $row3901['type'] == 'jpg' || $row3901['type'] == 'gif' || $row3901['type'] == 'jpeg' || $row3901['type'] == 'svg' || $row3901['type'] == 'bmp') {
                                            echo '<div class="row d-flex justify-content-center"><div class="col-11">
                                <a href="' . BASE_URL . 'includes/Pages/files/' . $row3901['filename'] . '" target="_blank" class="nav-link ahstyle rounded-2">' . $row3901['filename'] . '</a></a> <a style="' . $remClass . '" href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row3901['id'] . '"><i style="position:relative;top:-40px;right:-270px;z-index:3000" class="bi bi-x-circle text-danger"></i></a> </div></div>';
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
            <?php
            $query1_fm702 = "SELECT * FROM file_menu_name where type_menu='megmenu'";
            $statement1_fm702 = $connect->prepare($query1_fm702);
            $statement1_fm702->execute();
            if ($statement1_fm702->rowCount() > 0) {
                $result1_fm702 = $statement1_fm702->fetchAll();
                foreach ($result1_fm702 as $row3901) {
                    $m_id1 = $row3901['id'];
            ?>
                    <div class="dropdown dropdown1" style="margin-right:-10px; margin-top:10px;display: inline-block;width:auto;" onmouseover="showDropdown(this)" onmouseout="hideDropdown(this)" data-class="mega<?php echo $row3901['id']; ?>" data-color="<?php if ($row3901['color'] == "") {
                                                                                                                                                                                                                                                                    echo "gray";
                                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                                    echo $row3901['color'];
                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                ?>">
                        <span type="span" style="width: auto;" class="nav-link dropdown-toggle mega<?php echo $row3901['id']; ?>" aria-current="page" href="#" role="span" data-bs-toggle="dropdown" aria-expanded="false" id="landingsMegaMenu1">
                            <?php echo $row3901['menu_name'] ?>
                        </span>
                        <?php
                        if ($_SESSION['role'] == 'super admin') {
                        ?>
                            <a href="<?php echo BASE_URL; ?>Library/removeFiles.php?menuId=<?php echo $row3901['id']; ?>"><i style="position:relative;top:-10px;right:15px;cursor:pointer;display:none;" class="bi bi-x-circle text-danger"></i></a>
                        <?php } ?>
                        <div class="hs-mega-menu dropdown-menu bg-light" aria-labelledby="landingsMegaMenu1" style="width:1000px; margin-top:0px;">
                            <div class="navbar-dropdown-menu-promo">
                                <!-- Promo Item -->
                                <?php
                                if ($_SESSION['role'] == "super admin") {
                                ?>
                                    <div class="card-header card-header-content-between">
                                        <i style="font-size:20px; margin-top:-25px;margin-left:-30px;" onclick="document.getElementById('me_id').value='<?php echo $row3901['id'] ?>';document.getElementById('me_ty').value='<?php echo $row3901['type_menu'] ?>';" class="bi bi-plus-circle-fill btn" data-bs-toggle="modal" data-bs-target="#selectfiles"></i>
                                    </div>
                                <?php } ?>
                                <div class="container-fluid">
                                    <div class="row">
                                        <?php
                                        $query1_fm701 = "SELECT * FROM user_files WHERE menu_type = 'megmenu' AND type_id = '$m_id1'";
                                        $statement1_fm701 = $connect->prepare($query1_fm701);
                                        $statement1_fm701->execute();
                                        if ($statement1_fm701->rowCount() > 0) {
                                            $result1_fm701 = $statement1_fm701->fetchAll();
                                            foreach ($result1_fm701 as $row3901) {
                                                if ($row3901['type'] == 'pdf') {
                                                    echo '<div class="col-4"><div class="row d-flex justify-content-center"><div class="col-11">
                                      <a href="' . BASE_URL . 'includes/Pages/files/' . $row3901['filename'] . '" class="nav-link ahstyle rounded-2" target="_blank">' . $row3901['filename'] . '</a> <a href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row3901['id'] . '"><i style="position:relative;top:-35px;right:-250px" class="bi bi-x-circle text-danger"></i></a></div></div></div>';
                                                } elseif ($row3901['type'] == 'offline') {
                                                    echo '<div class="col-4"><div class="row d-flex justify-content-center"><div class="col-11">
                                    <a class="driveLink1 offline nav-link ahstyle rounded-2"  value="' . $row3901['filename'] . '">' . $row3901['filename'] . '</a></a> <a href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row3901['id'] . '"><i style="position:relative;top:-35px;right:-250px" class="bi bi-x-circle text-danger"></i></a> </div></div></div>';
                                                } elseif ($row3901['type'] == 'online') {
                                                    echo '<div class="col-4"><div class="row d-flex justify-content-center"><div class="col-11">
                                    <a attr="' . $row3901['filename'] . '" class="openLink nav-link ahstyle rounded-2">' . $row3901['lastName'] . '</a> </a> <a href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row3901['id'] . '"><i style="position:relative;top:-35px;right:-250px" class="bi bi-x-circle text-danger"></i></a></div></div></div>';
                                                } elseif ($row3901['type'] == 'docx' || $row3901['type'] == 'pptx' || $row3901['type'] == 'xlsx') {
                                                    echo '<div class="col-4"><div class="docxLink_shel row d-flex justify-content-center" name="' . $row3901['filename'] . '" value="' . $row3901['type'] . '"><div class="col-11">
                                    <a href="#" class="nav-link ahstyle rounded-2">' . $row3901['filename'] . '</a> </a> <a href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row3901['id'] . '"><i style="position:relative;top:-35px;right:-250px" class="bi bi-x-circle text-danger"></i></a></div></div></div>';
                                                } elseif ($row3901['type'] == 'png' || $row3901['type'] == 'jpg' || $row3901['type'] == 'gif' || $row3901['type'] == 'jpeg' || $row3901['type'] == 'svg' || $row3901['type'] == 'bmp') {
                                                    echo '<div class="col-4"><div class="row d-flex justify-content-center"><div class="col-11">
                                    <a href="' . BASE_URL . 'includes/Pages/files/' . $row3901['filename'] . '" target="_blank" class="nav-link ahstyle rounded-2">' . $row3901['filename'] . '</a> </a> <a href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row3901['id'] . '"><i style="position:relative;top:-35px;right:-250px" class="bi bi-x-circle text-danger"></i></a></div></div></div>';
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        
    <?php } ?>



<script>
    $(".openLink").on("click", function() {
        const fileName = $(this).attr("title");
        // alert(fileName);
        window.open(fileName, '_blank');
    });

    $(document).on("click", ".driveLink1", function() {
        const page = $(this).attr("value");

        var $tempInput = $("<input>");

        // Set the value of the temporary input element to the text
        $tempInput.val(page);

        // Append the temporary input element to the body
        $("body").append($tempInput);

        // Select the text in the temporary input element
        $tempInput.select();

        // Copy the selected text to the clipboard
        document.execCommand("copy");

        // Remove the temporary input element from the body
        $tempInput.remove();
        window.open('<?php echo BASE_URL; ?>openPageIllu.php', '_blank');
    });

    $(document).on("click", ".docxLink_shel", function() {
        var fileName = $(this).attr("name");
        var fileType = $(this).attr('value');
        if (fileType == "docx" || fileType == "xlsx" || fileType == "pptx") {

            function downloadFile(url, fileName) {
                var link = document.createElement('a');
                link.href = url;
                link.download = fileName;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }

            // Download the DOCX file
            var docxUrl = "<?php echo BASE_URL; ?>includes/pages/files/" + fileName;
            var docxFileName = fileName;
            downloadFile(docxUrl, docxFileName);
        }
    });
</script>