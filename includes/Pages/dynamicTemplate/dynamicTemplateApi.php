<?php
    include('../../../includes/config.php');
    include(ROOT_PATH . 'includes/connect.php');
    session_start();
    header ('Content-Type: application/json');
    if(isset($_SERVER["REQUEST_METHOD"]) AND $_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_REQUEST['method']) AND $_REQUEST['method']=='uploadFile'){
            $assetDir = "templateAssets/images/";
            if(isset($_FILES["imageFile"]) AND isset($_REQUEST['templateId'])){
                $file = $_FILES["imageFile"];
                $template_id = $_REQUEST['templateId'];
                $assetDir .= $template_id.'/';
                $fileName = basename($file['name']);
                if(!file_exists($assetDir)){
                    mkdir($assetDir,0777,true);
                }
                if(move_uploaded_file($file["tmp_name"], $assetDir.$fileName)){
                    echo json_encode(['status'=>"success",'message'=>"Successfully uploaded File.",'data'=>$assetDir.$fileName]);
                    exit();
                }
                echo json_encode(['status'=>"failed",'message'=>"Failed to upload file!"]);
                exit();
            }
            
            echo json_encode(['status'=>"failed",'message'=>"File and template Id is required"]);
            exit();

        }
        else if(isset($_REQUEST['method']) AND $_REQUEST['method']=='uploadFrameFile'){
            $assetDir = "templateAssets/frame/";
            if(isset($_FILES["imageFile"]) AND isset($_REQUEST['templateId'])){
                $file = $_FILES["imageFile"];
                $template_id = $_REQUEST['templateId'];
                $assetDir .= $template_id.'/';
                $fileName = basename($file['name']);
                if(!file_exists($assetDir)){
                    mkdir($assetDir,0777,true);
                }
                if(move_uploaded_file($file["tmp_name"], $assetDir.$fileName)){
                    echo json_encode(['status'=>"success",'message'=>"Successfully uploaded Frame File.",'data'=>$assetDir.$fileName]);
                    exit();
                }
                echo json_encode(['status'=>"failed",'message'=>"Failed to upload file!"]);
                exit();
            }
            
            echo json_encode(['status'=>"failed",'message'=>"File and template Id is required"]);
            exit();
        }
        else if(isset($_REQUEST['method']) AND $_REQUEST['method']=='updateTemplate'){
            if(empty($_REQUEST['templateId']) OR empty($_REQUEST['templatePages'])){
                echo json_encode(['status'=>'failed','message'=>'Template Id or template pages detail is missing']);
                exit();
            }
            $originalStructure = $connect->prepare("SELECT structure FROM `certificate_data` WHERE id=".$_REQUEST['templateId']);
            $originalStructure->execute();
            if($originalStructure->rowCount() > 0){
                $originalStructure = json_decode($originalStructure->fetchAll()[0]['structure'],true);
            }
            else{
                echo json_encode(['status'=>'failed','message'=>'Template with this Id is missing']);
                exit();
            }
            $query = "UPDATE `certificate_data` SET ";
            if(isset($_REQUEST['templateName']) AND !empty($_REQUEST['templateName'])){
                $query .= "name = '".$_REQUEST['templateName']."', ";
                $originalStructure['name'] = $_REQUEST['templateName'];
            }
            if(isset($_REQUEST['templateOrientation']) AND !empty($_REQUEST['templateOrientation'])){
                $query .= "type = '".$_REQUEST['templateOrientation']."', ";
                $originalStructure['orientation'] = $_REQUEST['templateOrientation'];
            }
            // if(isset($_REQUEST['templateBackground']) AND !empty($_REQUEST['templateBackground'])){
            //     $originalStructure['background'] = $_REQUEST['templateBackground'];
            // }
            $originalStructure['pages'] = json_decode($_REQUEST['templatePages'],true);
            $query .= "structure = '".json_encode($originalStructure)."' WHERE id=".$_REQUEST['templateId'];
            $template_detail_fetch = $connect->prepare($query);
            if($template_detail_fetch->execute()){
                echo json_encode(['status'=>'success','message'=>"Successfully Saved the Template"]);
                exit();
            }
            echo json_encode(['status'=>'failed','message'=>"Something went wrong"]);
            exit();
        }
        echo json_encode(['status'=>"failed",'message'=>"Requested method does not exist."]);
        exit();
    }
    echo json_encode(['status'=>'failed','message'=>'Invalid Request']);
    exit();
?>