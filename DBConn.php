<?php
$servername="localhost";
$user="xyz";
$password="xyz";
$dbname="secure_login";

//create connection 
$conn=mysqli_connect($servername,$user,$password,$dbname); 
if(!$conn)
{
  die("connection failed".mysqli_connect_error());
} 

?>



