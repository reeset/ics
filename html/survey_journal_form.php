<?
require_once("Mobile_Detect.php");

if (isset($destination_url)) {
   $dest_url = $destination_url;
} else {
  if (isset($_GET['url'])) {
   $dest_url = $_SERVER['QUERY_STRING'];//$_GET['url'];
  } else {
   if (isset($_POST['url'])) {
      $dest_url = $_SERVER['QUERY_STRING']; //$_POST['url'];
   } else {
      $dest_url = "";
   }
  }
}

if (substr($dest_url, 0, 4) == "url=") {
   $dest_url = substr($dest_url, 4);
}

$detect = new Mobile_Detect;
if ($detect->isMobile()) {
   $ismobile = "true";
} else {
   $ismobile = "false";
}

$user_agent = $_SERVER['HTTP_USER_AGENT'];
$user_agent = urlencode($user_agent);
?>

<form name="mines_survey" id="ica_survey" method="post" action="<?=$_SERVER['PHP_SELF']?>">
        <input type="hidden" name="action" id="action" value="post_journal">	
	<input type="hidden" name="destination_url" id="destination_url" value="<?=urlencode($dest_url)?>">
	<input type="hidden" name="location" id="location" value="<?=$_SERVER['REMOTE_ADDR']?>">
        <input type="hidden" name="is_mobile" id="is_mobile" value="<?=$ismobile?>">
        <input type="hidden" name="user_agent" id="user_agent" value="<?=$user_agent?>">
	
	
	<fieldset id="set-a">
		<legend>
			Why are you using this particular resource?			
			<div class="required">Required &ndash; Select one</div>
		</legend>
		<label for="a1">
			<input id="a1" type="radio" name="research_status" value="1">
			Your research
		</label>
		<label for="a2">
			<input id="a2" type="radio" name="research_status" value="2">
   			Assisting a student
		</label>
		<label for="a3">
		<input id="a3" type="radio" name="research_status" value="3">
			Course/Instruction Preparation
		</label>
                <label for="a4">
		<input id="a4" type="radio" name="research_status" value="4">
			Other
		</label>
	
	</fieldset>

	<fieldset id="set-c">
		<legend>
			If your use of this journal is for research purposes, is this resource core to your topic?
			<div class="required">Required &ndash; Select one</div>
		</legend>
		<label for="c1">
			<input id="c1" type="radio" name="core_research" value="0">
			Yes
		</label>
		<label for="c2">
			<input id="c2" type="radio" name="core_research" value="1">
			No
		</label>
	</fieldset>

	<div id="sponsored-research-extra">
		<fieldset>
			<legend>
				Which department, division, or school do you belong to?
				<div class="optional">Optional &ndash; Enter text</div>
			</legend>
			<div class="text-control"><input type="text" name="academic_department" id="academic_department"></div>
		</fieldset>
		
		<fieldset class="detail-list">
			<legend>
				What's the name of your sponsor or fund source?
				<div class="optional">Optional &ndash; Enter text</div>
			</legend>
			<div class="text-control"><input type="text"  name="sponsor_proof" id="sponsor_proof"></div>
			<p><em>Choose one of the following options:</em></p>
			<ul>
				<li>Name of Sponsor or Fund Source<br/>
					<span>E.g., NIH, NSF, DOE, DOD, State of California, American Cancer Society, Genentech, Mellon Foundation, NEH, etc.</span>
				<li>Name of Principal Investigator/Researcher</li>
				<li>Name of Grant or Fund Number</li>
			</ul>
		</fieldset>
	</div>
	
	<fieldset id="ye-olde-submit-button">
		<input type="submit" name="submit" id="submit" value="Submit Survey">
	</fieldset>
	
</form>

