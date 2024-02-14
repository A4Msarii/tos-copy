<?php
$back = "";
$role_color = "";
$select_roles = $connect->prepare("SELECT color FROM `roles` WHERE roles=?");
$select_roles->execute([$role]);
$role_color = $select_roles->fetchColumn();
if ($role_color != "" && $role != "super admin" && $role != "instructor" && $role != "student") {
    $back = "background-color:" . $role_color . ";color:white";
} else if ($role == "super admin") {
    $back = "background-color:#c32e2e;color:white;";
} else if ($role == "instructor") {
    $back = "background-color:#c3b02e;color:white";
} else if ($role == "student") {
    $back = "background-color:green;color:white";
} else {
    $back = "background-color:#434044;color:white";
}

$q211 = "SELECT * FROM roles";
$st211 = $connect->prepare($q211);
$st211->execute();
$re211 = $st211->fetchAll();
foreach ($re211 as $row211) {
   $row211['id'];
   $roled=unserialize($row211['permission']);
  if(isset($roled['phasemanager']) || isset($roled['coursemanager'])){
if($roled['phasemanager']==1 || $roled['coursemanager']==1){
    $sql = "SELECT count(*) FROM `newcourse` WHERE CourseManager = '$user_id'";

    $result = $connect->prepare($sql);
    $result->execute();
    $number_of_rows = $result->fetchColumn();
    if ($number_of_rows > 0) {
        $_SESSION['course_MANAGER'] = "courseManager";
    }
    $sql1 = "SELECT count(*) FROM `manage_role_course_phase` WHERE intructor = '$user_id'";
    $result1 = $connect->prepare($sql1);
    $result1->execute();
    $number_of_rows1 = $result1->fetchColumn();
    if ($number_of_rows1 > 0) {
        $_SESSION['phase_MANAGER'] = "phaseManager";
    }
}}}
    if (isset($_SESSION['phase_MANAGER'])) {
?>
        <h6 style="background-color:#020080;color:white;" id="phase_mana"><?php echo "Phase Manager" ?></h6>
        <div class="dropdown dropdown1" name="0" data-custom="NULL" onmouseover="showDropdown(this)" onmouseout="hideDropdown(this)" style="display:none;">

            <<!-- h6 style="background-color:#020080;color:white;" type="button" class="" id="phase_mana" data-bs-toggle="dropdown"><?php
                                                                                                                                echo "Phase Manager" ?></h6> -->

            <div class="dropdown-menu dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="phase_mana" style="width:auto;z-index:1;position: absolute; bottom: 25px;">
                <!-- Header -->

                <div class="card-body" id="phaseContainer" style="padding:0px !important">



                </div>
            </div>
        </div>
    <?php } ?>
    <?php if (isset($_SESSION['course_MANAGER'])) { ?>
        <h6 style="background-color:#5c0080;color:white;" id="co_mana"><?php
                                                                        echo "Course Manager" ?></h6>
<?php }
?>
<h6 style="<?php echo $back ?>;"><?php
                                    echo $role; ?></h6>