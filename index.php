
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
<link rel="icon" href="images/landfdark.png" height="300px" width="500px" type="text/icon">
<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `items` WHERE CONCAT(`id`, `name`, `brand`, `model`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `items`";
    $search_result = filterTable($query);
}
function filterTable($query)
{
    include'db.php';
    $filter_Result = mysqli_query($conn, $query);
    return $filter_Result;
}

?>



<?php include "views/templates/header.php";?>

    <section id="intro" class="intro">

        <div class="slogan">
            <h2>WELCOME </h2>
            <h4>WE ARE HERE TO HELP YOU FIND YOUR LOST ITEMS </h4>
        </div>
    
    </section>
    <!-- /Section: intro -->
    <p> </p>
    <section id="intro" class="listing">
    <div class="container">
        <div class="row">
      
            <div class="col-md-12">
                <center>
                    <div class="slogan">
                        <h2>Lost Items</h2>
                    </div>
                </center>
            </div>
            <!-- Search Start-->

            <style>
form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  height:6.5%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
</style>

<form class="example" method="POST" style="margin:auto;max-width:250px;float:right;">
  <input type="text" placeholder="Search.." name="valueToSearch">
  <button type="submit" name="search"><i class="fa fa-search"></i></button>
</form>
<br>
            <!-- Search End-->

            <div class="col-md-12">
                <div class="table-responsive">

                    <?php 
                  //  $items = $db->getRows( "items", "DESC", " WHERE created < DATE_ADD(NOW(), INTERVAL 15 DAY)" );
                
                   $items="SELECT * FROM items WHERE status1=='Approved'";
                    // $items = $db->getRows( "items", "DESC", " WHERE status=='Approved'" );
                   
                   ?>
                    <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                
                                <th class="th-sm"> Image </th>
                                <th class="th-sm"> Person </th>
                                <th class="th-sm"> Item </th>
                                <th class="th-sm"> Description </th>
                                <th class="th-sm"> Lost Date </th>
                                <th class="th-sm"> Lost Location </th>
                             <!--   <th class="th-sm">Status</th>-->
                                <th class="th-sm"> Action </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $date = date("m-d-Y", strtotime('15 day'));
                                ?>
                                <?php 
                                //while($row = mysqli_fetch_array($search_result)):
                                while($row = mysqli_fetch_array($search_result)):
                                if($row['status1']=="Approved")
                                {?>
                                
                                <tr>
                                   <!-- <td><?php 
                                   echo $i;
                                   
                                   ?></td>-->

<?php 
                          if($row['status1']=="Approved")
                          {?>
                               
                                    <td><div class="col-md-4 m-b-25">
                           <div class="card" style="width:5px; height:50px">
                              <?php
                          
                             $img = "";
                                 if($row['image'] == null)
                              {
                                 $img = BASE_URL . "images/images.jpeg";
                                 }else{
                             $img = $row['image'];
                             }
                            } 
                        ?>
                          <img class="img-fluid card-img-top" src="<?php echo $img;?>" alt="Card image cap" style="border-bottom:2px solid #cecece;width:50px; height:50px">
                          </div>
                          </td>
                               <td><?php echo $row['name'];?></td>
                                    <td><?php echo $row['brand'] . " " . $row['model'];?></td>
                                    <td><?php echo $row['description'];?></td>
                                    <td><?php echo $row['lost_date'];?></td>
                                    <td><?php echo $row['last_location'];?></td>
                                <!--    <td><?php echo $row['status1'];?></td>-->
                                    <td><a href="more.php?id=<?php echo $row['id'];?>">More<i class="fas fa-angle-double-right"></i></a></td>
                                </tr>
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

   
    <!-- /Section: contact -->
    <?php include "footer.php";?>