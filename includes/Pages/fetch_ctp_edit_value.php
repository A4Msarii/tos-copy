<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['ctid'])) {
    $ctid = $_REQUEST['ctid'];
    $vehcate = "";
    $divOpt = "";
    $query1 = "SELECT * FROM vehicletype";
    $statement1 = $connect->prepare($query1);
    $statement1->execute();
    $result1 = $statement1->fetchAll();
    foreach ($result1 as $r) {
        $vehcate .= '<option value="' . $r['vehid'] . '">' . $r['vehicletype'] . '</option>';
    }

    $divisionQuery = $connect->query("SELECT * FROM division");
    while($divisionData = $divisionQuery->fetch()){
        $divOpt .= '<option value="' . $divisionData['id'] . '">' . $divisionData['divisionName'] . '</option>';
    }

    $query = "SELECT * FROM ctppage where CTPid='$ctid'";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    foreach ($result as $row) {
        $vec = $row['VehicleType'];
        $fetch_std_name1 = $connect->prepare("SELECT vehicletype FROM `vehicletype` WHERE vehid=?");
        $fetch_std_name1->execute([$vec]);
        $std_name1 = $fetch_std_name1->fetchColumn();

        $diviId = $row['divisionType'];

        $fetch_std_name2 = $connect->prepare("SELECT divisionName FROM `division` WHERE id=?");
        $fetch_std_name2->execute([$diviId]);
        $std_name2 = $fetch_std_name2->fetchColumn();

        

        echo '<input class="form-control" type="hidden" name="Cid" value="' . $row['CTPid'] . '" readonly>
                        <label class="form-label text-dark" style="font-weight:bold; margin:5px;">Course Name :</label class="form-label text-dark">
                        <input class="form-control" type="text" name="course" value="' . $row['course'] . '" id="course_2">
                       <label class="form-label text-dark" style="font-weight:bold; margin:5px;">Type :</label class="form-label text-dark">
                        <input class="form-control" type="text" name="type" value="' . $row['Type'] . '" id="Type_2">
                        <label class="form-label text-dark" style="font-weight:bold; margin:5px;">Vehicle/Tool/Equipment Type :</label class="form-label text-dark">
                        <select class="form-control" name="vehtype" id="vehicle_type2">
                            <option value="' . $row['VehicleType'] . '" selected hidden>' . $std_name1 . '</option>
                            ' . $vehcate . '
                        </select>
                        <label class="form-label text-dark" style="font-weight:bold; margin:5px;">Vehicle Name :</label class="form-label text-dark">
                        <input class="form-control" type="text" name="vehicleName" value="' . $row['vehicleName'] . '" id="vehicleName">
                        <label class="form-label text-dark" style="font-weight:bold; margin:5px;">Symbol :</label class="form-label text-dark">
                        <input class="form-control" type="text" name="Symbol" value="' . $row['symbol'] . '" id="symbol_2">
                        <label class="form-label text-dark" style="font-weight:bold; margin:5px;">Sponcors :</label class="form-label text-dark">
                        <input class="form-control" type="text" name="Spon" value="' . $row['Sponcors'] . '" id="Spon_2">
                        <label class="form-label text-dark" style="font-weight:bold; margin:5px;">Location :</label class="form-label text-dark">
                        <input class="form-control" type="text" name="Location" value="' . $row['Location'] . '" id="Location_2">
                        <label class="form-label text-dark" style="font-weight:bold; margin:5px;">Course Aim :</label class="form-label text-dark">
                        <input class="form-control" type="text" name="Courseaim" value="' . $row['CourseAim'] . '" id="Courseaim_2">
                        <label class="form-label text-dark" style="font-weight:bold; margin:5px;">Course Size :</label class="form-label text-dark">
                        <input class="form-control" type="text" name="Classsize" value="' . $row['ClassSize'] . '" id="Classsize_2">
                        <label class="form-label text-dark" style="font-weight:bold; margin:5px;">Course Division :</label class="form-label text-dark">
                        <select class="form-control" name="courseDivision" id="">
                            <option value="' . $diviId . '" selected hidden>' . $std_name2 . '</option>
                            ' . $divOpt . '
                        </select>
                        <label class="form-label text-dark" style="font-weight:bold; margin:5px;">Course Duration :</label class="form-label text-dark">
                        <input class="form-control" type="number" name="courseDuration" value="' . $row['duration'] . '" id="Classsize_2" pattern="[0-9]*">
                        <label class="form-label text-dark" style="font-weight:bold; margin:5px;">Course Description :</label class="form-label text-dark">
                        <input class="form-control" type="text" name="courseDescription" value="' . $row['description'] . '" id="Classsize_2">
                        <br>
                        <input class="btn btn-success" type="submit" name="submit" value="Submit">';
    }
}


if (isset($_REQUEST['ctpId'])) {
    $ctpId = $_REQUEST['ctpId'];

    $goalQuery = $connect->query("SELECT * FROM ctppage WHERE CTPid = '$ctpId'");
    while ($row = $goalQuery->fetch()) {
        $id = $row['CTPid'];
        $goals = $row['goal'];
        $goalsArray = explode(',', $goals);

        // Now $goalsArray contains all the goals associated with the current $id
        // You can perform further operations on $goalsArray as needed
        // For example, you can loop through the array to display the goals

    }

    echo "<input type='hidden' value='$ctpId' name='goalCtpId' />";
    foreach ($goalsArray as $goal) {
        if ($goal != "") {
            echo "<tr>";
            echo "<td style='text-align: center;'>";
            echo "<input type='text' placeholder='Enter Goals' name='editGoals[]' id='' class='form-control form-control-md' value='$goal'";
            echo "</td>";
            echo "</tr>";
        }
    }
}
