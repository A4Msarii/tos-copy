<?php
    include('../../../includes/config.php');
    include(ROOT_PATH . 'includes/connect.php');
    session_start();

    $roles_option = "";
    $statement_roles_fetch = $connect->prepare("SELECT * FROM roles");
    $statement_roles_fetch->execute();

    $roles_list = array();
    if ($statement_roles_fetch->rowCount() > 0) {
        $result_roles_fetch = $statement_roles_fetch->fetchAll();
        foreach ($result_roles_fetch as $row_roles_fetch) {
            $roles_list[$row_roles_fetch['id']] = $row_roles_fetch['roles']; 
        }
    }

    // Fetching Instructor Signature from user table
    $users_esign_fetch = $connect->prepare("SELECT id,name,signature FROM `users` WHERE signature IS NOT NULL");
    $users_esign_fetch->execute();

    $users_esign = array();
    if($users_esign_fetch->rowCount() > 0) {
        foreach($users_esign_fetch->fetchAll() as $row_user_fetch){
            $users_esign[$row_user_fetch['id']] = $row_user_fetch;
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Template</title>
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/bootstrap-icons/font/bootstrap-icons.css" />
    <!-- CSS Front Template -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/snippets.min.css" />
    <!-- JQuery UI -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/js/jQuery/ui/jquery-ui.css">
    <!-- CSS Front Template -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/theme.min.css" data-hs-appearance="default" as="style" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" data-hs-appearance="default" as="style" />

    <style>
        .template-element {
            position: absolute;
            padding: 20px;
            cursor: grab;
        }

        .template-element:hover {
            border: 1px solid #377dff !important;
            z-index: 90;
            .template-element-icon {
                display: inline-block;
            }
        }

        .template-element:active {
            border: 1px solid #377dff !important;

            .template-element-icon {
                display: inline-block;
            }
        }

        .template-element-icon {
            display: none;
            right:0;
        }

        .element-icon:hover {
            /* color: #212529; */
            background-color: #e2e6ea;
            border-color: #dae0e5;
        }

        .frame-select:hover{
            border: .0625rem solid #377dff !important;
        }

        /* Icon Hover Text show CSS (Start) */
        .hover-container {
            display: inline;
        }
        .hover-visible {
            display: inline-flex;
            width: 0%;
            max-width: max-content;
            overflow: hidden;
            transition: width 1s;
            padding-left: 0.5rem !important;
        }
        .hover-container:hover .hover-visible {
            width: 20%;
        }
        /* Icon Hover Text show CSS (End) */

        .static-header {
            position: sticky;
            top: 0;
            z-index: 91;
            background-color: white;
        }

    </style>

</head>

<body class="container-fluid d-grid vh-100 vw-100">
    <?php
    $template_id = "";
    if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
        $template_id = $_REQUEST['id'];
    } else {
        echo "<div class='row justify-content-center align-items-center'><div class='col-auto border border-primary rounded text-center p-3'>Template Id is required. <a href='../drag_drop.php'>Create Template</a></div></div>";
        exit();
    }

    $template_detail_fetch = $connect->prepare("SELECT * FROM certificate_data AS cd WHERE cd.id = $template_id");
    $template_detail_fetch->execute();

    if ($template_detail_fetch->rowCount() > 0) {
        $template_detail = $template_detail_fetch->fetchAll()[0];
    } else {
        echo "<div class='row justify-content-center align-items-center'><div class='col-auto border border-primary rounded text-center p-3'>Template with this Id is not exist. <a href='../drag_drop.php'>Create Template</a></div></div>";
        exit();
    }

    $template_structure = json_decode($template_detail['structure'], true);

    // Fetch all the Assets (Image) With respect to this Template ID.
    $assetsImagesDir = "templateAssets/images/$template_id";
    $assetsImages = array();
    if (file_exists($assetsImagesDir)) {
        $assetsImages = array_slice(scandir($assetsImagesDir), 2);
    }

    // Fetch all the Default Frame (Image) provided by our system
    $defaultFrameDir = "templateAssets/defaultAssets/frame";
    $defaultFrameImages = array();
    if (file_exists($defaultFrameDir)){
        $defaultFrameImages = array_slice(scandir($defaultFrameDir),2);
    }
    // Fetch all imported frame
    $frameDir = "templateAssets/frame/$template_id";
    $frameImages = array();
    if (file_exists($frameDir)){
        $frameImages = array_slice(scandir($frameDir),2);
    }

    // Assign template Pages list from Template->structure->pages
    $template_pages = json_decode('{}');
    if(isset($template_structure['pages']) AND !empty($template_structure['pages'])){
        $template_pages = $template_structure['pages'];
    }

    

    // Finding oriendation and assign Parent container Height and Width.
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
            <div class="col-12 mb-3">
                <div class="card border border-secondary rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-floating mb-3 border border-secondary rounded">
                                    <input type="text" class="form-control" id="templateName" placeholder="Name of the template" value="<?php echo $template_detail['name']; ?>">
                                    <label for="templateName">Template Name</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 d-none" style="display:none;">
                                <div class="form-floating mb-3 border border-secondary rounded">
                                    <select class="form-select" id="orientation" aria-label="Template Orientation" value="<?php echo $template_detail['type'] ?>">
                                        <option <?php echo ($template_detail['type'] == 'landscape' ? 'Selected' : ''); ?> value="landscape">Landscape</option>
                                        <option <?php echo ($template_detail['type'] == 'portrait' ? 'Selected' : ''); ?> value="portrait">Portrait</option>
                                    </select>
                                    <label for="orientation">Orientation</label>
                                </div>
                            </div>
                            <div class="col text-end align-items-center">
                                <button class="btn btn-primary my-auto btn-sm" id="saveTemplate">Save</button>
                                <a class="btn btn-success btn-sm hover-container" href="<?php echo BASE_URL; ?>includes/Pages/dynamicTemplate/generateCertificate.php?id=<?php echo $template_id; ?>" title="Generate"><i class="bi bi-printer-fill"></i><span class="hover-visible">Generate</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card border border-secondary rounded">
                    <div class="card-header border-bottom border-secondary p-2 text-center static-header">
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-xs rounded element-icon" id="textElementButton" title="Text" data-bs-toggle="modal" data-bs-target="#textElementModel">
                                    <i class="bi bi-fonts h3"></i>
                                </button>
                                <button class="btn btn-xs rounded element-icon" id="imageElementButton" title="Image" data-bs-toggle="modal" data-bs-target="#imageElementModel">
                                    <i class="bi bi-image h3"></i>
                                </button>
                                <button class="btn btn-xs rounded element-icon" id="lineElementButton" title="Line" data-bs-toggle="modal" data-bs-target="#lineElementModel">
                                    <i class="bi bi-dash-lg h3"></i>
                                </button>
                                <!-- <button class="btn btn-xs rounded element-icon" title="Table">
                                    <i class="bi bi-table h3"></i>
                                </button> -->
                                <button class="btn btn-xs rounded element-icon" id="dynamicElementButton" title="Dynamic Field" data-bs-toggle="modal" data-bs-target="#dynamicElementModel">
                                    <i class="bi bi-braces-asterisk h3"></i>
                                </button>
                                <button class="btn btn-xs rounded element-icon" id="frameElementButton" title="Frame" data-bs-toggle="modal" data-bs-target="#frameChangeModel">
                                    <i class="bi bi-postage h3"></i>
                                </button>
                                <button class="btn btn-xs rounded element-icon" id="esignElementButton" title="E-Sign" data-bs-toggle="modal" data-bs-target="#esignElementModel">
                                    <i class="bi bi-vector-pen h3"></i>
                                </button>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-xs rounded element-icon" title="Add new page" id="addNewPage">
                                    <i class="bi bi-file-earmark-plus h3"></i>
                                </button>
                                <button class="btn btn-xs rounded element-icon" title="info" data-bs-toggle="modal" data-bs-target="#infoModel">
                                    <i class="bi bi-info-circle h3"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-grid justify-content-center bg-secondary" id="templatePagesContainer">
                        <?php
                        $elementJSBehaviour = "";
                        foreach ($template_pages as $page) {
                            ?>
                            <div class="mb-2"></div>
                            <div class="page" style="<?php
                            foreach ($page['style'] as $pageStyleKey=>$pageStyleValue){
                                echo $pageStyleKey.":".$pageStyleValue.";";
                            }
                            ?>" id="<?php echo $page['id']; ?>" onclick="activateThisPage('<?php echo $page['id']; ?>')" >
                            <i class="bi bi-x-circle-fill text-danger position-absolute justify-content-center alisgn-items-center top-0 mx-1 btn p-1 bg-white" style="right:-30px;display:none;" id="deleteIcon_<?php echo $page['id']; ?>" onclick="deletePageFromTemplate(event,'<?php echo $page['id']; ?>')" title="Delete Page" aria-label="Remove Page"></i>
                            <?php
                            foreach ($page['elements'] as $element) {
                                $top = isset($element['style']['top']) ? $element['style']['top'] : '0%';
                                $left = isset($element['style']['left']) ? $element['style']['left'] : '0%';
                                $height = isset($element['style']['height']) ? $element['style']['height'] : '0%';
                                $width = isset($element['style']['width']) ? $element['style']['width'] : '0%';
                                $styleStr = "";
                                foreach($element['style'] as $key=>$value){
                                    if($key == 'top' OR $key == 'left'){
                                        $styleStr .= $key.":0px;";
                                        continue;
                                    }
                                    $styleStr .= $key.":".$value.";"; 
                                }
                                $elem = "<div id='container-" . $element['id'] . "' class='template-element'  style='top:" . $top . ";left:" . $left . ";'>";
                                if ($element['type'] == 'text') {
                                    $elem .= "<textarea id='" . $element['id'] . "' class='border-0' style='overflow: hidden;".$styleStr."' ".((isset($element['dynamicElement']) AND $element['dynamicElement'] == 'true')?'readonly':'')." >" . $element['value'] . "</textarea>";
                                } else if ($element['type'] == 'image') {
                                    $elem .= "<img id='" . $element['id'] . "' src='" . $element['value'] . "' style='" . $styleStr ."' title='".((isset($element['dynamicElement']) AND $element['dynamicElement'] == 'true')?$element['value']:'image')."'>";
                                } else if($element['type'] == 'line'){
                                    $elem .= "<hr id='". $element['id'] ."' style='". $styleStr ."'>";
                                }

                                $elem .= "<i class='bi bi-pencil-fill text-secondary position-absolute top-0 mx-1 btn p-0 template-element-icon' onclick='editElement(" . $page['id'].",". $element['id'] . ")' style='right:25px;' title='Edit' aria-label='Edit element'></i>
                                <i class='bi bi-x-circle-fill text-danger position-absolute top-0 mx-1 btn p-0 template-element-icon' onclick='removeElementFromStructure(" . $element['id'] . ")' title='Delete' aria-label='Close'></i></div>";
                                echo "$elem";
                                $elementJSBehaviour .= "$('#container-" . $element['id'] . "' ).draggable({
                                            containment: '#". $page['id'] ."',
                                            scroll: false,
                                            drag: updatePositionToElementStructure
                                        });
                                        $('#" . $element['id'] . "').resizable({
                                            containment: '#". $page['id'] ."',
                                            resize: updateSizeToElementStructure
                                        });";
                            }
                            echo "</div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Text Adding Modal -->
        <div class="modal fade" id="textElementModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="textElementModelLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="textElementModelLabel">Add Text Element</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addTextElementForm" class="text-center">
                            <div class="form-group row mb-2">
                                <label for="textValue" class="col-sm-2 col-form-label">Value</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="textValue" placeholder="Value need to show">
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="textFont" class="col-sm-2 col-form-label">Font</label>
                                <div class="col-sm-10">
                                    <select id="textFont" class="form-select">
                                        <optgroup style="font-family:JasmineUPC">
                                            <option value="JasmineUPC">JasmineUPC</option>
                                        </optgroup>
                                        <optgroup style="font-family:Javanese Text">
                                            <option value="Javanese Text">Javanese Text</option>
                                        </optgroup>
                                        <optgroup style="font-family:Arial">
                                            <option value="Arial">Arial</option>
                                        </optgroup>
                                        <optgroup style="font-family:Verdana">
                                            <option value="Verdana">Verdana </option>
                                        </optgroup>
                                        <optgroup style="font-family:Impact">
                                            <option value="Impact">Impact </option>
                                        </optgroup>
                                        <optgroup style="font-family:Comic Sans MS">
                                            <option value="Comic Sans MS">Comic Sans MS</option>
                                        </optgroup>
                                        <optgroup style="font-family:Geneva">
                                            <option value="Geneva">Geneva</option>
                                        </optgroup>
                                        <optgroup style="font-family:Segoe UI">
                                            <option value="Segoe UI">Segoe UI</option>
                                        </optgroup>
                                        <optgroup style="font-family:Optima">
                                            <option value="Optima">Optima</option>
                                        </optgroup>
                                        <optgroup style="font-family:Times New Roman">
                                            <option value="Times New Roman">Times New Roman</option>
                                        </optgroup>
                                        <optgroup style="font-family:Big Caslon">
                                            <option value="Big Caslon">Big Caslon</option>
                                        </optgroup>
                                        <optgroup style="font-family:Bodoni MT">
                                            <option value="Bodoni MT">Bodoni MT</option>
                                        </optgroup>
                                        <optgroup style="font-family:Book Antiqua">
                                            <option value="Book Antiqua">Book Antiqua</option>
                                        </optgroup>
                                        <optgroup style="font-family:Bookman">
                                            <option value="Bookman">Bookman</option>
                                        </optgroup>
                                        <optgroup style="font-family:New Century Schoolbook">
                                            <option value="New Century Schoolbook">New Century Schoolbook</option>
                                        </optgroup>
                                        <optgroup style="font-family:Calisto MT">
                                            <option value="Calisto MT">Calisto MT </option>
                                        </optgroup>
                                        <optgroup style="font-family:Cambria">
                                            <option value="Cambria">Cambria</option>
                                        </optgroup>
                                        <optgroup style="font-family:Didot">
                                            <option value="Didot">Didot</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="textSize" class="col-sm-2 col-form-label">Font Size</label>
                                <div class="col-sm-10 d-grid align-items-center">
                                    <input type="range" class="form-range" id="textSize" placeholder="Text Size" min="1" max="10" value="1">
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="textElementBold" value="bold">
                                    <label class="form-check-label display-6" for="textElementBold" title="Bold"><i class="bi bi-type-bold"></i></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="textElementItalic" value="italic">
                                    <label class="form-check-label display-6" for="textElementItalic" title="Italic"><i class="bi bi-type-italic"></i></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="textElementUnderline" value="underline">
                                    <label class="form-check-label display-6" for="textElementUnderline" title="Underline"><i class="bi bi-type-underline"></i></label>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="textColor" class="col-sm-2 col-form-label">Font Color</label>
                                <div class="col-sm-10">
                                    <input type="color" class="form-control form-control-color" id="textColor" placeholder="Text Color">
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="textBgColor" class="col-sm-2 col-form-label">Highlight Color</label>
                                <div class="col-sm-10">
                                    <input type="color" class="form-control form-control-color" id="textBgColor" placeholder="Text Color" value="#ffffff">
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="textBgOpacity" class="col-sm-2 col-form-label">Background Color Opacity</label>
                                <div class="col-sm-10 d-grid align-items-center">
                                    <input type="range" class="form-range" id="textBgOpacity" placeholder="Text Background Opacity" min="0" max="255" value="0">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary mt-3" data-bs-dismiss="modal" value="Add Text Element">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Image Adding Modal -->
        <div class="modal fade" id="imageElementModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="imageElementModelLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="imageElementModelLabel">Add Image Element</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="uploadImage">
                            <div class="form-group row mb-2">
                                <label for="imageFile" class="col-sm-2 col-form-label">Upload Image</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" id="imageFile" name="imageFile" placeholder="upload image" accept="image/*">
                                </div>
                                <div class="col-sm-2">
                                    <input type="submit" value="Upload" class="btn btn-xs btn-primary">
                                </div>
                            </div>
                        </form>
                        <form id="addImageElementForm" class="text-center">
                            <div class="form-group row mb-2 border border-secondary rounded py-2 px-1">
                                <label for="imageValue" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="imageValue" name="imageValue" placeholder="Image URL">
                                </div>
                                <div class="col-sm-12 pt-2" id="imageContainer">
                                    <?php
                                        foreach ($assetsImages as $imagePath) {
                                            ?>
                                            <div class="d-inline p-1 m-1" onClick="addImageUrlToVal('<?php echo ($assetsImagesDir . "/" . $imagePath) ?>')">
                                                <img src="<?php echo ($assetsImagesDir . "/" . $imagePath) ?>" alt='image' width='50px' height='50px'>
                                            </div>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary mt-3" data-bs-dismiss="modal" value="Add Image Element">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dynamic Value Adding Modal -->
        <div class="modal fade" id="dynamicElementModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="dynamicElementModelLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="dynamicElementModelLabel">Add Dynamic Content Element</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addDynamicElementForm" class="text-center">
                            <div class="form-group row mb-2">
                                <label for="dynamicElementRole" class="col-sm-2 col-form-label">Roles</label>
                                <div class="col-sm-10">
                                    <select id="dynamicElementRole" class="form-select">
                                        <option selected disabled value="">Select the role</option>
                                        <?php 
                                            foreach($roles_list as $key=>$value){
                                        ?>
                                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="dynamicElementField" class="col-sm-2 col-form-label">Fields</label>
                                <div class="col-sm-10">
                                    <select id="dynamicElementField" class="form-select">
                                        <option selected disabled value="">Select Dynamic Field</option>
                                        <option value="name">Name</option>
                                        <option value="avatar">Profile Image</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-2 d-none" style="display: none;">
                                <label for="dynamicValue" class="col-sm-2 col-form-label">Value</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="dynamicValue" placeholder="Value need to show" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-2 d-none" style="display: none;">
                                <label for="dynamicElementType" class="col-sm-2 col-form-label">Type</label>
                                <div class="col-sm-10">
                                    <select id="dynamicElementType" class="form-select">
                                        <option selected disabled value="">Select Dynamic Element Type</option>
                                        <option value="text">Text</option>
                                        <option value="image">Image</option>
                                    </select>
                                </div>
                            </div>
                            <div id="dynamicTextStyleSection" class="border border-secondary rounded p-2" style="display:none;">
                                <div class="form-group row mb-2">
                                    <label for="dynamicTextFont" class="col-sm-2 col-form-label">Font</label>
                                    <div class="col-sm-10">
                                        <select id="dynamicTextFont" class="form-select">
                                            <optgroup style="font-family:JasmineUPC">
                                                <option value="JasmineUPC">JasmineUPC</option>
                                            </optgroup>
                                            <optgroup style="font-family:Javanese Text">
                                                <option value="Javanese Text">Javanese Text</option>
                                            </optgroup>
                                            <optgroup style="font-family:Arial">
                                                <option value="Arial">Arial</option>
                                            </optgroup>
                                            <optgroup style="font-family:Verdana">
                                                <option value="Verdana">Verdana </option>
                                            </optgroup>
                                            <optgroup style="font-family:Impact">
                                                <option value="Impact">Impact </option>
                                            </optgroup>
                                            <optgroup style="font-family:Comic Sans MS">
                                                <option value="Comic Sans MS">Comic Sans MS</option>
                                            </optgroup>
                                            <optgroup style="font-family:Geneva">
                                                <option value="Geneva">Geneva</option>
                                            </optgroup>
                                            <optgroup style="font-family:Segoe UI">
                                                <option value="Segoe UI">Segoe UI</option>
                                            </optgroup>
                                            <optgroup style="font-family:Optima">
                                                <option value="Optima">Optima</option>
                                            </optgroup>
                                            <optgroup style="font-family:Times New Roman">
                                                <option value="Times New Roman">Times New Roman</option>
                                            </optgroup>
                                            <optgroup style="font-family:Big Caslon">
                                                <option value="Big Caslon">Big Caslon</option>
                                            </optgroup>
                                            <optgroup style="font-family:Bodoni MT">
                                                <option value="Bodoni MT">Bodoni MT</option>
                                            </optgroup>
                                            <optgroup style="font-family:Book Antiqua">
                                                <option value="Book Antiqua">Book Antiqua</option>
                                            </optgroup>
                                            <optgroup style="font-family:Bookman">
                                                <option value="Bookman">Bookman</option>
                                            </optgroup>
                                            <optgroup style="font-family:New Century Schoolbook">
                                                <option value="New Century Schoolbook">New Century Schoolbook</option>
                                            </optgroup>
                                            <optgroup style="font-family:Calisto MT">
                                                <option value="Calisto MT">Calisto MT </option>
                                            </optgroup>
                                            <optgroup style="font-family:Cambria">
                                                <option value="Cambria">Cambria</option>
                                            </optgroup>
                                            <optgroup style="font-family:Didot">
                                                <option value="Didot">Didot</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="dynamicTextSize" class="col-sm-2 col-form-label">Font Size</label>
                                    <div class="col-sm-10">
                                        <input type="range" class="form-range" id="dynamicTextSize" placeholder="Text Size" min="1" max="10" value="1">
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="dynamicTextElementBold" value="bold">
                                        <label class="form-check-label display-6" for="dynamicTextElementBold" title="Bold"><i class="bi bi-type-bold"></i></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="dynamicTextElementItalic" value="italic">
                                        <label class="form-check-label display-6" for="dynamicTextElementItalic" title="Italic"><i class="bi bi-type-italic"></i></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="dynamicTextElementUnderline" value="underline">
                                        <label class="form-check-label display-6" for="dynamicTextElementUnderline" title="Underline"><i class="bi bi-type-underline"></i></label>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="dynamicTextColor" class="col-sm-2 col-form-label">Font Color</label>
                                    <div class="col-sm-10">
                                        <input type="color" class="form-control form-control-color" id="dynamicTextColor" placeholder="Text Color">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="dynamicTextBgColor" class="col-sm-2 col-form-label">Highlight Color</label>
                                    <div class="col-sm-10">
                                        <input type="color" class="form-control form-control-color" id="dynamicTextBgColor" placeholder="Text Color" value="#ffffff">
                                    </div>
                                </div>
                            </div>
                            <div id="dynamicImageStyleSection" class="border border-secondary rounded p-2" style="display:none;">
                                <div class="form-group row mb-2">
                                    <label for="dynamicImageRadius" class="col-sm-2 col-form-label">Border Radius</label>
                                    <div class="col-sm-10">
                                        <input type="range" class="form-range" id="dynamicImageRadius" placeholder="Border Radius" min="1" max="50" value="1">
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary mt-3" data-bs-dismiss="modal" value="Add Dynamic Element">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Frame Changing Modal -->
        <div class="modal fade" id="frameChangeModel" data-bs-keyboard="false" tabindex="-1" aria-labelledby="frameChangeModelLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="frameChangeModelLabel">Change Frame</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body py-3">
                        <div class="row">
                            <div class="col-12">
                                <h6>Note : <span class="text-info">Recommended dimension <span class="text-primary h5">3216 x 2300</span> for better quality.</span></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-9 border border-secondary rounded overflow-auto d-flex py-2 px-1" id="frameImageElementContainer">
                                <?php
                                    foreach ($defaultFrameImages as $framePath) {
                                        ?>
                                        <div class="frame-select rounded p-1 m-1" onClick="addFrameUrlToTemplate('<?php echo ($defaultFrameDir . "/" . $framePath) ?>')">
                                            <img src="<?php echo ($defaultFrameDir . "/" . $framePath) ?>" alt='image' width='50px' height='50px'>
                                        </div>
                                        <?php
                                    }
                                ?>
                                <?php
                                    foreach ($frameImages as $framePath) {
                                        ?>
                                        <div class="frame-select rounded p-1 m-1" onClick="addFrameUrlToTemplate('<?php echo ($frameDir . "/" . $framePath) ?>')">
                                            <img src="<?php echo ($frameDir . "/" . $framePath) ?>" alt='image' width='50px' height='50px'>
                                        </div>
                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="col-12 col-sm-3">
                                <div class="form-group row mb-2 p-3">
                                    <input type="file" id="importFrame" name="importFrame" placeholder="upload image" accept="image/*" hidden>
                                    <label class="btn btn-xs btn-secondary" for="importFrame">Import</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- E-Sign Adding Modal -->
        <div class="modal fade" id="esignElementModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="esignElementModelLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="esignElementModelLabel">Add E-sign Element</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row border-bottom border-secondary pb-2 mb-3">
                            <div class="col-12 col-md-4 text-center">
                                <select id="userEsign" class="form-select">
                                    <option selected disabled>Select the user to get E-sign from system</option>
                                    <?php
                                        foreach($users_esign as $esign){
                                            ?>
                                            <option value="<?php echo $esign['id']; ?>"><?php echo $esign['name']; ?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12 col-md-4 text-center">
                                <img src="" id="esignPreview" alt="E-Sign Image" width="100" height="100">
                            </div>
                            <div class="col-12 col-md-4 text-center">
                                <button class="btn btn-info btn-xs" id="addImportedEsign">Add</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="border border-secondary rounded">
                                    <canvas id="esignCanvas" width="480" height="150"></canvas>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-8">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="position-relative">
                                            <input type="color" id="eSignColor" class="position-absolute" style="width:0;height:0;top: 15px;left: 15px;z-index: -1;">
                                            <label class="p-3 border border-primary rounded-circle" for="eSignColor" id="eSignColorLabel" style="background-color:#000000;" ></label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <input type="number" min="1" max="10" step="1" title="Line Width" class="rounded text-center" id="eSignLineWidth" value="1">
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-warning btn-xs rounded" id="clearESign" data-toggle="tooltip" data-placement="top" title="Clear the Sign">Clear</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 text-center">
                                <button class="btn btn-primary btn-xs rounded" id="createImageFromCanvas">Create Image</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Line Adding Modal -->
        <div class="modal fade" id="lineElementModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="lineElementModelLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="lineElementModelLabel">Add Line Element</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row mb-2">
                            <label for="lineSize" class="col-sm-2 col-form-label">Line Size</label>
                            <div class="col-sm-10 d-grid align-items-center">
                                <input type="range" class="form-range" id="lineSize" placeholder="Line Size" min="1" max="25" value="1">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="lineColor" class="col-sm-2 col-form-label">Line Color</label>
                            <div class="col-sm-10">
                                <input type="color" class="form-control form-control-color" id="lineColor" placeholder="Line Color" value="#000000">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h4>Preview</h4>
                                <div class="border border-secondary rounded my-2 p-4">
                                <hr style="color:#000000" id="linePreview">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary mt-3" data-bs-dismiss="modal" id="addLineElement">Add Element</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Info Modal -->
        <div class="modal fade" id="infoModel" data-bs-keyboard="false" tabindex="-1" aria-labelledby="infoModelLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="infoModelLabel">Instruction</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <ul>
                                    <li>Before add the element need to activate page.
                                        <ul>
                                            <li>Click the page that need to activat.</li>
                                            <li>Activated page is highlighted with blue border.</li>
                                        </ul>
                                    </li>
                                    <li>Newly created element will add in the active page.</li>
                                    <li>Use Cross (Delete Page) button to remove that page. </li>
                                </ul>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-secondary mt-3" data-bs-dismiss="modal" id="addLineElement"><i class="bi bi-x-lg me-2"></i>Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <script src="<?php echo BASE_URL; ?>assets/js/jQuery/js/jquery-3.7.1.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/jQuery/ui/jquery-ui.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/html2canvas/html2canvas.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        let templatePages = JSON.parse('<?php echo json_encode($template_pages) ?>');
        let activePageId = ''; 
        var templateId = <?php echo empty($template_id) ? "''" : $template_id; ?>;
        let userESign = JSON.parse('<?php echo json_encode($users_esign) ?>');
        let roles = JSON.parse('<?php echo json_encode($roles_list); ?>');
        let templateOrientation = '<?php echo $templateOrientation; ?>';
        let parentHeight = <?php echo $parentHeight ?>;
        let parentWidth = <?php echo $parentWidth ?>;
        let editingCreatedElement = false;
        let currentlyEditingElement = {};


        /**
         * Utility Function (START)
         */

        // Update size of the element
        function updateSizeToElementStructure(event, ui) {
            elementId = ui['originalElement'][0]['id'];
            indexInreportStructure = templatePages[activePageId]['elements'].findIndex((value) => {
                return value.id == elementId
            });
            templatePages[activePageId]['elements'][indexInreportStructure].style['height'] = ui.size.height+'px';
            templatePages[activePageId]['elements'][indexInreportStructure].style['width'] = ui.size.width+'px';
            // console.log(templatePages[activePageId]['elements'][indexInreportStructure].style);
        }

        // Update Position of the element
        function updatePositionToElementStructure(event, ui) {
            
            if(ui.helper[0].firstChild.tagName == 'HR'){
                elementId = ui.helper[0].firstChild.id;
            }
            else{
                elementId = ui.helper[0].firstChild.firstChild.id;
            }
            indexInreportStructure = templatePages[activePageId]['elements'].findIndex((value) => {
                return value.id == elementId
            });
            templatePages[activePageId]['elements'][indexInreportStructure].style.top = ((ui.position.top/parentHeight)*100)+'%';
            templatePages[activePageId]['elements'][indexInreportStructure].style.left = ((ui.position.left/parentWidth)*100)+'%';
            // console.log(templatePages[activePageId]['elements'][indexInreportStructure].style);

        }

        // Remove the element added
        function removeElementFromStructure(element) {
            elementId = element.id;
            indexInreportStructure = templatePages[activePageId]['elements'].findIndex((value) => {
                return value.id == elementId
            });
            templatePages[activePageId]['elements'].splice(indexInreportStructure, 1);
            $('#container-' + elementId).remove();
        }

        // Generate unique ID section
        const characterString = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

        function generateString(length) {
            let result = 'id';
            const characterStringLength = characterString.length;
            for (let i = 0; i < length; i++) {
                result += characterString.charAt(Math.floor(Math.random() * characterStringLength));
            }
            return result;
        }

        function createNewElement(newElementStructure, element) {
            let elementDom = "<div id='container-" + newElementStructure.id + "' class='template-element' >";
            elementDom += element;
            elementDom += `<i class="bi bi-pencil-fill text-secondary position-absolute top-0 mx-1 btn p-0 template-element-icon" onclick="editElement( ${activePageId},${newElementStructure.id})" style="right:25px;" title="Edit" aria-label="Edit element"></i>`;
            elementDom += "<i class='bi bi-x-circle-fill text-danger position-absolute top-0 mx-1 btn p-0 template-element-icon bg-white' onclick='removeElementFromStructure(" + newElementStructure.id + ")' title='Delete' aria-label='Close'></i></div>";

            $(`#${activePageId}`).append(elementDom);
            $('#container-' + newElementStructure.id).draggable({
                containment: `#${activePageId}`,
                scroll: false,
                drag: updatePositionToElementStructure
            });
            $("#" + newElementStructure.id).resizable({
                containment: `#${activePageId}`,
                resize: updateSizeToElementStructure
            });
            templatePages[activePageId]['elements'].push(newElementStructure);
        }

        // Function to Edit the already existing Element.
        function editCreatedElement(updateDetail){
            // console.log("Edit stage");
            editingElement = templatePages[currentlyEditingElement.pageId].elements[currentlyEditingElement.indexOfElementInPage];
            editingDomElement = $(`#${editingElement.id}`)

            
            // Edit dynamic element
            if(updateDetail.dynamicElement){
                editingElement.value = updateDetail.value;
                editingDomElement.val(updateDetail.value);
                editingElement.user_type = updateDetail.user_type;
                if(updateDetail.type=="text"){
                    editingElement.style.color = updateDetail.style.color;
                    editingElement.style['font-family'] = updateDetail.style['font-family'];
                    editingElement.style['font-size'] = updateDetail.style['font-size'];
                    editingElement.style['background-color'] = updateDetail.style['background-color'];
                    editingElement.style['font-weight'] = updateDetail.style['font-weight'];
                    editingElement.style['font-style'] = updateDetail.style['font-style'];
                    editingElement.style['text-decoration'] = updateDetail.style['text-decoration'];
                    editingDomElement.css({'color':`${updateDetail.style.color}`,'font-family':`${updateDetail.style['font-family']}`,'font-size':`${updateDetail.style['font-size']}`,'background-color':`${updateDetail.style['background-color']}`,'font-weight':`${updateDetail.style['font-weight']??''}`,'font-style':`${updateDetail.style['font-style']??''}`,'text-decoration':`${updateDetail.style['text-decoration']??''}`});

                }
                else if(updateDetail.type=='image'){
                    console.log(updateDetail.style['border-radius']);
                    editingElement.style['border-radius'] = updateDetail.style['border-radius'];
                    editingDomElement.css("border-radius",`${updateDetail.style['border-radius']}`)
                }
            }
            // Edit text element
            else if(updateDetail.type=='text'){
                console.log("Update struct:",updateDetail);
                editingElement.value = updateDetail.value;
                editingDomElement.val(updateDetail.value);
                editingElement.style.color = updateDetail.style.color;
                editingElement.style['font-family'] = updateDetail.style['font-family'];
                editingElement.style['font-size'] = updateDetail.style['font-size'];
                editingElement.style['background-color'] = updateDetail.style['background-color'];
                editingElement.style['font-weight'] = updateDetail.style['font-weight'];
                editingElement.style['font-style'] = updateDetail.style['font-style'];
                editingElement.style['text-decoration'] = updateDetail.style['text-decoration'];
                editingDomElement.css({'color':`${updateDetail.style.color}`,'font-family':`${updateDetail.style['font-family']}`,'font-size':`${updateDetail.style['font-size']}`,'background-color':`${updateDetail.style['background-color']}`,'font-weight':`${updateDetail.style['font-weight']??''}`,'font-style':`${updateDetail.style['font-style']??''}`,'text-decoration':`${updateDetail.style['text-decoration']??''}`});

            }
            // Edit image element
            else if(updateDetail.type=='image'){
                editingElement.value = updateDetail.value;
                editingDomElement.attr('src',updateDetail.value);
            }
            // Edit line element
            else if(updateDetail.type=="line"){
                editingElement.style.color = updateDetail.style.color;
                editingElement.style.height = updateDetail.style.height;
                editingDomElement.css({'color':`${updateDetail.style.color}`,'height':`${updateDetail.style.height}`});
            }

            // Change editing flag
            editingCreatedElement = false;
            // Reset the current editing element detail
            currentlyEditingElement = {};
        }

        // Add image url to image model value
        function addImageUrlToVal(path) {
            $("#imageValue").val(path);
            return true;
        }

        function addFrameUrlToTemplate(path){
            // templateBackground = path;
            // templatePages[activePageId]['background'] = path;
            templatePages[activePageId]['style']['background-image'] = `url(${path})`; 
            $(`#${activePageId}`).css('background-image',`url(${path})`);
            return true;
        }

        // Generate Value fro dynamic element
        function generateDynamicElementValue(){
            let role = $("#dynamicElementRole").val();
            // Columns name
            let field = $("#dynamicElementField").val();
            if(!role){ role="";}
            else{role = roles[role];}
            if(!field){ field="";}
            let value = `[ ${role.replaceAll(' ','')}.${field.replaceAll(' ','')} ]`;
            // If the value is text type
            if(['name'].indexOf(field) !== -1){
                $("#dynamicElementType").val('text');
                $("#dynamicTextStyleSection").css("display","block");
                $("#dynamicImageStyleSection").css("display","none");
            }
            // If the value is image type URL
            else if(['avatar'].indexOf(field) !== -1){
                $("#dynamicElementType").val('image');
                $("#dynamicTextStyleSection").css("display","none");
                $("#dynamicImageStyleSection").css("display","block");

            }
            console.log(value);
            $("#dynamicValue").val(value);
        }

        // Create Canvas For E-sign (Start)
        // Getting element and context
        const eSignCanvas = document.getElementById("esignCanvas");
        const eSignCtx = eSignCanvas.getContext("2d");

        // Initial value
        let isSigning = false;
        let xPosition = 0;
        let yPosition = 0;
        let eSignPenWidth = 1;

        eSignCanvas.addEventListener("mousedown", startSigning);
        eSignCanvas.addEventListener("mousemove", draw);
        eSignCanvas.addEventListener("mouseup", stopSigning);
        eSignCanvas.addEventListener("mouseout", stopSigning);

        // Function to start sign
        function startSigning(event){
            isSigning = true;
            xPosition = event.offsetX;
            yPosition = event.offsetY;
        }

        function draw(event){
            if(isSigning){
                // Get new mouse position
                const newXPosition = event.offsetX;
                const newYPosition = event.offsetY;

                eSignCtx.lineWidth = eSignPenWidth;
                eSignCtx.beginPath();
                eSignCtx.moveTo(xPosition,yPosition);
                eSignCtx.lineTo(newXPosition,newYPosition);
                eSignCtx.stroke();

                // Update current possition
                xPosition = newXPosition;
                yPosition = newYPosition;
            }
        }

        function stopSigning(){
            isSigning = false;
        }

        $("#eSignColor").change((event)=>{
            eSignCtx.strokeStyle = event.target.value;
            $("#eSignColorLabel").css("background-color",event.target.value);
        });
        $("#eSignLineWidth").change((event)=>{
            eSignPenWidth = parseInt(event.target.value);
        });
        $("#clearESign").click((event)=>{
            eSignCtx.clearRect(0, 0, eSignCanvas.width, eSignCanvas.height);
        });

        // Ceate Canvas from E-sign (End)

        // Remove Page function
        function deletePageFromTemplate(event,pageId){
            event.stopPropagation();
            $(`#${pageId}`).remove();
            delete templatePages[pageId];
        }

        // Function to Create A Page
        function createPage(){

            let newPage = {
                id: generateString(7),
                elements:[],
                style: {
                    position: 'relative',
                    'background-color': 'white',
                    'background-repeat': 'round',
                    'background-size': '100% 100%',
                    height: parentHeight+'px',
                    width: parentWidth+'px',
                    'border-radius': '0.5rem',
                },
                pageNumber:1,
                hide:false
                }
                let newPageDom = `<div class="page" style="`;
                for (const key in newPage.style) {
                    newPageDom += `${key}:${newPage.style[key]};`;
                }
                newPageDom += `" id="${newPage.id}" onclick="activateThisPage('${newPage.id}')">
                    <i class="bi bi-x-circle-fill text-danger position-absolute d-grid justify-content-center alisgn-items-center top-0 mx-1 btn p-1 bg-white" style="right:-30px;" id="deleteIcon_${newPage.id}" onclick="deletePageFromTemplate(event,'${newPage.id}')" title="Delete Page" aria-label="Remove Page"></i>
                    </div>`;

            $("#templatePagesContainer").append('<div class="mt-2"></div>' + newPageDom);
            templatePages[newPage.id] = newPage;
            return newPage.id;
        }

        // Function to make the current clicked page is actuve page
        function activateThisPage(pageId){
            if(activePageId == pageId){return true;}
            $(".page").each((index,element)=>{
                if(element.id == pageId){
                    $(`#${pageId}`).css("border","5px solid #377dff");
                    $(`#deleteIcon_${pageId}`).css("display",'grid');
                    activePageId = pageId;
                }
                else{
                    $(`#${element.id}`).css("border",'0');
                    $(`#deleteIcon_${element.id}`).css("display",'none');
                }
            });
        }

        // Edit Element handeling function
        function editElement(page,element){
            elementDetail = templatePages[page.id].elements.filter((elem,indx)=>{
                if(elem.id==element.id){ 
                    currentlyEditingElement.indexOfElementInPage = indx;
                    return true;
                }
            })[0];
            currentlyEditingElement.pageId = page.id;
            currentlyEditingElement.id = element.id;
            editingCreatedElement = true;
            if(elementDetail.dynamicElement){
                $("#dynamicValue").val(elementDetail.value);
                $("#dynamicElementType").val(elementDetail.type);
                if(elementDetail.type == 'text'){
                    $('#dynamicTextColor').val(elementDetail.style.color);
                    $('#dynamicTextFont').val(elementDetail.style['font-family']);
                    $('#dynamicTextSize').val(elementDetail.style['font-size'].slice(0,-2));
                    $('#dynamicTextBgColor').val(elementDetail.style['background-color']);
                    $("#dynamicTextElementBold").prop('checked',(elementDetail.style['font-weight']=='bold'?true:false));
                    $("#dynamicTextElementItalic").prop('checked',(elementDetail.style['font-style']=='italic'?true:false));
                    $("#dynamicTextElementUnderline").prop('checked',(elementDetail.style['text-decoration']=='underline'?true:false));
                    $("#dynamicTextStyleSection").css("display","block");
                    $("#dynamicImageStyleSection").css("display","none");

                }
                else if(elementDetail.type == 'image'){
                    if(elementDetail.style['border-radius']){
                        $("#dynamicImageRadius").val(elementDetail.style['border-radius'].slice(0,-2));
                    }
                    $("#dynamicTextStyleSection").css("display","none");
                    $("#dynamicImageStyleSection").css("display","block");
                }
                
                $("#dynamicElementModel").modal('show');
            }
            else if(elementDetail.type=='text'){
                $("#textValue").val(elementDetail.value);
                $("#textFont").val(elementDetail.style['font-family'])
                $("#textSize").val(elementDetail.style['font-size'].slice(0,-2));
                $("#textElementBold").prop('checked',(elementDetail.style['font-weight']=='bold'?true:false));
                $("#textElementItalic").prop('checked',(elementDetail.style['font-style']=='italic'?true:false));
                $("#textElementUnderline").prop('checked',(elementDetail.style['text-decoration']=='underline'?true:false));
                $("#textColor").val(elementDetail.style.color);
                $("#textBgColor").val(elementDetail.style['background-color'].slice(0,-2));
                $("#textBgOpacity").val(parseInt(elementDetail.style['background-color'].slice(-2),16))

                $("#textElementModel").modal('show');
            }
            else if(elementDetail.type=='image'){
                if(elementDetail.isEsign){
                    $('#esignPreview').attr('src',elementDetail.value);
                    $("#esignElementModel").modal('show');
                }
                else{
                    $('#imageValue').val(elementDetail.value);
                    $("#imageElementModel").modal('show');
                }
            }
            else if(elementDetail.type=='line'){
                $("#lineColor").val(elementDetail.style.color);
                $("#lineSize").val(elementDetail.style.height.slice(0,-2));
                $("#linePreview").css('height',elementDetail.style.height);
                $("#linePreview").css('color',elementDetail.style.color);
                $("#lineElementModel").modal('show');
            }
        }


        /**
         * Utility Function (END)
         */


        // Render of page is completely executed
        $(document).ready(()=>{

            // If New report OR ther is no page in this report add new page.
            if(Object.keys(templatePages).length==0 ){
                activateThisPage(createPage());
            }
            else{
                activateThisPage(Object.keys(templatePages)[0]);
            }

            // Trigger when add new page icon click
            $("#addNewPage").click((event)=>{
                createPage();
            });
        });

        // When one of the element adding icon clicked
        $("#textElementButton, #imageElementButton, #dynamicElementButton, #lineElementButton, #esignElementButton, #frameElementButton").click((event)=>{
            // Set the editingCreatedElement value to 'false';
            editingCreatedElement = false;
            currentlyEditingElement = {}
        });


        // Add Text Element
        $("#addTextElementForm").submit((event) => {
            event.preventDefault();
            const value = $('#textValue').val();
            let bgOpacity = parseInt($("#textBgOpacity").val()).toString(16);
            if(bgOpacity.length == 1){
                bgOpacity = '0'+bgOpacity;
            }
            if (!value) {
                alert("Text Element value is required");
                return False;
            }
            let newElement = {
                id: generateString(7),
                type: "text",
                value: value,
                style: {
                    top: 50,
                    left: 50,
                    overflow: 'hidden',
                    color: $('#textColor').val(),
                    'font-family': $('#textFont').val(),
                    'font-size': $('#textSize').val() + 'em',
                    'background-color': $('#textBgColor').val()+(bgOpacity),
                }
            }
            const bold = $("#textElementBold").is(":checked");
            const italic = $("#textElementItalic").is(":checked");
            const underline = $("#textElementUnderline").is(":checked");
            if (bold) {
                newElement.style['font-weight'] = 'bold';
            }
            if (italic) {
                newElement.style['font-style'] = 'italic'
            }
            if (underline) {
                newElement.style['text-decoration'] = 'underline'
            }

            console.log(newElement);
            if(editingCreatedElement){
                editCreatedElement(newElement);
                return true;
            }
            // form-control-plaintext readonly
            let elementDom = "<textarea class='border-0' style='overflow: hidden;";
            for (const key in newElement.style) {
                elementDom += `${key}:${newElement.style[key]};`;
            }
            elementDom += "' id='" + newElement.id + "'>" + newElement.value + "</textarea>";
            createNewElement(newElement, elementDom);
        });


        // Handle File upload
        $("#uploadImage").submit((event) => {
            event.preventDefault();
            const file = document.getElementById('imageFile').files[0];
            if (!file) {
                alert("Select file.");
                return false;
            }
            let formData = new FormData();
            formData.append("imageFile", document.getElementById('imageFile').files[0]);
            formData.append("templateId", templateId);
            formData.append("method", "uploadFile");
            $.ajax({
                url: "<?php echo BASE_URL; ?>includes/Pages/dynamicTemplate/dynamicTemplateApi.php",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if(response.status == "success"){
                        let elem = `<div class="d-inline p-1 m-1" onClick="addImageUrlToVal('${response.data}')">
                            <img src="${response.data}" alt='image' width='50px' height='50px'>
                            </div>`;
                        $("#imageContainer").append(elem);
                        $("#imageValue").val(response.data);
                    }
                    alert(response.message);
                },
                error: function(error) {
                    // handle error
                    console.log(error);
                    alert("Something went wrong");
                }
            });
        });

        // Handle Frame Import
        $("#importFrame").change((event)=>{
            event.preventDefault();
            const file = document.getElementById('importFrame').files[0];
            if (!file) {
                alert("Select file.");
                return false;
            }
            let formData = new FormData();
            formData.append("imageFile", file);
            formData.append("templateId", templateId);
            formData.append("method", "uploadFrameFile");
            $.ajax({
                url: "<?php echo BASE_URL; ?>includes/Pages/dynamicTemplate/dynamicTemplateApi.php",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    if(response.status == "success"){
                        let elem = `<div class="frame-select rounded p-1 m-1" onClick="addFrameUrlToTemplate('${response.data}')">
                            <img src="${response.data}" alt='image' width='50px' height='50px'>
                            </div>`;
                        $("#frameImageElementContainer").append(elem);
                        return true;
                    }
                    alert(response.message);
                },
                error: function(error) {
                    // handle error
                    console.log(error);
                    alert("Something went wrong");
                }
            });
        });

        // Add Image Element
        $("#addImageElementForm").submit((event) => {
            event.preventDefault();
            const value = $('#imageValue').val();
            if (!value) {
                alert("Image Element value is required");
                return False;
            }
            let newElement = {
                id: generateString(7),
                type: "image",
                value: value,
                style: {
                    top: '0%',
                    left: '0%',
                    height:'150px',
                    width: '150px',
                }
            }

            console.log(newElement);
            if(editingCreatedElement){
                editCreatedElement(newElement);
                return true;
            }

            let elementDom = `<img src="${newElement.value}" style="`;
            for (const key in newElement.style) {
                elementDom += `${key}:${newElement.style[key]};`;
            }
            elementDom += `" id="${newElement.id}">`;
            createNewElement(newElement, elementDom);
        });

        // Add Dynamic Element
        $("#addDynamicElementForm").submit((event) => {
            event.preventDefault();
            const value = $("#dynamicValue").val();
            const type = $("#dynamicElementType").val();
            const id_role = $("#dynamicElementRole").val();
            if (!value || !type) {
                alert("Dynamic Element value and type is required");
                return false;
            }
            let newElement = {
                id: generateString(7),
                value: value,
                dynamicElement:true,
                user_type:id_role,
                style: {
                    top: '0%',
                    left: '0%'
                }
            }
            let elementDom = '';
            if(type == 'text'){
                console.log(type);
                newElement['type'] = 'text';
                newElement['style']['color'] = $('#dynamicTextColor').val();
                newElement['style']['font-family'] = $('#dynamicTextFont').val();
                newElement['style']['font-size'] = $('#dynamicTextSize').val() + 'em';
                newElement['style']['background-color'] = $('#dynamicTextBgColor').val();
                const bold = $("#dynamicTextElementBold").is(":checked");
                const italic = $("#dynamicTextElementItalic").is(":checked");
                const underline = $("#dynamicTextElementUnderline").is(":checked");
                if (bold) {
                    newElement.style['font-weight'] = 'bold';
                }
                if (italic) {
                    newElement.style['font-style'] = 'italic'
                }
                if (underline) {
                    newElement.style['text-decoration'] = 'underline'
                }
                console.log(newElement);
                if(editingCreatedElement){
                    editCreatedElement(newElement);
                    return true;
                }
                // form-control-plaintext readonly
                elementDom = "<textarea class='border-0' style='overflow: hidden;";
                for (const key in newElement.style) {
                    elementDom += `${key}:${newElement.style[key]};`;
                }
                elementDom += "' id='" + newElement.id + "' readonly>" + newElement.value + "</textarea>";
            }
            else if(type == 'image'){
                newElement.style['border-radius'] = $("#dynamicImageRadius").val()+'px';
                console.log(type);
                newElement['type'] = 'image';
                if(editingCreatedElement){
                    editCreatedElement(newElement);
                    return true;
                }
                newElement.style.height = '150px';
                newElement.style.width = '150px';
                elementDom = `<img src="${newElement.value}" style="`;
                for (const key in newElement.style) {
                    elementDom += `${key}:${newElement.style[key]};`;
                }
                elementDom += `" id="${newElement.id}">`;
            }
            
            console.log(newElement,elementDom);
            createNewElement(newElement, elementDom);
        });

        // When role change change Dynamic element value
        $("#dynamicElementRole, #dynamicElementField").change(()=>{
            generateDynamicElementValue();
            return true;
        })
        
        // Show Style section When Dynamic element type is Text
        $("#dynamicElementType").change(()=>{
            let type = $("#dynamicElementType").val();
            if(type == 'text'){
                $("#dynamicTextStyleSection").css("display","block");
                $("#dynamicImageStyleSection").css("display","none");
                return true;
            }
            $("#dynamicTextStyleSection").css("display","none");
            $("#dynamicImageStyleSection").css("display","block");
        });

        // Line property change Preview change
        $("#lineSize, #lineColor").change((event)=>{
            let previewElement = $("#linePreview");
            if(event.currentTarget.id == "lineSize"){
                previewElement.css("height",event.currentTarget.value);
            }
            else if (event.currentTarget.id=="lineColor"){
                previewElement.css("color",event.currentTarget.value);
            }
        });

        // Create Line Element
        $("#addLineElement").click((event)=>{
            let newElement = {
                id: generateString(7),
                type: "line",
                style: {
                    top: 50,
                    left: 50,
                    color: $('#lineColor').val(),
                    height: $('#lineSize').val()+'px',
                    width: '100px'
                }
            }
            console.log(newElement);
            if(editingCreatedElement){
                editCreatedElement(newElement);
                return true;
            }
            let elementDom = "<hr style='";
            for (const key in newElement.style) {
                if(key=='top' || key == 'left'){continue;}
                elementDom += `${key}:${newElement.style[key]};`;
            }
            elementDom += "' id='" + newElement.id + "'>";
            createNewElement(newElement, elementDom);
        });

        // Create Image From E-sign Canvas
        $("#createImageFromCanvas").click(()=>{
            console.log("Clicked");
            const eSignElement = document.getElementById("esignCanvas");
            // console.log(html2pdf().from(eSignElement).set({filename:'E-Sign.pdf'}).toImg().save());
            html2canvas(eSignElement,{
                backgroundColor: null
            })
            .then(canvas => {
                var imgData = canvas.toDataURL("image/png");
                // Create a link element
                var link = document.createElement("a");

                // Set the download attribute and the href attribute
                link.download = `E-Sign_${Date.now()}.png`;
                link.href = imgData;

                // Append the link to the document
                document.body.appendChild(link);

                // Click the link to download the image
                link.click();

                // Remove the link from the document
                document.body.removeChild(link);
            });
        });

        // Include already exist E-Sign from Data base
        $("#userEsign").change((event)=>{
            $("#esignPreview").attr('src',userESign[event.target.value].signature);
        });

        // Add already existing E-sign from our system
        $("#addImportedEsign").click((event)=>{
            const valueId = $("#userEsign").val();
            if(!valueId){
                alert("Please select a E-Sign");
                return false;
            }

            let newElement = {
                id: generateString(7),
                type: "image",
                value: userESign[valueId].signature,
                isEsign:true,
                style: {
                    top: '0%',
                    left: '0%',
                    height:'150px',
                    width: '150px',
                }
            }
            if(editingCreatedElement){
                editCreatedElement(newElement);
                return true;
            }

            let elementDom = `<img src="${newElement.value}" style="`;
            for (const key in newElement.style) {
                elementDom += `${key}:${newElement.style[key]};`;
            }
            elementDom += `" id="${newElement.id}">`;
            createNewElement(newElement, elementDom);
        });

        // When orientation change
        $("#orientation").change((event)=>{
            let currentHeight = 1300;
            let currentWidth = 800;
            if(event.target.value == templateOrientation){return true;}
            if(event.target.value == 'landscape'){
                currentHeight = 800;
                currentWidth = 1300;
            }
            // console.log(event.target.value);
            Object.keys(templatePages).forEach((value)=>{
                templatePages[value].style.height = `${currentHeight}px`;
                templatePages[value].style.width = `${currentWidth}px`;
                $(`#${templatePages[value].id}`).css('height',templatePages[value].style.height);
                $(`#${templatePages[value].id}`).css('width',templatePages[value].style.width);
            });
            templateOrientation = event.target.value;
            parentHeight = currentHeight;
            parentWidth = currentWidth;
        });

        // Save Template and Structure in DataBase
        $("#saveTemplate").click((event) => {
            if (!Object.keys(templatePages).length) {
                alert("Report with minimum 1 Pages is required");
                return false;
            }
            const templateName = $("#templateName").val();
            const templateOrientation = $("#orientation").val();
            console.log(templatePages);
            $.ajax({
                url: "<?php echo BASE_URL; ?>includes/Pages/dynamicTemplate/dynamicTemplateApi.php",
                type: "POST",
                data: {
                    templatePages: JSON.stringify(templatePages),
                    templateName: templateName,
                    templateId: templateId,
                    templateOrientation:templateOrientation,
                    method:'updateTemplate'
                },
                success: function(response) {
                    // console.log(response);
                    alert(response.message);
                },
                error: function(error) {
                    // handle error
                    // console.log(error);
                    alert("Something went wrong");
                }
            });
            
        })
        <?php echo $elementJSBehaviour; ?>
    </script>
</body>

</html>