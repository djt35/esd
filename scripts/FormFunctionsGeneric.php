<?php 
       
       //use the passed database values list as text generated from the general class, general must be declared in the parent script
       
       /**
        *must have 
        *$tableNameValues 
		*$tableNameSheet 
        *set in parent script
        */




        function generateSelect($stext, $sname, $svalue1, $svalue2, $post, $message, $general, $tableNameValues) {
	        
			if ($message){
			echo "<tr><td style=\"max-width:30%;\" title='$message'><div class='tooltip'>".$stext." : </td></div><td><SELECT name = '".$sname."' id='".$sname."' class='formInputs' style=\"max-width:75%;\">";
			}else{
				echo "<tr><td style=\"max-width:30%;\">".$stext." : </td><td><SELECT name = '".$sname."' id='".$sname."' class='formInputs' style=\"max-width:75%;\">";
			}
			
            echo "<option disabled hidden selected value></option>";
            
            echo $general->writeSelect($svalue1, $svalue2, $tableNameValues);

            echo "</select>"; 
            echo "<a class='reset' title='reset this field'>&nbsp;&#x2717;</a>";
			echo "</td><td></td>\n";
            mysqli_free_result($res);
        
        }
       
        function errorMessage($errorTag) {
            echo "<td id=".$errorTag." class=\"errorTag\" style=\"max-width:30%;\"></td>\n</tr>\n";
        }
       
      
       
       function generateText($stext, $sname, $stype, $post, $message) {
           if ($message){
		   echo "<tr><td id='".$sname."Error\' style=\"max-width:30%;\" title='$message'><div class='tooltip'>".$stext." : </td></div><td><input type='".$stype."' class='formInputs' name='".$sname."' id='".$sname."' value='";
		   }else{
			echo "<tr><td id='".$sname."Error\' style=\"max-width:30%;\">".$stext." : </td><td><input type='".$stype."' class='formInputs' name='".$sname."' id='".$sname."' value='";   
			   
		   }
            if (isset($post)) echo $post;
            echo "'></td>\n";   
       }
        function generateHidden($stext, $sname, $stype, $post) {
           echo "<tr><td id=".$sname."Tag\" style=\"max-width:30%;\"></td><td><input type=".$stype." name=".$sname." id=".$sname." value=";
            if (isset($post)) echo $post;
            echo "></td>\n";   
       }

        function generateTextArea($stext, $sname, $post, $message) {
            if ($message){
			echo "<tr><td style=\"max-width:30%;\" title='$message'><label><div class='tooltip'>".$stext;
            echo " : </div></td><td><textarea name=".$sname." rows=\"4\" id=".$sname."  class='formInputs' cols=\"30\" value=";
			}else{
			echo "<tr><td style=\"max-width:30%;\"><label>".$stext;
            echo " : </td><td><textarea name=".$sname." rows=\"4\" id=".$sname."  class='formInputs' cols=\"30\" value=";	
				
			}
            if (isset($post)) echo $post;
            echo "/> </textarea></label></td>\n";
            
        }
       
       ?>