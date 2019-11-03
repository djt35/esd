
		
		<?php
		$openaccess = 0;
		$requiredUserLevel = 2;
		
		require ('../../includes/config.inc.php');		
		
		require (BASE_URI.'/scripts/headerCreator.php');
	
		//;
		
		$formv1 = new formGenerator;
		$general = new general;
		$video = new video;
		$tagCategories = new tagCategories;
		$esdLesion = new esdLesion;
		
		
		
		?>
		<!DOCTYPE html PUBLIC '-//W3C//DTD HTML 4.01//EN'>
		
		<html>
		<head>
		    <title>esdLesion Table</title>
		</head>
		
		<?php
		//include($root . "/scripts/logobar.php");
		
		include($root . "/includes/naviERCP.php");
		?>
		
		
		<body>
			
				
		    <div id='content' class='content'>
			    
		        <div class='responsiveContainer'>
			        
			        <div class='row'>
		                <div class='col-9'>
		                    <h2 style="text-align:left;">List of Upper GI ESD Lesions</h2>
		                </div>
		
		                <div id="messageBox" class='col-3 yellow-light narrow center'>
		                    <p><button id="newesdLesion" onclick="window.location.href = '<?php echo $roothttp;?>/scripts/forms/esdLesionForm.php';">New esdLesion</button></p>
		                </div>
		            </div>
			        
			        <div class='row'>
		                <div class='col-1'></div>
		
						<div class='col-10 narrow' style='overflow-x: scroll;'>
							<p style='text-align:left;'><?php echo "There are ".$esdLesion->numberOfRows()." lesions";?> </p>
							<br>
		                    <p><?php $general->makeTable("SELECT `_k_lesion` AS `Lesion ID`, `Dateofprocedure` AS `Date of Procedure` from `esdLesion` ORDER BY `Dateofprocedure` DESC"); ?></p>
		                </div>
		
		                <div class='col-1'></div>
		            </div>
		
			        
		        </div>
		        
		    </div>
		<script>
			switch (true) {
	case winLocation('endoscopy.wiki'):

		var rootFolder = 'https://www.endoscopy.wiki/esd/';
		break;
	case winLocation('localhost'):
		var rootFolder = 'http://localhost:90/dashboard/esd/';
		break;
	default: // set whatever you want
		var rootFolder = 'https://www.endoscopy.wiki/esd/';
		break;
}



    var siteRoot = rootFolder;
		
				
			$(document).ready(function() {
		
				$("#dataTable").find("tr");
		
				$(".content").on("click", ".datarow", function(){
					
					var id = $(this).find("td:first").text();
					
					//console.log(id);
					
					window.location.href = siteRoot + 'scripts/forms/esdLesionForm.php?id=' + id;
		
					
				})
				
				
			  	var titleGraphic = $(".title").height();
				var titleBar = $("#menu").height();
				$(".title").css('height',(titleBar));	
				
				
				$(window).resize(function () {
			    waitForFinalEvent(function(){
			      //alert("Resize...");
			      var titleGraphic = $(".title").height();
				  var titleBar = $("#menu").height();
				  $(".title").css('height',(titleBar));	
					
			    }, 100, 'Resize header');
					});
		
		
		
		    });
		
		
		
			</script>    
		    
		    
		<?php
		
		    // Include the footer file to complete the template:
		    include($root ."/includes/footer.html");
		
		
		
		
		    ?>
		</body>
		</html>
		
		