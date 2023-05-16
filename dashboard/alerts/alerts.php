<?php 
function welcome_message($session_name){
    if (isset($_SESSION[$session_name]) && !empty($_SESSION[$session_name])){
        echo '<div class="alert alert-primary" role="alert">';
        echo "Welcome Dear, " . $_SESSION[$session_name] . "!";
        echo '</div>';
    }
}
function alert_message($session_name,$alert_name) {
    if(isset($_SESSION[$session_name]))
    {
        foreach($_SESSION[$session_name] as $message) {
            echo '<div class="alert alert-' . $alert_name . '" role="alert" id="alert-' . $alert_name . '">';
            echo $message;
            echo '</div>';
            unset($_SESSION[$session_name]);
        }
        echo success_message_limit();
    }
}
function success_message_limit(){
    return 
    '<script>
    setTimeout(function() {
        document.getElementById("alert-success").style.display = "none";
    }, 1500);
    </script>';
}
?>