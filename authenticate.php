<?php
    //grab credentials
    $username = $_POST['username'];
    $password = $_POST['password'];

    //db connect
    $db = new PDO('mysql:host=172.31.22.43;dbname=Arin200489790', 'Arin200489790', 'KRoifWqMoQ');

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //check if the user exists
    $sql = "SELECT * FROM users WHERE username = :username";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);

    $cmd->execute();

    $user = $cmd->fetch();

    if(!$user) {
        //if the user does not exist 
        $db = null;
        header('location:login.php?invalid=true');
    }
    else{
        if(!$password = password_verify($password, $user['password'])) {
            //if the user exists but the password is incorrect
            $db = null;
            header('location:login.php?invalid=true');
        }
        else{
            //if the user exists and the password is correct
            //start session 
            session_start();
            $_SESSION['username'] = $username;
            $db = null;
            header('location:library.php');
        }
    }
?>