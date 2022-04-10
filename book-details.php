<?php
    require './Include/Authorization-check.php';

    $title = "Book-Details page";

    require './Include/header.php';

    try{
        //this try block grabs existing movie data if we need to edit a record
        //set all to null
        $bookName = null;
        $authorName = null;
        $price = null;
        $publisherId = null;
        $bookId = null;
        
        if (isset($_GET['bookId'])){
            if (is_numeric($_GET['bookId'])){
                //if the book ID passed exists and is a number
                $bookId = $_GET['bookId'];

                //Even if the ID does not exist null will be assigned to other variables 
                //SQL wont allow to set a value to a primary key AUTO INCREMENT column
                $db = new PDO('mysql:host=172.31.22.43;dbname=Arin200489790', 'Arin200489790', 'KRoifWqMoQ');

                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT * FROM books WHERE bookId = :bookId";
                $cmd = $db->prepare($sql);
                $cmd->bindParam(':bookId', $bookId, PDO::PARAM_INT);

                $cmd->execute();

                $book = $cmd->fetch();
                $bookName = $book['bookName'];
                $authorName = $book['authorName'];
                $price = $book['bookPrice'];
                $publisherId = $book['publisherId'];
            }
        }
    }
    catch(Exception $error){
        header('location:general-error.php');
    }
?>

    <a href="library.php">View the Library</a>
    <main>
        <h1>Book Details</h1>
            <!--  one more heading added -->
            <h5>Please complete all fields</h5>
            <!-- by default method="get" if we do not use "post" -->
            <form method="post" action="save-book-details.php" enctype="multipart/form-data">
                <fieldset>
                    <label for="bookName" >Book:</label>
                    <input name="bookName" id="bookName"  maxlength="100"  placeholder="book name" required value="<?php echo $bookName ?>"> 
                </fieldset>
                <fieldset>
                    <label for="authorName">Author:</label>
                    <input name="authorName" id="authorName"  placeholder="author name"  required  maxlength="100" value="<?php echo $authorName ?>">
                </fieldset>
                <fieldset>
                    <label for="price">Price:</label>
                    <input name="price" id="price"  placeholder="price"  type="number"  min="0" required value="<?php echo $price ?>">
                </fieldset>
                <fieldset>
                    <label for="image">Imange</label>
                    <input name="image" id="image" type="file" accept=".png, .jpg">
                </fieldset>
                <fieldset>
                    <label for="publisherId" >Publisher:</label>
                    <div>
                    <select name="publisherId" id="publisherId"  required>  
                        <?php
                        try{
                            $db = new PDO('mysql:host=172.31.22.43;dbname=Arin200489790', 'Arin200489790', 'KRoifWqMoQ');
                            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// debugging


                            $sql ="SELECT * FROM publishers  ORDER BY publisherName";
                            $cmd =$db->prepare($sql);
                            
                            $cmd->execute();
                            $publishers = $cmd->fetchAll();

                            //echo '<option selected>--Select--</option>';
                            foreach($publishers as $publisher){ 
                                if($publisher['publisherId'] == $publisherId){
                                    //if we want to edit a record select its corresponding value
                                    echo '<option selected value= "'.$publisher['publisherId'].'">' .  $publisher['publisherName'] . '</option>';
                                }
                                else{
                                    echo '<option value= "'.$publisher['publisherId'].'">' .  $publisher['publisherName'] . '</option>';
                                }
                            }

                            $db =null;
                        }
                        catch(Exception $error){
                            header('location:general-error.php');
                        }
                        ?>
                    </select>
                    </div>
                </fieldset>
                <input name="bookId" id="bookId" value="<?php echo $bookId ?>" type="hidden">
                <button>Save</button>
            </form>
    </main>
</body>

</html>