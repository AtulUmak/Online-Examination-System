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
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  padding: 50px ;
}

th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  background-color: #ff0066;
}

td {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}


tr:nth-child(even) {
  background-color: #ccffcc;
}

tr:nth-child(odd) {
  background-color: #ffffcc;
}




.column {
  padding: 10px ;
  background-color: white ;
}


.bg {
            /*background-image: url("bg-01.jpg");*/
            background-color: white ;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 450px ;
            padding: 15px ;
            padding-top: 50px ;
            text-align: center ;
          /*  font-size: 30px ;*/
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
     <div class="column">

<!-------------------------------------------------------------------------------------------->
<?php

include_once 'dbinfo.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM exams ";
$result = $conn->query($sql);

if ($result->num_rows > 0){ 
    echo '<table style="width:100%">';
    echo '  <tr> <th>Exam Name</th> <th>Total Question</th> <th>Duration</th> <th>Action</th> </tr>';
    while($row = $result->fetch_assoc()){
        echo '';
        echo '  <tr> <td>'.$row["title"].'</td> <td>'.$row["total"].'</td> <td>'.$row["etime"].'</td> 
        <td>
        <form  action="startquiz.php" method="POST" >
         <input type="hidden" name="eid" value="'.$row["examid"].'"> 
        <button type="submit" >go</button>
        </form>
         </td> </tr> ';

    }
    echo '</table>';
}    
?>

<!-------------------------------------------------------------------------------------------->
</div>
</div>



<!--FOOTER--------------------------------------------->
<div class="footer">
 
 <img  height="50" src="logo.png" >
 <h6 style="color:white;">All Rights Reserved.</h6>
</div>


</body>

