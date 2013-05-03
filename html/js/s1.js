$(document).ready(function() {

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

        $("#set-f input[type=radio]").click(function(){
                $("#set-f label").removeClass("checked");
                $(this).parent().addClass("checked");
        });

        $("#set-g input[type=radio]").click(function(){
                $("#set-g label").removeClass("checked");
                $(this).parent().addClass("checked");
        });
	
        $("#set-h input[type=radio]").click(function(){
                $("#set-h label").removeClass("checked");
                $(this).parent().addClass("checked");
        });

        $("#set-i input[type=radio]").click(function(){
                $("#set-i label").removeClass("checked");
                $(this).parent().addClass("checked");
        });

        $("#set-j input[type=radio]").click(function(){
                $("#set-j label").removeClass("checked");
                $(this).parent().addClass("checked");
        });


        $("#a1").click(function(){
                $("#set-a .comment").hide();
        });

        $("#a2").click(function(){
                $("#set-a .comment").hide();
        });

 	$("#a3").click(function(){
                $("#set-a .comment").hide();
        });

	$("#a4").click(function(){
                $("#set-a .comment").hide();
        });

 	$("#a5").click(function(){
                $("#set-a .comment").show();
        });


        $("#f1").click(function(){
                $("#set-f .comment").hide();
        });

        $("#f2").click(function(){
                $("#set-f .comment").hide();
        });

        $("#f3").click(function(){
                $("#set-f .comment").hide();
        });

        $("#f4").click(function(){
                $("#set-f .comment").show();
        });


        $("#g1").click(function(){
                $("#set-g .comment").hide();
        });

        $("#g2").click(function(){
                $("#set-g .comment").hide();
        });

        $("#g3").click(function(){
                $("#set-g .comment").hide();
        });

        $("#g4").click(function(){
                $("#set-g .comment").hide();
        });

        $("#g5").click(function() {
		$("#set-g .comment").hide();
	});

        $("#g6").click(function(){
                $("#set-g .comment").show();
        });


        $("#j1").click(function(){
                $("#set-j .comment").hide();
        });

        $("#j2").click(function(){
                $("#set-j .comment").hide();
        });

        $("#j3").click(function(){
                $("#set-j .comment").hide();
        });

        $("#j4").click(function(){
                $("#set-j .comment").hide();
        });

        $("#j5").click(function() {
                $("#set-j .comment").hide();
        });

        $("#j6").click(function(){
                $("#set-j .comment").hide();
        });

        $("#j7").click(function() {
                $("#set-j .comment").hide();
        });
        
        $("#j8").click(function(){
                $("#set-j .comment").show();
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
		in1 = $("input[name=s1_1]:checked").length, 
		in3 = $("input[name=s1_2]:checked").length;
		in4 = $("input[name=s1_3]:checked").length;
	        in5 = $("input[name=s1_8]:checked").length;

		switch(in1+in3+in4+in5)
		{
			
			case 4:	$("input[type=submit]").attr("value","Submit Survey");break;
			default: $("input[type=submit]").attr("value","Almost done...");break;
		}

		if(in1+in3+in4+in5 === 4){
			$("#submit").removeAttr("disabled");
		}

}

function expandall() {
  $("#c1 + div").show();
  $("#c2 + div").show();
  $("#c3 + div").show();
  $("#c4 + div").show(); 
}




