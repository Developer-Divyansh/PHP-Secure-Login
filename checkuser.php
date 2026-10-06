<?php

// die('here o am');
include('DBConn.php');
// Include the qrlib file
include 'phpqrcode/qrlib.php';
            
if ($conn) {
    if (isset($_POST['user_email'])) {
        // Get the Mail entered from User
        $useremail = $_POST['user_email'];

        // Query to check and get data of that user
        $sql = "SELECT * FROM `users` WHERE `email` = '$useremail' ";

        // Establish the connection and checking Output
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            $response = [
                'status' => 'true'
            ];
        } else {
            $response = [
                'status' => 'false',
            ];
        }

        echo json_encode($response);
    }
}
