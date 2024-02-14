<?php
session_start();

if (isset($_SESSION["openInNewWindow"])) {
  // Convert the checkbox state to "1" or "0"
  $checkboxState = $_SESSION["openInNewWindow"] ? "1" : "0";
  echo $checkboxState;
}
?>
