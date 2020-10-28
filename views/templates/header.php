<?php 
ob_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<?php
$userData = "";
    
require "classes/config.php";
require "classes/User.class.php";
require "classes/Categories.php";
    
$output = "";
$afterLogin = "";
    
if(isset($_GET['code']))
{
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var(GOOGLE_REDIRECT_URL, FILTER_SANITIZE_URL));
}

if(isset($_SESSION['token']))
{
    $gClient->setAccessToken($_SESSION['token']);
}

if($gClient->getAccessToken())
{
    // Get user profile data from google
    $gpUserProfile = $google_oauthV2->userinfo->get();

    // Initialize User class
    $user = new User();

    // Getting user profile info
    $gpUserData = array();
    $gpUserData['oauth_uid']  = !empty($gpUserProfile['id'])?$gpUserProfile['id']:'';
    $gpUserData['first_name'] = !empty($gpUserProfile['given_name'])?$gpUserProfile['given_name']:'';
    $gpUserData['last_name']  = !empty($gpUserProfile['family_name'])?$gpUserProfile['family_name']:'';
    $gpUserData['email'] 	  = !empty($gpUserProfile['email'])?$gpUserProfile['email']:'';
    $gpUserData['gender'] 	  = !empty($gpUserProfile['gender'])?$gpUserProfile['gender']:'';
    $gpUserData['locale'] 	  = !empty($gpUserProfile['locale'])?$gpUserProfile['locale']:'';
    $gpUserData['picture'] 	  = !empty($gpUserProfile['picture'])?$gpUserProfile['picture']:'';

    // Insert or update user data to the database
    $gpUserData['oauth_provider'] = 'google';
    $userData = $user->checkUser($gpUserData);

    // Storing user data in the session
    $_SESSION['userData'] = $userData;

    // Render user profile data
    if(!empty($userData)){
        $output = $userData;
        $afterLogin = $userData;
    }else{
        $output = '<h3 style="color:red">Some problem occurred, Please try again.</h3>';
    }
}else{
    // Get login url
    $authUrl = $gClient->createAuthUrl();

    // Render google login button
    $output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'" class="login100-social-item"><img src="images/icons/icon-google.png" alt="GOOGLE"/></a>';
}

if( isset( $_POST['user_login'] ) )
{
    $user = new User();
    $userData = $user->checkFrontUser( $_POST );
    $afterLogin = $userData;
    if( $userData != "" )
    {
        header('Location: ' . filter_var(GOOGLE_REDIRECT_URL, FILTER_SANITIZE_URL));
    }
}
if( isset( $_POST['change_password'] ) )
{
    $user = new User();
    $result = $user->changePassword( $_POST );
}
    
if( isset( $_POST['add_item'] ) )
{
    $user = new User();
    $img = $db->fileupload($_FILES['image']);
    if($img != "" && !is_array($img))
    {
        $_POST['image'] = $img;
    }else{
        $_POST['image'] = null;
    }
    $result = $user->addItem( $_POST );
}
?>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Lost & Found </title>

  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css">

  <!-- Fonts -->
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="css/animate.css" rel="stylesheet" />
  <!-- Squad theme CSS -->
  <link href="css/main.css" rel="stylesheet">
  <link href="css/util.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

  

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
  <!-- Preloader -->
  <div id="preloader">
    <div id="load"></div>
  </div>

  <nav class="navbar navbar-custom navbar-fixed-top" role="navigation"style="height:60px;">
    <div class="container" >
      <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
        <a class="navbar-brand" href="<?php echo BASE_URL;?>">
        <img src="images/landf4.png"  width="100px" style="margin-top:-30px;"/>
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo BASE_URL;?>">Home</a></li>
            <?php
            if( isset( $_SESSION['id'] ) )
            {
                ?>
                <li><a href="<?php echo BASE_URL;?>account.php">My Account</a></li>
                <?php
            }else{
                ?>
                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#loginModel">Member Login</a></li>
                <?php
            }
            ?>
             <li class="active"><a href="https://ayuda.fuertedevelopers.com/">Blogs</a></li>
            <li class="active"><a href="<?php echo BASE_URL;?>products.php">Products</a></li>
           
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
  </nav>