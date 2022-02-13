<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width, initial-scale=1 ">
        <meta name="description" content="save publisher name">
        <title>Save Publisher Name</title>
    </head>
    <body>
        <!--this file is for saving the data to the table publisher-->
        <?php
            //capture the value from the html file
            $publisher = $_POST['publisher'];
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
        ?>
    </body>
</html>