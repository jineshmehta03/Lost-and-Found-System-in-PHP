<?php
        include"db.php";
    $key=$_GET['key'];
    $array = array();
   
    $query=mysqli_query($conn, "select * from items where name LIKE '%{$key}%'");
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = $row['name'];
    }
    echo json_encode($array);
    mysqli_close($conn);
?>