<?php include "includes/header.php";

?>
<?php 

if(isset($_POST['update']))
{
  include "../db.php";
  $id = $_POST['id']; 
  $name =$_POST['name'];
  $sql="UPDATE categories SET name='$name' WHERE id=$id";

  $ExecQuery = MySQLi_query($conn, $sql); 
if($ExecQuery)
{
?>

<script>

window.onload=function()
{
alert("updated Succesfully...");
window.location="categories.php";
}
</script>
<?php
}  
}
?>




<br><br><br>
      <?php
            include "../db.php";
            $sql = "SELECT * FROM categories where id=".$_REQUEST['id'];
						$result = $conn->query($sql);
                      $row = $result->fetch_assoc()
                      
						?>

            <div class="container">

            <div class="row">

            <div class="col-md-3">
            </div>

            <div class="col-md-6">
        <form method="POST" action="" enctype="multipart/form-data">
       
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Edit Category</label>
            <input type="hidden" name="id" value="<?php echo $row['id'];?>" />
            <input type="text" class="form-control" id="recipient-name" name="name" value="<?php echo $row['name']; ?>" >
          </div>
          <button type="submit" name="update" class="btn btn-success">Update</button>
            
        </form>
        </div>

        <div class="col-md-3">
        </div>

        </div>
        </div>

        
      

        <?php include "includes/footer.php";?>