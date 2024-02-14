<br>

<form action="<?php echo BASE_URL; ?>includes/Pages/insert_alert.php" method="post" enctype="multipart/form-data">
  <label class="form-label text-dark">Select Alert Category</label>
  <select class="form-control" name="selectalerttype" id="selecttypealert">
    <option>Alert Options</option>
    <option value="General Announcement/Note To All">General Announcement/Note to All</option>
    <option value="Warning">Warning</option>
    <option value="Caution">Caution</option>
    <option value="Alert">Alert</option> 
    <option value="Remarks">Remark</option>
    <option value="Reminder">Reminder</option>
    <option value="Urgent Notice">Urgent Notice</option>
    <option value="Updates">Update</option>
    <option value="Instructions">Instruction</option>
    <option value="Feedback Request">Feedback Request</option>
    <option value="Call To Action">Call To Action</option>
    <option value="Meeting Summaries">Meeting Summary</option>
    <option value="Status Reports">Status Report</option>
    <option value="Invitation">Invitation</option>
  </select>
  <div id="alert_Form">
  <input type="hidden" name="id" name="user_id" value="<?php echo $row22['id'] ?>" class="form-control">
  <label class="form-label text-dark">Title</label>
  <input type="text" name="title" class="form-control">
  <label class="form-label text-dark">Message</label>
  <textarea class="form-control" name="alertMessage"></textarea><br>
  <label class="form-label text-dark">Add File</label>
  <input type="file" name="file" class="form-control">
  
  <center>
    <table class="table">
      <tr>
        <!-- <td>
          <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="Share Individual" />
        </td> -->
        <td style="border: none !important;">
          <select class="form-select" aria-label="Default select example" id="permissionType" name="permissionType">
            <option value="NULL" selected >Select Group</option>
            <?php 
            foreach($alert_data_roles as $alrole){
              if($alrole['roles'] == 'super admin'){
                echo "<option value='Everyone'>Everyone</option>";
              }else{
                echo "<option value='".$alrole['roles']."'>".$alrole['roles']."</option>";
              }
            }
            ?>
          </select>
        </td>
        <td style="border: none !important;"><input type="text"
    class="form-control" name="getusernamealert" id="getuserforalert" aria-describedby="helpId" placeholder="send individual"></td>
      </tr>
    </table>
    <br>
    
    <!-- <input type="hidden" value="" name="permissionPageID" id="permissionPageID" /> -->
    <div class="container-fluid">
      <center>
    <table class="table table-bordered alerttableData" style="display:none; width: 100%;">
      <thead class="bg-dark">
        <tr>
          <th class="text-white">#</th>
          <th class="text-white">Profile Image</th>
          <th class="text-white">Name</th>
          <th class="text-white">NickName</th>

        </tr>
      </thead>
      <tbody class="alertuserDetail">

      </tbody>
    </table>
  </center><br>
    </div>
  </center>
  <input type="submit" name="alertbtn" value="Save" class="btn btn-success" style="float:right;">
  </div>
</form>
