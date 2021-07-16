<?php
include_once 'dbinfo.php';
session_start();


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$password= $_POST["psw"];

if("qwertyuiop"==$password){

    $_SESSION["name"]="Admin";

    header("location:admindashboard.php");




} else {
    header("location:alert.php?id=5");
}