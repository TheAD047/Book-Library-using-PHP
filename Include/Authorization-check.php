<?php
    if(session_status() == PHP_SESSION_NONE) {
        //intialize seesion if not already
        session_start();
    }

    if(empty($_SESSION['username'])) {
        //if not logged in resirect to lgin
        header('location: login.php');  
        exit();
    }
