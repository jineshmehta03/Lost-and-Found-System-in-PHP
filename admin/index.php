<?php include "includes/header.php"; 
include "../classes/User.class.php"; ?>


        <style>
            .input100 {
    font-family: SourceSansPro-Bold;
    font-size: 16px;
    color: #4b2354;
    line-height: 1.2;
    display: block;
    width: 100%;
    height: 50px;
    background: transparent;
    padding: 0 20px 0 23px;
}
.container-login100-form-btn {
    width: 100%;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}
.p-b-37 {
    padding-bottom: 37px;
}
.login100-form-title {
    display: block;
    font-family: SourceSansPro-Bold;
    font-size: 30px;
    color: #4b2354;
    line-height: 1.2;
    text-align: center;
}
.wrap-input100 {
    width: 100%;
    position: relative;
    background-color: #fff;
    border-radius: 20px;
}
.m-b-25 {
    margin-bottom: 25px;
}
.validate-input {
    position: relative;
}
.login100-form-btn {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0 20px;
    min-width: 160px;
    height: 50px;
    background: url(../img/bg1.jpg) no-repeat top center;
    border-radius: 15px;
    font-family: SourceSansPro-SemiBold;
    font-size: 14px;
    color: #fff;
    line-height: 1.2;
    text-transform: uppercase;
    -webkit-transition: all 0.4s;
    -o-transition: all 0.4s;
    -moz-transition: all 0.4s;
    transition: all 0.4s;
    box-shadow: 0 10px 30px 0px rgba(189, 89, 212, 0.5);
    -moz-box-shadow: 0 10px 30px 0px rgba(189, 89, 212, 0.5);
    -webkit-box-shadow: 0 10px 30px 0px rgba(165, 204, 226, 0.5);
    -o-box-shadow: 0 10px 30px 0px rgba(189, 89, 212, 0.5);
    -ms-box-shadow: 0 10px 30px 0px rgba(189, 89, 212, 0.5);
}
.focus-input100 {
    display: block;
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    pointer-events: none;
    border-radius: 20px;
    box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.1);
    -webkit-box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.1);
    -o-box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.1);
    -ms-box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.1);
    -webkit-transition: all 0.4s;
    -o-transition: all 0.4s;
    -moz-transition: all 0.4s;
    transition: all 0.4s;
    .login100-form-btn {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0 20px;
    min-width: 160px;
    height: 50px;
    background: url(../img/bg1.jpg) no-repeat top center;
    border-radius: 15px;
    font-family: SourceSansPro-SemiBold;
    font-size: 14px;
    color: #fff;
    line-height: 1.2;
    text-transform: uppercase;
    -webkit-transition: all 0.4s;
    -o-transition: all 0.4s;
    -moz-transition: all 0.4s;
    transition: all 0.4s;
    box-shadow: 0 10px 30px 0px rgba(189, 89, 212, 0.5);
    -moz-box-shadow: 0 10px 30px 0px rgba(189, 89, 212, 0.5);
    -webkit-box-shadow: 0 10px 30px 0px rgba(165, 204, 226, 0.5);
    -o-box-shadow: 0 10px 30px 0px rgba(189, 89, 212, 0.5);
    -ms-box-shadow: 0 10px 30px 0px rgba(189, 89, 212, 0.5);
}
        </style>
        <?php 
        if( isset( $_POST['add_item'] ) )
        {
            $user = new User();
            $result = $user->addItem( $_POST );
        }
        ?>
        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
            <?php include "breadcrumb.php"; ?>
            <!-- END BREADCRUMB-->

            <!-- WELCOME-->
            <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-4">Welcome back
                                <span><?php echo ucfirst($adminname);?>!</span>
                            </h1>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>
            <!-- END WELCOME-->

            <!-- STATISTIC-->
            <section class="statistic statistic2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--green">
                            <?php 
                           include "../db.php";
$sql = "SELECT * FROM `users`";
$connStatus = $conn->query($sql);
$numberOfRows = mysqli_num_rows($connStatus);

//this echo out the total number of rows returned from the query
$conn->close();
?>
                                <h2 class="number"><?php echo $numberOfRows; ?> </h2>
                                <span class="desc">Users</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--orange">
                            <?php 
                           include "../db.php";
$sql = "SELECT * FROM `items`";
$connStatus = $conn->query($sql);
$numberOfRows = mysqli_num_rows($connStatus);

//this echo out the total number of rows returned from the query
$conn->close();
?>
                                <h2 class="number"><?php echo $numberOfRows; ?></h2>
                                <span class="desc">Lost items</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                        <?php 
                           include "../db.php";
$sql = "SELECT * FROM `items`";
$connStatus = $conn->query($sql);
$numberOfRows = mysqli_num_rows($connStatus);

