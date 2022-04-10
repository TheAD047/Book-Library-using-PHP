<?php
    require './Include/Authorization-check.php';

    $title = "publisher details form";

    require './Include/header.php';
?>
        <!--This page is for adding a publisher thus requires authorization check-->
        <a href="library.php">View the list</a>
        <h1>Publisher Information</h1>

        <h5 >Please complete all fields</h5>

        <form method="post" action="save-publisher.php">
            <fieldset>
                <label for="publisher">Publisher Name</label>
                <input name="publisher" id="publisher" required>
            </fieldset>
            <button>Save</button>
        </form>
    </body>
</html>