<style type="text/css">
   .container{
  

  padding: 25px 40px 10px 40px;
 
}
.text{
  text-align: center;
  font-size: 70px;
  font-weight: 600;
  font-family: 'Poppins', sans-serif;
  background: -webkit-linear-gradient(right, #56d8e4, #9f01ea, #56d8e4, #9f01ea);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
 
}
 {
  padding: 30px 0 0 0;
}
  .form-row{
  display: flex;
  margin: 32px 0;
}
 .form-row .input-data{
  width: 100%;
  height: 40px;
  margin: 0 20px;
  position: relative;
}
 .form-row .textarea{
  height: 70px;
}
.input-data input,
.textarea textarea{
  display: block;
  width: 100%;
  height: 100%;
  border: none;
  font-size: 17px;
  border-bottom: 2px solid rgba(0,0,0, 0.12);
}
.input-data input:focus ~ label, .textarea textarea:focus ~ label,
.input-data input:valid ~ label, .textarea textarea:valid ~ label{
  transform: translateY(-20px);
  font-size: 14px;
  color: #3498db;
}
.textarea textarea{
  resize: none;
  padding-top: 10px;
}
.input-data label{
  position: absolute;
  pointer-events: none;
  bottom: 10px;
  font-size: 16px;
  transition: all 0.3s ease;
}
.textarea label{
  width: 100%;
  bottom: 40px;
  background: #fff;
}
.input-data .underline{
  position: relative;
  bottom: 0;
  top: 30px;
  height: 2px;
  width: 100%;
}
.input-data .underline:before{
  position: absolute;
  content: "";
  height: 2px;
  width: 100%;
  background: #3498db;
  transform: scaleX(0);
  transform-origin: center;
  transition: transform 0.3s ease;
}
.input-data input:focus ~ .underline:before,
.input-data input:valid ~ .underline:before,
.textarea textarea:focus ~ .underline:before,
.textarea textarea:valid ~ .underline:before{
  transform: scale(1);
}
.submit-btn .input-data{
  overflow: hidden;
  height: 45px!important;
  width: 25%!important;
}
.submit-btn .input-data .inner{
  height: 100%;
  width: 300%;
  position: absolute;
  left: -100%;
  background: -webkit-linear-gradient(right, #56d8e4, #9f01ea, #56d8e4, #9f01ea);
  transition: all 0.4s;
}
.submit-btn .input-data:hover .inner{
  left: 0;
}
.submit-btn .input-data input{
  background: none;
  border: none;
  color: #fff;
  font-size: 17px;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 1px;
  cursor: pointer;
  position: relative;
  z-index: 2;
}
@media (max-width: 700px) {
   .text{
    font-size: 30px;
  }
   form{
    padding: 10px 0 0 0;
  }
   form .form-row{
    display: block;
  }
  form .form-row .input-data{
    margin: 35px 0!important;
  }
  .input-data{
    width: 40%!important;
  }
}
</style>

<?php
  $get_ins_name = "";
  $get_ins = "SELECT * FROM notifications where `type`='$class_name' AND `data`='$classid' AND user_id='$fetchuser_id' and extra_data='is selected to fill gradsheet of'";

  $vehicleName = $connect->query("SELECT vehicleName FROM ctppage WHERE CTPid = '$std_course1'");
  $vehicleNameData = $vehicleName->fetchColumn();

  if($vehicleNameData == ""){
    $vehicleNameData1 = "-";
  }else{
    $vehicleNameData1 = $vehicleNameData;
  }

  $get_insst = $connect->prepare($get_ins);
  $get_insst->execute();
  if ($get_insst->rowCount() > 0) {
    $re1 = $get_insst->fetchAll();
    foreach ($re1 as $row1) {
      $added_ins = $row1['to_userid'];
      $added_ins_name = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
      $added_ins_name->execute([$added_ins]);
      $get_ins_name = $added_ins_name->fetchColumn();
    }
  }
  ?>

<div class="col-lg-10 mb-3 mb-lg-5">
        <!-- Card -->
         <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

          <!-- Body -->
          <div class="card-body" target="_blank"> 
            <div class="row">

              <div class="col-lg-12">
                
                  <div class="text">
                     <?php echo $get_ins_name ?>
                  </div><br>
                  
                     <div class="form-row">
                        <div class="input-data">
                           <label class="text-danger" style="font-weight: bold;font-size:x-large;"><?php echo $vehicleNameData1; ?> : <span style="color:black; font-weight:bold; font-size:xx-large;"><?php echo $name2 ?></span></label>
                           <div class="underline border"></div>
                           
                        </div>
                        <div class="input-data">
                           <label class="text-danger" style="font-weight: bold;font-size:x-large;">Duration : <span style="color:black; font-weight:bold; font-size:xx-large;"><?php echo $st_duration_hr . " : " . $st_duration_min; ?></span></label>
                           <div class="underline border"></div>
                           
                        </div>
                        <div class="input-data">
                           <label class="text-danger" style="font-weight: bold;font-size:x-large;">Date : <span style="color:black; font-weight:bold; font-size:xx-large;"><?php if (isset($st_date)) {
                                                                                                    echo date('Y-m-d', $st_date);
                                                                                                  } else {
                                                                                                    echo "";
                                                                                                  } ?></span></label>
                           <div class="underline border"></div>
                           
                        </div>
                     </div>
                    
                     
                        
                 
       
              </div>
             
            </div>
          </div>
          <!-- End Body -->
        </div>
        <!-- End Card -->
      </div>