<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>



<div style="background-color: rgb(235 12 235 / 23%);" id="navbarCtpMenu<?php echo $userbriefId;
                                                                                                                                        echo $result['user_id']; ?>" class="nav-collapse collapse fileDrop" data-bs-parent="#navbarUsersMenuDiv" hs-parent-area="#navbarVerticalMenuPagesEcommerceMenu">
                                                                <?php
                                                                $briefPageQuery = $connect->query("SELECT * FROM editor_data WHERE briefId = '$userbriefId'");
                                                                while ($briefData = $briefPageQuery->fetch()) {
                                                                    $breifId = $briefData['id'];
                                                                ?>
                                                                    <a id="userPage<?php echo $breifId; ?>" class="nav-link" style="color: white;border-left:2px solid <?php echo $briefData['color']; ?>;border-radius: 0px;" href="<?php echo BASE_URL ?>Library/pageData.php?bId=<?php echo $breifId; ?>&userBrief_ID=<?php echo $userbriefId; ?>">
                                                                        <?php
                                                                        $perColor1 = array();
                                                                        $perC = 0;
                                                                        $perColorQ = $connect->query("SELECT * FROM pagepermissions WHERE pageId = '$breifId'");
                                                                        while ($perColor = $perColorQ->fetch()) {

                                                                            if (!in_array($perColor['color'], $perColor1)) {
                                                                        ?>
                                                                                <div style="border-left: 3px solid <?php echo $perColor['color']; ?>;margin-right: 5px;"></div>
                                                                        <?php
                                                                            }
                                                                            $perColor1[$perC] = $perColor['color'];
                                                                            $perC++;
                                                                        } ?>
                                                                        <span><?php echo $briefData['pageName']; ?></span>
                                                                        <div style="position:absolute;display:inherit;right:55px;">
                                                                            <?php
                                                                            $fetchFavColor = $connect->query("SELECT * FROM favouritepages WHERE pageId = '$breifId'");
                                                                            while ($favColorData = $fetchFavColor->fetch()) {
                                                                                $circlecolor = $favColorData['favouriteColors'];
                                                                            ?>
                                                                                <span style="color:white; margin: 5px; width: 19px;
                                                        height: 20px;
                                                        -webkit-border-radius: 25px;
                                                        -moz-border-radius: 25px;
                                                        border-radius: 25px;
                                                        position:absolute;
                                                        top:-5px;
                                                        background: <?php echo $circlecolor; ?>" class="circle_color"></span>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </div>

                                                                    </a>
                                                                <?php
                                                                }
                                                                ?>
                                                                <!-- <span style="color:white;cursor:pointer;" data-bs-toggle="modal" data-bs-target="#addfiles" onclick="document.getElementById('userfi_id').value='<?php echo $userbriefId; ?>'"></><u>Add New File</u></span><br>
                                                                <a href="<?php echo BASE_URL ?>Library/newPage.php?briefid=<?php echo $userbriefId; ?>" style="color:white"><u>Add New Page</u></a><br> -->
                                                                <?php
                                                                $fetchBrief = $connect->query("SELECT * FROM user_files WHERE briefId = '$userbriefId'");
                                                                while ($brefData = $fetchBrief->fetch()) {
                                                                    $fileID = $brefData['id'];
                                                                    $fileName = $brefData['filename'];
                                                                    $fileLastName = $brefData['lastName'];
                                                                ?>

                                                                    <?php
                                                                    if ($fileLastName == null) {
                                                                    ?>
                                                                        <span id="userLink<?php echo $fileID; ?>" style="display:flex; align-items:center;" class="nav-link">
                                                                        <?php
                                                                $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID'");
                                                                while ($filePerData = $filePer->fetch()) {
                                                                ?>
                                                                    <div style="display: inline-block;height:25px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-right:10px; margin-left: -12px;"></div>
                                                                <?php
                                                                }
                                                                ?>
                                                                            <div style="flex-grow: 1;">
                                                                                <?php
                                                                                $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID'");
                                                                                while ($favColorData = $fetchFavColor->fetch()) {
                                                                                    $circlecolor = $favColorData['favouriteColors'];
                                                                                ?>
                                                                                    <span style="color:white; width: 19px;
                                                        height: 20px;
                                                        -webkit-border-radius: 25px;
                                                        -moz-border-radius: 25px;
                                                        border-radius: 25px;
                                                        position:relative;
                                                        top:4px;
                                                        display:inline-block;
                                                        background: <?php echo $circlecolor; ?>" class="userfiles"></span>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                            <a class="archana circle" href="<?php echo BASE_URL; ?>Library/openpdfpage.php?pdfPageName=<?php echo $brefData['filename']; ?>&fileID=<?php echo $fileID; ?>" style="color: white;" data-bs-placement="bottom" title="<?php echo $fileName; ?>">

                                                                                <span style="margin-left: -160px;"><?php echo substr($brefData['filename'], 0, 5); ?></span>
                                                                            </a>
                                                                            <button class="btn btn-sm btn-soft-primary"><a target="_blank" href="<?php echo BASE_URL; ?>includes/pages/files/<?php echo $brefData['filename']; ?>"><i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i></a></button>
                                                                        </span>
                                                                    <?php
                                                                    } else if ($brefData['type'] == "offline") {
                                                                    ?>
                                                                        <span id="userLink<?php echo $fileID; ?>" class="get_url_val1 nav-link test" style="display:flex; align-items:center;">
                                                                            <?php
                                                                            $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID'");
                                                                            while ($filePerData = $filePer->fetch()) {
                                                                            ?>
                                                                                <div style="display: inline-block;height:40px;width:3px;background-color:<?php echo $filePerData['color']; ?>;margin-left:-12px; margin-right: 10px;"></div>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <div style="flex-grow: 1;position:relative;">
                                                                                <?php
                                                                                $margin = 31;
                                                                                $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID'");
                                                                                while ($favColorData = $fetchFavColor->fetch()) {
                                                                                    $circlecolor = $favColorData['favouriteColors'];
                                                                                    $margin = 0;
                                                                                ?>
                                                                                    <span style="color:white; margin: 5px; width: 19px;
                                                        height: 20px;
                                                        -webkit-border-radius: 25px;
                                                        -moz-border-radius: 25px;
                                                        border-radius: 25px;
                                                        position:relative;
                                                        top:10px;
                                                        display:inline-block;
                                                        background: <?php echo $circlecolor; ?>" class="userOffLineLink"></span>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                                <a href="<?php echo BASE_URL; ?>Library/userUrlPage.php?linkId=<?php echo $brefData['id'] ?>&fileName=<?php echo $fileName ?>" style="color: white;margin-left: <?php echo $margin; ?>px;">
                                                                                    <span style="position:relative;left:-35px;"><?php echo $fileLastName; ?></span>
                                                                                </a>
                                                                            </div>

                                                                            <a style="display:none; color: white;" href="<?php echo $fileName; ?>" class="url_value<?php echo $brefData['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                            
                                                                                <!-- <i class="bi bi-files" style="color:white; font-size:18px; margin-right: 5px;" title="copy link" id="<?php echo $brefData['id'] ?>"></i> -->
                                                                                <button style="margin-left:100px;" class="btn btn-soft-primary btn-sm" title="copy link" id="<?php echo $brefData['id'] ?>">
                                                                    <i class="bi bi-files" style="color:white;"></i></button>
                                                                            <!-- </div> -->
                                                                        </span>

                                                                    <?php
                                                                    } elseif ($brefData['type'] == "online") {
                                                                    ?>
                                                                        <span id="userLink<?php echo $fileID; ?>" class="get_url_val nav-link" style="display:flex; align-items:center;">
                                                                            <?php
                                                                            $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID'");
                                                                            while ($filePerData = $filePer->fetch()) {
                                                                            ?>
                                                                                <div style="display: inline-block;height:40px;width:3px;background-color:<?php echo $filePerData['color']; ?>;margin-left: -12px;margin-right: 10px;"></div>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <div style="flex-grow: 1;">
                                                                                <?php
                                                                                $margin = 31;
                                                                                $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID'");
                                                                                while ($favColorData = $fetchFavColor->fetch()) {
                                                                                    $circlecolor = $favColorData['favouriteColors'];
                                                                                    $margin = 0;
                                                                                ?>
                                                                                    <span style="color:white; margin: 5px; width: 19px;
                                                        height: 20px;
                                                        -webkit-border-radius: 25px;
                                                        -moz-border-radius: 25px;
                                                        border-radius: 25px;
                                                        position:relative;
                                                        top:10px;
                                                        display:inline-block;
                                                        background: <?php echo $circlecolor; ?>" class="usersOnlineLink"></span>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                                <a style="color:white;margin-left: <?php echo $margin; ?>px;" href="<?php echo BASE_URL; ?>Library/userUrlPage.php?linkId=<?php echo $brefData['id'] ?>&fileName=<?php echo $fileName ?>">
                                                                                    <span style="position:relative;margin-left:-35px;"><?php echo $brefData['type']; ?></span>
                                                                                </a>
                                                                            </div>

                                                                            <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $brefData['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                            
                                                                                <!-- <i id="<?php echo $brefData['id'] ?>" class="bi bi-files" style="color:white; font-size:18px; margin-right:5px;"></i> -->
                                                                                <button style="margin-left:100px;" class="btn btn-soft-primary btn-sm" title="copy link" id="<?php echo $brefData['id'] ?>">
                                                                    <i class="bi bi-files" style="color:white;"></i></button>


                                                                        </span>

                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </div>


</body>
</html>