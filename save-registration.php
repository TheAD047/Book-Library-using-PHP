        <?php
            $title = "save registered user";

            require './Include/header.php';

            $userName = $_POST['username'];
            $password = $_POST['password'];
            $confirm = $_POST['confirm'];
            $check = true;
            echo "a-";
            if(empty($userName)){
                echo '<p>Username is empty</p>';
                $check = false;
            }

            if(empty($password)){
                echo '<p>Password field is empty</p>';
                $check = false;
            }

            if($password != $confirm){
                echo '<p>Password and confirm password do not match</p>';
                $check = false;
            }

            if($check){
                echo "a";
                
                $db = new PDO('mysql:host=172.31.22.43;dbname=Arin200489790', 'Arin200489790', 'KRoifWqMoQ');

                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                echo "b";
                $sql = "SELECT * FROM users WHERE username = :username";

                $cmd = $db->prepare($sql);
                $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
                $cmd->execute();
                $user = $cmd->fetch();

                echo "c";

                if($user){
                    echo '<p>User already exists</p>';
                    $db = null;
                }
                else{
                    echo "d";
                $password = password_hash($password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
                $cmd = $db->prepare($sql);
                $cmd->bindParam(':username', $userName, PDO::PARAM_STR, 50);
                $cmd->bindParam(':password', $password, PDO::PARAM_STR, 250);
                $cmd->execute();
                echo "e";   
                $db = null;
                
                echo '<p> saved </p>';
                }
            }

        ?>
    </body>
</html>