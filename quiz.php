<?php
session_start();

if(!isset($_SESSION["uid"])){
    header("location:login.html");
}

$uid=$_SESSION["uid"];
$uname=$_SESSION["uname"];

?>



<!DOCTYPE html>
<html>
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

            .submitpanel {
              background-color: #e6fff2 ;
              padding: 10px ;
              background-size: cover;
              height: 30px ;

            }

            .submitbtn {
              background-color: #4CAF50;
              color: white;
              font-size: 16px;
              padding: 8px 10px;
              border: none;
              cursor: pointer;
              float: right  ;
              opacity: 0.9;
              }

              .submitbtn:hover {
                opacity: 1;
              }


              .btn {
                  font-weight: 700;
                  padding: 6px 12px;
                  font-size: 13px;
                  line-height: 1.42857143;
                  border-radius: 0;
              }

              .btn:disabled {
  opacity: 0.6;
  cursor: not-allowed;
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
       <div id="showtime">

      </div>
     </div>






     
     <div class="container">

<!-------------------------------------------------------------------------------------------->


        
        <?php

      //  $_SESSION["eid"]=$_POST["eid"];

        if(!isset($_SESSION["eid"])){
          die("YOU HAVE ALREADY SUBMITTED THE QUIZ. TRY TO START A NEW ONE.");
        }
        
        $eid=$_SESSION["eid"];
        include_once "dbinfo.php";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        //getting que
        $sn=$_SESSION['sn'];
        
        
        $sql = "SELECT * FROM question_table WHERE sn='$sn' AND examid='$eid'  ";
        $result = $conn->query($sql);
        

        if ($result->num_rows > 0){
          while($row = $result->fetch_assoc()){

            
            

          
            echo '<form   action="update.php?to=submit" method="POST" >
                  <div style="font-weight: bold;" >
                  Question No. '.$sn.'<hr>'.$row["question"].'<br><br>
                  </div>
                  <input type="radio" name="givenans" value="a" >'.$row["option1"].'</input><br>
                  <input type="radio" name="givenans" value="b" >'.$row["option2"].'</input><br>
                  <input type="radio" name="givenans" value="c" >'.$row["option3"].'</input><br>
                  <input type="radio" name="givenans" value="d" >'.$row["option4"].'</input><br>
                  <input type="hidden" name="qid" value="'.$row["qid"].'" ><br>
                  <hr>  ';
            
          }
          echo '<button class="btn" type="submit" id="back" formaction="update.php?to=previous"> << Previous </button>
                <button class="btn" type="submit" id="next" formaction="update.php?to=next" > Next >> </button>
                &nbsp &nbsp &nbsp
                <button class="btn" type="reset" > Clear Choices </button>
                <br><br>';

          ?>
          <div class="submitpanel">
            <button class="submitbtn" onclick='return confirm("Are you sure you want to submit for final marking? No changes will be allowed after submission.");' type="submit" > Submit Test</button>
          </div>
          
          <?php
          echo '</form>
          <!-------------------------------------------------------------------------------------------->
          </div>
          </div>  
          ';
        }
        else
        echo "0 result";

        
        
        echo '
        <script>
          if('.$sn.'==1){
          document.getElementById("back").disabled = true;
          }
          if('.$sn.'=='.$_SESSION["total"].'){
            document.getElementById("next").disabled = true;
          }

         
          
        </script>


        ';
        
        
        ?>
        
<!--FOOTER--------------------------------------------->
<div class="footer">
 
 <img  height="50" src="logo.png" >
 <h6 style="color:white;">All Rights Reserved.</h6>
</div>




          
    </body>
    
</html>







