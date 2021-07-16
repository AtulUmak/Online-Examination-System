<?php
include_once 'dbinfo.php';
session_start();


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$email= $_POST["email"];
$password= $_POST["psw"];

$sql = "SELECT * FROM users WHERE email='$email' ";
$result = $conn->query($sql);

if ($result->num_rows > 0){ 

    while($row = $result->fetch_assoc()){
        $psw=$row["password"];
        $uid=$row["userid"];
        $uname=$row["name"];
    }

    if($psw==$password){
        $_SESSION["uid"]=$uid;
        $_SESSION["uname"]=$uname;

        header("location:dashboard.php");




    } else {
        header("location:alert.php?id=4");
    }

    
} else {
    header("location:alert.php?id=3");

}


?>