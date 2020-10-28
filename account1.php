
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

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
<!-- /Section: intro -->
<p> </p>
<?php
if( $userData == "" )
{
    $user = new User();
    $userData = $user->getUser($_SESSION['id']);
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="view-account">
                <div class="card">
                  <img src="<?php echo $userData['picture'];?>" alt="<?php echo $output['first_name'];?>" style="width:100%">
                    <p> </p>
                  <h4 style="margin: 0;"><?php echo $userData['first_name'];?> <?php echo $userData['last_name'];?></h4>
                  <p class="email"><?php echo $userData['email'];?></p>
                  <hr />
                  <p><a href="javascript:void(0);" class="btn btn-primary" style="width:80%;border: none; border-radius: 5px;" data-toggle="modal" data-target="#itemesModel"> Add Item </a> </p>
                  <p><a href="javascript:void(0);" class="btn btn-primary" style="width:80%;border: none; border-radius: 5px;" data-toggle="modal" data-target="#changepasswordModel"> Change Password </a> </p>
                  <p><a href="<?php echo BASE_URL;?>logout.php" class="btn btn-danger" style="width:80%;border: none; border-radius: 5px;"> Logout</a> </p>
                     <p> &nbsp;</p>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="row" style="float:right">
                <div class="col-md-6">
                    <a href="javascript:void(0);" class="btn btn-danger" style="width:95%;border: none; border-radius: 5px;" data-toggle="modal" data-target="#itemesModel"> Add Lost Item </a> 
                </div>
                    <div class="col-md-6">
                            <a href="javascript:void(0);" class="btn btn-success" style="width:100%;border: none; border-radius: 5px;" data-toggle="modal" data-target="#edit"> Add Found Item </a> 
                    </div>
            </div>
            
            <h3>All Lost Items </h3>
            <?php
            $items = $db->getRows( "items", "ASC", " WHERE user_id = '" . $_SESSION['id'] . "'" );
            ?>
            <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm"> Sr. No </th>
                        <th class="th-sm"> Person </th>
                        <th class="th-sm"> Item </th>
                        <th class="th-sm"> Description </th>
                        <th class="th-sm"> Lost Date </th>
                        <th class="th-sm"> Lost Location </th>
                        <th class="th-sm"> Action </th>
                        <!-- <th class="th-sm"> Action </th> -->
                    </tr>
                </thead>
                <tbody>
                <tbody>
                    <?php
                    if( $items != 0 )
                    {
                        $i = 0;
                        foreach( $items as $item )
                        {
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $item['name'];?></td>
                                <td><?php echo $item['brand'] . " " . $item['model'];?></td>
                                <td><?php echo $item['description'];?></td>
                                <td><?php echo $item['lost_date'];?></td>
                                <td><?php echo $item['last_location'];?></td>
                                <td><a href="editlost.php?id=<?php echo $item['id'];?>" ><i class="far fa-edit"></i></a> &nbsp;
                               <a href="delete.php?id=<?php echo $item['id'];?>"><i class="far fa-trash-alt"></i></a></td>
                            </tr>
                            <?php
                        }
                    }else{
                        ?>
                        <tr>
                            <td colspan="12"><?php echo "No Records";?></td>
                        </tr>
                        <?php
                    }
                    ?>  
                </tbody>
               
                
            </table>


            <h3>All Found Items </h3>
            <?php
             $found = $db->getRows( "found", "ASC", " WHERE user_id = '" . $_SESSION['id'] . "'" );
        
            ?>
            <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm"> Sr. No </th>
                        <th class="th-sm"> Person </th>
                        <th class="th-sm"> Item </th>
                        <th class="th-sm"> Description </th>
                        <th class="th-sm"> Found Date </th>
                        <th class="th-sm"> Found Location </th>
                        <th class="th-sm"> Action </th>
                        <!-- <th class="th-sm"> Action </th> -->
                    </tr>
                </thead>
                <tbody>
                <tbody>
                    <?php
                    if( $found != 0 )
                    {
                        $i = 0;
                        foreach( $found as $found )
                        {
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $found['name'];?></td>
                                <td><?php echo $found['brand'] . " " . $found['model'];?></td>
                                <td><?php echo $found['description'];?></td>
                                <td><?php echo $found['found_date'];?></td>
                                <td><?php echo $found['found_location'];?></td>
                                <td><a href="editfound.php?id=<?php echo $found['id'];?>"><i class="far fa-edit"></i></a> &nbsp;
                               <a href="delete.php?id=<?php echo $found['id'];?>"><i class="far fa-trash-alt"></i></a></td>
                            </tr>
                            <?php
                        }
                    }else{
                        ?>
                        <tr>
                            <td colspan="12"><?php echo "No Records";?></td>
                        </tr>
                        <?php
                    }
                    ?>  
                </tbody>
               
                
            </table>



        </div>
    </div>
</div>
<?php include "views/templates/footer.php";?>
<div class="modal fade" id="changepasswordModel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0px solid #000000 !important;">
                    <button type="button" class="close" data-dismiss="modal" style="color: #ff0000;font-size: 3rem;position: relative;top: -7px;    text-align: right;">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="wrap-login100 p-l-55 p-r-55">
                        <form class="login100-form validate-form" method="post" action="">
                            <span class="login100-form-title p-b-37">
                                Change Password
                            </span>

                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter password">
                                <input class="input100" type="password" name="password" placeholder="password">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="container-login100-form-btn">
                                <button class="login100-form-btn" type="submit" name="change_password">
                                    Submit
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
  </div>

    
  <div class="modal fade" id="itemesModel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0px solid #000000 !important;">
                    <button type="button" class="close" data-dismiss="modal" style="color: #ff0000;font-size: 3rem;position: relative;top: -7px;    text-align: right;">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="wrap-login100 p-l-55 p-r-55">
                        <form class="login100-form validate-form" method="post" action="" enctype="multipart/form-data">
                            <span class="login100-form-title p-b-37">
                                Add Lost Item Detail
                            </span>
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'];?>" />
                           
                            <div class="validate-input m-b-25">
                                <span class="login100-form-title p-b-37"> Upload Item Image </span>
                                <input class="input100" type="file" name="image" required>
                                <span class="focus-input100"></span>
                            </div>
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter name">
                                <input class="input100" type="text" name="name" placeholder="Enter Owner Name">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter number">
                                <input class="input100" type="text" name="number" placeholder="Enter Contact Number">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter email">
                                <input class="input100" type="email" name="email" placeholder="Enter Email">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter lost date">
                                <input class="input100" type="date" name="lost_date" placeholder="Entere Lost Date">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter lost location">
                                <input class="input100" type="text" name="last_location" placeholder="Enter Last Location">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter Location Description">
                                <input class="input100" type="text" name="location_description" placeholder="Enter Description">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25">
                                <?php echo $catObj->getCategories(); ?>
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter Brand">
                                <input class="input100" type="text" name="brand" placeholder="Enter Brand Name">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter Model">
                                <input class="input100" type="text" name="model" placeholder="Enter Model">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter Description">
                                <input class="input100" type="text" name="description" placeholder="Enter Item Description">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter Color">
                                <input class="input100" type="text" name="color" placeholder="Enter Item Color">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="container-login100-form-btn">
                                <button class="login100-form-btn" type="submit" name="add_item">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
  </div>



    <div class="modal fade" id="edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0px solid #000000 !important;">
                    <button type="button" class="close" data-dismiss="modal" style="color: #ff0000;font-size: 3rem;position: relative;top: -7px;    text-align: right;">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="wrap-login100 p-l-55 p-r-55">
                        <form class="login100-form validate-form" method="post" action="" enctype="multipart/form-data">
                            <span class="login100-form-title p-b-37">
                                Add Found Item Detail
                            </span>
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'];?>" />
                          
                            <div class="validate-input m-b-25">
                                <span class="login100-form-title p-b-37"> Upload Item Image </span>
                                <input class="input100" type="file" name="image" required>
                                <span class="focus-input100"></span>
                            </div>
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter name">
                                <input class="input100" type="text" name="name" placeholder="Enter Owner Name">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter number">
                                <input class="input100" type="text" name="number" placeholder="Enter Contact Number">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter email">
                                <input class="input100" type="email" name="email" placeholder="Enter Email">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter found date">
                                <input class="input100" type="date" name="found_date" placeholder="Entere Found Date">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter found location">
                                <input class="input100" type="text" name="found_location" placeholder="Enter Found Location">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter Location Description">
                                <input class="input100" type="text" name="location_description" placeholder="Enter Description">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25">
                                <?php echo $catObj->getCategories(); ?>
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter Brand">
                                <input class="input100" type="text" name="brand" placeholder="Enter Brand Name">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter Model">
                                <input class="input100" type="text" name="model" placeholder="Enter Model">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter Description">
                                <input class="input100" type="text" name="description" placeholder="Enter Item Description">
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter Color">
                                <input class="input100" type="text" name="color" placeholder="Enter Item Color">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="container-login100-form-btn">
                                <button class="login100-form-btn" type="submit" name="add">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
  </div>

  