<?php include "views/templates/header.php";?>
<style>
    img.img-fluid {
        width: 100%;
        height: 205px !important;
        margin-bottom: 3rem;
    }
</style>
<?php
$catObj = new Categories();
$loggedInResponse = $db->checkSession( $_SESSION );

?>
<section id="intro" class="intro" style="padding: 5% 0 2% 0;">

    <div class="slogan">
        <h2><span class="text_color">Products</span> </h2>
    </div>

</section>
<!-- /Section: intro -->
<p> </p>
<?php

$items = $db->getRows( "items", "DESC", " WHERE created < DATE_ADD(NOW(), INTERVAL 15 DAY)" );

?>
<div class="container">
    <div class="row">
            <?php
            foreach( $items as $item )
            {
                ?>
                <div class="col-md-4 m-b-25">
                    <div class="card" style="width: 100%;">
                        <?php
                        $img = "";
                        if($item['image'] == null)
                        {
                            $img = BASE_URL . "images/images.jpeg";
                        }else{
                             $img = $item['image'];
                        }
                        ?>
                          <img class="img-fluid card-img-top" src="<?php echo $img;?>" alt="Card image cap" style="border-bottom:2px solid #cecece;">
                          <div class="card-body">
                                <h5 class="card-title"><?php echo $item['description'];?></h5>
                          </div>
                          <ul class="list-group list-group-flush">
                                <li class="list-group-item"><?php echo $item['model'];?></li>
                                <li class="list-group-item"><?php echo $item['brand'];?></li>
                          </ul>
                          <div class="card-body">
                                <a href="javascript:void(0);" class="ajaxBtn card-link" data-user-id="<?php echo $item['user_id'];?>">Buy Now</a>
                          </div>
                    </div>
                </div>
                <?php
            }
            ?>
    </div>
</div>
<?php include "views/templates/footer.php";?>
<div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0px solid #000000 !important;">
                    <button type="button" class="close" data-dismiss="modal" style="color: #ff0000;font-size: 3rem;position: relative;top: -7px;    text-align: right;">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body person_detail">
                    <div class="wrap-login100 p-l-55 p-r-55">
                        <p class="name"></p>
                        <p class="number"></p>
                        <p class="email"></p>
                    </div>
                </div>
            </div>
        </div>
  </div>