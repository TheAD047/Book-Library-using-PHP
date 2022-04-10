<?php
    require './Include/Authorization-check.php';

    $title = "sace publisher";

    require './Include/header.php';
?>
        <!--this file is for saving the data to the table publisher-->
        <?php
        try{
            //capture the value from the html file
            $publisher = $_POST['publisher'];


            $ok =true;
            if(empty(trim($publisher)))
            {
                 echo "Publisher name cant be empty";
                 $ok =false;
            }

            if(strlen($publisher) > 100)
            {
                echo "Publisher name cant be greater than 100";
                $ok =false;
            }

            if(is_numeric($publisher))
            {
                echo "Publisher name should be characters not number";
                $ok =false;

            }


            if($ok == true)
            {


            //new database connection
            $db = new PDO('mysql:host=172.31.22.43;dbname=Arin200489790', 'Arin200489790', 'KRoifWqMoQ');
            //actual query with a placeholder
            $query = "INSERT INTO publishers(publisherName) VALUES (:publisher)";

            $cmd = $db->prepare($query);
            //assign the value captured to the placeholder and pass it int0 the databaase and save it
            $cmd->bindParam(':publisher', $publisher, PDO::PARAM_STR, 100);

            $cmd->execute();
            //close the connection
            $db = null;

            echo "Publisher Saved";
            echo '<a href="publisher.php">Publisher List</a>';
            }
        }
        catch(Exception $error){
            header('location:general-error.php');
        }
        ?>
    </body>
</html>