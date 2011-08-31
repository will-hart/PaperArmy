$( function () {
	
	// script to toggle out the  toolbox
	$("#toggle_toolbox,  #retoggle_toolbox").click( function(e) {
		e.preventDefault();
		$("#toolbox").toggle('slow');
		$("#untoggle_toolbox").toggle('slow');
		
		// reposition the drawing area
		var pos = $("#draw_area").offset();
		var lft = (pos.left == 301 ? 0 : 301);
		$("#draw_area").offset({left: lft, top:0 });
	});
	
	// handle clearing the draw area
	$("#cleardraw_button").click( function() {
		$("#draw_area").empty();
	});
	
	// handle undoing the last action
	$("#undo_button").click( function() {
		$("#draw_area div.squad_border, #draw_area div.descriptive_text").filter(":last").remove();
	});
	
	// handle printing of the draw_area div
	$("#print_button").click(function() {
		// store the left position and move to 0,0
		var lft = $("#draw_area").offset().left;
		$("#draw_area").offset({left:0, top:0});
		
		// print
		$("#draw_area").printElement();
		
		// restore
		$("#draw_area").offset({left:lft,top:0});
	});


	// code for setting base size through the radio buttons
	$("#radio1").click( function() { // infantry
		$("#baseWidth").val(2);
		$("#baseHeight").val(2);
	});
	$("#radio2").click( function() { // large infantry
		$("#baseWidth").val(2.5);
		$("#baseHeight").val(2.5);
	});
	$("#radio3").click( function() { // cavalry
		$("#baseWidth").val(2.5);
		$("#baseHeight").val(4);
	});
	$("#radio4").click( function() { // Monster
		$("#baseWidth").val(4);
		$("#baseHeight").val(4);
	});

	// code to handle adding a text box
	$("#add_text_button").click( function (e) {
		
		if ($("#text_to_add") == null) {
			alert("Please enter some text and try again");
		} else {
			// add the text
			var add_div = "<div class='descriptive_text' style='left:0;top:0'>"+$("#text_to_add").val()+"</div>";
			$(add_div).appendTo("#draw_area");
			
			// make text draggable
			$(".descriptive_text").draggable({containment: "#draw_area", scroll: false});
		}
	});



	// script to handle drawing on click
	$("#draw_area").click( function(e) {
		// constants
		var squadBuffer = 10;
		var cmToPixels = 38;
		
		// work out where we clicked and the position for the first div
		var pos = $("#draw_area").offset();
		var initX = e.pageX - pos.left;
		var initY = e.pageY - pos.top;
		var currX = 0;
		var currY = 0;
		
		// work out how many ranks and files to print
		var ranks = $("#rank_slider_val").val();
		var files = $("#file_slider_val").val();
		
		// work out the base size
		var baseWidth = $("#baseWidth").val() * cmToPixels; // temp, get from form inputs
		var baseHeight = $("#baseHeight").val() * cmToPixels; // temp, get from form inputs
		
		// work out the overall squad size
		var squadWidth = files * baseWidth + 2 * squadBuffer;
		var squadHeight = ranks * baseHeight + 2 * squadBuffer;
		
		// write the divs. 
		var i,j;
		var add_div = "";
		for (i=0; i<files; i++) {
			for (j=0; j<ranks; j++) {
				currX = squadBuffer + baseWidth*i;
				currY = squadBuffer + baseHeight*j;
				add_div += "\t<div class='model_base' style='top:" + currY + "px;left:" + currX + "px;width:"+baseWidth+"px;height:"+baseHeight+"px;'>&nbsp;</div>\n"; 
			}
		}
			
		// add the squad border
		add_div = "<div class='squad_border' style='left:" + initX + "px;top:" + initY + "px;height:" + squadHeight + "px;width:" + squadWidth + "px;'>" + 
						add_div + "</div>";
		$(add_div).appendTo("#draw_area");
		
		// make squads draggable
		$(".squad_border").draggable({containment: "#draw_area", scroll: false})
	});
	
});
