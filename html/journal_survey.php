<?
if(preg_match('/(?i)msie [1-8]/',$_SERVER['HTTP_USER_AGENT'])) { // if IE<=8
?>
<html>
<?
} else {
?>
<!DOCTYPE html>
<?
}
?>
<head>
        <meta http-equiv="X-UA-Compatible" content="Edge mode" >
        <title>Oregon State University Libraries User Survey</title>
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="<?=JS_PATH?>journal_survey.js"></script>
        <link rel="stylesheet" type="text/css" href="<?=CSS_PATH?>style.css">
</head>
<body>
<div id="outer">
<!--  START OSU TOP HAT -->
<div id="osu-top-hat" style="border-bottom-color:#561f4b;">
</div>
<!--  END OSU TOP HAT -->

<div id="content">
 <div id="osu-top-hat-interior" class="wrapper4">
                <a href="http://oregonstate.edu/"><img class="tag" src="https://secure.oregonstate.edu/u_central/top-hat/images/osu-tag.gif" width="101" height="119" alt="Oregon State University" /></a>
      <h1 style="padding-top:70px;">OSU Libraries</h1>
 </div>

  <div id="survey">
     <h4>Complete this survey to proceed to your requested resource.</h4>
     <p style="margin-top: -20px;">Oregon State University is conducting an anonymous survey to evaluate use of specific journal resources.  Thank you for your help.</p>

     <p>
       <?require_once("survey_journal_form.php");?>
     </p>      

   </div>
   <div id = "footer">
      <p>        121 The Valley Library, Corvallis OR 97331-4501&nbsp; | &nbsp;Phone: (541) 737-3331 | <a href="http://osulibrary.oregonstate.edu/hours/">Hours</a><br>        <a href="http://oregonstate.edu/about/copyright.html">Copyright</a> &copy; 2004 Oregon State University&nbsp; | &nbsp;<a href="http://oregonstate.edu/disclaimer.html">Disclaimer</a> |        <a href="http://osulibrary.oregonstate.edu/research/guides/perdis.htm" class="ada"><img src="http://osulibrary.oregonstate.edu/images/ada.gif" title="Connect to OSU Libraries Services for Persons with Disabilities" alt="Connect to OSU Libraries Services for Persons with Disabilities"></a>
</p>

   </div>
</div>
</div>
</body>
</html>

