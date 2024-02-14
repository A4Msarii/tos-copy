<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();

// Profile image path
$picture_path = BASE_URL.'includes/Pages/';

// Fetching All Users list
$users_detail_fetch = $connect->prepare("SELECT id,file_name AS 'avatar',name,role,email FROM users WHERE role LIKE '%student%'");
$users_detail_fetch->execute();

$users_detail = array();
if ($users_detail_fetch->rowCount() > 0) {
    $users_detail = $users_detail_fetch->fetchAll();
}

// Iterate through user and change the 'file_name' URL
foreach($users_detail as $key=>$user){
    if(file_exists($_SERVER['DOCUMENT_ROOT'].$picture_path.'upload/'.$user['avatar'])){
        $users_detail[$key]['avatar'] = $picture_path.'upload/'.$user['avatar'];
    }
    else{
        $users_detail[$key]['avatar'] = $picture_path.'avatar/avtar.png';
    }
}

// Fetching All the 'roles' detail
$roles_option = "";
$statement_roles_fetch = $connect->prepare("SELECT * FROM roles");
$statement_roles_fetch->execute();

// Creating a key=>value map for role and id
$roles_list = array();
if ($statement_roles_fetch->rowCount() > 0) {
    $result_roles_fetch = $statement_roles_fetch->fetchAll();
    foreach ($result_roles_fetch as $row_roles_fetch) {
        $roles_list[$row_roles_fetch['id']] = $row_roles_fetch['roles']; 
    }
}

// This variable contain Dynamic key and correspoind column map
$users_column = array();
// foreach($roles_list as $key=>$value){
//     $users_column[str_replace(' ','',$value).'.avatar'] = 'avatar';
//     $users_column[str_replace(' ','',$value).'.role'] = 'role';
//     $users_column[str_replace(' ','',$value).'.email'] = 'email';
//     $users_column[str_replace(' ','',$value).'.name'] = 'name';
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Certificate</title>
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/bootstrap-icons/font/bootstrap-icons.css" />
    <!-- CSS Front Template -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/snippets.min.css" />
    <!-- CSS Front Template -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/theme.min.css" data-hs-appearance="default" as="style" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" data-hs-appearance="default" as="style" />
