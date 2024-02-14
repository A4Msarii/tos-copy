<div class="offcanvas offcanvas-end offcanvas-status" tabindex="-1" id="offcanvasActivityStream11" aria-labelledby="offcanvasActivityStream11Label">
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

            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="statusonenav" role="tabpanel" aria-labelledby="statusonenav-tab">
                    <div class="row" style="margin-top: -20px;margin-bottom: -20px;">
                        <div class="col-lg-2">

                           <a href="<?php echo BASE_URL; ?>includes/Pages/per_check_calender.php" title="Checklist Calendar" style="font-size: large;padding: 5px;font-weight: bold;" class="btn btn-soft-primary">
                            <img style="height: 80px;width: 80px;" src="<?php echo BASE_URL;?>assets/svg/menuicon/calendar.png"><br>
                            <span>
                           View Calendar</span></a>
                        </div>
                        <div class="col-lg-10">
                            <center>
                                
                                <form>
                                    <table class="table" id="table-field-perstatus">
                                        <tr>
                                            <td style="text-align: center; display:flex;"><input type="text" placeholder="Enter CheckList" name="" id="" class="form-control perChecklistVal" value="" required /><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span> </td>
                                            <td style="width:20px;"><button type="button" name="add_checklist" id="add_checklist" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                                        </tr>
                                    </table>
                                </form>
                            </center>
                            <center>
                                <button style="margin:5px; margin-top:-15px;" class="btn btn-success" type="submit" id="saveCheckListValue" name="">Submit</button>
                            </center>
                        </div>
                   </div>

                   <hr>
                    <div class="d-flex">
                        <input type="text" class="form-control" id="searchInputmainchecklist" placeholder="Search For Checklist.." aria-label="Search for messages or users..." style="background: #6d747b21;width: auto;height: 30px;border-radius: 5px !important;">
                         
                         <ul class="list-inline" style="margin-bottom: 0px;position: absolute;right: 40px;z-index: 999;">
                            <!-- <span style="font-size:large; text-decoration:underline;">Priority : </span> -->
                          <li class="list-inline-item d-inline-flex align-items-center">
                            <span class="bg-success m-1" style="width: 20px; height:20px;box-shadow: 0px 1px 3px 0px #677788;margin-left: 5px;border-radius: 3px;"></span><span style="font-size:large;">Low</span>
                          </li>
                          <li class="list-inline-item d-inline-flex align-items-center">
                            <span class="bg-primary m-1" style="width: 20px; height:20px;box-shadow: 0px 1px 3px 0px #677788;margin-left: 5px;border-radius: 3px;"></span><span style="font-size:large;">Medium</span>
                          </li>
                          <li class="list-inline-item d-inline-flex align-items-center">
                            <span class="bg-danger m-1" style="width: 20px; height:20px;box-shadow: 0px 1px 3px 0px #677788;margin-left: 5px;border-radius: 3px;"></span><span style="font-size:large;">High</span>
                          </li>
                        </ul>              
                    </div>
                <!-- </div> -->
                <div id="perCheckData">

                </div>
                </div>
                <div class="tab-pane fade" id="alertonenav" role="tabpanel" aria-labelledby="alertonenav-tab">

                   Alert
                   <?php 
                   include ROOT_PATH . 'includes/Pages/alertdiveoffcanvas.php'; 
                   ?>
                </div>        
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            fetchCheckData();
        });

        function fetchCheckData() {
            const user_ID = <?php echo $user_id ?>;
            $.ajax({
                type: 'POST',
                url: '<?php echo BASE_URL; ?>includes/Pages/perCheckData.php', // Replace with the path to your PHP script
                data: {
                    user_ID: user_ID
                }, // Send the input values as data
                success: function(response) {
                    $("#perCheckData").empty();
                    $("#perCheckData").html(response);
                }
            });
        }
    </script>

     <script type="text/javascript">
        $(document).ready(function() {


            var html = '<tr>\
                          <td style="text-align: center; display:flex;"><input type="text" placeholder="Enter checklist" name="" id="" class="form-control perChecklistVal" value="" required/><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span> </td>\
                          <td><button type="button" name="remove_actual" id="remove_checklist" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                      </tr>'
            var max = 100;
            var a = 1;

            $("#add_checklist").click(function() {
                if (a <= max) {
                    $("#table-field-perstatus").append(html);
                    a++;
                }
            });
            $("#table-field-perstatus").on('click', '#remove_checklist', function() {
                $(this).closest('tr').remove();
                a--;
            });
        });
    </script>