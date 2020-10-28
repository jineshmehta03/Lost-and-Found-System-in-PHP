<?php
session_start();
if(!(isset($_SESSION['email']) && isset($_SESSION['usertype']) && isset($_SESSION['id']))) {
    
        $_SESSION['redirect'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    
   echo '<script> window.location.href = "../../login.php" </script>';
}
?>