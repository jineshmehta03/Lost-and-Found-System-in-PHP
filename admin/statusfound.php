<?php
  //include "session.php";
  //session_start();


$con=mysqli_connect('localhost','root');
if($con){
   // echo "Connection Succesful";
}
else{
    echo"Connection UnSuccesful";
}

mysqli_select_db($con,'lostandfound');
$id= trim($_GET["id"]);
  
 
    $query = "UPDATE found SET status1='Approved' WHERE id='$id'";
   echo($query);
$result = mysqli_query($con,$query);

$num = mysqli_num_rows($result);
$res = mysqli_query($con, $query) or die(mysqli_query($con));
  if($res){
  //  header('location:index.php');
    //echo("updated"); 
    header('location:index.php');
    
  }
  else{
    //print "Error in Client Register";
  }
?>
