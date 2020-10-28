<?php

    if(isset($_POST['update']))
    {
      include "db.php";
        
$name =$_POST['name'];
$sql="UPDATE items SET  name='$name' WHERE id=".$_REQUEST['id'];
$ExecQuery = MySQLi_query($conn, $sql); 
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

    
<?php include "views/templates/header.php";?>
<?php
$catObj = new Categories();
$loggedInResponse = $db->checkSession( $_SESSION );

if( $loggedInResponse == "false" )
{
    header("Location: " . BASE_URL);
}
?>
<section id="intro" class="intro" style="padding: 5% 0 2% 0;">

    <div class="slogan">
        <h2>MY <span class="text_color">ACCOUNT</span> </h2>
    </div>

</section>



     
  
      
  
  <body>
    
    
       
       
            <?php
            include "db.php";
            $sql = "SELECT * FROM items where id=".$_REQUEST['id'];
						$result = $conn->query($sql);
				  	$row = $result->fetch_assoc()
						?>
         
          
         <form class="login100-form validate-form" method="post" action="" enctype="multipart/form-data">
                            <span class="login100-form-title p-b-37">
                                Edit Lost Item Detail
                            </span>
                            <input type="hidden" name="user_id" value="<?php echo $item['id'];?>" />
                            <div class="wrap-input100 validate-input m-b-25">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="input100" type="radio" name="type" value="<?php echo $item['type'];?>" /> Lost
                                    </div>
                                    <div class="col-md-6">
                                        <input class="input100" type="radio" name="type" value="<?php echo $item['type'];?>" /> Found
                                    </div>
                                </div>
                            </div>
                            <div class="validate-input m-b-25">
                                <span class="login100-form-title p-b-37"> Upload Item Image </span>
                                <input class="input100" type="file" name="image" >
                                <span class="focus-input100"></span>
                            </div>
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter name">
                                <input class="input100" type="text" name="name" value="<?php echo $item['name'];?>">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter number">
                                <input class="input100" type="text" name="number" value="<?php echo $item['number'];?>">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter email">
                                <input class="input100" type="email" name="email" value="<?php echo $item['email'];?>">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter lost date">
                                <input class="input100" type="date" name="lost_date" value="<?php echo $item['lost_date'];?>">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter lost location">
                                <input class="input100" type="text" name="last_location" value="<?php echo $item['last_location'];?>">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter Location Description">
                                <input class="input100" type="text" name="location_description" value="<?php echo $item['location_description'];?>">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25">
                                <?php echo $catObj->getCategories(); ?>
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter Brand">
                                <input class="input100" type="text" name="brand" value="<?php echo $item['brand'];?>">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter Model">
                                <input class="input100" type="text" name="model" value="<?php echo $item['model'];?>">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter Model">
                                <input class="input100" type="text" name="description" value="<?php echo $item['description'];?>">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter Color">
                                <input class="input100" type="text" name="color" value="<?php echo $item['color'];?>">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="container-login100-form-btn">
                                <button class="login100-form-btn" type="submit" name="update">
                                    Update
                                </button>
                            </div>
                        </form>
                  
              
           
           
            
             
            
           
  </body>
</html>