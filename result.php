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
            background-image: url("bg-01.jpg");
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

$sql = "SELECT * FROM result WHERE uid='$uid' ORDER BY created DESC ";
$result = $conn->query($sql);


if ($result->num_rows > 0){ 
    echo '<table style="width:100%">';
    echo '  <tr> <th>exam name</th> <th>marks</th> <th>submitted on</th> <th>action</th> </tr>';
    while($row = $result->fetch_assoc()){

      $eid=$row["examid"];

      $sql = "SELECT * FROM exams WHERE examid='$eid'";
      $result2 = $conn->query($sql);

      while($row2 = $result2->fetch_assoc()){
        $examname = $row2["title"];

      }






        
        echo '  <tr> <td>'.$examname.'</td> <td>'.$row["marks"].'</td> <td>'.$row["created"].'</td> 
        <td>
        <form  action="showattempt.php" method="POST" >
         <input type="hidden" name="eid" value="'.$row["examid"].'"> 
         <input type="hidden" name="attemptid" value="'.$row["attemptid"].'">
        <button type="submit" > show details</button>
        </form>
         </td> </tr> ';
      

    }
    echo '</table>';
} else {
  echo 'NO RESULTS TO SHOW <br> You may not have attempted any exam yet....';
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

