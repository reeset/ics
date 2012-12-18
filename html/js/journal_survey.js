$(document).ready(function() {

	//---
	// Prepare "mines_survey" form
	//---
	document.mines_survey.reset();
	$("#submit").attr("disabled","disabled");
	$("input[type=submit]").attr("value","Incomplete");
	
	//---
	// iDevice clickable label fix
	//---
	$("label").attr("onclick","");

	//---
	// Add fancy checkmark to labels onclick	
	//---
	$("#set-a input[type=radio]").click(function(){ 
		$("#set-a label").removeClass("checked");
		$(this).parent().addClass("checked");
	});
	
	$("#set-b input[type=radio]").click(function(){ 
		$("#set-b label").removeClass("checked");
		$(this).parent().addClass("checked");
	});
	
	$("#set-c input[type=radio]").click(function(){ 
		$("#set-c label").removeClass("checked");
		$(this).parent().addClass("checked");
	});
	
	//---
	// Toggle "sponsored-research-extra" questions
	//---
	$("#c1").click(function(){ 
		$("#set-c .note").hide();
	});

	$("#c2").click(function(){ 
		$("#set-c .note").hide();
	});

	$("#c3").click(function(){ 
		$("#set-c .note").hide();
	});

	$("#c4").click(function(){ 
		$("#set-c .note").hide();
	});

	
	//---
	// Activate submit button on form completion
	//---
	$("input").live("change", function(){activeVerify();});
	$("input[type=text]").keyup(function(event){activeVerify();});

});

function activeVerify(){
	
	$("#submit").attr("disabled","disabled");
	
	var
		in1 = $("input[name=research_status]:checked").length, 
		in3 = $("input[name=core_research]:checked").length;
		switch(in1+in3)
		{
			case 1:	$("input[type=submit]").attr("value","Almost done...");break;
			case 2:	$("input[type=submit]").attr("value","Submit Survey");break;
		}

		if(in1+in3 === 2){
			$("#submit").removeAttr("disabled");
		}

}

function expandall() {
  $("#c1 + div").show();
  $("#c2 + div").show();
  $("#c3 + div").show();
  $("#c4 + div").show(); 
}




