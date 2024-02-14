<?php
session_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if(isset($_REQUEST['editYearVehicleName'])){
    $yearvId = $_REQUEST['yearvId'];
    $yearplanned_name = $_REQUEST['yearplanned_name'];
    $yearlyDate = $_REQUEST['yearlyDate'];

    $updateQuery = "UPDATE deconflicterdata SET linePerDay = '$yearplanned_name',yearly = '$yearlyDate' WHERE id = '$yearvId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();

    $_SESSION['success'] = "Data Updated Successfully";
    header("Location: {$_SERVER['HTTP_REFERER']}");

}

if (isset($_REQUEST['vehicleId'])) {
    $vehicleId = $_REQUEST['vehicleId'];
    $year = $_REQUEST['year'];
    $depArr = [];
    $fetchDep = $connect->query("SELECT * FROM deconflicterdata WHERE yearly = '$year'");
    while ($fetchDepData = $fetchDep->fetch()) {
        $mainId = $fetchDepData['id'];
        $fetchDepId = $connect->query("SELECT * FROM deconflicterdepartment WHERE mainId = '$mainId'");
        while ($fetchDepIdData = $fetchDepId->fetch()) {
            if (!in_array($fetchDepIdData['departMentId'], $depArr)) {
                $depArr[] = $fetchDepIdData['departMentId'];
            }
        }
    }


    $departMentQ = $connect->query("SELECT * FROM homepage");
    while ($departmentData = $departMentQ->fetch()) {
        $depId = $departmentData['id'];
        if (!in_array($depId, $depArr)) {
?>
            <tr>
                <td><input type="checkbox" name="departmentId[]" id="" value="<?php echo $departmentData['id']; ?>"></td>
                <td><?php echo $departmentData['department_name']; ?></td>
            </tr>
        <?php
        }
    }
}

if (isset($_REQUEST['planedLeave'])) {
    $planedLeave = $_REQUEST['planedLeave'];

    $departMentQ = $connect->query("SELECT * FROM homepage");
    while ($departmentData = $departMentQ->fetch()) {
        $depId = $departmentData['id'];
        $checDepId = $connect->query("SELECT count(*) FROM deconflicterdepartment WHERE departMentId = '$depId' AND mainId = '$planedLeave' AND type = 'planedLeave'");
        $checkDep = $checDepId->fetchColumn();
        if ($checkDep <= 0) {
        ?>
            <tr>
                <td><input type="checkbox" name="departmentId[]" id="" value="<?php echo $departmentData['id']; ?>"></td>
                <td><?php echo $departmentData['department_name']; ?></td>
            </tr>
        <?php
        }
    }
}

if (isset($_REQUEST['unPlanned'])) {
    $unPlanned = $_REQUEST['unPlanned'];

    $departMentQ = $connect->query("SELECT * FROM homepage");
    while ($departmentData = $departMentQ->fetch()) {
        $depId = $departmentData['id'];
        $checDepId = $connect->query("SELECT count(*) FROM deconflicterdepartment WHERE departMentId = '$depId' AND mainId = '$unPlanned' AND type = 'unPlanned'");
        $checkDep = $checDepId->fetchColumn();
        if ($checkDep <= 0) {
        ?>
            <tr>
                <td><input type="checkbox" name="departmentId[]" id="" value="<?php echo $departmentData['id']; ?>"></td>
                <td><?php echo $departmentData['department_name']; ?></td>
            </tr>
        <?php
        }
    }
}

if (isset($_REQUEST['attrition'])) {
    $attrition = $_REQUEST['attrition'];

    $departMentQ = $connect->query("SELECT * FROM homepage");
    while ($departmentData = $departMentQ->fetch()) {
        $depId = $departmentData['id'];
        $checDepId = $connect->query("SELECT count(*) FROM deconflicterdepartment WHERE departMentId = '$depId' AND mainId = '$attrition' AND type = 'attrition'");
        $checkDep = $checDepId->fetchColumn();
        if ($checkDep <= 0) {
        ?>
            <tr>
                <td><input type="checkbox" name="departmentId[]" id="" value="<?php echo $departmentData['id']; ?>"></td>
                <td><?php echo $departmentData['department_name']; ?></td>
            </tr>
<?php
        }
    }
}

