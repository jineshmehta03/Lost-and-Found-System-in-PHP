<?php include'views/templates/header.php'; ?>
<?php

if(isset($_POST['update']))
{
  include "db.php";
  $id = $_POST['id']; 
  $image = $_FILES['image']['name'];
  $tmpName =  $_FILES['image']['tmp_name']; 
  $name =$_POST['name'];
  $number =$_POST['number'];
  $email =$_POST['email'];
  $found_date =$_POST['found_date'];
  $found_location =$_POST['found_location'];
  $location_description =$_POST['location_description'];
  $category =$_POST['category'];
  $sub_category =$_POST['sub_category'];
  $brand =$_POST['brand'];
  $model =$_POST['model'];
  $description =$_POST['description'];
  $color =$_POST['color'];
$sql="UPDATE found SET image='$image',name='$name', number='$number',email='$email',found_date='$found_date',found_location='$found_location',location_description='$location_description',category='$category',sub_category='$sub_category',brand='$brand',model='$model',description='$description',color='$color' WHERE id=$id";
$ExecQuery = MySQLi_query($conn, $sql); 

move_uploaded_file($tmpName, "uploads/".$image);
if($ExecQuery)
{
?>
<script>

window.onload=function()
{
alert("updated Succesfully...");
window.location="account.php";
}
</script>
<?php
}  
}
?>
<section id="intro" class="intro" style="padding: 5% 0 2% 0;">

<div class="slogan">
    <h2>MY <span class="text_color">ACCOUNT</span> </h2>
</div>

</section>
<div class="container-fluid">

<div class="row">

<div class="col-md-2">
</div>
<div class="col-md-8">
<div class="wrap-login100 p-l-55 p-r-55">
<?php
            include "db.php";
            $sql = "SELECT * FROM found where id=".$_REQUEST['id'];
						$result = $conn->query($sql);
				  	$row = $result->fetch_assoc()
						?>
                        <form class="login100-form " method="post" action="" enctype="multipart/form-data">
                            <span class="login100-form-title p-b-37">
                                Add Found Item Detail
                            </span>
                            <input type="hidden" name="id" value="<?php echo $row['id'];?>" />
                          
                            <div class="wrap-input100 validate-input m-b-25">
                           <?php  echo "<img src='uploads/".$row['image']."' width='100' height='100'/>"; ?>
                                <span class="login100-form-title m-b-25"> Upload Item Image </span>
                                <input class="input100" type="file" name="image">
                                <span class="focus-input100"></span>
                            </div>
                            <div class="wrap-input100 validate-input m-b-25" >
                                <input class="input100" type="text" name="name" value="<?php echo $row['name']; ?>">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" >
                                <input class="input100" type="text" name="number"value="<?php echo $row['number']; ?>">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" >
                                <input class="input100" type="email" name="email" value="<?php echo $row['email']; ?>">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" >
                                <input class="input100" type="date" name="found_date" value="<?php echo $row['found_date']; ?>">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" >
                                <input class="input100" type="text" name="found_location" value="<?php echo $row['found_location']; ?>">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" >
                                <input class="input100" type="text" name="location_description" value="<?php echo $row['location_description']; ?>">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25">
                                <?php echo $catObj->getCategories(); ?>
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" >
                                <input class="input100" type="text" name="brand" value="<?php echo $row['brand']; ?>">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" >
                                <input class="input100" type="text" name="model" value="<?php echo $row['model']; ?>">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" >
                                <input class="input100" type="text" name="description" value="<?php echo $row['description']; ?>">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" >
                                <input class="input100" type="text" name="color" value="<?php echo $row['color']; ?>">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="container-login100-form-btn">
                                <button class="login100-form-btn" type="submit" name="update">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>

    </div>

    <div class="col-md-2">
    </div>                
</div>
</div>

<br>
<br>


<?php include'views/templates/footer.php'; ?>