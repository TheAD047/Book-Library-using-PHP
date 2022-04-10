<!DOCTYPE html>
<html lang="en">
<!--This is the shared header across all pages-->
<head>
    <meta charset="UTF-8" />
    <title><?php echo $title; ?></title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
    <script src="./JS/Script.js" type="text/javascript" defer></script>
</head>
<body>
    <header>
    <!-- Navigation Bar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Library</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
            <?php
            if(session_status() == PHP_SESSION_NONE) {
                //initialize session if not already
                session_start();
            }
            if(empty($_SESSION['username'])){
                //anonymus user links
                echo '
                <a class="nav-item nav-link" href="register.php">Register</a>
                <a class="nav-item nav-link" href="login.php">Login</a> ';
            }
            else{
                //looged in user links
                echo '
                <a class="nav-item nav-link" href="logout.php">Logout</a>
                <a class="nav-item nav-link" href="publisher-details.php">Publishers</a>';
            }
            ?>
            <a class="nav-item nav-link" href="library.php">Library</a>
            </div>
        </div>
    </nav>
    </header>