<?php ob_start();?>
<!DOCTYPE html>
<html lang="en">
<?php 
require "../classes/config.php";

require "../classes/User.class.php"; 
$user = new User();

/** 
* Check Login Code
**/
$errorMessage = "";
if( isset( $_POST['checkadmin'] ) )
{
    $adminData = $user->checkAdmin( $_POST );
    if( $adminData != "" )
    {
        header("Location: " .BASE_URL_ADMIN);
    }else{
        $errorMessage = "Username and password doesn't match!";
    }
}
if( isset( $_GET['signout'] ) )
{
    $errorMessage = "Successfully Logged Out";
}
?>
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Lost & Found Admin Login ">
    <meta name="author" content="webtenor">
    <meta name="keywords" content="Lost & Found Admin Login">

    <!-- Title Page-->
    <title>Lost And Found Admin Pannel </title>

    <!-- Fontfaces CSS-->
    <link href="html/css/font-face.css" rel="stylesheet" media="all">
    <link href="html/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="html/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="html/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="html/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="html/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="html/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="html/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="html/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="html/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="html/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="html/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="html/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="../images/landfdark.png" height="80px" width="150px" alt="lostandfound">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="checkadmin">sign in</button>
                                <p> </p>
                                <p> <center> <?php echo $errorMessage;?> </center> </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="html/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="html/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="html/vendor/slick/slick.min.js">
    </script>
    <script src="html/vendor/wow/wow.min.js"></script>
    <script src="html/vendor/animsition/animsition.min.js"></script>
    <script src="html/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="html/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="html/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="html/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="html/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="html/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="html/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="html/js/main.js"></script>

</body>

</html>
<!-- end document-->