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
            $image = $_FILES['image'];

            $ok = true;

            //verification 
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

            if(!empty($image['name'])) {
                $imgName = $image['name'];

                $tmp = $image['tmp_name'];

                if(mime_content_type($tmp) != 'image/png' && mime_content_type($tmp) != 'image/jpeg') {
                    //if the file is not an image
                    echo 'Image must be jpg or png';
                    $ok = false;
                }
                else{
                    //if the file is valid
                    $imgName = session_id() . '-' . $imgName;
                    if(move_uploaded_file($image['tmp_name'], './img/' . $imgName)){
                        echo "i";
                    }
                }
            }

            if($ok == true)
            {
                //if everything checks out save record
                $db = new PDO('mysql:host=172.31.22.43;dbname=Arin200489790', 'Arin200489790', 'KRoifWqMoQ');
            
                echo "a";
                if(empty($bookId)){
                    //if we wanr to insert a new record
                    $query = "INSERT INTO books(bookName, authorName, bookPrice, publisherId, image) VALUES (:bookName, :authorName, :price, :publisherId, :image)";
                }
                else if(isset($bookId)){
                    //if we update a record
                    $query = "UPDATE books SET bookName = :bookName, authorName = :authorName,bookPrice = :price, publisherId = :publisherId, image = :image
                                WHERE bookId = :bookId";
                }

                $cmd = $db->prepare($query);

                $cmd->bindParam(':bookName', $name, PDO::PARAM_STR, 100);
                $cmd->bindParam(':authorName', $author, PDO::PARAM_STR, 100);
                $cmd->bindParam(':price', $price, PDO::PARAM_INT);
                $cmd->bindParam(':publisherId', $publisherId, PDO::PARAM_INT);
                $cmd->bindParam(':image', $imgName, PDO::PARAM_STR, 100);
                if(!empty($bookId)){
                    //bind a parameter depending on action
                    $cmd->bindParam(':bookId', $bookId, PDO::PARAM_INT);
                }
                $cmd->execute();

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