<?
  $output = "";
  $val = file_get_contents("cfg.php");
  if (strpos($val, "define('RUN_SURVEY', false)")!==false) {
     $val = str_replace("define('RUN_SURVEY', false)", "define('RUN_SURVEY', true)", $val);
     $output = "Survey has been turned on";
  } else {
     $val = str_replace("define('RUN_SURVEY', true)", "define('RUN_SURVEY', false)", $val);
     $output = "Survey has been turned off";
  }

  file_put_contents("cfg.php", $val);
  echo $output;
  echo "\n";

?>
