<style type="text/css">
    .table>:not(caption)>*>* {
        padding: 5px !important;
    }

    #Actionresource:hover {
        color: white !important;
    }
    .dropdown-menu.ayushi
    {
            transform: translate(-483px, 12px) !important;
            right: -440px !important;
    }
</style>
<?php
$in1 = "";

// Fetch roles
$q21 = "SELECT * FROM roles";
$st21 = $connect->prepare($q21);
$st21->execute();
$re21 = $st21->fetchAll();

foreach ($re21 as $row21) {
    $roled = unserialize($row21['permission']);

    // Check if 'assingeresource' permission is set to 1
    if (isset($roled['assingeresource']) && $roled['assingeresource'] == 1) {
        $role = $row21['roles'];

        // Fetch users with the specific role using prepared statement
        $q2 = "SELECT * FROM users WHERE role = :role";
        $st2 = $connect->prepare($q2);
        $st2->bindParam(':role', $role);
        $st2->execute();

        if ($st2->rowCount() > 0) {
            $re2 = $st2->fetchAll();

            foreach ($re2 as $row2) {
                // Generate HTML for checkboxes
                $in1 .= '<tr><td><input type="checkbox" value="' . $row2['id'] . '" name="userides[]"></td><td>' . $row2['nickname'] . '</td></tr>';
            }
        }
    }
}

$checkPha = 0;



 $checkPha = $connect->query("SELECT count(*) FROM phasefilepermission WHERE instId = '$user_id' AND coursecode='$CourseCode1121' and courseName='$std_course21'")->fetchColumn();



