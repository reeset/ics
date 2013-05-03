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
			Why are you using this resource
			<div class="required">Required &ndash; Select one</div>
		</legend>
		<label for="a1">
			<input id="a1" type="radio" name="s1_1" value="1">
			For homework/course assignment
		</label>
		<label for="a2">
			<input id="a2" type="radio" name="s1_1" value="2">
			Curriculum development/instruction
		</label>
		<label for="a3">
		<input id="a3" type="radio" name="s1_1" value="3">
			My research (faculty/graduate student)
		</label>
                <label for="a4">
		<input id="a4" type="radio" name="s1_1" value="4">
			Recreation
		</label>
                <label for="a5">
			<input id="a5" type="radio" name="s1_1" value="5">
			Other
                </label>
		<label class="comment" for="a5_other" style="display:none;">
		Comment
		<div class="text-control"><input size="100%" type="text" name="s1_1_other" id="a5_other"></div>
		</label>
	</fieldset>

	<fieldset id="set-f">
		<legend>
			Are you using this resource for
			<div class="required">Required &ndash; Select one</div>
		</legend>
		<label for="f1">
		   <input id="f1" type="radio" name="s1_2" value="1">
		   For your research
		</label>
		<label for="f2">
                   <input id="f2" type="radio" name="s1_2" value="2">
                   To assist a student
                </label>
	 	<label for="f3">
                   <input id="f3" type="radio" name="s1_2" value="3">
                   To develop a course or course assignment
                </label>	
		<label for="f4">
		   <input id="f4" type="radio" name="s1_2" value=4">
		   Other
		</label>
		<label class="comment" for="f4_other" style="display:none;">
		    Comments
		    <div class="text-control"><input size="100%" type="text" name="s1_2_other" id="f4_other"></div>
		</label>
	</fieldset>


	<fieldset id="set-g">
	  <legend>
		This resource is
		<div class="required">Required &ndash; Select one</div>
	  </legend>
	  <label for="g1">
		<input type="radio" id="g1" name="s1_3" value="1">
		core to my research
	  </label>
	  <label for="g2">
		<input type="radio" id="g2" name="s1_3" value="2">
		core to my teaching
	  </label>
	  <label for="g3">
	       <input type="radio" id="g3" name="s1_3" value="3">
	       supplemental to my research
	  </label>
	  <label for="g4">
	   	<input type="radio" id="g4" name="s1_3" value="4">
	        supplemental to my teaching
	  </label>
	  <label for="g5">
		<input type="radio" id="g5" name="s1_3" value="5">
		I have not used this resource before
	  </label>
	  <label for="g6">
		<input type="radio" id="g6" name="s1_3" value="6">
		Other
 	  </label>
	  <label class="comment" for="g6_other" style="display:none;">
		 Comments
		 <div class="text-control"><input size="100%" type="text" name="s1_3_other" id="g6_other"></div>
	  </label>
    </fieldset>
	 

<script>
  $(function() {
    $( "#slider-range-max" ).slider({
      range: "max",
      min: 0,
      max: 70,
      value: 0,
      slide: function( event, ui ) {
        $( "#amount" ).val( "Price: $" +  ui.value );
      }
    });
    $( "#amount" ).val( "Price: $" + $( "#slider-range-max" ).slider( "value" ) );
  });

  </script>

	<fieldset id="set-b">
	  <legend>
	     If you were to give a monetary value for access to this resource what would it be?
          </legend>
	  <label class="comment" for="slider-range-max">
	  <input type="text" name = "s1_4" id="amount" style="border:0;font-weight:bold;">
	  <br />
	  <div id="slider-range-max"></div>
	  </label>
	</fieldset>

	<fieldset id="set-c">
		<legend>
			How urgently do you need this article
			<div class="required">Required &ndash; Select one</div>
		</legend>
		<label for="c1">
			<input id="c1" type="radio" name="s1_5" value="today">
		 	Today	
		</label>
		<label for="c2">
			<input id="c2" type="radio" name="s1_5" value="tomorrow">
			Tomorrow
		</label>
		<label for="c3">
			<input id="c3" type="radio" name="s1_5" value="3_days">
			3 Days
		</label>
		<label for="c4">
			<input id="c4" type="radio" name="s1_5" value="not_urgent">
			Not urgent
		</label>
	</fieldset>

	<fieldset id="set-h">
	    <legend>
		How has electronic access to library resources such as this impacted your research, teaching or work?
	    </legend>
	    <label class="comment" for="h1_comment">
	       <div class="text-control"><textarea rows="4" cols="100%"  name="s1_6" id="h1_comment"></textarea></div> 
	    </label>
	</fieldset>

        <fieldset id="set-i">
            <legend>
                What will access to this library resource help you to do?
            </legend>
            <label class="comment" for="i1_comment">
               <div class="text-control"><textarea rows="4" cols="100%"  name="s1_7" id="i1_comment"></textarea></div>              
            </label>
        </fieldset>


	<fieldset id="set-j">
	   <legend>
	      Mark your primary affiliation
	      <div class="required">Required &ndash; Select one</div>
	   </legend>
	   <label for="j1">
		<input type="radio" id="j1" name="s1_8" value="1">
	        Undergraduate student
	   </label>
	   <label for="j2">
	        <input type="radio" id="j2" name="s1_8" value="2">
	        Graduate student
	   </label>
	   <label for="j3">
	        <input type="radio" id="j3" name="s1_8" value="3">
	        Instructor
	   </label>
	   <label for="j4">
		<input type="radio" id="j4" name="s1_8" value="4">
		Faculty
	   </label>
	   <label for="j5">
		<input type="radio" id="j5" name="s1_8" value="5">
		Researcher
	   </label>
	   <label for="j6">
		<input type="radio" id="j6" name="s1_8" value="6">
		Staff
	   </label>
	   <label for="j7">
		<input type="radio" id="j7" name="s1_8" value="7">
		Non-OSU/Community patron
	   </label>
	   <label for="j8">
		<input type="radio" id="j8" name="s1_8" value="8">
		Other
	  </label>
	  <label class="comment" for="j8_other" style="display:none;">
	       Comments
                 <div class="text-control"><input size="100%" type="text" name="s1_8_other" id="j8_other"></div>
          </label>
	</fieldset>

	<fieldset id="set-d">
	    <legend>
		In what department, division or school do you mostly work?
		<div class="required">Required &ndash; Select one</div>
	    </legend>
	    <label class="comment" for="s1_9">
	    Select one:
	    <select id="s1_9" name="s1_9">
		<option value="ceoas">CEOAS</option>
		<option value="cla">CLA</option>
		<option value="cob">COB</option>
		<option value="cos">COS</option>
		<option value="pharmacy">Pharmacy</option>
		<option value="coe">COE</option>
		<option value="engineering">Engineering</option>
		<option value="grad_school">Graduate School</option>
		<option value="public_health_and_human_sciences">Public Health &amp; Human Sciences</option>
		<option value="vet_med">Veterinary Medicine</option>
		<option selected value="decline">Decline</option>
	   </select>
	  </label>
	</fieldset>


	
	<fieldset id="ye-olde-submit-button">
		<input type="submit" name="submit" id="submit" value="Submit Survey">
	</fieldset>
	
</form>

