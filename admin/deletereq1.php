<?php
$id = $_GET['id'];

$dbname = "lostandfound";
$conn = mysqli_connect("localhost", "root", "", $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<?php

$sql = "DELETE FROM found WHERE id = $id"; 
$ExecQuery = MySQLi_query($conn, $sql); 
if($ExecQuery)
{

?>
<script>

window.onload=function()
{
alert("Deleted Succesfully...");
window.location="index.php";
}
</script>

<?php } ?>