//this echo out the total number of rows returned from the query
$conn->close();
?>
                            <div class="statistic__item statistic__item--blue">
                                <h2 class="number"><?php echo $numberOfRows; ?></h2>
                                <span class="desc">Found Items</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--red">
                                <h2 class="number">₹‎0</h2>
                                <span class="desc">total earnings</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-money"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->

            <!-- DATA TABLE-->
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5 m-b-35">Lost Items List</h3>
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                   
                                </div>
                               
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <?php $items = $db->getRows( "items", "DESC" ); ?>
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </th>
                                            <th class="th-sm"> Sr. No </th>
                                            <th class="th-sm"> Person </th>
                                            <th class="th-sm"> Item </th>
                                            <th class="th-sm"> Description </th>
                                            <th class="th-sm"> Lost Date </th>
                                            <th class="th-sm"> Lost Location </th>
                                            <th class="th-sm"> Approval</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    while($row = mysqli_fetch_array($search_result)):

                            $i = 0;
                            foreach( $items as $item )
                            {
                                $i++;
                                ?>
                                <tr class="tr-shadow">
                                    <td>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </td>
                                            <?php  $id = $item['id'];
        
    ?>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $item['name'];?></td>
                                    <td><?php echo $item['brand'] . " " . $item['model'];?></td>
                                    <td class="desc"><?php echo $item['description'];?></td>
                                    <td class="status--process"><?php echo $item['lost_date'];?></td>
                                    <td><?php echo $item['last_location'];?></td>
                                    
                                    <td>
                                                <div class="table-data-feature">
                                                    
                                                <?php if($item['status1'] == 'pending'){ ?>
                                                    <a href="status.php?id=<?php echo $item['id'];?>" >
                                                <i class='far fa-check-square fa-2x'></i>
                                                   </a>

                                               <?php  } 
                                                 else { ?>
                                               
                                                <i style="color:green;" class='far fa-check-square fa-2x'></i>
                                                  
                                                 <?php } ?> &nbsp;&nbsp;

                                                 <a href="deletereq.php?id=<?php echo $item['id'];?>" onclick="if (!confirm('Are you sure?')) { return false }"><i class="far fa-trash-alt fa-2x"></i></a>
                                                    
                                                </div>
                                            </td>
                                       
                                        </tr>
                                        <tr class="spacer"></tr>
                                <?php
                            }
                            ?> 
                                      <?php endwhile;?>   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END DATA TABLE-->

            <!--Start Data table for lost-->
            
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5 m-b-35">Found Items List</h3>
                            <!--<div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#itemesModel">
                                        <i class="zmdi zmdi-plus"></i>add item</button>
                                
                                </div>
                               
                            </div>-->
                            <div class="table-responsive table-responsive-data2">
                                <?php $found = $db->getRows( "found", "DESC" ); ?>
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </th>
                                            <th class="th-sm"> Sr. No </th>
                                            <th class="th-sm"> Person </th>
                                            <th class="th-sm"> Item </th>
                                            <th class="th-sm"> Description </th>
                                            <th class="th-sm"> found Date </th>
                                            <th class="th-sm"> found Location </th>
                                            <th class="th-sm"> Approval</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                      
                            $i = 0;
                            foreach( $found as $found )
                            {
                                $i++;
                                ?>
                                <tr class="tr-shadow">
                                    <td>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </td>
                                            <?php  $id = $found['id'];
        
    ?>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $found['name'];?></td>
                                    <td><?php echo $found['brand'] . " " . $item['model'];?></td>
                                    <td class="desc"><?php echo $found['description'];?></td>
                                    <td class="status--process"><?php echo $found['found_date'];?></td>
                                    <td><?php echo $found['found_location'];?></td>
                                  
                                    <td>
                                                <div class="table-data-feature">
                                                <?php if($found['status1'] == 'pending'){ ?>
                                                <a href="statusfound.php?id=<?php echo $found['id'];?>" >
                                                <i class='far fa-check-square fa-2x'></i>
                                                   </a>

                                               <?php  } 
                                                 else { ?>
                                               
                                                <i style="color:green;" class='far fa-check-square fa-2x'></i>
                                                  
                                                 <?php } ?> &nbsp;&nbsp;


                                                 <a href="deletereq1.php?id=<?php echo $found['id'];?>" onclick="if (!confirm('Are you sure?')) { return false }"><i class="far fa-trash-alt fa-2x"></i></a>
                                                    
                                                </div>
                                            </td>
                                       
                                        </tr>
                                        <tr class="spacer"></tr>
                                <?php
                            }
                            ?> 
                                         
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End Data table for lost-->
<div class="modal fade" id="itemesModel">
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
                                Add Lost Item Detail
                            </span>
                            <input type="hidden" name="user_id" value="2" />
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter name">
                                <input class="input100" type="text" name="name" placeholder="Enter Owner Name" required>
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter number">
                                <input class="input100" type="text" name="number" placeholder="Enter Contact Number" required>
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter email">
                                <input class="input100" type="email" name="email" placeholder="Enter Email" required>
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter lost date">
                                <input class="input100" type="date" name="lost_date" placeholder="Entere Lost Date" required>
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter lost location">
                                <input class="input100" type="text" name="last_location" placeholder="Enter Last Location" required>
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter Location Description">
                                <input class="input100" type="text" name="location_description" placeholder="Enter Description" required>
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
                                <input class="input100" type="text" name="model" placeholder="Eenter Model" required>
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter Model">
                                <input class="input100" type="text" name="description" placeholder="Eenter item description" required>
                                <span class="focus-input100"></span>
                            </div>
                            
                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter Color">
                                <input class="input100" type="text" name="color" placeholder="Eenter item color" required>
                                <span class="focus-input100"></span>
                            </div>

                            <div class="container-login100-form-btn">
                                <button class="btn login100-form-btn" type="submit" name="add_item">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
  </div>
<?php include "includes/footer.php";?>

