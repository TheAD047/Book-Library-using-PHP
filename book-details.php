<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Shoe Details</title>
</head>
<body>
    <a href="library.php">View the Library
    </a>
<br>
<br>
    <main>
        <br>
        <h1>Book Details</h1>
            <!--  one more heading added -->
            <h5>Please complete all fields</h5>
            <!-- by default method="get" if we do not use "post" -->
            <form method="post" action="save-book-details.php">
                <fieldset>
                    <label for="bookName" >Book:</label>
                    <input name="bookName" id="bookName"  maxlength="100"  placeholder="book name" required /> 
                </fieldset>
                <fieldset>
                    <label for="authorName">Author:</label>
                    <input name="authorName" id="authorName"  placeholder="author name"  required  maxlength="100">
                </fieldset>
                <fieldset>
                    <label for="price">Price:</label>
                    <input name="price" id="price"  placeholder="price"  type="number"  min="0"   required>
                </fieldset>
                <fieldset>
                    <label for="publisherId" >Publisher:</label>
                    <div>
                    <select name="publisherId" id="publisherId"  required>  
                      <?php
                       $db = new PDO('mysql:host=172.31.22.43;dbname=Arin200489790', 'Arin200489790', 'KRoifWqMoQ');
                       $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// debugging


                       $sql ="SELECT * FROM publishers  ORDER BY publisherName";
                       $cmd =$db->prepare($sql);
                       
                       $cmd->execute();
                       $publishers = $cmd->fetchAll();

                       //echo '<option selected>--Select--</option>';
                       foreach($publishers as $publisher){ 
                           echo '<option value= "'.$publisher['publisherId'].'">' .  $publisher['publisherName'] . '</option>';
                       }
            
                       $db =null;
                      ?>

                    </select>
                    </div>
                </fieldset>
                <button>Save</button>
            </form>
    </main>
</body>

</html>
