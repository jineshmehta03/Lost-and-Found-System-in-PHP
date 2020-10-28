

<?php
session_start();
$username= $_POST['username'];
$password= $_POST['password'];

$conn= mysqli_connect("localhost", "root", "", "random");

$sql = "SELECT `password` FROM `admin` WHERE `username` = '".$username."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row['password'] == $password) {
			session_start();
			$_SESSION['loggedin'] = 'true';
			header("Location: dashboard.php");
		} else {
			session_start();
			$_SESSION['loggedin'] = 'false';
		}
    }
} else {
	session_start();
	$_SESSION['loggedin'] = 'false';
}


mysqli_close($conn);
?>