if (isset($_REQUEST['addAttrition'])) {
    $attrition = $_REQUEST['attrition1'];
    $departmentId = $_REQUEST['departmentId'];
    $name = 0;
    while ($name < count($departmentId)) {
        $departmentId1 = $departmentId[$name];
        $query1 = "INSERT INTO deconflicterdepartment(departMentId,mainId,type) VALUES ('$departmentId1','$attrition','attrition')";
        $statement1 = $connect->prepare($query1);
        $statement1->execute();
        $name++;
    }
    $_SESSION['success'] = "Department Inserted Successfully";
    header("Location:./deconflicter/attritionpage.php");
}

if (isset($_REQUEST['addDepart'])) {
    $vehicleId = $_REQUEST['vehicleId1'];
    $departmentId = $_REQUEST['departmentId'];
    $name = 0;
    while ($name < count($departmentId)) {
        $departmentId1 = $departmentId[$name];
        $query1 = "INSERT INTO deconflicterdepartment(departMentId,mainId,type) VALUES ('$departmentId1','$vehicleId','linePerDay')";
        $statement1 = $connect->prepare($query1);
        $statement1->execute();
        $name++;
    }
    $_SESSION['success'] = "Department Inserted Successfully";
    header("Location:./deconflicter/vehiclepage.php");
}

if (isset($_REQUEST['addPlanedLeave'])) {
    $planedLeave1 = $_REQUEST['planedLeave1'];
    $departmentId = $_REQUEST['departmentId'];
    $name = 0;
    while ($name < count($departmentId)) {
        $departmentId1 = $departmentId[$name];
        $query1 = "INSERT INTO deconflicterdepartment(departMentId,mainId,type) VALUES ('$departmentId1','$planedLeave1','planedLeave')";
        $statement1 = $connect->prepare($query1);
        $statement1->execute();
        $name++;
    }
    $_SESSION['success'] = "Department Inserted Successfully";
    header("Location:./deconflicter/plannedpage.php");
}

if (isset($_REQUEST['addUnPlanned'])) {
    $unPlanned1 = $_REQUEST['unPlanned1'];
    $departmentId = $_REQUEST['departmentId'];
    $name = 0;
    while ($name < count($departmentId)) {
        $departmentId1 = $departmentId[$name];
        $query1 = "INSERT INTO deconflicterdepartment(departMentId,mainId,type) VALUES ('$departmentId1','$unPlanned1','unPlanned')";
        $statement1 = $connect->prepare($query1);
        $statement1->execute();
        $name++;
    }
    $_SESSION['success'] = "Department Inserted Successfully";
    header("Location:./deconflicter/unplannedpage.php");
}

if (isset($_REQUEST['linePerDay'])) {
    $linePerDay = $_REQUEST['linePerDay'];
    $deleteDep = $_REQUEST['deleteDep'];

    $sql = "DELETE FROM deconflicterdepartment WHERE departMentId = '$deleteDep' AND mainId = '$linePerDay' AND type = 'linePerDay'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['success'] = "Department Removed Successfully";
    header("Location:./deconflicter/vehiclepage.php");
}

if (isset($_REQUEST['editVehicleName'])) {
    $vId = $_REQUEST['vId'];
    $planned_name = $_REQUEST['planned_name'];
    $vstart_name = $_REQUEST['vstart_name'];
    $vend_name = $_REQUEST['vend_name'];

    $updateQuery = "UPDATE deconflicterdata SET startDate = '$vstart_name',endDate = '$vend_name',linePerDay = '$planned_name' WHERE id = '$vId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();

    $_SESSION['success'] = "Edited Successfully";
    header("Location:./deconflicter/vehiclepage.php");
}

if (isset($_REQUEST['vehicleDelete'])) {
    $vehicleDelete = $_REQUEST['vehicleDelete'];

    $sql = "DELETE FROM deconflicterdata WHERE id = '$vehicleDelete'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $sql = "DELETE FROM deconflicterdepartment WHERE mainId = '$vehicleDelete' AND type = 'linePerDay'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['success'] = "Edited Successfully";
    header("Location:./deconflicter/vehiclepage.php");
}


///planed delete and edit

