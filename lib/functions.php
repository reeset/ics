<?

/****************************
 * args passes an array
 * with values to store.
 * value names corespond to 
 * table names
 ***************************/
function post_survey($args) {
   $mysqli = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, SURVEY_DATABASE);

   /* check connection */
   if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
   }

   //process our data
   $patron_status = "";
   $research_type = "";
   $academic_department = "";
   $sponsor_proof = "";
   $is_mobile = "";
   $user_agent = "";
   $location = "";
   $destination_url = "";

   foreach ($args as $name => $value) {
     if ($name == "destination_url") { 
	$value = urldecode($value);
     }
     $$name = $value;
     $_SESSION[$name] = $value;
   }
   //create insert

   
   $query = 'insert into survey_data (patron_status, research_type, academic_department, sponsor_proof, is_mobile, user_agent, location, destination_url, cdate, tstamp) Values ("' . $patron_status . '", "' .  $research_type . '","' . $academic_department . '","' . $sponsor_proof . '","' . $is_mobile . '","' . $user_agent . '","' . $location . '","' . $destination_url . '", CURDATE(), now())';

   //print "QUERY: " . $query;
   if (!$mysqli->query($query)){
	printf("Errormessage: %s\n", $mysqli->error);
   }
   return true;

}

function post_journal_survey($args) {
   $mysqli = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, SURVEY_DATABASE);

   /* check connection */
   if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
   }

   //process our data
   $research_status = "";
   $core_research = "";
   $is_mobile = "";
   $user_agent = "";
   $location = "";
   $destination_url = "";

   foreach ($args as $name => $value) {
     if ($name == "destination_url") {
        $value = urldecode($value);
     }
     $$name = $value;
     $_SESSION[$name] = $value;
   }
   //create insert


   $query = 'insert into journal_survey_data (research_status, core_research, is_mobile, user_agent, location, destination_url, cdate, tstamp) Values ("' . $research_status . '", "' .  $core_research . '","' .  $is_mobile . '","' . $user_agent . '","' . $location . '","' . $destination_url . '", CURDATE(), now())';

   //print "QUERY: " . $query;
   if (!$mysqli->query($query)){
        printf("Errormessage: %s\n", $mysqli->error);
   }
   return true;

}

?>
