<html>
<head>
<title> Login Form </title>
<!-- Include CSS File Here -->
<link rel="stylesheet" href="css/style.css"/>
<!-- Include JS File Here -->
<script src="js/login.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" rel="stylesheet">

<style>
  @import url(http://fonts.googleapis.com/css?family=Raleway);
h2{

padding: 30px 35px;
margin: -10px -50px;
text-align:center;
border-radius: 10px 10px 0 0;
color:green;
}

div.container{
width: 900px;
height: 610px;
margin:35px auto;

}
div.main{
width: 400px;
padding: 10px 50px 25px;
border: 2px solid gray;
border-radius: 10px;
font-family: raleway;
float:left;
margin-top:50px;
}

input[type=text],input[type=password]{
width: 100%;
height: 40px;
padding: 5px;
margin-bottom: 25px;
margin-top: 5px;
border: 2px solid #ccc;
color: black;
font-size: 16px;
border-radius: 5px;
}

label{
color: green;
text-shadow: 0 1px 0 #fff;
font-size: 14px;
font-weight: bold;
}
input[type=button]:hover{
background: linear-gradient(red, orange);
}
input:hover{
  background: linear-gradient(green, lightgreen);
}



  </style>
</head>
<body style="margin-left:30%;">
  
<div class="container" >
<div class="main" >
<h2> <b>Login Form</b> </h2>
<form id="form_id" action="config.php" method="post" name="myform">
<label>User Name :</label>
<input type="text" name="username" id="username"/>
<label>Password :</label>
<input type="password" name="password" id="password"/>
<button class="btn btn-success">Login</button>
</form>

</div>
</div>

</body>
</html>

<script>

var attempt = 3; // Variable to count number of attempts.
// Below function Executes on click of login button.
// function validate(){
// var username = document.getElementById("username").value;
// var password = document.getElementById("password").value;
// if ( username == "user" && password == "admin"){
// alert ("Login successfully");
// window.location = "dashboard.php"; // Redirecting to other page.
// return false;
// }
// else{
// attempt --;// Decrementing by one.
// alert("You have left "+attempt+" attempt;");
// // Disabling fields after 3 attempts.
// if( attempt == 0){
// document.getElementById("username").disabled = true;
// document.getElementById("password").disabled = true;
// document.getElementById("submit").disabled = true;
// return false;
// }
// }
// }
</script>