if ($checkPha > 0) {
?>
    <div class="row mb-2">
        <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <div class="card-body">
                <h6 class="accordion-button collapsed subContainer text-success" role="button" data-bs-toggle="collapse" data-bs-target="#demoPhaseFiles" aria-expanded="false" aria-controls="demoPhaseFiles" title="Expand">
                    <img style="height:35px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/phaseF.png">&nbsp;&nbsp;
                    Phase Files
                </h6>
                <hr style="margin: 10px;margin-top: -5px;">
                <!-- <hr class="text-dark"> -->
                <div class="row collapse" id="demoPhaseFiles">
                    <div class="table-responsive" style="overflow: auto;overflow-y: hidden;">
                        <table class="table table-bordered">
                            <thead class="bg-dark">
                                <tr>
                                    <th class="text-white">Filename</th>
                                    <th class="text-white">Phase Name</th>
                                    <th class="text-white">Updated By</th>
                                    <th class="text-white">Approved By</th>
                                    <th class="text-white">Updated Date</th>
                                    <th class="text-white">Status</th>
                                    <th class="text-white">File size</th>
                                    <th class="text-white">Version Number</th>
                                    <th class="text-white">Comments/Notes:</th>
                                    <th class="text-white">assignees</th>
                                    <th class="text-white">View</th>
                                    <th class="text-white">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $fetchPhaseFileQ = $connect->query("SELECT * FROM phasefilepermission WHERE (instId = '$user_id') AND coursecode='$CourseCode1121' and courseName='$std_course21'");

                                while ($fetchPhaseFileQData = $fetchPhaseFileQ->fetch()) {
                                    $fileId = $fetchPhaseFileQData['fileId'];
                                    $fileMainId = $fetchPhaseFileQData['id'];
                                    $filerefid = $fetchPhaseFileQData['refrenceid'];
                                    $coursePhaseId = $fetchPhaseFileQData['phaseId'];
                                    $fetchPhaseDetail = $connect->query("SELECT phasename,color FROM phase WHERE id = '$coursePhaseId'");
                                    $phaseDetail = $fetchPhaseDetail->fetch();
                                    if ($phaseDetail['color'] == "") {
                                        $phaseColor = "gray";
                                    } else {
                                        $phaseColor = $phaseDetail['color'];
                                    }
                                    $fetchFileQ = $connect->query("SELECT * FROM user_files WHERE id = '$fileId'");
                                    while ($fileData = $fetchFileQ->fetch()) {
                                        if ($fileData['lastName'] == "") {
                                            $fName = $fileData['filename'];
                                            $folderPath = ROOT_PATH . "includes/Pages/files/";
                                            $filePath = $folderPath . $fName;

                                            if (file_exists($filePath)) {
                                                $filePath;
                                                // Get the file size
                                                $fileSize = filesize($filePath);
                                                $size = round($fileSize / 1024);
                                                $mbSize = number_format($size / 1024, 2);
                                            } else {
                                                $mbSize = "-";
                                            }
                                        } else {
                                            $mbSize = "-";
                                        }
                                        $bg_classs = "";
                                        if ($fetchPhaseFileQData['status'] == "In Review") {
                                            $bg_classs = "bg-danger";
                                        }
                                        if ($fetchPhaseFileQData['status'] == "Approved") {
                                            $bg_classs = "bg-success";
                                        }
                                        if ($fetchPhaseFileQData['status'] == "In Progress") {
                                            $bg_classs = "bg-primary";
                                        }
                                ?>
                                        <tr>
                                            <td><span title="<?php echo $fileData['filename']; ?>"><?php echo substr($fileData['filename'], 0, 10); ?></span></td>
                                            <td style="color:<?php echo $phaseColor; ?>"><?php echo $phaseDetail['phasename']; ?></td>
                                            <td><?php echo $fileData['updatedBy']; ?></td>
                                            <td>
                                                <?php
                                                $fetchAppName = $connect->query("SELECT nickname FROM users WHERE id = '" . $fetchPhaseFileQData['lastApprove'] . "'");
                                                echo $fetchAppName->fetchColumn();
                                                ?>
                                            </td>
                                            <td><?php echo $fetchPhaseFileQData['lastDate']; ?></td>

                                            <td>
                                                <select style="width: auto;padding: 8px;border: 1px solid #ccc;border-radius: 4px !important;box-sizing: border-box;" class="form-control file_status <?php echo $bg_classs; ?>" data-values="<?php echo $fileId ?>" data-values1="<?php echo $coursePhaseId ?>" data-userid="<?php echo $user_id; ?>" data-id="<?php echo $fileMainId; ?>" data-coursecode="<?php echo $fetchPhaseFileQData['coursecode']; ?>" data-coursename="<?php echo $fetchPhaseFileQData['courseName']; ?>">
                                                    <option value="In Review" <?php if ($fetchPhaseFileQData['status'] == "In Review") {
                                                                                    echo "selected";
                                                                                } ?>>In Review</option>
                                                    <option value="Approved" <?php if ($fetchPhaseFileQData['status'] == "Approved") {
                                                                                    echo "selected";
                                                                                } ?>>Approved</option>
                                                    <option value="In Progress" <?php if ($fetchPhaseFileQData['status'] == "In Progress") {
                                                                                    echo "selected";
                                                                                } ?>>In Progress</option>
                                                </select>
                                            </td>
                                            <td>
                                                <?php if ($mbSize == "-") {
                                                    echo $mbSize;
                                                } else {
                                                    echo $mbSize . " MB";
                                                } ?>
                                            </td>
                                            <td>
                                                <?php

                                                $fetchRefIds = $connect->query("SELECT * FROM phasefilepermission WHERE fileId = '$fileId' AND phaseId = '$coursePhaseId' AND status = 'Approved'");
                                                $coId = 0;
                                                $coCode = 0;
                                                while ($fetchRefIdsData = $fetchRefIds->fetch()) {
                                                    if ($fetchRefIdsData['coursecode'] > $coId) {
                                                        $coId = $fetchRefIdsData['coursecode'];
                                                        $coCode = $fetchRefIdsData['courseName'];
                                                        $year = $fetchRefIdsData['year'];
                                                        $custom_number = $fetchRefIdsData['custom_number'];
                                                    }
                                                }
                                                if ($coId > 0) {
                                                    $fetchCtpName = $connect->query("SELECT symbol FROM ctppage WHERE CTPid = '$coCode'");
                                                    echo $year . ",";
                                                    echo $fetchCtpName->fetchColumn() . "-" . $coId . ",";
                                                    echo $custom_number;
                                                } else {
                                                    echo "-";
                                                }

                                                ?>
                                            </td>
                                            <td style="text-align:center;">
                                                <a class="btn btn-soft-dark btn-xs" data-bs-toggle="modal" data-bs-target="#phaseCommentModal" onclick="document.getElementById('commentFileId').value='<?php echo $fetchPhaseFileQData['fileId']; ?>';document.getElementById('phaseComment').value='<?php echo $fetchPhaseFileQData['comments']; ?>';;document.getElementById('commentPhaseId').value='<?php echo $fetchPhaseFileQData['phaseId']; ?>';;document.getElementById('commentCourseCode').value='<?php echo $fetchPhaseFileQData['coursecode']; ?>';;document.getElementById('commentCourseName').value='<?php echo $fetchPhaseFileQData['courseName']; ?>';"><i class="bi bi-chat-text"></i></a>
                                            </td>
                                            <td>
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <!-- Avatar Group -->
                                                        <div class="avatar-group avatar-group-lg mb-1">
                                                            <?php
                                                            $instCount = 0;
                                                           
                                                            $fetchAss = $connect->query("SELECT * FROM phasefilepermission WHERE fileId = '$fileId' AND phaseId = '$coursePhaseId' AND coursecode='$CourseCode1121' and courseName='$std_course21'");
                                                            while ($assData = $fetchAss->fetch()) {
                                                                $nRowspmcheckuser=0;
                                                                $nRowsbpmcheckuser=0;
                                                                $displaynone="";
                                                                $insId = $assData['instId'];
                                                                $instCount++;
                                                                if ($instCount > 2) {
                                                                    continue;
                                                                }
                                                                $fetchInsDetail = $connect->query("SELECT nickname,file_name FROM users WHERE id = '$insId'");
                                                                if ($fetchInsDetail->rowCount() > 0) {
                                                                     $instDData =    $fetchInsDetail->fetch();
                                                                    $prof_pic11 = $instDData['file_name'];
                                                                    // echo $instDData['nickname'];
                                                                    if ($prof_pic11 != "") {
                                                                        $img = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                                                                        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $img)) {
                                                                            $img = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                                                                        } else {
                                                                            $img = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                                                        }
                                                                    } else {
                                                                        $img = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                                                    }

                                                            ?>
                                                                    <span class="avatar avatar-circle" title="<?php echo $instDData['nickname']; ?>">
                                                                        <img class="avatar-img" src="<?php echo $img; ?>" alt="Image Description" />
                                                                    <?php 
                                                                    $nRowspmcheckuser = $connect->query("SELECT COUNT(*) FROM manage_role_course_phase WHERE intructor = '$insId' AND courseName = '$std_course21' AND courseCode = '$CourseCode1121'")->fetchColumn();

                                                                    $nRowsbpmcheckuser = $connect->query("SELECT COUNT(*) FROM manage_role_course_phase WHERE b_up_manger = '$insId' AND courseName = '$std_course21' AND courseCode = '$CourseCode1121'")->fetchColumn();
                                                                    
                                                                    if($nRowspmcheckuser>0 || $nRowsbpmcheckuser>0){ 
                                                                        $displaynone="display:none";
                                                                    }
                                                                    ?>
                                                                        <a data-bs-target="#resourceInstRemoveModal" data-bs-toggle="modal" class="confirmResourcePhaseIns" style="position: relative;top:-60px;<?php echo $displaynone;?>" data-fileid="<?php echo $fileId; ?>" data-phaseid="<?php echo $coursePhaseId; ?>" data-instid="<?php echo $insId; ?>" data-coursecode="<?php echo $assData['coursecode']; ?>" data-coursename="<?php echo $assData['courseName']; ?>" data-instname="<?php echo $instDData['nickname']; ?>" data-userimg="<?php echo $img; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                                                                    </span>
                                                            <?php
                                                                }}
                                                           
                                                            $instCount = $instCount - 2;

                                                            ?>
                                                            <span class="avatar avatar-primary avatar-circle fetchPhaseDetail" data-bs-target="#phaseInstModal" data-bs-toggle="modal" data-fileid="<?php echo $fileId; ?>" data-phaseid="<?php echo $coursePhaseId; ?>" data-coursecode="<?php echo $fetchPhaseFileQData['coursecode']; ?>" data-coursename="<?php echo $fetchPhaseFileQData['courseName']; ?>" data-instid="<?php echo $user_id; ?>">
                                                                <span class="avatar-initials">
                                                                    <?php
                                                                    if ($instCount > 0) {
                                                                        echo $instCount;
                                                                    }
                                                                    ?>
                                                                    +
                                                                </span>
                                                            </span>

                                                        </div>
                                                        <!-- End Avatar Group -->
                                                    </div>
                                            </td>
                                            <td>
                                                <?php
                                                if ($fileData['type'] == "offline") {
                                                ?>
                                                    <a style="cursor: pointer;" class="driveLink1" value="<?php echo $fileData['filename']; ?>">View</a>
                                                <?php
                                                } elseif ($fileData['type'] == "online") {
                                                ?>
                                                    <a target="_blank" style="cursor: pointer;" href="http://<?php echo $fileData['filename']; ?>">View</a>
                                                <?php
                                                } else {
                                                ?>
                                                    <a target="_blank" href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fileData['filename']; ?>">View</a>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                            <td>



                                                <li style="position: relative;list-style-type: none;">
                                                    <h6 id="Actionresource" class="hs-mega-menu-invoker dropdown-toggle btn btn-soft-secondary text-dark" aria-current="page" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-placement="bottom" title="Action">Info</h6>

                                                    <!-- Mega Menu -->
                                                    <div class="dropdown-menu ayushi bg-light" aria-labelledby="Actionresource" style="position: absolute;width: auto;height: -webkit-fill-available;">
                                                        <div class="row ps-2 pe-2">
                                                            <ul>
                                                                <div class="d-flex">
                                                                    <?php
                                                                    if ($fileData['type'] == "offline" || $fileData['type'] == "online") {
                                                                    ?>
                                                                        <a class="btn btn-soft-success btn-xs editPhaseLink m-1" data-bs-toggle="modal" data-bs-target="#editPhaseLink" data-fileid="<?php echo $fileId; ?>" data-filename="<?php echo $fileData['filename']; ?>" data-filelastname="<?php echo $fileData['lastName']; ?>"><i class="bi bi-pen-fill m-1"></i>Edit</a>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <a class="btn btn-soft-success btn-xs editPhaseFile m-1" data-bs-toggle="modal" data-bs-target="#editPhaseAttach" data-fileid="<?php echo $fileId; ?>" data-filename="<?php echo $fileData['filename']; ?>"><i class="bi bi-pen-fill m-1"></i>Edit</a>
                                                                    <?php } ?>

                                                                    <a href="<?php echo BASE_URL; ?>includes/Pages/editPhaseFiles.php?phaseFileId=<?php echo $fileId; ?>&coursecode=<?php echo $fetchPhaseFileQData['coursecode']; ?>&coursename=<?php echo $fetchPhaseFileQData['courseName']; ?>&phaseId=<?php echo $fetchPhaseFileQData['phaseId']; ?>" class="btn btn-soft-danger btn-xs m-1"><i class="bi bi-trash-fill m-1"></i>Delete</a>

                                                                    <a class="btn btn-soft-dark btn-xs m-1" data-bs-toggle="modal" data-bs-target="#addcustom_number" onclick="document.getElementById('custome_number_file_id').value='<?php echo $fetchPhaseFileQData['fileId']; ?>';document.getElementById('custome_number').value='<?php echo $fetchPhaseFileQData['custom_number']; ?>';document.getElementById('customNumberCourseCode').value='<?php echo $fetchPhaseFileQData['coursecode']; ?>';document.getElementById('customNumberCourseName').value='<?php echo $fetchPhaseFileQData['courseName']; ?>';document.getElementById('customNumberPhaseId').value='<?php echo $fetchPhaseFileQData['phaseId']; ?>';"><i class="bi bi-plus-square m-1"></i>Custom Number</a>
                                                                    <a href="" class="btn btn-soft-info btn-xs m-1" title="Working Files" data-bs-toggle="modal" data-bs-target="#WorkingPhaseModal"><i class="bi bi-paperclip m-1"></i>Working Files</a>
                                                                    <a href="" class="btn btn-soft-warning btn-xs assigneeFileBtn m-1" title="Add More Assign" data-bs-toggle="modal" data-bs-target="#assinguservalue" data-phaseid="<?php echo $coursePhaseId; ?>" data-coursecode="<?php echo $CourseCode1121; ?>" data-coursename="<?php echo $std_course21; ?>" data-fileid="<?php echo $fileId; ?>" data-mainid="<?php echo $fileMainId; ?>"><i class="bi bi-people-fill m-1"></i>+ Assinge</a>
                                                                </div>
                                                            </ul>
                                                        </div>
                                                        <!-- End Promo Item -->
                                                    </div>
                                                    <!-- End Promo -->
                                                </li>


                                            </td>

                                        </tr>
                                <?php
                                    }
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <!-- End Col -->
    </div>
<?php }   ?>


<script>
    $('.dropbtn').click(function() {
        $('.dropdown-content1').css('display', 'block');
    });
</script>