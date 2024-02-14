<?php
session_start();
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$userId = $_SESSION['login_id'];
if(isset($_REQUEST['cId'])){
    $uId = $_REQUEST['uId'];
    $cId = $_REQUEST['cId'];


    $pQuery = $connect->query("SELECT * FROM manage_role_course_phase WHERE intructor = '$userId' GROUP BY phase_id");
    // print_r ($pQuery);
    // die();
    while($pData = $pQuery->fetch()){
        $pId = $pData['phase_id'];
        $fPhase = $connect->query("SELECT phasename,color FROM phase WHERE id = '$pId'");
        $pData1 = $fPhase->fetch();
        // echo $pData1;
        echo "<h2 style='color:".$pData1['color'].";text-align:center;margin:5px;background-color:aliceblue;'>";
        echo $pData1['phasename'];
        echo "<br>";
        echo "</h2>";
        $pQuery1 = $connect->query("SELECT * FROM manage_role_course_phase WHERE phase_id = '$pId' GROUP BY courseName");
        while($pQueryData = $pQuery1->fetch()){
            $courseName = $pQueryData['courseName'];
            $fetchCourseSym = $connect->query("SELECT symbol,color FROM ctppage WHERE CTPid = '$courseName'");
            $courseSym = $fetchCourseSym->fetch();
            $courseCode = $connect->query("SELECT * FROM manage_role_course_phase WHERE courseName = '$courseName' GROUP BY courseCode");
            while($courseCodeData = $courseCode->fetch()){
                ?>
                <!-- <ul>
                    <li> -->
                        <p style="margin: 5px; font-weight:bold;font-size: large;"><span class="legend-indicator" style="background-color: <?php echo $pData1['color']; ?>;"></span><span><?php echo $courseSym['symbol']; ?>-0<?php echo $courseCodeData['courseCode']; ?></span></p>
                
            <!-- </li>
            </ul> -->
                <?php
            }
        }
        
    }

} 

?>