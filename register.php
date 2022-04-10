<?php
    $title = "registeration";

    require './Include/header.php';
?>
        <main class="container">
            <h1>User Registration</h1>
            <!--Generic registration form template from Bootstrap-->
            <form method="post" action="save-registration.php">
                <fieldset class="form-group">
                    <label for="username" class="col-2">Username:</label>
                    <input name="username" id="username" required type="email" placeholder="email@email.com" />
                </fieldset>
                <fieldset class="form-group">
                    <label for="password" class="col-2">Password:</label>
                    <input type="password" name="password" id="password" required
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
                    <!--Image to be interactive for toggling password visibility-->
                    <img src="img/show.png" alt="Show/Hide" id="reveal-toggle" onclick="revealToggle()">
                </fieldset>
                <fieldset class="form-group">
                    <label for="confirm" class="col-2">Confirm Password:</label>
                    <input type="password" name="confirm" id="confirm" required
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
                </fieldset>
                <div class="offset-3">
                    <button class="btn btn-primary" onclick="return passwordCheck()">Register</button>
                </div>
            </form>
        </main>
    </body>
</html>