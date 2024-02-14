<?php

include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
$docxId = $_REQUEST['docxId'];

$sql = $connect->query("SELECT * FROM editor_data WHERE id = '$docxId'");
$data = $sql->fetch();
$pageName = $data['pageName'];
$pageData = $data['editorData'];

require '../vendor/autoload.php';

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

// Create a new PHPWord object
$phpWord = new PhpWord();

// Load the HTML content
// $htmlContent = '<html><body><h1>Hello, world!</h1><p>This is HTML content.</p></body></html>';

// Add HTML content to a section
$section = $phpWord->addSection();
\PhpOffice\PhpWord\Shared\Html::addHtml($section, $pageData);

// Save the document as a DOCX file
$docxFilePath = $pageName.'.docx';
$objWriter = IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save($docxFilePath);

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($docxFilePath) . '"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($docxFilePath));

// Read the file and output it directly to the browser
readfile($docxFilePath);

// Delete the file after downloading
unlink($docxFilePath);

?>

<script>
  // Wait for the file to download, then redirect the user back to the previous page
  setTimeout(function() {
    history.go(-1);
  }, 3000); // Redirect after 3 seconds
</script>