<?php
session_start();

if(!isset($_SESSION["uid"])){
    header("location:login.html");
}

$uid=$_SESSION["uid"];
$uname=$_SESSION["uname"];

?>





<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="headerfooter.css">
    <script src="https://kit.fontawesome.com/93dd6858a9.js" crossorigin="anonymous"></script>


    <style>

            .bg {
              /*background-image: url("bg-01.jpg");*/
              background-color: #e5e4e7 ;
              background-position: center;
              background-repeat: no-repeat;
              background-size: cover;
              min-height: 500px ;
              padding: 15px ;
              padding-top: 5px ;
              
              /*  font-size: 30px ;*/
            }

            .container {
  
              background-color: white ;
              /* width: 100% ; */
              
              border: 1px solid transparent;
              border-radius: 4px;
              margin: auto;
              margin-top: 3% ;
              
              padding: 20px;
              font: 15px "Century Gothic", "Times Roman", sans-serif;
              max-width: 800px;
            }



            .ename {
                
  
                background-color: #e6f2ff ;
                /* width: 100% ; */
                
                border: 1px solid transparent;
                border-radius: 4px;
                margin: auto;
                padding: 20px;
                font-size: 20px ;
                max-width: 1000px;
            }

    </style>


</head>


<body  >


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

<div class="ename">
 Exam Name : <?php echo $_SESSION["ename"]; ?>
   <div style="color:green ; font-size: 20px ; text-align:center ;" >
     <br>
     ANSWERS

   </div>


</div>


<div class="container">

<!-------------------------------------------------------------------------------------------->








<?php

$eid=$_POST["eid"];
$attemptid=$_POST["attemptid"];

include_once 'dbinfo.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM question_table WHERE examid='$eid' ORDER BY sn ";
$result = $conn->query($sql);

if ($result->num_rows > 0){
  while($row = $result->fetch_assoc()){

    $qid=$row["qid"];

    $sql2 = "SELECT * FROM history WHERE attemptid='$attemptid' AND qid='$qid' ";
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0){
      while($row2 = $result2->fetch_assoc()){
       $givenans = $row2["givenans"];
      }
    }else
    $givenans = "Not Attempted";




    echo '
            <b>
            Question No.'.$row["sn"].'<br>'.$row["question"].'<br>
            </b>
            A].'.$row["option1"],'<br>
            B].'.$row["option2"],'<br>
            C].'.$row["option3"],'<br>
            D].'.$row["option4"],'<br>
            GIVEN ANSWER : '.$givenans.'<br>
            CORRECT ANSWER : '.$row["answer"].'<br>
            <hr>';
  }
}


?>


</div>


<!--FOOTER--------------------------------------------->
<div class="footer">
 
 <img  height="50" src="logo.png" >
 <h6 style="color:white;">All Rights Reserved.</h6>
</div>




          
    </body>
    
</html>