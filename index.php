<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <title>Paper Army 1.0 by Mecharius Projects</title>
        
        <link type="text/css" href="include/style.css" rel="stylesheet" />
        <link type="text/css" href="css/dot-luv/jquery-ui-1.8.14.custom.css" rel="stylesheet" />
        <link type="text/css" href="css/jquery.contextmenu.css" rel="stylesheet" />
        
        <script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.14.custom.min.js"></script>
        <script type="text/javascript" src="js/jquery.printElement.min.js"></script>
        <script type="text/javascript" src="js/jquery.contextmenu.js"></script>
        <script type="text/javascript">
//<![CDATA[
                
            // setup the interface
            $(function(){

                    
                    // Slider for ranks
                    $('#rank_slider').slider({
                            range: "min",
                            min: 1,
                            max: 10,
                            slide: function( event, ui ) {
                                    $( "#rank_slider_val" ).val( ui.value );
                            }
                    });
                    // Slider for files
                    $('#file_slider').slider({
                            range: "min",
                            min: 1,
                            max: 15,
                            slide: function( event, ui ) {
                                    $("#file_slider_val").val(ui.value);
                            }
                    });
                    $("#file_slider_val").val(1);
                    $("#rank_slider_val").val(1);
                    
                    // print etc buttons
                    $( "#print_button" ).button({
                        icons: {
                                primary: "ui-icon-print"
                        }
                    });
                    $( "#cleardraw_button" ).button({
                        icons: {
                                primary: "ui-icon-trash"
                        }
                    });
                    $("#undo_button").button({
                        icons: {
                            primary: "ui-icon-arrowreturnthick-1-w"
                        }
                    });
                    $( "#add_text_button" ).button({
	                    icons: {
                            primary: "ui-icon-circle-plus"
                        }
                    });
                                
                    // radio buttons
                    $('#base_size').buttonset();
                    
                    // set default base size value
                    $("#baseWidth").val(2);
                    $("#baseHeight").val(2);
                    
                    // context menu setup
                    $(".squad_border").contextMenu({
						menu: 'shape_context_menu'
					},
						function(action, el, pos) {
						alert(
							'Action: ' + action + '\n\n' +
							'Element ID: ' + $(el).attr('id') + '\n\n' + 
							'X: ' + pos.x + '  Y: ' + pos.y + ' (relative to element)\n\n' + 
							'X: ' + pos.docX + '  Y: ' + pos.docY+ ' (relative to document)'
							);
					});
				});
        //]]>
        </script>
        <script type="text/javascript" src="include/paperarmy.js"></script>
    </head>
    <body>
        <div id="toolbox">
            <!--<div id="toggle_toolbox"> << Hide </div>-->
            <!-- logo area -->

            <div id="logo">
                <img src="include/logo.png" />
            </div>
            <!-- function buttons -->

            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <button id="print_button">Print</button> 
            <button id="cleardraw_button">Clear</button> 
            <button id="undo_button">Undo Last</button>
            <br />
            <input type="text"id="text_to_add" /> 
            <button id="add_text_button">Add Text</button> 
            
            <!-- select unit size -->
            <br /><br />
            <p>
                Number of ranks: <input type="text" id="rank_slider_val" class="slider_input" />
            </p>
            <div id="rank_slider"></div>
            <p>
                Number of files: <input type="text" id="file_slider_val" class="slider_input" />
            </p>
            <div id="file_slider"></div>
            
            <!-- select base size -->

            <div id="base_size">
                <input type="radio" id="radio1" name="radio" checked /><label for="radio1">Foot</label>
                <input type="radio" id="radio2" name="radio" /><label for="radio2">Large</label>
                <input type="radio" id="radio3" name="radio" /><label for="radio3">Cavalry</label>
                <input type="radio" id="radio4" name="radio" /><label for="radio4">Monster</label>
            </div>

            <div class="base_size_container">
                <input class="base_size_input" id="baseWidth" />cm by <input class="base_size_input" id="baseHeight" />cm
                <p>Edit the values above if you want a custom base size</p>
            </div>
            
	        <div id="debug"s>{DEBUG}</div>
        </div>

        <div id="draw_area"></div>

        <div id="retoggle_toolbox">Show Toolbox</div>
        
    	<ul id="shape_context_menu">
    		<li>Delete</li>
    		<li>Select Base Size
    			<ul>
    				<li>Infantry</li>
    				<li>Large Infantry</li>
    				<li>Cavalry</li>
    				<li>Monster</li>
    			</ul>
    		</li>
    		<li>Edit</li>
    	</ul>
    </body>
</html>