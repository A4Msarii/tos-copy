<?php

include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
if (isset($_REQUEST['htmlId'])) {
  $htmlId = $_REQUEST['htmlId'];

  $sql = $connect->query("SELECT * FROM newpage_fm WHERE id = '$htmlId'");

  while ($data = $sql->fetch()) {
    $pageName = $data['pageName'];
    $pageData = $data['editorData'];
  }

  $html = $pageName;
  $html .= $pageData;

  header('Content-Type: text/html');
  header("content-disposition: attachment;filename=$pageName.html");

  echo $html;
}


if (isset($_REQUEST['htmlIdUser'])) {
  $htmlId = $_REQUEST['htmlIdUser'];

  $sql = $connect->query("SELECT * FROM editor_data WHERE id = '$htmlId'");

  while ($data = $sql->fetch()) {
    $pageName = $data['pageName'];
    $pageData = $data['editorData'];
  }

  $html = $pageName;
  $html .= $pageData;

  header('Content-Type: text/html');
  header("content-disposition: attachment;filename=$pageName.html");

  echo $html;
}
?>

<script>
  // Wait for the file to download, then redirect the user back to the previous page
  setTimeout(function() {
    history.go(-1);
  }, 3000); // Redirect after 3 seconds
</script>