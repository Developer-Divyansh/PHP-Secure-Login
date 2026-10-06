<?php

$servername="localhost";
$user="root";
$password="root";
$dbname="secure_login";

//create connection 
$conn=mysqli_connect($servername,$user,$password,$dbname); 

include 'phpqrcode/qrlib.php';
// include 'DBConn.php';

$pass = mt_rand(10000, 9999999);
$useremail=$_GET['email'];

if($conn){
$sql = "SELECT * FROM `users` WHERE `email` = '$useremail' ";

        // Establish the connection and checking Output
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            $query = "UPDATE `users` SET `password` = $pass WHERE `email` = '$useremail'";
            $res = mysqli_query($conn, $query);
        }
    }
$qrCode = QRcode::png($pass);

?>