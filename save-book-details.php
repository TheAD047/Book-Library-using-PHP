<?php
        require './Include/Authorization-check.php';
        $title = "save or update book details";

        require './Include/header.php';
        try{
            $name = $_POST['bookName'];
            $author = $_POST['authorName'];
            $price = $_POST['price'];
            $publisherId = $_POST['publisherId'];
            $bookId = $_POST['bookId'];

            $ok = true;

            if(empty(trim($name)))
            {
                echo "Book name cant be empty";
                $ok =false;
            }
            else if(strlen($name) > 100){
                echo "Book name length should be less than 100 characters";$ok =false;
            }

            if(empty(trim($author)))
            {
                echo "Author name cant be empty";
                $ok =false;
            }
            else if(strlen($author) > 100) {
                echo "Author name length should be less than 100 characters";
                $ok =false;
            }

            if(empty($price))
            {
                echo "Price is required<br />";
                $ok =false;
            }
            else
            {
                if(!is_numeric($price)){ //  this will make sure that releaseYear is a number.`
                    echo "price must be numeric";
                    $ok =false;
                }

                else{   

                    if($price < 0){
                    echo "price must be 0 or greater";
                    $ok =false; 
                    }

                }
            }

            if($ok == true)
            {
                $db = new PDO('mysql:host=172.31.22.43;dbname=Arin200489790', 'Arin200489790', 'KRoifWqMoQ');
            
                echo "a";
                if(empty($bookId)){
                    $query = "INSERT INTO books(bookName, authorName, bookPrice, publisherId) VALUES (:bookName, :authorName, :price, :publisherId)";
                    echo "b";
                }
                else if(isset($bookId)){
                    $query = "UPDATE books SET bookName = :bookName, authorName = :authorName,bookPrice = :price, publisherId = :publisherId
                                WHERE bookId = :bookId";
                                echo "Update";
                }

                $cmd = $db->prepare($query);
                echo "c";

                $cmd->bindParam(':bookName', $name, PDO::PARAM_STR, 100);
                $cmd->bindParam(':authorName', $author, PDO::PARAM_STR, 100);
                $cmd->bindParam(':price', $price, PDO::PARAM_INT);
                $cmd->bindParam(':publisherId', $publisherId, PDO::PARAM_INT);
                echo "d";
                if(!empty($bookId)){
                    $cmd->bindParam(':bookId', $bookId, PDO::PARAM_INT);
                }
                echo "-";
                $cmd->execute();
                echo "e";

                $db = null;

                echo "book saved";
            }
        }
        catch(Exception $error){
            header('location:general-error.php');
        }
        ?>
    </body>
</html>