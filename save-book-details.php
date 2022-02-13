<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width, initial-scale=1 ">
        <meta name="description" content="HTML form  for primary table">
        <title>Video Game details</title>
    </head>
    <body>
        <?php
            $name = $_POST['bookName'];
            $author = $_POST['authorName'];
            $price = $_POST['price'];
            $publisherId =$_POST['publisherId'];

            $db = new PDO('mysql:host=172.31.22.43;dbname=Arin200489790', 'Arin200489790', 'KRoifWqMoQ');

            $query = "INSERT INTO books(bookName, authorName, bookPrice,publisherId) VALUES (:bookName, :authorName, :price, :publisherId)";

            $cmd = $db->prepare($query);

            $cmd->bindParam(':bookName', $name, PDO::PARAM_STR, 100);
            $cmd->bindParam(':authorName', $author, PDO::PARAM_STR, 100);
            $cmd->bindParam(':price', $price, PDO::PARAM_INT);
            $cmd->bindParam(':publisherId', $publisherId, PDO::PARAM_INT);

            

            $cmd->execute();

            $db = null;

            echo "book saved";
        ?>
    </body>
</html>