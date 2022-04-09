<?php
    $title = "Library page";

    require './Include/header.php';
?>
        <!--2 div containers to diffrenciate between the two tables and display appropreateky-->

            <h1>LIBRARY</h1>
            <?php
                if(!empty($_SESSION['username'])) {
                    echo '<a href="book-details.php">Add a book</a>';
                }
            ?>
            <!--this table is for the primary table book details-->
            <table border="1" width="100%">
                <!--table head-->
                <thead>
                    <tr>
                        <th>Book Name</th>
                        <th>Author Name</th>
                        <th>Price</th>
                        <th>Publisher</th>
                        <?php
                            if(!empty($_SESSION['username'])){
                                echo '<th> Actions </th>';
                            }
                        ?>
                    </tr>
                </thead>
                <!--table body-->
                <tbody>
                    <?php
                    try{
                        //open a new connection to the database
                        $db = new PDO('mysql:host=172.31.22.43;dbname=Arin200489790', 'Arin200489790', 'KRoifWqMoQ');

                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        //actual sql query
                        $query = "SELECT * FROM books INNER JOIN publishers ON books.publisherId = publishers.publisherId";
                        //prepare the command
                        $cmd = $db->prepare($query);
                        //execute
                        $cmd->execute();
                        //fetching all the details
                        $books = $cmd->fetchAll();

                        //loop to display the details in a table
                        foreach($books as $book)
                        {
                            echo '<tr>
                            <td>'; 
                            if(!empty($_SESSION['username'])){
                                echo '<a href="book-details.php?bookId=' . $book['bookId'] . '">' . $book['bookName'] . ' </a> ';
                            }
                            else{
                                echo $book['bookName'];
                            }
                            echo '</td>
                            <td>' . $book['authorName'] . '</td>
                            <td>' . $book['bookPrice'] . '</td>
                            <td>' . $book['publisherName'] . '</td>';
                            if(!empty($_SESSION['username'])){
                                echo '<td> 
                                    <a class = "btn btn-danger" 
                                    onclick="return confirmDelete()"
                                    href="Delete-Book.php?bookId=' . $book['bookId'] . '">
                                    DELETE </a>
                                </td>';
                            }
                            echo '</tr>';
                        }
                        //close the connection
                        $db=null;
                    }
                    catch (Exception $error){
                        header('location:general-error.php');
                    }
                    ?>
                </tbody>
            </table>
    </body>
</html>