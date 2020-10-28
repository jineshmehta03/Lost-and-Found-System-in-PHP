<?php
$id = $_GET['id'];

$dbname = "lostandfound";
$conn = mysqli_connect("localhost", "root", "", $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "DELETE FROM items WHERE id = $id"; 
$ExecQuery = MySQLi_query($conn, $sql); 
if($ExecQuery)
{


?>
<script>

window.onload=function()
{
alert("Deleted Succesfully...");
window.location="account.php";
}
</script>
<?php } ?>