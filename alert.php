<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="headerfooter.css">

  <style>
        .bg {
            background-image: url("bg-01.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 80%;
            padding: 15px ;
            padding-top: 50px ;
            text-align: center ;
            font-size: 30px ;
        }

    </style>


</head>

<body>
<!--HEADER--------------------------------------------->
    <div class="header">
        <div class="logo" >
            <img  height="100" src="logo2.png" >
        </div>
    </div>

<!--navbar--------------------------------------------->    
    <div class="topnav ">
        <a href="index.html">Home</a>
        
    </div>


<?php
if($_GET["id"]==1){
    echo '<div class="bg">
        
        Your account created successfully. Click to <a href="login.html"> login</a>
    </div>
    ';
}

if($_GET["id"]==2){
    echo '<div class="bg">
        
        The email is already registered. Click to <a href="signup.html">try again </a>
    </div>
    ';
}

if($_GET["id"]==3){
    echo '<div class="bg">
        
        The email is not registered. Click to <a href="signup.html"> Register </a>
    </div>
    ';
}

if($_GET["id"]==4){
    echo '<div class="bg">
        
        The password is incorrect. Click to <a href="login.html"> Try again </a>
    </div>
    ';
}

if($_GET["id"]==5){
    echo '<div class="bg">
        
        The password is incorrect. Click to <a href="adminlogin.html"> Try again </a>
    </div>
    ';
}

?>


<!--FOOTER--------------------------------------------->
    <div class="footer">
 
        <img  height="50" src="logo.png" >
        <h6 style="color:white;">All Rights Reserved.</h6>
    </div>


</body>