

<?php
session_start();
$fname= $_POST['fname'];
$lname= $_POST['lname'];
$email= $_POST['email'];
$area_code= $_POST['area_code'];
$phone= $_POST['phone'];



$conn= mysqli_connect("localhost", "root", "", "random");

$qry = "insert into inquiry (fname,lname,email,area_code,phone,played) VALUES('$fname','$lname','$email','$area_code','$phone','No')";
if(mysqli_query($conn, $qry))
{

	echo "<script>alert('record insert sucessfully.......');";
	
	echo "</script>";
	header("Location: index.php");
	session_start();
	$_SESSION['userloggedin'] = 'true';

	$_SESSION['useremail'] = $email;
 
}
 else
 {
	  echo '<script language="javascript">';
		echo 'alert("error in data insert.....................")'. mysqli_error($conn); 
 
		
		echo '</script>';
		
		
		
}


mysqli_close($conn);
?>


