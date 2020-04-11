
		
		
			<?php

			$openaccess = 0;
			$requiredUserLevel = 2;
			
			require ('../../includes/config.inc.php');		
			
			require (BASE_URI.'/scripts/headerCreatorv2.php');
		
			//(1);
			//require ('/Applications/XAMPP/xamppfiles/htdocs/dashboard/esd/scripts/headerCreator.php');
		
			$formv1 = new formGenerator;
			$general = new general;
			$video = new video;
			$tagCategories = new tagCategories;
			$POEM = new POEM;
			
		
		
		
		foreach ($_GET as $k=>$v){
		
			$sanitised = $general->sanitiseInput($v);
			$_GET[$k] = $sanitised;
		
		
		}
		
		if (isset($_GET["id"]) && is_numeric($_GET["id"])){
			$id = $_GET["id"];
		
		}else{
		
			$id = null;
		
		}
		
		
		
		//TERMINATE THE SCRIPT IF NOT A SUPERUSER
		
		
		
		// Page content
		?>
		<!DOCTYPE html PUBLIC '-//W3C//DTD HTML 4.01//EN'>
		
		<html>
		<head>
		    <title>POEM data entry Form</title>  <!-- CHANGE -->
            <style>
               
               .text-gieqsGold {

color: rgb(238, 194, 120);

               }
               .bg-gieqsGold {

background-color: rgb(238, 194, 120);

}
.pointer {

	cursor: pointer;
	display: none;
}

                    @media only screen and (max-width: 992px) {
                        
						.pointer {

							display: block;
						}

                        #sticky {

                            
								border: rgb(238, 194, 120), 1px;
							   right: 1%;
								display: none;
							
								z-index: 10;
								
								background-color: #162e4d;
								top: 25%;
								max-width: 50%;
								min-width: 50%;
							
    						

                        }

                    }
					@media only screen and (min-width: 992px) {
                        
						.pointer {

							display: none;
						}

                        #sticky {

                            
								position: fixed;
								display: block;
								top: 25%;
								
    						

                        }

                    }

               

}
            </style>
		</head>
		
		<?php
		//include($root . "/scripts/logobar.php");
		include(BASE_URI . "/includes/topbar.php");
		include(BASE_URI . "/includes/naviv2.php");
		?>
		
		<body>
		
			<div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>
		
		    <div id='content' class='content'>
		
		        <div class='responsiveContainer container'>
                
			        <div class='row pt-4 mt-0'>
		                <div class='col-lg-9 col-xl-9 pr-6 pl-2'>
		                    <h2 style="text-align:left;">POEM data entry form</h2>
		                </div>
		
		                <!-- <div id="messageBox" class='col-2 text-center bg-secondary pt-2 pl-1'>
		                    <p>Enter some data here</p>
		                </div> -->
					</div>
					<div class='row pl-4 mt-0 d-flex justify-content-end'>
		                
						<a class="pointer"><i class="flip fas fa-chevron-down"></i><span class="h6 text-muted">&nbsp;show navigation</span></a>
		             
		
		                <!-- <div id="messageBox" class='col-2 text-center bg-secondary pt-2 pl-1'>
		                    <p>Enter some data here</p>
		                </div> -->
		            </div>

                    <div class="row pt-3">
                    <div id="left" class="col-lg-9 col-xl-9 pr-6 pl-4">
                    <div class="docs-content">
		
			        <p><?php
		
				        if ($id){
		
							$q = "SELECT  id  FROM  POEM  WHERE  id  = $id";
							if ($general->returnYesNoDBQuery($q) != 1){
								echo "Passed id does not exist in the database";
								exit();
		
							}
						}
		
		?></p>
		
		
			        <p>
		
					    
						<?php 
						
						$tableNameValues = "valuesPOEM";
						$tableNameSheet = "pageLayoutPOEM";


						include(BASE_URI . "/scripts/FormFunctionsGeneric.php");

						$iterationForm = 1;
						$sectionTitle = array();
						//$sectionTitle[0] = "";
						$sectionTitle[1] = "Patient Details";
						$sectionTitle[2] = "Previous Treatment";
						$sectionTitle[3] = "Symptoms";
						$sectionTitle[4] = "Previous Investigation";
						$sectionTitle[5] = "POEM details";
						$sectionTitle[6] = "Adverse Events";
						$sectionTitle[7] = "Admission";
						$sectionTitle[8] = "Post POEM investigations and results";
						$sectionTitle[9] = "FU completeness";
						$sectionTitle[10] = "Referrer Details";
					
					
						echo '<form id="esdLesion">';
					for($x = 1; $x <= 9; $x++) {
						
						if ($x == 3 || $x == 5 || $x == 7 || $x == 9){

							//echo "</div>";

						}
						echo "<div class=\"form-group text-left\">";
						//echo "<div class='row'>";
						//echo "<div class='col-5'>";
						echo "<fieldset id=\"".$sectionTitle[$x]."Section\" class=\"".$sectionTitle[$x]."\"><h4 style='text-align:left;'>".$sectionTitle[$x]."</h4>";
						//echo "<table class=\"comorbidity\">";
						include(BASE_URI . "/scripts/iterateFormGeneric.php");
						echo "<br/></fieldset><br>";
						//echo "</div>";
						//echo "<div class='col-1'>";
						//echo "</div>";
						if ($x == 2 || $x == 4 || $x === 6 || $x === 8){

							//echo "</div>";

						}
                        echo "<hr>";
                        echo "</div>";
						$iterationForm++;
					} 
						
		
