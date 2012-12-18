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

if (strpos($dest_url, ".proxy.library") !== false) {
   if (strpos($dest_url, "ezproxy.proxy.library")===false) {
      $dest_url = str_replace(".proxy.library.oregonstate.edu", "", $dest_url);
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
        <input type="hidden" name="action" id="action" value="post">	
	<input type="hidden" name="destination_url" id="destination_url" value="<?=urlencode($dest_url)?>">
	<input type="hidden" name="location" id="location" value="<?=$_SERVER['REMOTE_ADDR']?>">
        <input type="hidden" name="is_mobile" id="is_mobile" value="<?=$ismobile?>">
        <input type="hidden" name="user_agent" id="user_agent" value="<?=$user_agent?>">
	
	
	<fieldset id="set-a">
		<legend>
			What's your classification?
			<div class="required">Required &ndash; Select one</div>
		</legend>
		<label for="a1">
			<input id="a1" type="radio" name="patron_status" value="1">
			OSU Undergraduate Student
		</label>
		<label for="a2">
			<input id="a2" type="radio" name="patron_status" value="2">
   			OSU Graduate Student
			<div class="note">Engineering, Forestry, Pharmacy, &amp; other Graduate/Professional Schools</div>
		</label>
		<label for="a3">
		<input id="a3" type="radio" name="patron_status" value="3">
			OSU Faculty
		</label>
                <label for="a4">
		<input id="a4" type="radio" name="patron_status" value="4">
			OSU Staff (Including courtesy appointments)
		</label>
                <label for="a5">
                <input id="a5" type="radio" name="patron_status" value="5">
                        Other OSU
			<div class="note">OSU affiliations not described above</div>
                </label>
	
		<label for="a6">
			<input id="a6" type="radio" name="patron_status" value="6">
			Non-OSU
		</label>
	</fieldset>

	<fieldset id="set-c">
		<legend>
			Why are you using the requested resource? <a href="#" onclick="expandall();"><img src="<?=IMAGE_PATH?>small_help.png" border="0" /></a>
			<div class="required">Required &ndash; Select one</div>
		</legend>
		<label for="c1">
			<input id="c1" type="radio" name="research_type" value="0">
			Sponsored (Funded) Research 
			<div class="note">
				<ul>
					<li>Research funded by grants or contracts from federal, state, or local governments</li>
					<li>Research funded for grants or contracts from a foundation or other outside party</li>
					<li>Separately budgeted research projects funded by University money</li>
					<li>Research training</li>
				</ul>
				<p><em>Category includes only specially funded research projects, which are separately budgeted and accounted for as organized research projects by the institution.</em></p>
			</div>
		</label>
		<label for="c2">
			<input id="c2" type="radio" name="research_type" value="1">
			Instruction/&#8203;Education/&#8203;Departmental (Non-Funded) Research
			<div class="note">
				<ul>
					<li>All teaching and training activities</li>
					<li>All student coursework, including term papers</li>
					<li>Theses, dissertations, etc.</li>
					<li>Preparation for classes</li>
					<li>Sponsored training (excluding sponsored training on research techniques, which is included in the Sponsored (Funded) Research Projects definition)</li>
					<li>Independence faculty research, writing, and other scholarly activities (includes all research activities not separately budgeted for as sponsored research projects)</li>
				</ul>
			</div>
		</label>
		<label for="c3">
			<input id="c3" type="radio" name="research_type" value="2">
			Other Sponsored Activities (Public Service)
			<div class="note">
				<ul>
					<li>Sponsored public service projects</li>
					<li>Community action and service programs</li>
					<li>Testing agreements</li>
				</ul>
			</div>
		</label>
		<label for="c4">
			<input id="c4" type="radio" name="research_type" value="3">
			Other Institutional Activities
			<div class="note">
				<ul>
					<li>Recreational usages (not for class)</li>
					<li>Administrative work, including grant preparation</li>
					<li>Patient care</li>
					<li>All other purposes not identified in other categories</li>
				</ul>
			</div>
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

