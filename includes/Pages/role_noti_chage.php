<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$output = "";
$course = "select course";
$std_course = "";
if (isset($_REQUEST['noti_id'])) {
  $noti_id = urldecode(base64_decode($_REQUEST['noti_id']));
  $update_read = "UPDATE `notifications`
  SET `is_read` = 1 WHERE `id`='$noti_id'";
  $update_statement = $connect->prepare($update_read);
  $update_statement->execute();
} 
?>
<!DOCTYPE html>
<html>

<head>
  <title>role management Page</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php include 'gs_thumbnail.php'; ?>

  <style type="text/css">
    .circleig1 {
      height: 20px;
      width: 100%;
      background: #e2e4e6;
      position: absolute;
      left: 0px;
      bottom: -20px;
      color: darkgoldenrod;
      font-weight: bold;
      font-family: cursive;
    }


    #button {
      display: inline-block;
      position: relative;
      margin: 1em;
      border: 2px solid #FFF;
      overflow: hidden;
      text-decoration: none;
      outline: none;
      color: #FFF;
      font-family: 'raleway', sans-serif;
      height: auto;
      transition: all 0.6s ease;
      border-radius: 10px;
      top: 10px;

    }

  </style>
</head>

<body>



  <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>

  <div id="header-hide">

    <?php
    include(ROOT_PATH . 'includes/head_navbar.php');
   
    
    ?>

  </div>




  <main id="content" role="main" class="main">

    <div class="content container-fluid" style="height: 30rem;">
      <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>

      <div class="page-header" style="padding: 0px;">
        <!-- <div class="row" style="margin-bottom: -50px;">
        <div class="col-md-6 mt-3"> -->
        <h1 class="text-success">
          <img style="height:35px; width:45px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/Actual_class.png">
          Give permission On role 
        </h1>
        <!-- </div>


    </div> -->

      </div>

    </div>

    <div class="content container-fluid" style="margin-top: -20rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <div class="card card-hover-shadow h-100" id="" style="border:0.001rem solid #dddddd;">
            <div class="card-body">

              <div class="col">
                <form action="give_per_noti_role.php">
              <table style="margin: 5px; padding:5px;" class="table table-striped table-bordered">
              <thead class="bg-dark">
                <th class="text-light"><input type="checkbox" id="select-all-item"></th>
                <th class="text-light">Name</th>
                <th class="text-light">Role</th>
              
              </thead>
              <tbody>
                <?php 
                $fetchdatanoti = "SELECT * FROM notifications where is_read = '0' and extra_data='ask for role change' ORDER BY date DESC";

                $fetchdatanotist = $connect->prepare($fetchdatanoti);
                $fetchdatanotist->execute();
                
                if ($fetchdatanotist->rowCount() > 0) {
                  $refetchdata = $fetchdatanotist->fetchAll();
                  foreach ($refetchdata as $refetchdatar) {
                    $nRowsroleavailble=0; $useridesss12=$refetchdatar['user_id'];$useridesss122=$refetchdatar['data'];
                    $nRowsroleavailble = $connect->query("SELECT count(*) from role_updated_request where userid='$useridesss12' and role='$useridesss122'")->fetchColumn(); 
                    $selectname11="";$selectname112="";
                   if($nRowsroleavailble==0){
                    $selectname1 = $connect->query("SELECT nickname FROM users WHERE id = '$useridesss12'");
                    $selectname11 = $selectname1->fetchColumn();
                    $selectname12 = $connect->query("SELECT roles FROM roles WHERE id = '$useridesss122'");
                    $selectname112 = $selectname12->fetchColumn();
                ?>
                <tr>
                    <td><input type="checkbox" class="get_value" name="userid[]" value="<?php echo $refetchdatar['user_id']; ?>"></td>
                    <td><input type="hidden" name="role[]" value="<?php echo $selectname112 ?>"><input type="hidden" name="roleid[]" value="<?php echo $useridesss122 ?>"><?php echo $selectname11;?></td>
                    <td><?php echo $selectname112;?></td>
               
                </tr>
                <?php }
                  }
            }   ?>
              </tbody>
            </table>
            <input type="submit" class="btn btn-success" name="accpt" value="accept">      <input type="submit" class="btn btn-danger" name="decline" value="decline">
          </form>
              </div>
          </div>
        </div>




  
      </div>


  </main>

 

  








<!--Footer-->
<footer id="contenthome" role="footer" class="footer">
  <?php include ROOT_PATH . 'includes/footer2.php'; ?>
</footer>
 <script src="<?php echo BASE_URL; ?>includes/Pages/loading.js"></script>
</body>
<script>
   
    $("#select-all-item").click(function() {
      // When "Check All" button is clicked, toggle the checked state of all checkboxes with class "get_value"
      $(".get_value").prop("checked", !$(".get_value").prop("checked"));
    });

    // Click event for individual checkboxes
    $(".get_value").click(function() {
      // Check if all checkboxes with class "get_value" are checked
      var allChecked = $(".get_value").length === $(".get_value:checked").length;
      // Set the "Check All" button state accordingly
      $("#select-all-item1").prop("checked", allChecked);
    });
  </script>



</html>