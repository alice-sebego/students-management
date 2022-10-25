<?php
function formatPhoneNumber($phone){
      
    // Pass phone number in preg_match function
    if(preg_match(
        '/^([0-9]{2})([0-9]{2})([0-9]{2})([0-9]{2})([0-9]{2})$/', 
    $phone, $value)) {
      
        // Store value in format variable
        $format = $value[1] . '-' . $value[2] . '-' . $value[3] . '-' . $value[4]. '-' . $value[5];
    }
    else {
         
        // If given number is invalid
        echo "Invalid phone number <br>";
    }
      
    return $format;
} 
?>