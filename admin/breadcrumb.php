<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `lostandfound` WHERE CONCAT(`id`, `name`, `brand`, `model`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `items`";
    $search_result = filterTable($query);
}
function filterTable($query)
{
    include'../db.php';
    $filter_Result = mysqli_query($conn, $query);
    return $filter_Result;
}

?>

<section class="au-breadcrumb2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="au-breadcrumb-content">
                    <div class="au-breadcrumb-left">
                        <span class="au-breadcrumb-span">You are here:</span>
                        <?php echo $db->lf_breadcrumbs(' / ', 'Home');?>
                    </div>
                    <form class="au-form-icon--sm" action="" method="post">
                        <input class="au-input--w300 au-input--style2" type="text" name="valueToSearch" placeholder="Search for records...">
                        <button class="au-btn--submit2" type="submit" name="search">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>