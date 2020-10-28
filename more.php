<?php 
include"views/templates/header.php";


?>
  <section id="intro" class="intro" >

<div class="slogan">
<h2>WELCOME </h2>
            <h4>WE ARE HERE TO HELP YOU FIND YOUR LOST ITEMS </h4>
</div>

</section>

<div class="container">
<?php include"db.php";

$sql = "SELECT * FROM items where id=".$_REQUEST['id'];
$result = $conn->query($sql);
$row = $result->fetch_assoc()

?><br>

<div style="border:4px solid black;border-radius:8px;">


<!--<h4> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['image'];?></h4><br>-->
<img style="float:right; margin-top:15px;margin-right:15px;" src="<?php echo $row['image'];?>" height="200px" width="300px" />
<h4 style="color:black;padding:10px;">Name :&nbsp;<?php echo $row['name'];?></h4>
<h4 style="color:black;padding:10px;">Number :&nbsp;<?php echo $row['number'];?></h4>
<h4 style="color:black;padding:10px;">Email :&nbsp;<?php echo $row['email'];?></h4>
<h4 style="color:black;padding:10px;">Lost Date :&nbsp;<?php echo $row['lost_date'];?></h4>
<h4 style="color:black;padding:10px;">Last Location :&nbsp; <?php echo $row['last_location']; ?></h4>
<h4 style="color:black;padding:10px;">Location Description :&nbsp;<?php echo $row['location_description']; ?></h4>
<h4 style="color:black;padding:10px;">Brand :&nbsp;<?php echo $row['brand']; ?></h4>
<h4 style="color:black;padding:10px;">Model :&nbsp;<?php echo $row['model']; ?></h4>
<h4 style="color:black;padding:10px;">Description :&nbsp;<?php echo $row['description']; ?></h4>
<h4 style="color:black;padding:10px;">Color :&nbsp;<?php echo $row['color']; ?></h4><br>
</div><br>

</div>


<?php 
  include"views/templates/footer.php";


?>