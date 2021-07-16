<?php
session_start();

if(!isset($_SESSION["uid"])){
    header("location:login.html");
}

$uid=$_SESSION["uid"];
$uname=$_SESSION["uname"];


?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="headerfooter.css">
    <script src="https://kit.fontawesome.com/93dd6858a9.js" crossorigin="anonymous"></script>

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
        <a href="dashboard.php"> Dashboard</a>
        <a href="logout.php" > Logout </a>

    <!--namebar--------------------------------------------->
        <div class="namebar">
            <div class="nameplate">
                Welcome,<?php echo $uname ; ?>
            </div>
        </div>

    <!--user icon--------------------------------------------->
        <div class="namebar" >

            <i class="fas fa-user-circle" style="font-size:36px;color:white; padding:5px;" ></i>
        </div>

     </div>


<div class="bg">
     <a href="showexam.php"> Take a Test </a>
     <br>
     <a href="result.php"> View Result </a>
</div>





    
<!--FOOTER--------------------------------------------->
<div class="footer">
 
 <img  height="50" src="logo.png" >
 <h6 style="color:white;">All Rights Reserved.</h6>
</div>


</body>