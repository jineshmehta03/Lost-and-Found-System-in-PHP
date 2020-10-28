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
               
                        <!--Body-->
                        <div class="md-form">
                             <label for="Form-email3" style="color:green"><b>Event Name:<b style="color:red;">*</b> </b></label>
                            <input type="text" id="Form-email3" class="form-control" name="event_name" placeholder="Event Name" required autocomplete="off">
                           
                        </div><br>

                        <div class="md-form">
                             <label for="Form-email3" style="color:green"><b>Total Clicks:<b style="color:red;">*</b> </b></label>
                            <input type="text"  id="Form-email3" class="form-control"name="total_clicks" placeholder="Total Clicks" required autocomplete="off">
                           
                        </div><br>

                        <div class="md-form">
                             <label for="Form-email3" style="color:green"><b>Assign winner at this much clicks each time:<b style="color:red;">*</b> </b></label>
                            <input type="text"  id="Form-email3" class="form-control"name="winner_at_clicks" placeholder="Winner at clicks" required autocomplete="off">
                           
                        </div><br>


                        <!--Grid row-->
                        <div class="row d-flex align-items-center mb-4">

                            <!--Grid column-->
                            <div class="col-md-1 col-md-5 d-flex align-items-start">
                                <div class="text-center">
                                 <button type="submit" class="btn btn-success" name="submit">Submit</button>
                                </div>
                            </div>
                     
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