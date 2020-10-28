<?php

session_start();

if(isset($_SESSION['loggedin'])) {
    if($_SESSION['loggedin'] != 'true') {
        header("Location: login.php");
    }
} else {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">


<head>
        <meta charset="utf-8">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">-->



    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/js/mdb.min.js"></script>


     <!-- Bootstrap Min CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Animate Min CSS -->
        <link rel="stylesheet" href="assets/css/animate.min.css">
         <!-- Font Awesome Min CSS -->
        <link rel="stylesheet" href="assets/css/fontawesome.min.css">
        <!-- Flaticon CSS -->
        <link rel="stylesheet" href="assets/css/flaticon.css">
         <!-- Owl Carousel Min CSS -->
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <!-- Magnific Popup Min CSS -->
        <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="assets/css/nice-select.css">
        <!-- Mean Menu CSS -->
        <link rel="stylesheet" href="assets/css/meanmenu.css">
        <!-- Progress Circle Min CSS -->
        <link rel="stylesheet" href="assets/css/progresscircle.min.css">
        <!-- Style CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="assets/css/responsive.css">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">


     <title>Fuerte Developers</title>

        <link rel="icon" type="image/png" href="assets/img/fuerte-logo1.png">
</head>

<body>




    <br><br><br>

    <div class="container" style="margin-top:30px;">
        <!-- Default form login -->

            <section class="form-gradient">

                <!--Form with header-->
                <a href="logout.php"><button type="button" class="btn btn-warning" style="float:right;margin-top:-50px;">Logout</button></a> <br>
                <div class="card">


                    <!--Header-->

                    <div>

                        <div class=" d-flex justify-content-center" style="background: radial-gradient( rgb(62, 100, 100), rgba(129, 212, 80, 0.918));height:70px;">
                            <h3 class="white-text mb-3 pt-3 font-weight-bold" style="color:white">Dashboard</h3>



                        </div>


                    </div>

                    <!--Header-->
                    <div class="card-body mx-4 mt-4">

                    <form action="initiate_event.php" method="post">

                        <?php

                        // Create connection
                        $conn = new mysqli("localhost", "root", "", "random");
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT `id`, `eventname`, `total_clicks`, `current_clicks`, `winner_at_clicks` FROM `events`";
                        $result = $conn->query($sql);

                        $eventId = '';

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $eventId = $row['id'];
                                echo "<label for=\"Form-email3\" style=\"color:green\"><b>Event Name : </b> ".$row['eventname']." </label><br>";
                                echo "<label for=\"Form-email3\" style=\"color:green\"><b>Total Clicks : </b> ".$row['total_clicks']." </label><br>";
                                echo "<label for=\"Form-email3\" style=\"color:green\"><b>Current Click: </b> ".$row['current_clicks']." </label><br>";
                                echo "<label for=\"Form-email3\" style=\"color:green\"><b>Winner at clicks: </b> ".$row['winner_at_clicks']." </label><br>";
                            }
                        }

                        echo "<br><br>";
                        echo "<label for=\"Form-email3\" style=\"color:green\"><b>Winners Details: </b> </label><br>";
                        echo "<br><br>";

                        $sql = "SELECT `user_id`, `winning_click`, `price_id` FROM `event_winners` WHERE `event_id` = '".$eventId."'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                if ($row['user_id'] != '0') {

                                    $sql2 = "SELECT `fname`, `lname`, `email`, `area_code`, `phone` FROM `inquiry` WHERE `id` = '".$row['user_id']."'";
                                    $result2 = $conn->query($sql2);

                                    if ($result2->num_rows > 0) {
                                        while($row2 = $result2->fetch_assoc()) {
                                            echo "<label for=\"Form-email3\" style=\"color:green\"><b>User Name : </b> ".$row2['fname']." ".$row2['lname']." </label><br>";
                                            echo "<label for=\"Form-email3\" style=\"color:green\"><b>User mail : </b> ".$row2['email']." </label><br>";
                                            echo "<label for=\"Form-email3\" style=\"color:green\"><b>User Contact No : </b> ".$row2['area_code']." ".$row2['phone']." </label><br>";
                                        }
                                    }

                                } else {
                                    echo "<label for=\"Form-email3\" style=\"color:green\"><b>User Name : </b> </label><br>";
                                    echo "<label for=\"Form-email3\" style=\"color:green\"><b>User mail : </b> </label><br>";
                                    echo "<label for=\"Form-email3\" style=\"color:green\"><b>User Contact No : </b> </label><br>";
                                }

                                echo "<label for=\"Form-email3\" style=\"color:green\"><b>Winning click : </b> ".$row['winning_click']." </label><br>";

                                $sql2 = "SELECT `pricename` FROM `prices` WHERE `id` = '".$row['price_id']."'";
                                $result2 = $conn->query($sql2);

                                if ($result2->num_rows > 0) {
                                    while($row2 = $result2->fetch_assoc()) {
                                        echo "<label for=\"Form-email3\" style=\"color:green\"><b>Price : </b> ".$row2['pricename']." </label><br><br>";
                                    }
                                }


                            }
                        }

                        ?>

                        <!--Grid row-->
                        <div class="row d-flex align-items-center mb-4">

                            

                        </div>
                        <!--Grid row-->
                    </div>

                </div>
                <!--/Form with header-->

            </section>
        </form>
    </div>

    <script>
        // Material Select Initialization
        $(document).ready(function() {
            $('.mdb-select').materialSelect();
        });
    </script><br><br><br><br><br><br>


</body>

</html>
