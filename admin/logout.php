<?php
// Include configuration file
require "../classes/config.php";

// Remove token and user data from the session
unset($_SESSION['admin']);

// Destroy entire session data
session_destroy();

// Redirect to homepage
header("location:". BASE_URL_ADMIN . "/login.php?signout=true");
?>