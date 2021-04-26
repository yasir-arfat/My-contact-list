<?php
$host = "localhost";
$user = "root";
$db = "mydata";
$conn = mysqli_connect("localhost", "root", "", "mydata");

if($conn === false){
   die("ERROR: Could not connect. " . mysqli_connect_error());
}                      
?>