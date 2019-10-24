<?php
error_reporting(E_ALL);
session_start( );	
	$host = substr($_SERVER['HTTP_HOST'], 0, 5);
if (in_array($host, array('local', '127.0', '192.1'))) {
    $local = TRUE;
} else {
    $local = FALSE;
}

if ($local){

    $root = $_SERVER['DOCUMENT_ROOT'].'/dashboard/esd/';
    $roothttp = 'http://' . $_SERVER['HTTP_HOST'].'/dashboard/esd/';
    require($_SERVER['DOCUMENT_ROOT'].'/dashboard/esd/includes/config.inc.php');
}else{
    $root = $_SERVER['DOCUMENT_ROOT'].'/esd/';
    $roothttp = 'http://' . $_SERVER['HTTP_HOST'].'/esd/';

    require($_SERVER['DOCUMENT_ROOT'].'/esd/includes/config.inc.php');

}

$location = $roothttp . 'elearn.php';



//echo 'hello';

if (!isset($_SESSION['user_id'])) {
			 		
				    // Need the functions:
				     require ($root . 'includes/login_functions.php');
				     redirect_login($location);
			 }



$general = new general;



function ne($v) {
    return $v != '';
}

//required GET variables  update, identifierKey, identifier, table

// update 0 INSERT INTO

// update 1 UPDATE

// update 2 DELETE


//check count of get variables

if (count($_GET) > 0){

	


	
	//sanitise GET
	
	
	
	
	$data = $general->sanitiseGET($_GET);
	
	foreach ($data as $key=>$value){
		
		$GLOBALS[$key] = $value;
		
	}
	
	//print_r($GLOBALS);
	//print_r($data);
	
	if (!isset($table)){
		
		echo 'Table key not set';
		exit();	
		
	}
	
	if (!isset($update)){
		
		echo 'Update key not set';
		exit();	
		
	}
	
	if ($update == 1){
		
		if (!isset($identifierKey) || !isset($identifier)){
		
		echo 'Update identifier key not set';
		exit();	
		
		}
		
		if (!ne($identifierKey) || !ne($identifier)){
			
			exit();
			
		}
		
	}
	
	if ($update == 2){
		
		if (!isset($identifierKey) || !isset($identifier)){
		
		echo 'Update identifier key not set';
		exit();	
		
		}
		
		
	}
	
	//split name field into two
	
	
	
	//print_r($data);
	
	
	
	
	//print_r($keys);
	//print_r($values);
	
	
	//echo $hello;
	
	
	function rempty ($var)
	{
		return !($var == "" || $var == null);
	}
	
	
	
	// if a new field
	
	if ($update == 0){
		
		unset($data['update']);
		unset($data['table']);
		unset($data['identifierKey']);
		unset($data['identifier']);
		
		/*foreach ($data as $key=>$value){
			
			if ($value == ''){
				
				$data[$key] = 'NULL';
				
			}
			
		}*/

		

		//print_r($data);

		$data = array_filter($data, 'rempty');

		$values = implode('\', \'', $data);
		$keys = array_keys($data);
		/*foreach ($keys as $key => $value) {
			if ($value == ''){

				$value = 'NULL';

			}
		}*/

		print_r($keys);

		
//$string = implode('-',array_filter($array, 'rempty'));
		//$keys = implode('`, `', array_filter($keys, 'rempty'));
		$keys = implode('`, `', $keys);
		echo $keys; //if null should not enter the key
		
		
		$q = "INSERT INTO `$table` (`$keys`) VALUES ('$values')";
		
		echo $q;
				
		echo $general->returnWithInsertID($q);
		
		//echo $general->connection->conn->error_list;		
		
		
		
	}else if ($update == 1){
		
		//if this is an update check the id field exists
		
		$q = "SELECT `$identifierKey` FROM `$table` WHERE `$identifierKey` = $identifier";
		
		//echo $q;
		
		if ($general->returnYesNoDBQuery($q) == 1){
			
			unset($data['update']);
			unset($data['identifierKey']);
			unset($data['identifier']);
			unset($data['table']);

			$data = array_filter($data, 'rempty');
			
			foreach ($data as $key => $value) {
	        	$value = "'$value'";
	        	$key = "`$key`";
				$updates[] = "$key = $value";      
			}
			
			$set = implode(', ', $updates);
			
			$q = "UPDATE `$table` SET $set WHERE `$identifierKey` = $identifier" ;
			
			//echo $q;
			echo $general->returnYesNoDBQuery($q);
			
			//use returnYesNoDBQuery for this query
			
		}else{
			
			echo 'Invalid identifier or identifier key passed';
			
		}
		
		
	}else if ($update == 2){
		
		//if this is an delete check the id field exists
		unset($data['update']);
		unset($data['identifierKey']);
		unset($data['identifier']);
		unset($data['table']);
		
		$q = "SELECT `$identifierKey` FROM `$table` WHERE `$identifierKey` = $identifier";
		
		//echo $q;
		
		if ($general->returnYesNoDBQuery($q) == 1){
			
			
			$q = "DELETE FROM `$table` WHERE `$identifierKey` = $identifier" ;
			
			//echo $q;
			echo $general->returnYesNoDBQuery($q);
			//use returnYesNoDBQuery for this query
			
		}else{
			
			echo 'Invalid identifier or identifier key passed';
			
		}
		
		
	}
	
	
	
	
	
	
	//remove the preset global variables
	
	foreach ($data as $key=>$value){
		
		unset($GLOBALS[$key]);
	
		
	}

}else{
	
	echo 'No variables passed';
	
}

$general->endGeneral();

