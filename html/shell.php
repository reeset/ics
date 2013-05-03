<?
  //include config
  require_once("../cfg/cfg.php");
  require_once("../lib/functions.php");

  if (isset($_GET["file"])) { $file = $_GET['file'];} else { $file = "";}

  include($file);
?>
