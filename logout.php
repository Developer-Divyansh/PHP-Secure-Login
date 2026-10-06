<?php
    session_start();
    $ar=$_SESSION['person'];                                                                              //session values (person array)
    if (isset($ar['id'])) {
        session_unset();
        // destroy the session                                                                  **LogOut**
        session_destroy();
        header('Location: index.php');

    }
    else{
        header('Location: index.php');
    } 

?>