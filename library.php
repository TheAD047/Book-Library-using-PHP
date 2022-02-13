<!DOCTYPE html>
<html lang="en">
    <head>  
        <meta charset="UTF-8">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width, initial-scale=1 ">
        <meta name="description" content="page to display the data">
        <title>Data Table</title>
    </head>

    <body>
        <!--2 div containers to diffrenciate between the two tables and display appropreateky-->
     
            <h1>LIBRARY</h1>
            <!--this table is for the primary table book details-->
            <table border="1" width="100%">
                <!--table head-->
                <thead>
                    <tr>
                        <th>Book Name</th>
                        <th>Author Name</th>
                    
                        <th>Price</th>
                        <th>Publisher</th>
                    </tr>
                </thead>
                <!--table body-->
                <tbody>
                    <?php
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
                            <td>' . $book['bookName'] . '</td>
                            <td>' . $book['authorName'] . '</td>
                           
                            <td>' . $book['bookPrice'] . '</td>
                            <td>' . $book['publisherName'] . '</td>
                            </tr>';
                        }
                        //close the connection
                        $db= null;
                    ?>
                </tbody>
            </table>
     

    </body>
</html>