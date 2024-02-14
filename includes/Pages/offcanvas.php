<style type="text/css">
    .nav-tabs .nav-link.active {
        border-bottom-color: #ed4c78; /* Change 'red' to your desired line color */
    }
     .legend {
        display: inline-block;
    background: aliceblue;
    border: 1px solid white;
    padding: 0px;
    margin-bottom: 20px;
    margin-right: 10px;
    margin-top: 12px;
    margin-left: 10px;
    border-radius: 5px;
        }
        
</style>

<?php include ROOT_PATH . 'includes/Pages/calendar.php'; ?>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasActivityStream11" aria-labelledby="offcanvasActivityStream11Label" style="z-index: 11111 !important;">
    <div class="offcanvas-header">

        <ul class="nav nav-tabs nav-justified" id="notificationTab" role="tablist">

            <li class="d-none">
                <a href="<?php echo BASE_URL; ?>includes/Pages/per_check_calender.php"><button title="Add Personal Checklist" style="margin-top: 20px;padding: 5px;padding-top: 0px; padding-bottom: 0px;" class="closeoffcanvas btn btn-outline-success"><i class="bi bi-calendar-check"></i></button></a>


            </li>

            <li class="nav-item">
                <a style="width: max-content;" class="nav-link active" href="#statusonenav" id="statusonenav-tab" data-bs-toggle="tab" data-bs-target="#statusonenav" role="tab" aria-controls="statusonenav" aria-selected="false">ToDo's</a>
            </li>

            <li class="d-none">

                <?php
                if ($role == "super admin" || $role == "instructor") {
                    echo '<button style="margin-top: 20px;padding: 5px;padding-top: 0px;padding-bottom: 0px;" class="closeoffcanvas btn btn-outline-success" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-target="#alert_modal" title="Send Alert"><i class="bi bi-plus-lg"></i></button>';
                }
                ?>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="#alertonenav" id="alertonenav-tab" data-bs-toggle="tab" data-bs-target="#alertonenav" role="tab" aria-controls="alertonenav" aria-selected="true">Alert</a>
            </li>


            <!-- <li>
                    <a href="<?php echo BASE_URL; ?>includes/Pages/personalcheck.php"><button title="Add Personal Checklist" style="margin-top: 20px;padding: 5px;padding-top: 0px; padding-bottom: 0px;" class="closeoffcanvas btn btn-outline-primary"><i class="bi bi-calendar-check"></i></button></a>


                </li> -->

            <!-- <li class="nav-item active">
                    <a style="width: max-content;" class="nav-link" href="#statusonenav" id="statusonenav-tab" data-bs-toggle="tab" data-bs-target="#statusonenav" role="tab" aria-controls="statusonenav" aria-selected="false">My Personal CheckList</a>
                </li> -->

        </ul> 

        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="tab-content">
            <div class="tab-pane fade" id="alertonenav" role="tabpanel" aria-labelledby="alertonenav-tab">

                <?php include ROOT_PATH . 'includes/Pages/alertdiveoffcanvas.php'; ?>
            </div>

            <div class="tab-pane fade show active" id="statusonenav" role="tabpanel" aria-labelledby="statusonenav-tab">
                <div class="row" style="margin-top: -20px;margin-bottom: -20px;">
                    <div class="col-lg-2 d-none">

                       <a href="<?php echo BASE_URL; ?>includes/Pages/per_check_calender.php" title="Checklist Calendar" style="font-size: large;padding: 5px;font-weight: bold;" class="btn btn-soft-primary">
                        <img style="height: 80px;width: 80px;" src="<?php echo BASE_URL;?>assets/svg/menuicon/calendar.png"><br>
                        <span>
                       View Calendar</span></a>
                    </div>
                    <div class="col-lg-10 d-none">
                        <center>
                            
                            <form>
                                <table class="table" id="table-field-perstatus">
                                    <tr>
                                        <td style="text-align: center; display:flex;border: none !important;"><input type="text" placeholder="Enter CheckList" name="" id="" class="form-control perChecklistVal" value="" required /><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span> </td>
                                        <td style="width:20px;border: none !important;"><button type="button" name="add_checklist" id="add_checklist" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                                    </tr>
                                </table>
                            </form>
                        </center>
                        <center>
                            <button style="margin:5px; margin-top:-15px;" class="btn btn-success" type="submit" id="" name="">Submit</button>
                        </center>
                    </div>
                </div><br>
                <!-- <hr> -->
                    
                <!-- </div> -->
                <div id="perCheckData" >

                </div>

            </div>


        </div>

    </div>
</div>


