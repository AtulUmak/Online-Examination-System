<?php
include_once 'dbinfo.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$name= $_POST["name"];
$email= $_POST["email"];
$password= $_POST["psw"];

//check if email is already registered
$sql = "SELECT * FROM users WHERE email='$email' ";
$result = $conn->query($sql);

if ($result->num_rows > 0){ 
    header("location:alert.php?id=2");
} else {


// prepare and bind
$stmt = $conn->prepare("INSERT INTO users (userid,name,email,password) VALUES (?,?,?,?)");
$stmt->bind_param("ssss",$uid,$name ,$email,$password );

// set parameters and execute
$uid=uniqid();

$stmt->execute();

$stmt->close();
$conn->close();

header("location:alert.php?id=1");
}

?>