<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$cert_type = "";
$cert_id = "";
if (isset($_REQUEST['id']) && isset($_REQUEST['type'])) {
  $_SESSION['cert_type'] = $cert_type = $_REQUEST['type'];
  $_SESSION['cert_id'] = $cert_id = $_REQUEST['id'];
} else if (isset($_SESSION['cert_type']) && isset($_SESSION['cert_id'])) {
  $cert_type = $_SESSION['cert_type'];
  $cert_id = $_SESSION['cert_id'];
}
$roles_value_fetch = "";
$query_roles_fetch = "SELECT * FROM roles";
$statement_roles_fetch = $connect->prepare($query_roles_fetch);
$statement_roles_fetch->execute();

if ($statement_roles_fetch->rowCount() > 0) {
  $result_roles_fetch = $statement_roles_fetch->fetchAll();
  $sn = 1;
  foreach ($result_roles_fetch as $row_roles_fetch) {
    $roles_value_fetch .= "<option value=" . $row_roles_fetch['id'] . ">" . $row_roles_fetch['roles'] . "</option>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Create page</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/bootstrap-icons/font/bootstrap-icons.css" />

  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/chart.js/dist/Chart.min.css" />
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/jsvectormap/dist/css/jsvectormap.min.css" />

  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.css" />

  <!-- CSS Front Template -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/snippets.min.css" />

  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <!-- CSS Front Template -->

  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/theme.min.css" data-hs-appearance="default" as="style" />
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" data-hs-appearance="default" as="style" />
  <style>
    <?php if ($cert_type == "horizontal") { ?>#draggable-container {
      width: 800px;
      height: 1300px;
      margin-right: 30px;
      border: 1px solid #ccc;
      position: relative;
    }

    <?php } else {
    ?>#draggable-container {
      width: 1300px;
      height: 800px;
      margin-right: 30px;
      border: 1px solid #ccc;
      position: relative;
    }

    <?php
    } ?>
  </style>
</head>