</head>
<body class="container-fluid d-grid vh-100 vw-100" >
<?php
    // If Certificate id not exist return else message
    $template_id = "";
    if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
        $template_id = $_REQUEST['id'];
    } else {
        echo "<div class='row justify-content-center align-items-center'><div class='col-auto border border-primary rounded text-center p-3'>Template Id is required. <a href='../drag_drop.php'>Create Template</a></div></div>";
        exit();
    }

    // Fetching Certificate details with certificate 'id'
    $template_detail_fetch = $connect->prepare("SELECT * FROM certificate_data AS cd WHERE cd.id = $template_id");
    $template_detail_fetch->execute();

    if ($template_detail_fetch->rowCount() > 0) {
        $template_detail = $template_detail_fetch->fetchAll()[0];
    } else {
        echo "<div class='row justify-content-center align-items-center'><div class='col-auto border border-primary rounded text-center p-3'>Template with this Id is not exist. <a href='../drag_drop.php'>Create Template</a></div></div>";
        exit();
    }

    $template_structure = json_decode($template_detail['structure'], true);

    // $assetsImagesDir = "templateAssets/images/$template_id";
    // $assetsImages = array();
    // if (file_exists($assetsImagesDir)) {
    //     $assetsImages = array_slice(scandir($assetsImagesDir), 2);
    // }
    // $template_elements = array();
    // if(isset($template_structure['elements']) AND !empty($template_structure['elements'])){
    //     $template_elements = $template_structure['elements'];
    // }

    // Assign template Pages list from Template->structure->pages
    $template_pages = array();
    if(isset($template_structure['pages']) AND !empty($template_structure['pages'])){
        $template_pages = $template_structure['pages'];
    }
    
    //check role available in certificate
    $user_type=[];
    foreach($template_pages as $page){
        // var_dump($page['elements']);
        foreach($page['elements'] as $value){
            if(isset($value['dynamicElement']) && $value['dynamicElement']==true){
                $user_type[]=$value['user_type'];
            }
        }
    }
    // Filtering the unique Role id only
    $user_type = array_unique($user_type);

    // $template_background = (isset($template_structure['background']) ? $template_structure['background'] : '');
    $templateOrientation = $template_detail['type'];
    $parentHeight = "1300";
    $parentWidth = "800";
    if($templateOrientation=='landscape'){
        $parentHeight = "800";
        $parentWidth = "1300";
    }



    ?>
    <main role="main" class="main mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card border border-secondary rounded mb-2">
                    <div class="card-header">
                        <h2 class="form-label"><?php echo $template_detail['name']; ?> 
                            <a class="btn btn-soft-primary btn-xs ms-3" href="<?php echo BASE_URL; ?>includes/Pages/dynamicTemplate/editTemplate.php?id=<?php echo $template_id; ?>" title="Edit">
                                <i class="bi bi-pen-fill"></i>
                            </a>
                        </h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Orientation : <?php echo $templateOrientation; ?></label>
                            </div>
                            <div class="col text-end">
                                <button class="btn btn-primary rounded" id="generateCertificate">
                                    <div class="spinner-grow spinner-grow-sm me-2" id="generateSpinner" style="display: none;" role="status" aria-label="Loading..">
                                    </div>
                                    <i class="bi bi-printer-fill me-2" id="generateIcon" style="display: inline-block;"></i>
                                    Generate
                                </button>
                                <!-- <button id="exportDoc">Export to Word</button> -->
                            </div>
                            <div class="col-12 my-2"></div>
                            <!-- List the Different It roles other than Student -->
                            <?php

                                // Storing User Detail with the included Dynamic Field in this variable $User_detail_with_role
                                $user_detail_with_role = array();

                                foreach($user_type as $val){
                                    
                                    $fetch_role_values = $connect->prepare("SELECT roles FROM roles WHERE id='$val'");
                                    $fetch_role_values->execute();
                                    $fetch_role_values_name = $fetch_role_values->fetchColumn();

                                    // Setting the bynamic Part header and the value
                                    $avatarKey = str_replace(' ','',$fetch_role_values_name).'.avatar';
                                    $nameKey = str_replace(' ','',$fetch_role_values_name).'.name';
                                    $users_column[$avatarKey] = array(
                                        'key'=>$avatarKey,
                                        'static_value'=>true,
                                        'value'=>''
                                    );
                                    $users_column[$nameKey] = array(
                                        'key'=>$nameKey,
                                        'static_value'=>true,
                                        'value'=>''
                                    );

                                    if( $fetch_role_values_name!="student"){
                                        $select_role_data= "SELECT * FROM users where `role`='$fetch_role_values_name'";
                                        $select_role_data2 = $connect->prepare($select_role_data);
                                        $select_role_data2->execute();
                                        $select_role_datare2 = $select_role_data2->fetchAll();
                            ?>
                                        <div class="col-12 col-lg-6 mb-3">
                                        <div class="form-floating mb-3 border border-secondary rounded">
                                        <select class="form-select" id="<?php echo $fetch_role_values_name; ?>" onChange="setStaticValueForDynamicField(event.target.value,'<?php echo $fetch_role_values_name; ?>')">
                                            <option selected desibled value="">Select One option</option>
                                        <?php 
                                            foreach($select_role_datare2 as $select_role_datarow2)
                                            {
                                        ?>
                                                <option value="<?php echo $select_role_datarow2['id'] ?>"><?php echo $select_role_datarow2['nickname'] ?></option>
                                        <?php
                                                $user_detail_with_role[$select_role_datarow2['id']] = $select_role_datarow2;

                                                // Change the User 'file_name' directory to the correct directory
                                                if(file_exists($_SERVER['DOCUMENT_ROOT'].$picture_path.'upload/'.$user_detail_with_role[$select_role_datarow2['id']]['file_name'])){
                                                    $user_detail_with_role[$select_role_datarow2['id']]['file_name'] = $picture_path.'upload/'.$user_detail_with_role[$select_role_datarow2['id']]['file_name'];
                                                }
                                                else{
                                                    $user_detail_with_role[$select_role_datarow2['id']]['file_name'] = $picture_path.'avatar/avtar.png';
                                                }
                                            }
                                        ?>
                                        </select>
                                        <label for="<?php echo $fetch_role_values_name; ?>" class="form-label"><b><?php echo $fetch_role_values_name; ?></b></label>
                                        </div></div>
                                <?php 
                                    }
                                    else{
                                        $users_column[$avatarKey]['static_value'] = false;
                                        $users_column[$avatarKey]['value'] = 'avatar';
                                        $users_column[$nameKey]['static_value'] = false;
                                        $users_column[$nameKey]['value'] = 'name';
                                    }

                                ?>
                            <?php  
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card border border-secondary rounded">
                    <div class="card-body">
                        <form id="checkedList">
                        <table class="table table-striped" border="0">
                            <thead class="thead-light">
                                <tr>
                                    <th width='3%'></th>
                                    <th class="text-center">S.No</th>
                                    <th class="text-center">Profile</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $index = 0;
                                    foreach($users_detail as $user){
                                        $index += 1;
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" id="user<?php echo $index ?>" name="userList" value="<?php echo $index-1 ?>"></td>
                                            <td class="text-center"><?php echo $index ?></td>
                                            <td class="text-center"><img src="<?php echo $user['avatar'] ?>" width="30px" height="30px" alt="avatar"></td>
                                            <td class="text-center"><?php echo $user['name'] ?></td>
                                            <td class="text-center"><?php echo $user['role'] ?></td>
                                            <td class="text-center"><?php echo $user['email'] ?></td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="<?php echo BASE_URL; ?>assets/js/jQuery/js/jquery-3.7.1.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/html2pdf/html2pdf.bundle.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="<?php echo BASE_URL; ?>assets/js/html2docx/html-to-docx.esm.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/html-docx-js@0.3.1/dist/html-docx.min.js"></script> -->
    <script src="<?php echo BASE_URL; ?>assets/jquery3.6.0/htmlDoc.js"></script>
    <script>
        let studentDetail = JSON.parse('<?php echo json_encode($users_detail) ?>');
        // let templateElement = JSON.parse('<?php //echo json_encode($template_elements); ?>');
        let templatePages = JSON.parse('<?php echo json_encode($template_pages) ?>');
        let templateId = <?php echo empty($template_id) ? "''" : $template_id; ?>;
        // let templateBackground = '<?php //echo empty($template_background) ? "''" : $template_background; ?>';
        let templateOrientation = '<?php echo $templateOrientation ?>';
        const dynamicFieldHeader = JSON.parse('<?php echo json_encode($users_column) ?>');
        const userDetailWithRole = JSON.parse('<?php echo json_encode($user_detail_with_role) ?>')
        let parentHeight = 297;
        let parentWidth = 210;
        if(templateOrientation == 'landscape'){
            parentHeight = 210;
            parentWidth = 297;
        }

        // Assign static value Other that Student for the dynamic Binding by the option selected
        function setStaticValueForDynamicField(userId,role){
            if(!userId || !role){console.log("Role is blank."); return false;}
            role = role.replaceAll(' ','');
            dynamicFieldHeader[`${role}.avatar`].value = userDetailWithRole[userId]['file_name'];
            dynamicFieldHeader[`${role}.name`].value = userDetailWithRole[userId].name;
            console.log("Successfully Updated the Static Role detail");
        }
        
        $(document).ready(()=>{

            
            let template = '';

            // Generate Template to use in pdf from structure
            Object.keys(templatePages).forEach((pageElement)=>{
                template += '<div style="';
                for (const key in templatePages[pageElement].style) {
                    template += `${key}:${templatePages[pageElement].style[key]};`;
                }
                template += ` width: ${parentWidth}mm; height: ${parentHeight}mm;" >`;
                templatePages[pageElement]['elements'].forEach((elem,index)=>{
                    let style = "";
                    for (const key in elem.style) {
                        style += `${key}:${elem.style[key]};`;
                    }
                    if(elem['type']=='text'){
                        template += `<label id="${elem.id}" style="position:absolute;${style}">${elem.value}</label>`;
                    }
                    else if(elem['type']=='image'){
                        template += `<img src="${elem.value}" style="position:absolute;${style}" id="${elem.id}">`;
                    }
                    else if(elem['type']=='line'){
                        template += `<hr id="${elem.id}" style="position:absolute;${style}">`;
                    }
                });
                template += '</div>';
            });
            
            // console.log(template);

            // Store Selected user list
            $("#generateCertificate").click((event)=>{

                // Adding loader UI
                $("#generateCertificate").prop('disabled',true);
                $("#generateIcon").css("display","none");
                $("#generateSpinner").css("display","inline-block");

                let checkedValue = [];
                $('input[name="userList"]:checked').each((index,value)=>{
                    checkedValue.push($(value).val());
                });
                // If not student is selected exit function
                if(checkedValue.length < 1){
                    alert("Please select one student.");

                    // Removing Loader UI
                    $("#generateIcon").css("display","inline-block");
                    $("#generateSpinner").css("display","none");
                    $("#generateCertificate").prop('disabled',false);

                    return false;}

                // Loop through each selection and generate their report
                checkedValue.forEach(async (value,index)=>{
                    let currentTemplate = template;
                    let currentOption = {
                        margin: [0,-3],
                        filename: `certificate${Date.now()}.pdf`,
                        // image: { type: 'jpeg', quality: 0.98 },
                        html2canvas: { scale: 2 },
                        jsPDF: { unit: 'mm', format: 'a4', orientation: `${templateOrientation}` }
                    };
                    currentOption.filename = await `${studentDetail[value]['name'].replaceAll(' ','')}.pdf`;
                    for( const dynField in dynamicFieldHeader){
                        if(dynamicFieldHeader[dynField]['static_value']==true){
                            currentTemplate = await currentTemplate.replaceAll(`[ ${dynField} ]`,dynamicFieldHeader[dynField].value);
                        }
                        else{
                            currentTemplate = await currentTemplate.replaceAll(`[ ${dynField} ]`,studentDetail[value][dynamicFieldHeader[dynField].value]);
                        }
                    }
                    await html2pdf().from(currentTemplate).set(currentOption).save();
                    console.log("Done");

                    // Removing Loader UI
                    $("#generateIcon").css("display","inline-block");
                    $("#generateSpinner").css("display","none");
                    $("#generateCertificate").prop('disabled',false);

                });
            });

            // Export Document to word
            $("#exportDoc").click(()=>{

                let content = htmlDocx.asBlob(template);
                var fileDownload = document.createElement("a");
                // document.body.appendChild(fileDownload);
                fileDownload.href = URL.createObjectURL(content);
                fileDownload.download = 'document.doc';
                fileDownload.click();
                // document.body.removeChild(fileDownload);
            })
        });
        
    </script>
</body>
</html>