?>
						    
		
					    
		
				        </p>
		
		
                        </form>
		        </div>
                </div>
				 
		
		    
			
        
        <div id="right" class="col-lg-3 col-xl-3 border-left">
        <div class="h-100 p-4"> 
        <div id="sticky" data-toggle="sticky" data-sticky-offset="100" class="is_stuck pr-3 mr-3 pl-2 pt-2" style="position: fixed; top: 140px;">
        <div id="messageBox" class='text-left text-white pb-2 pl-2 pt-2'></div><button type="button" class="close closeNav" data-hide="#sticky" aria-label="Close">
			<span aria-hidden="true" style="color:white !important;">&times;</span></button>
		                    
		                
                        <div id="errorWrapper" class="error alert alert-warning alert-flush alert-dismissible collapse bg-gieqsGold" role="alert">
    <strong>Check the form!</strong> <span id="error"></span><button type="button" class="close" data-hide="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div id="successWrapper" class="success alert alert-success alert-flush alert-dismissible collapse" role="alert">
    <strong>Success!</strong> <span id="success"></span><button type="button" class="close" data-hide="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
                        <!-- <div class="error text-warning  text-left pb-2">
                
                </div> -->
              <h6 class="mb-3 pl-2">Navigation</h6>
              
              <ul class="section-nav">
              
                <!-- <li class="toc-entry toc-h2"><a href="#examples">Sections</a> -->
                  <!-- <ul> -->
                  <?php

                    for($x = 1; $x <= 9; $x++) {
                        echo '<li class="toc-entry toc-h4"><a class="text-muted" href="#'.$sectionTitle[$x].'Section">'.$sectionTitle[$x].'</a></li>';
                        //echo "<button type=\"button\" class=\"btn ".$sectionTitle[$x]. "\">".$sectionTitle[$x]."</button>";

                    }

                            ?>
                             <!-- </ul> -->
                <!-- </li> -->
                
                <div class="d-none d-sm-inline-block align-items-center">
				<button class="btn btn-sm py-2 px-3 bg-dark-light mt-3 mb-3 mr-3" id="submitesdLesion">Submit</button>
				<button class="btn btn-sm py-2 px-3 bg-dark-light mt-3 mb-3 mr-3" data-toggle="modal" data-target="#modal-POEM" id="showPOEMReport">Show Report</button>
                </div>
            
            </div> <!--close sticky nav-->  
                                
            
        </div> <!--close right h-100 div-->
        </div> <!--close right column div-->
        </div> <!--close the row-->
        </div> <!--close container-->
		</div> <!--close content-->
		<!-- Modal -->
		<?php require BASE_URI . '/scripts/display/popupPOEMReport.php';?>
			
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
		
			 esdLesionPassed = $("#id").text();
		
			if ( esdLesionPassed == ""){
		
				var edit = 0;
		
			}else{
		
				var edit = 1;
		
			}
		
		
		
		 
 
 // Parsley full doc is avalailable here : https://github.com/guillaumepotier/Parsley.js/
		
			function fillForm (idPassed){
		
				disableFormInputs("esdLesion");
		
				esdLesionRequired = new Object;
		
				esdLesionRequired = getNamesFormElements("esdLesion");
		
				esdLesionString = '`id`=\''+idPassed+'\'';  //CHANGE
		
				var selectorObject = getDataQuery ("POEM", esdLesionString, getNamesFormElements("esdLesion"), 1);  //CHANGE FIRST
		
				//console.log(selectorObject);
		
				selectorObject.done(function (data){
		
					console.log(data);
		
					var formData = $.parseJSON(data);
		
		
				    $(formData).each(function(i,val){
					    $.each(val,function(k,v){
					        $("#"+k).val(v);
					        //console.log(k+' : '+ v);
					    });
		
				    });
				    
				    $("#messageBox").text("Editing POEM ID "+idPassed);
		
				    enableFormInputs("esdLesion");
		
				});
		
				
		
					if ($("right").find("button#deleteesdLesion").length == 0){

                        $("#right").find("button#submitesdLesion").after("<button class='btn btn-sm py-2 px-3 bg-dark-light mt-3 mb-3 ml-0' id='deleteesdLesion'>Delete</button>");


                    }else{

                    }
		
				
		
			}
		
		
			//delete behaviour
		
			function deleteesdLesion (){
		
				//esdLesionPassed is the current record, some security to check its also that in the id field
		
				if (esdLesionPassed != $("#id").text()){
		
					return;
		
				}
		
		
				if (confirm("Do you wish to delete this esdLesion?")) {
		
					disableFormInputs("esdLesion");
		
					var esdLesionObject = pushDataFromFormAJAX("esdLesion", "POEM", "id", esdLesionPassed, "2"); //CHANGE 2 and identifier
		
					esdLesionObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							if (data == 1){
		
								alert ("POEM deleted"); //CHANGE
								edit = 0;
								esdLesionPassed = null;
								window.location.href = siteRoot + "scripts/forms/POEMTable.php";  //CHANGE
								//go to esdLesion list
		
							}else {
		
							alert("Error, try again");
		
							enableFormInputs("esdLesion");
		
						    }
		
		
		
						}
		
		
					});
		
				}
		
		
			}
		
			function submitesdLesionForm (){
		
				//pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)
		
				if (edit == 0){
		
					var esdLesionObject = pushDataFromFormAJAX("esdLesion", "POEM", "id", null, "0"); //insert new object //CHANGE 2,3
		
					esdLesionObject.done(function (data){
		
						console.log(data);
		
						if (data){
		
                            //alert ("New esdLesion no "+data+" created");
                            $('#success').text("New POEM no "+data+" created");
			                //$('#successWrapper').show();
							$("#successWrapper").fadeTo(4000, 500).slideUp(500, function() {
								$("#successWrapper").slideUp(500);
							});
							edit = 1;
							$("#id").text(data);
							esdLesionPassed = data;
							fillForm(data);
		
		
		
		
						}else {
		
							alert("No data inserted, try again");
		
						}
		
		
					});
		
				} else if (edit == 1){
		
					var esdLesionObject = pushDataFromFormAJAX("esdLesion", "POEM", "id", esdLesionPassed, "1"); //insert new object //CHANGE 2,3
		
					esdLesionObject.done(function (data){
		
						console.log(data);
		
						if (data){
		
							if (data == 1){
		
								$('#success').text("Data updated");
			                    $("#successWrapper").fadeTo(4000, 500).slideUp(500, function() {
								$("#successWrapper").slideUp(500);
							});
								edit = 1;
		
							} else if (data == 0) {
		
							alert("No change in data detected");
		
						    } else if (data == 2) {
		
							alert("Error, try again");
		
						    }
		
		
		
						}
		
		
					});
		
		
		
		
				}
		
		
			}
		
			$(document).ready(function() {
		
				if (edit == 1){
		
					fillForm(esdLesionPassed);
		
				}else{
					
					$("#messageBox").text("New POEM");
					
				}
		
				
				$(function(){
    $("[data-hide]").on("click", function(){
        $("." + $(this).attr("data-hide")).hide();
        // -or-, see below
        // $(this).closest("." + $(this).attr("data-hide")).hide();
    });
});
                

                $(window).scroll(function() {
                        var scrollDistance = $(window).scrollTop();

                    
                        // Assign active class to nav links while scolling
                        $('fieldset').each(function(i) {
                                if ($(this).position().top <= scrollDistance) {
                                        $('.section-nav a.text-gieqsGold').removeClass('text-gieqsGold').addClass('text-muted');
                                        $('.section-nav a').eq(i).addClass('text-gieqsGold').removeClass('text-muted');
                                }
                        });
                }).scroll();
		
		
				
		
		
				$("#content").on('click', '#submitesdLesion', (function(event) {
			        event.preventDefault();
			        $('#esdLesion').submit();
		
		
			    }));
		
			    $("#content").on('click', '#deleteesdLesion', (function(event) {
			        event.preventDefault();
			        deleteesdLesion();
		
		
				}));
				
				$("#content").on('click', '.pointer', (function(event) {
			        
			        $('#sticky').toggle();
		
		
				}));
				
				$("#content").on('click', '.closeNav', (function(event) {
			        
			        $('#sticky').hide();
		
		
			    }));
                
                // override jquery validate plugin defaults
                $.validator.setDefaults({
                    highlight: function(element) {
                        $(element).closest('.form-control').addClass('is-invalid');
                    },
                    unhighlight: function(element) {
                        $(element).closest('.form-control').removeClass('is-invalid');
                    },
                    errorElement: 'div',
                    errorClass: 'input-group-btn pb-2 text-gieqsGold',
                    errorPlacement: function(error, element) {
                        
                        
                        if(element.parent('.input-group').length) {
                            error.insertAfter(element.parent());
                        } else {
                            error.insertAfter(element);
                        }
                    }
                });
                
				$("#esdLesion").validate({
		
			        invalidHandler: function(event, validator) {
			            var errors = validator.numberOfInvalids();
			            console.log("there were " + errors + " errors");
			            if (errors) {
			                var message = errors == 1 ?
			                    "1 field contains errors. It has been highlighted" :
                                + errors + " fields contain errors. They have been highlighted";
                                
                            
                            $('#error').text(message);
                            //$('div.error span').addClass('form-text text-danger');
			                //$('#errorWrapper').show();
							
							 $("#errorWrapper").fadeTo(4000, 500).slideUp(500, function() {
								$("#errorWrapper").slideUp(500);
							}); 
			            } else {
			                $('#errorWrapper').hide();
			            }
			        },rules: {
                    MRN: { required: true, number: true, maxlength: 8, },   //OF COURSE CHANGE
					
		
					
					  
				   DOB:{
								
					required: true, number: true,
					},
		
					
					  
				   comorbidity:{
								
		
					},
		
					
					  
				   comorbidity_other:{
								
					required: function(element){
							return $("#comorbidity").val() == "4";
							
						}
		
					},
		
					
					  
				   weight:{
								
		
					},
		
					
					  
				   medication_aspirin:{
								
		
					},
		
					
					  
				   medication_clopidogrel:{
								
		
					},
		
					
					  
				   medication_warfarin:{
								
		
					},
		
					
					  
				   medication_other:{
								
		
					},
		
					
					  
				   previous_treatment_PPI:{
								
		
					},
		
					
					  
				   previous_treatment_CACB:{
								
		
					},
		
					
					  
				   previous_treatment_NITR:{
								
		
					},
		
					
					  
				   previous_treatment_SSRI:{
								
		
					},
		
					
					  
				   previous_treatment_Dilatation:{
								
		
					},
		
					
					  
				   previous_treatment_botulinum:{
								
		
					},
		
					
					  
				   weight_loss:{
								
		
					},
		
					
					  
				   symptoms_regurg:{
								
		
					},
		
					
					  
				   symptoms_dysphagia:{
								
		
					},
		
					
					  
				   symptoms_chestpain:{
								
		
					},
		
					
					  
				   symptoms_heartburn:{
								
		
					},
		
					
					  
				   symptoms_other:{
								
		
					},
		
					
					  
				   Eckart_prior:{
								
		
					},
		
					
					  
				   prev_hrm:{
								
		
					},
		
					
					  
				   prev_hrm_rp:{
								
		
					},
		
					
					  
				   prev_hrm_relaxLES:{
								
		
					},
		
					
					  
				   prev_hrm_UES:{
								
		
					},
		
					
					  
				   prev_hrm_diagnosis:{
								
		
					},
		
					
					  
				   barium_swallow_date:{
								
		
					},
		
					
					  
				   barium_swallow_result:{
								
		
					},
		
					
					  
				   gastroscopy_prev:{
								
		
					},
		
					
					  
				   POEM_duration_total:{
								
		
					},
		
					
					  
				   POEM_duration_tunnel:{
								
		
					},
		
					
					  
				   POEM_GOJ_distance:{
								
		
					},
		
					
					  
				   POEM_incision_distance:{
								
		
					},
		
					
					  
				   POEM_incision_position:{
								
		
					},
		
					
					  
				   POEM_myotomy_length:{
								
		
					},
		
					
					  
				   POEM_perforation:{
								
		
					},
		
					
					  
				   POEM_IPB:{
								
		
					},
		
					
					  
				   POEM_current:{
								
		
					},
		
					
					  
				   POEM_number_clips:{
								
		
					},
		
					
					  
				   POEM_glucagon:{
								
		
					},
		
					
					  
				   POEM_buscopan:{
								
		
					},
		
					
					  
				   POEM_antibiotics:{
								
		
					},
		
					
					  
				   POEM_complication:{
								
		
					},
		
					
					  
				   POEM_complication_type:{
								
		
					},
		
					
					  
				   POEM_admission_days:{
								
		
					},
		
					
					  
				   post_symptoms:{
								
		
					},
		
					
					  
				   post_Eckart:{
								
		
					},
		
					
					  
				   post_HRM_resting:{
								
		
					},
		
					
					  
				   post_HRM_GOJ:{
								
		
					},
		
					
					  
				   _k_patient:{
								
		
					},
		
					
					  
				   post_HRM_relaxLOS:{
								
		
					},
		
					
					  
				   post_HRM_UESnormal:{
								
		
					},
		
					
					  
				   post_HRM_diagnosis:{
								
		
					},
		
					
					  
				   post_bariumswallow_date:{
								
		
					},
		
					
					  
				   post_bariumswallow_diagnosis:{
								
		
					},
		
					
					  
				   post_gastroscopy:{
								
		
					},
		
					
					  
				   post_gastroscopy_result:{
								
		
					},
		
					
					  
				   post_datecollected:{
								
		
					},
		
					
					  
				   current_weight:{
								
		
					},
		
					
					  
				   diagnosis:{
								
		
					},
		
					
					  
				   barium_swallow_done:{
								
		
					},
		
					
					  
				   ComplicationDetails:{
								
		
					},
		
					
					  
				   ProcedureDate:{
					required: true,
		
					},
		
					
					  
				   CompleteFUCheck:{
								
		
					},
		
					
					  
				   Referrer:{
								
		
					},
		
					
					  
				   ReferrerFax:{
								
		
					},
		
					
					  
				   ReferrerEmail:{
								
		
					},
		
					
					  
				   Firstname:{
								
		
					},
		
					
					  
				   Surname:{
								
		
					},
		
					
					  
				   IPSubcutEmphysema:{
								
		
					},
		
					
					  
				   IPSubcutEmphysemaMx:{
								
		
					},
		
					
					  
				   gastroscopy_prevdilated:{
								
		
					},
		
					
					  
				   gastroscopy_prevresistance:{
								
		
					},
		
					
					  
				   gastroscopy_prevopenCOJ:{
								
		
					},
		
					
					  
				   gastroscopy_prevspasm:{
								
		
					},
		
					
					  
				   gastroscopy_prevother:{
								
		
					},
		
					
					  
				   post_Eckart_dysphagia:{
								
		
					},
		
					
					  
				   post_Eckart_regurgitation:{
								
		
					},
		
					
					  
				   post_Eckart_pain:{
								
		
					},
		
					
					  
				   post_Eckart_wtloss:{
								
		
					},
		
					
					  
				   pre_Eckart_dysphagia:{
								
		
					},
		
					
					  
				   pre_Eckart_regurgitation:{
								
		
					},
		
					
					  
				   pre_Eckart_wtloss:{
								
		
					},
		
					
					  
				   pre_Eckart_pain:{
								
		
					},
					  
					},
			        submitHandler: function(form) {
		
			            submitesdLesionForm();
		
			          	console.log("submitted form");
		
		
		
			    }
		
		
		
		
		    });
		
		})
		
			</script>
		<?php
		
		    // Include the footer file to complete the template:
		    include(BASE_URI ."/includes/footer.html");
		
		
		
		
		    ?>
		</body>
		</html>