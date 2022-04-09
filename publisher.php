<?php
    $title = "publisger Form";

    require './Include/header.php';
?>
        <h1>New Publisher</h1>
        <!--simple form to capture input for second table-->
        <form method="post" action="save-publisher.php">
            <fieldset>
                <label for="publisher">Publisher Name</label>
                <input name="publisher" id="publisher">
            </fieldset>
            <button>Save</button>
        </form>
    </body>
</html>