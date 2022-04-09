    <?php
        require './Include/Authorization-check.php';
        
        $title = "Delete-Book";

        require './Include/header.php';

        if (isset($_GET['bookId'])){
            if (is_numeric($_GET['bookId'])){
                $bookId = $_GET['bookId'];

                $db = new PDO('mysql:host=172.31.22.43;dbname=Arin200489790', 'Arin200489790', 'KRoifWqMoQ');

                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "DELETE FROM books WHERE bookId = :bookId";
                $cmd = $db->prepare($sql);
                $cmd->bindParam(':bookId', $bookId, PDO::PARAM_INT);

                $cmd->execute();

                $db=null;

                echo '<h1>The book has been removed from the database</h1>
                        <a href="./library.php">Go Back To Library</a>';

            }
            else{
                echo "Invalid Book";
            }
        }
        else{
            echo "Invalid Book";
        }
    ?>
    </body>
</html>