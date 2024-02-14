<?php

include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

require_once '../../dompdf/autoload.inc.php';

use Dompdf\Dompdf;

if (isset($_REQUEST['pdfIdUser'])) {
  $pdfId = $_REQUEST['pdfIdUser'];

  $sql = $connect->query("SELECT * FROM editor_data WHERE id = '$pdfId'");

  while ($data = $sql->fetch()) {
    $pageName = $data['pageName'];
    $pageData = $data['editorData'];
  }



  // Instantiate and use the dompdf class 
  $dompdf = new Dompdf();

  $html = $pageName;
  $html .= $pageData;

  $dompdf->loadHtml($html);

  // (Optional) Setup the paper size and orientation 
  $dompdf->setPaper('A4', 'landscape');

  // Render the HTML as PDF 
  $dompdf->render();

  // Output the generated PDF to Browser 
  $dompdf->stream($pageName, array("Attachment" => 1));
}

?>

<script>
  // Wait for the file to download, then redirect the user back to the previous page
  setTimeout(function() {
    history.go(-1);
  }, 3000); // Redirect after 3 seconds
</script>