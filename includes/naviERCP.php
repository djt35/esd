<?php

$host = substr($_SERVER['HTTP_HOST'], 0, 5);
if (in_array($host, array('local', '127.0', '192.1'))) {
    $local = TRUE;
} else {
    $local = FALSE;
}

if ($local){

    $root = $_SERVER['DOCUMENT_ROOT'].'/dashboard/esd/';
    $roothttp = 'http://' . $_SERVER['HTTP_HOST'].'/dashboard/esd/';
    //require($_SERVER['DOCUMENT_ROOT'].'/dashboard/esd/includes/config.inc.php');
}else{
    $root = $_SERVER['DOCUMENT_ROOT'].'/esd/';
    $roothttp = 'http://' . $_SERVER['HTTP_HOST'].'/esd/';

    //require($_SERVER['DOCUMENT_ROOT'].'/esd/includes/config.inc.php');

}

new users;


echo '<div class="navbar">';
 
  
  
   $userid = $_SESSION['user_id'];
				 if ($userid){
  
  echo '<a href="' . $roothttp . 'index.php">Home</a>';
  
 // echo '<a href="' . $roothttp . 'scripts/forms/creatormenu.php">ERCP Menu</a>';
  
  echo '<div class="dropdown topnav"><button class="dropbtn">ERCP&#9660;</button>
			  			<div class="dropdown-content">
			  				
			  				<a href="' . $roothttp . 'scripts/forms/ERCPpatientForm.php">New patient</a>
							  <a href="' . $roothttp . 'scripts/forms/ERCPpatientTable.php">Edit patients</a><hr>
							  <a href="' . $roothttp . 'scripts/forms/ERCPprocedureForm.php">New procedure</a>
			  				<a href="' . $roothttp . 'scripts/forms/ERCPprocedureTable.php">Edit procedures</a>
			  				
			  				
			  			</div>
			  		</div>';
			  		
	echo '<div class="dropdown topnav"><button class="dropbtn">Upper GI ESD&#9660;</button>
			  			<div class="dropdown-content">
			  				
			  				<a href="' . $roothttp . 'scripts/forms/esdLesionForm.php">New ESD lesion</a><hr>
			  				<a href="' . $roothttp . 'scripts/forms/esdLesionTable.php">Edit ESD lesions</a>
			  				
			  				
			  			</div>
			  		</div>';
echo '  


  
  
  

  
  
  ';
  }
  
  echo "<div id='userDisplay'>";
				 $firstname =  $_SESSION['firstname'];
				 $surname = $_SESSION['surname'];
				 $userid = $_SESSION['user_id'];
				 if ($userid){
					 echo '<div class="dropdown topnav"><button class="dropbtn">Logged in&#9660;</button>
					 
					 <div class="dropdown-content" id="myDropdown">
			  				
			  				<a class="logout">Logout</a>
			  				
			  				
			  			</div>
					 
					 
					 </div>';
				 }else{
					 
					 echo '<div class="dropdown topnav"><button class="dropbtn login">Login for access</button></div>';
				 }
			 echo '</div>';
				 
							 //<br>User: $firstname $surname </div>";  
			//echo '<div class="darkClass"></div>';
			echo "<div id='userID' style='display:none;'>";
			echo $_SESSION['user_id'];
			echo "</div>";
			echo "</div>";



 (0); 
/* 
echo '
<div class="dropdown">
    <button class="dropbtn">Documents 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="iACEethics.php">Ethics Documents for iACE</a>
      <a href="PROSPERdocs.php">Ethics Documents for PROSPER</a>
    </div>
  </div>';*/
 


	