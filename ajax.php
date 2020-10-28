<?php
require "classes/config.php";
require "classes/User.class.php";
require "classes/Categories.php";

echo $user->getOwner($_POST['user_id']); die;
?>