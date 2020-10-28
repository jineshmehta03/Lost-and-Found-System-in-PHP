<?php include "includes/header.php";

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
                            <h1 class="title-4">Categories
                                <span>Page</span>
                            </h1>
                            <hr class="line-seprate">
                            
                        </div>
                    </div>
                </div>
            </section>
            <!-- END WELCOME-->
            <!-- DATA TABLE-->
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5 m-b-35">list</h3>
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#add_category">
                                        <i class="zmdi zmdi-plus"></i>add categogry</button>
                                  <!--  <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#add_sub_category">
                                        <i class="zmdi zmdi-plus"></i>add sub categogry</button>-->
                                </div>
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </th>
                                            <th>Category Name</th> 
                                            <th>Action</th> 
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
            include "../db.php";
            $sql = "SELECT * FROM categories ";
						$result = $conn->query($sql);
                      while($row = $result->fetch_assoc())
                      {
						?>
                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td><?php echo ucfirst( $row['name'] );?></td>
                                            <!--    <td><?php echo ucfirst( $catObj->getCategoryName( $row['parent'] ) );?></td>-->

                                                <td>
                                                <a href="editcat.php?id=<?php echo $row['id'];?>" ><i class="far fa-edit"></i></a> &nbsp;
                              
                                                <a href="deletecat.php?id=<?php echo $row['id'];?>" onclick="if (!confirm('Are you sure?')) { return false }"><i class="far fa-trash-alt"></i></a>
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
            <!-- END DATA TABLE-->
          

           
<?php include "includes/footer.php";?>