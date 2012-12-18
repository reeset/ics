<?
// Survey script stub
// changed 7/5/2012, tr

// changed 10/9/2012 tr
// updated to fix issues when survey url is doubled for what
// ever reason

/*************************************************************************
 *  Survey process
 * 1) see if the survey should be running by checking a value in the config
 * 2) if not running, pass on to the proxy
 * 3) if running, see if the survey has been answered via this session
 * 4) if yes, capture the url, enter data in the database, and pass the user to the 
 *    proxy
 * 5) if no, show the survey
 * 6) when survey is submitted, capture the feedback, set the session data, 
 *    and pass user to the proxy
 ************************************************************************/

//include config
require_once("cfg/cfg.php");
require_once("lib/functions.php");

session_start();
//get the URL
if (isset($_GET['url'])) { 
  $database_url = $_SERVER['QUERY_STRING'];
} else {
  if (isset($_POST['url'])) {
     $database_url = $_SERVER['QUERY_STRING'];//$_POST['url'];
  } else {
    if (isset($_POST['destination_url'])) {
       $database_url=urldecode($_POST['destination_url']);
    } else {
       $database_url = "";
    }
  }
}

//Added to support bad urls
if (strpos($database_url, "login?url=login?url=") !==false) {
   $database_url = str_replace("login?url=login?url=", "login?url=", $database_url);
} else {
  if (strpos(urldecode($database_url), "login?url=login?url=") !== false) {
      $database_url = urlencode(str_replace("login?url=login?url=", "login?url=", urldecode($database_url)));
  }
}


if (strpos($database_url, ".proxy.library") !== false) {
   if (strpos($database_url, "ezproxy.proxy.library")===false) {
      $database_url = str_replace(".proxy.library.oregonstate.edu", "", $database_url);
   } 
}
 
  
 
//get action value
if (isset($_GET['action'])) {
  $action = $_GET['action'];
} else {
  if (isset($_POST['action'])) {
    $action = $_POST['action'];
  } else {
    $action = "";
  }
}


if ($action == "post") {
  $args = array();
  foreach ($_POST as $name => $value) {
     $_SESSION[$name] = $value;
     $args[$name] = $value;
  }
  post_survey($args);
  header("location: " . PROXY_URL . urldecode($database_url));

} else if ($action == "get") {
  $args =  array();
  foreach ($_GET as $name => $value) {
     $_SESSION[$name] = $value;
     $args[$name] = $value;
  }
  post_survey($args);
  header("location: " . PROXY_URL . urldecode($database_url));

} else if ($action == "post_journal") {
  $args = array();
  foreach ($_POST as $name => $value) {
     $_SESSION[$name] = $value;
     $args[$name] = $value;
  }
  post_journal_survey($args);
  if (strpos($database_url, 'access.library')==true) {
     header("location: "  . urldecode($database_url));
  } else {
     header("location: " . PROXY_URL . urldecode($database_url));
  }

}else if (RUN_SURVEY == false) {
  if (file_exists(JOURNAL_PATH)) {
    $contents = file_get_contents(JOURNAL_PATH);
    $j_urls = explode("\n", $contents);
    foreach($j_urls as $jj) {
       if (strpos(urldecode($database_url), trim($jj)) !==false) {
           require_once('html/journal_survey.php');
	   break;
       }
    }  
     //pass to the proxy
    if (substr($database_url, 0, 4) == "url=") {
       $database_url = substr($database_url, 4);
    }

    header("location: " . PROXY_URL . urldecode($database_url));

  } else {
    //pass to the proxy
    if (substr($database_url, 0, 4) == "url=") {
       $database_url = substr($database_url, 4);
    }

    header("location: " . PROXY_URL . urldecode($database_url));
  }
} else {
  //Survey should be run, see if the user has already done the 
  //survey
  if (isset($_SESSION['patron_status'])) {
    //Survey has been run, re-insert the data
    $args = array();
    foreach ($_SESSION as $name => $value) {
        $args[$name] = $value;
    }
    $args['url'] = $database_url;
    post_survey($args);
    header("location: " . PROXY_URL . "login?" . urldecode($database_url));
  } else {
    //we haven't run the survey yet -- post it
    require_once('html/survey.php');
  }
}

?>
