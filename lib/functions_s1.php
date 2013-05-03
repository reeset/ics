<?

/****************************
 * args passes an array
 * with values to store.
 * value names corespond to 
 * table names
 ***************************/

function post_s1_survey($args) {
   $mysqli = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, SURVEY_DATABASE);

   /* check connection */
   if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
   }

   //process our data
   $is_mobile = "";
   $user_agent = "";
   $location = "";
   $destination_url = "";
   $s1_1 = "";
   $s1_1_other = "";
   $s1_2 = "";
   $s1_2_other = "";
   $s1_3 = "";
   $s1_3_other = "";
   $s1_4 = "";
   $s1_5 = "";
   $s1_6 = "";
   $s1_7 = "";
   $s1_8 = "";
   $s1_8_other = "";
   $s1_9 = "";

   foreach ($args as $name => $value) {
     if ($name == "destination_url") {
        $value = urldecode($value);
     }

     if ($name == "s1_4") {
	$value = str_replace("Price: $", "", $value);
     }

     $$name = $mysqli->real_escape_string($value);
     $_SESSION[$name] = $value;
   }
   //create insert


   $query = 'insert into s1_survey_data (s1_1, s1_1_other, s1_2, s1_2_other, s1_3, s1_3_other, s1_4, s1_5, s1_6, s1_7, s1_8, s1_8_other, s1_9, is_mobile, user_agent, location, destination_url, cdate, tstamp) Values ("' . $s1_1 . '","' .  $s1_1_other . '","' . $s1_2 . '","' . $s1_2_other . '","' . $s1_3 . '","' . $s1_3_other . '","' . $s1_4 . '","' . $s1_5 . '","' . $s1_6 . '","' . $s1_7 . '","' . $s1_8 . '","' . $s1_8_other . '","' . $s1_9 . '","' .  $is_mobile . '","' . $user_agent . '","' . $location . '","' . $destination_url . '", CURDATE(), now())';

   //print "QUERY: " . $query;
   if (!$mysqli->query($query)){
        printf("Errormessage: %s\n", $mysqli->error);
   }
   return true;

}

?>