if (isset($_REQUEST['deletePlanedLeaveDep'])) {
    $linePerDay = $_REQUEST['deletePlanedLeaveDep'];
    $deleteDep = $_REQUEST['deleteDep'];

    $sql = "DELETE FROM deconflicterdepartment WHERE departMentId = '$deleteDep' AND mainId = '$linePerDay' AND type = 'planedLeave'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['success'] = "Department Removed Successfully";
    header("Location:./deconflicter/plannedpage.php");
}

if (isset($_REQUEST['editPlanLeave'])) {
    $vId = $_REQUEST['planId'];
    $planned_name = $_REQUEST['planned_name'];
    $vstart_name = $_REQUEST['start_name'];
    $vend_name = $_REQUEST['end_name'];

    $updateQuery = "UPDATE holydays SET startDate = '$vstart_name',endDate = '$vend_name',holyDayName = '$planned_name' WHERE id = '$vId' AND leaveType = 'planned'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();

    $_SESSION['success'] = "Edited Successfully";
    header("Location:./deconflicter/plannedpage.php");
}

if (isset($_REQUEST['planDelete'])) {
    $vehicleDelete = $_REQUEST['planDelete'];

    $sql = "DELETE FROM holydays WHERE id = '$vehicleDelete'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $sql = "DELETE FROM deconflicterdepartment WHERE mainId = '$vehicleDelete' AND type = 'planedLeave'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['success'] = "Edited Successfully";
    header("Location:./deconflicter/plannedpage.php");
}

///end planed delete and edit

///unplaned delete and edit

if (isset($_REQUEST['deleteUnPlanedLeaveDep'])) {
    $linePerDay = $_REQUEST['deleteUnPlanedLeaveDep'];
    $deleteDep = $_REQUEST['deleteDep'];

    $sql = "DELETE FROM deconflicterdepartment WHERE departMentId = '$deleteDep' AND mainId = '$linePerDay' AND type = 'unPlanned'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['success'] = "Department Removed Successfully";
    header("Location:./deconflicter/unplannedpage.php");
}

if (isset($_REQUEST['editUnPlanLeave'])) {
    $vId = $_REQUEST['planId'];
    $planned_name = $_REQUEST['planned_name'];
    $vstart_name = $_REQUEST['start_name'];
    $vend_name = $_REQUEST['end_name'];

    $updateQuery = "UPDATE holydays SET startDate = '$vstart_name',endDate = '$vend_name',holyDayName = '$planned_name' WHERE id = '$vId' AND leaveType = 'unPlanned'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();

    $_SESSION['success'] = "Edited Successfully";
    header("Location:./deconflicter/unplannedpage.php");
}

if (isset($_REQUEST['unPlanDelete'])) {
    $vehicleDelete = $_REQUEST['unPlanDelete'];

    $sql = "DELETE FROM holydays WHERE id = '$vehicleDelete'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $sql = "DELETE FROM deconflicterdepartment WHERE mainId = '$vehicleDelete' AND type = 'unPlanned'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['success'] = "Edited Successfully";
    header("Location:./deconflicter/unplannedpage.php");
}

///end unplaned delete and edit

///attr delete and edit

if (isset($_REQUEST['deleteAttr'])) {
    $linePerDay = $_REQUEST['deleteAttr'];
    $deleteDep = $_REQUEST['deleteDep'];

    $sql = "DELETE FROM deconflicterdepartment WHERE departMentId = '$deleteDep' AND mainId = '$linePerDay' AND type = 'attrition'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['success'] = "Department Removed Successfully";
    header("Location:./deconflicter/attritionpage.php");
}

if (isset($_REQUEST['editAttr'])) {
    $vId = $_REQUEST['planId'];
    $planned_name = $_REQUEST['planned_name'];
    $attrDate = $_REQUEST['attrDate'];

    $updateQuery = "UPDATE attrition SET attritionPercent = '$planned_name',date = '$attrDate' WHERE id = '$vId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();

    $_SESSION['success'] = "Edited Successfully";
    header("Location:./deconflicter/attritionpage.php");
}

if (isset($_REQUEST['attrDelete'])) {
    $vehicleDelete = $_REQUEST['attrDelete'];

    $sql = "DELETE FROM attrition WHERE id = '$vehicleDelete'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $sql = "DELETE FROM deconflicterdepartment WHERE mainId = '$vehicleDelete' AND type = 'attrition'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['success'] = "Edited Successfully";
    header("Location:./deconflicter/attritionpage.php");
}

///end attr delete and edit

?>