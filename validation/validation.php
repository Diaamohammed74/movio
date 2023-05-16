<?php

#-------------------------Empty input Validation
function emptyinput($input){
    if(empty($input)){
        return true;
    }else{
        return false; 
    }
}
#-------------------------Length input Validation

function mininput($input,$length){
    if(strlen($input)<$length){
        return true;
    }
    return false;
}

function maxinput($input,$length){
    if(strlen($input)>$length){
        return true;
    }
    return false;
}
#-------------------------Password Confirmation Validation

function confirm_password($input2,$input1){
    if($input2==$input1){
        return true;
    }
    return false;
}
#-------------------------Valid Email Validation

function validinput($input){
    if (filter_var($input,FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}
#-------------------------Sanitization Validation to prevent from xss , sql injection

function sanitize_input($input){
    return trim(htmlentities(htmlspecialchars($input)));
}

?>