<body>


  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 20rem; margin-top: 50px;">

      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -22rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

            <div class="card-body">


              <div>
                <label>select Item</label>
                <select class="form-control" required id="select_type" style="width: 20%;">
                  <option value="">select option</option>
                  <option value="img">Img</option>
                  <option value="Heading">Heading</option>
                  <option value="logo">logo</option>
                  <option value="p">Paragraph</option>
                  <option value="frame">Frame</option>
                  <option value="horozontaltype">horizontal hr</option>
                </select>
              </div>
              <?php include ROOT_PATH . 'includes/Pages/image1.php'; ?>
              <?php include ROOT_PATH . 'includes/Pages/heading.php'; ?>
              <?php include ROOT_PATH . 'includes/Pages/logo.php'; ?>
              <?php include ROOT_PATH . 'includes/Pages/paragraph.php'; ?>
              <?php include ROOT_PATH . 'includes/Pages/frame.php'; ?>
              <?php include ROOT_PATH . 'includes/Pages/horizontal.php'; ?>
              <hr>


            </div>

          </div>

        </div>
      </div>

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid grey;background-color:grey;">

            <div class="card-body">
              <div id="draggable-container" style="background:white">
                <?php
                if (isset($cert_id)) {
                  $cId = $cert_id;
                  $cerQ = $connect->query("SELECT count(*) FROM originalcertificate WHERE certificateId = '$cId'");
                  $cerData = $cerQ->fetchColumn();
                  if ($cerData > 0) {
                    $cerQ = $connect->query("SELECT * FROM originalcertificate WHERE certificateId = '$cId'");
                    while ($cerQData = $cerQ->fetch()) {
                      echo $cerQData['certificateHtml'];
                    }
                  }
                } 
                // else {
                  $fetch_frame = "SELECT * FROM frame_cert where cert_id='$cert_id' and `status`='0'";
                  $statement_fetch_frame = $connect->prepare($fetch_frame);
                  $statement_fetch_frame->execute();

                  if ($statement_fetch_frame->rowCount() > 0) {
                    $result_fetch_frame = $statement_fetch_frame->fetchAll();
                    $sn = 1;
                    foreach ($result_fetch_frame as $row_fetch_frame) {
                      $logo_image_names = $row_fetch_frame['file_name'];
                      $log_pics = BASE_URL . 'includes/Pages/draganddropimg/' . $logo_image_names;
                ?>
                      <div id="resizable1<?php echo $row_fetch_frame['id'] ?>" class="ui-widget-content drag_and_drop" style="width: <?php echo $row_fetch_frame['image_width']; ?>px; height:<?php echo $row_fetch_frame['image_height']; ?>px; padding: 0.5em; position: relative;z-index:0">
                        <img src="<?php echo $log_pics; ?>" alt="Your Image" style="height:<?php echo $row_fetch_frame['image_height']; ?>px;width:<?php echo $row_fetch_frame['image_width']; ?>px;border-radius:<?php echo $row_fetch_frame['border_radius'] ?>px;border:<?php echo $row_fetch_frame['border'] ?>px solid <?php echo $row_fetch_frame['border_color'] ?>" class="ui-widget-header get_id_class" data-value="frame_cert" data-id="<?php echo $row_fetch_frame['id']; ?>"/>
                        <a style="float:right" href="delete_frame_id.php?id=<?php echo $row_fetch_frame['id']; ?>"><i class="bi bi-x-circle-fill text-danger"></i></a>
                      </div>
                    <?php }
                  }

                  $fetch_logo = "SELECT * FROM logo_cert where cert_id='$cert_id' and `status`='0'";
                  $statement_fetch_logo = $connect->prepare($fetch_logo);
                  $statement_fetch_logo->execute();

                  if ($statement_fetch_logo->rowCount() > 0) {
                    $result_fetch_logo = $statement_fetch_logo->fetchAll();
                    $sn = 1;
                    foreach ($result_fetch_logo as $row_fetch_logo) {
                      $logo_image_names = $row_fetch_logo['file_name'];
                      $log_pics = BASE_URL . 'includes/Pages/draganddropimg/' . $logo_image_names;
                    ?>
                      <div id="resizable1<?php echo $row_fetch_logo['id'] ?>" class="ui-widget-content drag_and_drop" style="width: <?php echo $row_fetch_logo['image_width']; ?>px; height:<?php echo $row_fetch_logo['image_height']; ?>px; padding: 0.5em; position: relative;">
                        <img src="<?php echo $log_pics; ?>" alt="Your Image" style="height:<?php echo $row_fetch_logo['image_height']; ?>px;width:<?php echo $row_fetch_logo['image_width']; ?>px;border-radius:<?php echo $row_fetch_logo['border_radius'] ?>px;border:<?php echo $row_fetch_logo['border'] ?>px solid <?php echo $row_fetch_logo['border_color'] ?>" class="ui-widget-header get_id_class" data-value="logo_cert" data-id="<?php echo $row_fetch_logo['id']; ?>"/>
                        <a href="delete_logo_id.php?id=<?php echo $row_fetch_logo['id']; ?>"><i class="bi bi-x-circle-fill text-danger"></i></a>
                      </div>
                    <?php }
                  }

                  $fetch_images = "SELECT * FROM image_cert where cert_id='$cert_id' and `status`='0'";
                  $statement_fetch_images = $connect->prepare($fetch_images);
                  $statement_fetch_images->execute();

                  if ($statement_fetch_images->rowCount() > 0) {
                    $result_fetch_images = $statement_fetch_images->fetchAll();
                    $sn = 1;
                    foreach ($result_fetch_images as $row_fetch_images) { ?>
                      <div id="resizable<?php echo $row_fetch_images['id'] ?>" class="ui-widget-content drag_and_drop" style="width: <?php echo $row_fetch_images['image_width']; ?>px; height:<?php echo $row_fetch_images['image_height']; ?>px; padding: 0.5em; position: relative;">
                        <img src="<?php echo BASE_URL . 'includes/Pages/upload/850_6727-PRINT.jpg'; ?>" alt="Your Image" style="height:<?php echo $row_fetch_images['image_height']; ?>px;width:<?php echo $row_fetch_images['image_width']; ?>px;border-radius:<?php echo $row_fetch_images['border_radius'] ?>px;border:<?php echo $row_fetch_images['border'] ?>px solid <?php echo $row_fetch_images['border_color'] ?>"  data-value="image_cert" data-id="<?php echo $row_fetch_images['id']; ?>" class="ui-widget-header get_id_class" />
                        <a  href="delete_image_id.php?id=<?php echo $row_fetch_images['id']; ?>"><i class="bi bi-x-circle-fill text-danger"></i></a>
                      </div>
                    <?php }
                  }

                  $fetch_headings = "SELECT * FROM heading_cert where cert_id='$cert_id' and `status`='0'";
                  $statement_fetch_headings = $connect->prepare($fetch_headings);
                  $statement_fetch_headings->execute();
                  $text_type_heading = "";
                  if ($statement_fetch_headings->rowCount() > 0) {
                    $result_fetch_headings = $statement_fetch_headings->fetchAll();
                    $sn = 1;
                    foreach ($result_fetch_headings as $row_fetch_headings) {
                      $roles_idess = $row_fetch_headings['headings_name'];
                      $stud_subi = $connect->prepare("SELECT roles FROM roles
                        WHERE id=?");
                      $stud_subi->execute([$roles_idess]);
                      $name_roles = $stud_subi->fetchColumn();
                      if ($row_fetch_headings['headings_name'] == '0') {
                        $heading_name = $row_fetch_headings['heading_text_value'];
                      } else {
                        $heading_name = $name_roles . "s Names";
                      }
                      if ($row_fetch_headings['text_type_heading'] == "Bold") {
                        $text_type_heading = "font-weight: bold";
                      } else if ($row_fetch_headings['text_type_heading'] == "italic") {
                        $text_type_heading = "font-style: italic;";
                      } else if ($row_fetch_headings['text_type_heading'] == "underline") {
                        $text_type_heading = "text-decoration-line: overline;";
                      }

                    ?>
                      <div id="resizables<?php echo $row_fetch_headings['id'] ?>" class="ui-widget-content drag_and_drop" style="padding: 0.5em; position: relative;">
                        <?php
                        echo '<' . $row_fetch_headings['headings_style'] . ' style="background-color:' . $row_fetch_headings['heading_backgoround'] . ';color:' . $row_fetch_headings['heading_text'] . ';' . $text_type_heading . ';font-family:' . $row_fetch_headings['font_family'] . ';font-size:' . $row_fetch_headings['font_size_height'] . 'px" class="get_id_class" data-value="heading_cert" data-id="'.$row_fetch_headings['id'].'">' . $heading_name . '</' . $row_fetch_headings['headings_style'] . '>';
                       ?>
                         <a href="delete_heading_id.php?id=<?php echo $row_fetch_headings['id']; ?>"><i class="bi bi-x-circle-fill text-danger"></i></a>
                      </div>
                    <?php }
                  }

                  $fetch_para = "SELECT * FROM para_cert where cert_id='$cert_id' and `status`='0'";
                  $statement_fetch_para = $connect->prepare($fetch_para);
                  $statement_fetch_para->execute();
                  $text_type_heading = "";
                  if ($statement_fetch_para->rowCount() > 0) {
                    $result_fetch_para = $statement_fetch_para->fetchAll();
                    $sn = 1;
                    foreach ($result_fetch_para as $row_fetch_para) {
                      if ($row_fetch_para['text_type_heading'] == "Bold") {
                        $text_type_heading = "font-weight: bold";
                      } else if ($row_fetch_para['text_type_heading'] == "italic") {
                        $text_type_heading = "font-style: italic;";
                      } else if ($row_fetch_para['text_type_heading'] == "underline") {
                        $text_type_heading = "text-decoration-line: overline;";
                      }

                    ?>
                      <div id="resizable3<?php echo $row_fetch_para['id'] ?>" class="ui-widget-content drag_and_drop" style="padding: 0.5em; position: relative;">
                        <?php
                        echo '<p style="background-color:' . $row_fetch_para['heading_backgoround'] . ';color:' . $row_fetch_para['heading_text'] . ';' . $text_type_heading . ';font-family:' . $row_fetch_para['font_style'] . ';font-size:' . $row_fetch_para['font_size_height'] . 'px" class="get_id_class" data-value="para_cert" data-id="'.$row_fetch_para['id'].'">' . $row_fetch_para['text_data'] . '</p>';
                        ?>
                           <a href="delete_para_id.php?id=<?php echo $row_fetch_para['id']; ?>"><i class="bi bi-x-circle-fill text-danger"></i></a>
                      </div>
                    <?php }
                  }


                  $fetch_horizontal = "SELECT * FROM horizontal_cert where cert_id='$cert_id' and `status`='0'";
                  $statement_fetch_horizontal = $connect->prepare($fetch_horizontal);
                  $statement_fetch_horizontal->execute();
                  $text_type_heading = "";
                  if ($statement_fetch_horizontal->rowCount() > 0) {
                    $result_fetch_horizontal = $statement_fetch_horizontal->fetchAll();
                    $sn = 1;
                    foreach ($result_fetch_horizontal as $row_fetch_horizontal) {

                    ?>
                      <div id="resizable2<?php echo $row_fetch_horizontal['id'] ?>" class="ui-widget-content drag_and_drop" style="padding: 0.5em; position: relative;">
                        <hr style="width:<?php echo $row_fetch_horizontal['widht']; ?>px;border-top: 3px solid <?php echo $row_fetch_horizontal['border_color'] ?>;" data-value="horizontal_cert" data-id="<?php echo $row_fetch_horizontal['id']; ?>" class="get_id_class">
                        <a  href="delete_horizontal_id.php?id=<?php echo $row_fetch_horizontal['id']; ?>"><i class="bi bi-x-circle-fill text-danger"></i></a>
                      </div>
                  <?php }
                  }
                  ?>
             
              </div>
              <?php if (isset($cert_id)) { ?>
              <input type="button" value="Save" class="btn btn-success" id="getHtml" style="position: relative;;" />
              <?php } ?>
            </div>

          </div>

        </div>
      </div>

    </div>

    <!-- End Row -->
    </div>
    <!-- End Content -->

  </main>



  <script src="<?php echo BASE_URL; ?>assets/editor/ckeditor/ckeditor.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/js/qrjs.js" referrerpolicy="origin"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JS Implementing Plugins -->
  <script src="<?php echo BASE_URL; ?>assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/hs-form-search/dist/hs-form-search.min.js"></script>

  <script src="<?php echo BASE_URL; ?>assets/vendor/hs-nav-scroller/dist/hs-nav-scroller.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/daterangepicker/moment.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/daterangepicker/daterangepicker.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/jsvectormap/dist/js/jsvectormap.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/jsvectormap/dist/maps/world.js"></script>

  <!-- JS Front -->
  <script src="<?php echo BASE_URL; ?>assets/js/theme.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/js/hs.theme-appearance-charts.js"></script>

  <script src="<?php echo BASE_URL; ?>assets/vendor/hs-go-to/dist/hs-go-to.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/prism/prism.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/hs-show-animation/dist/hs-show-animation.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.js"></script>

</body>
<script src="<?php echo BASE_URL; ?>assets/jquery3.6.0/script.js"></script>
<script src="<?php echo BASE_URL; ?>assets/jquery3.6.0/jqueryUI.js"></script>
<script>
  $(document).ready(function() {
    $(document).on("click", ".drag_and_drop", function() {
      let id = $(this).attr("id");
      $("#" + id).resizable();
      $("#" + id).draggable({
        containment: "#draggable-container" // Set the containment to the specific area.
      });
    });
  });
</script>
<script>
  $('#select_type').on('change', function() {
    var get_val = $(this).val();
    if (get_val == "img") {
      $(".img_select").show();
      $(".heading_select").hide();
      $(".logo_select").hide();
      $(".Paragraph_select").hide();
      $(".frame_select").hide();
      $(".hori_select").hide();
    }
    if (get_val == "Heading") {
      $(".heading_select").show();
      $(".logo_select").hide();
      $(".Paragraph_select").hide();
      $(".img_select").hide();
      $(".frame_select").hide();
      $(".hori_select").hide();
    }
    if (get_val == "logo") {
      $(".logo_select").show();
      $(".img_select").hide();
      $(".heading_select").hide();
      $(".Paragraph_select").hide();
      $(".frame_select").hide();
      $(".hori_select").hide();
    }
    if (get_val == "p") {
      $(".Paragraph_select").show();
      $(".logo_select").hide();
      $(".img_select").hide();
      $(".heading_select").hide();
      $(".frame_select").hide();
      $(".hori_select").hide();
    }
    if (get_val == "frame") {
      $(".Paragraph_select").hide();
      $(".logo_select").hide();
      $(".img_select").hide();
      $(".heading_select").hide();
      $(".frame_select").show();
      $(".hori_select").hide();
    }
    if (get_val == "horozontaltype") {
      $(".Paragraph_select").hide();
      $(".logo_select").hide();
      $(".img_select").hide();
      $(".heading_select").hide();
      $(".frame_select").hide();
      $(".hori_select").show();
    }

  });
</script>
<script>
  $('.check_user_heading').on('change', function() {
    var get_val1 = $(this).val();

    if (get_val1 == 0) {
      $(".if_text").show();
    } else {
      $(".if_text").hide();
    }
  });
</script>

<script>
  $("#getHtml").on("click", function() {
    const certificateId = <?php echo $cert_id ?>;
    var containerHtml = $("#draggable-container").html();
    var arr = [];
      $('.get_id_class').each(function() {
        arr.push({
          name: $(this).data('value'),
          ides: $(this).data('id') 
        });
      });
      // console.log(arr);
      for (i = 0; i < arr.length; ++i) {
        names = arr[i]['name'];
        id = arr[i]['ides'];
        $.ajax({
          url: "add_status_element.php",
          method: "POST",
          data: 'values=' + names + '&id=' + id,
          success: function(data) {
            // console.log(data);
          }
        });
      }
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/saveCertificate.php',
      data: {
        certificateId: certificateId,
        containerHtml: containerHtml,
      },
      success: function(response) {
        alert("alert");
      }
    });
  });
</script>

</html>