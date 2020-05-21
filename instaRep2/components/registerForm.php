<form action="php/signup.php" method="POST">
    <div id="registerForm" class="formIndex formActive" style="display: none;">
        <h2>Register</h2>
        <?php

        $userValue = "";
        $emailValue = "";

        if (isset($_GET['error'])) { 
            if ($_GET["error"] == "emptyfields") {
                echo "<script>alert('Fill in all the fields!');</script>";
                $userValue = $_GET["uid"];
                $emailValue = $_GET["mail"];
            } else if ($_GET["error"] == "invalidmailuid") {
                echo "<script>alert('Invalid username and e-mail!');</script>";
                $userValue = $_GET["uid"];
                $emailValue = $_GET["mail"];
            } else if ($_GET["error"] == "invalidmail") {
                echo "<script>alert('Invalid e-mail!');</script>";
                $userValue = $_GET["uid"];
            } else if ($_GET["error"] == "invaliduid") {
                echo "<script>alert('Invalid username!');</script>";
                $emailValue = $_GET["mail"];
            } else if ($_GET["error"] == "passwordcheck") {
                echo "<script>alert('Your passwords do not match!');</script>";
                $userValue = $_GET["uid"];
                $emailValue = $_GET["mail"];
            } else if ($_GET["error"] == "usertaken") {
                echo "<script>alert('Username is already taken!');</script>";
                $userValue = $_GET["uid"];
                $emailValue = $_GET["mail"];
            }
        } 

        echo '
            <input type="text" name="uid" value="' . $userValue . '" placeholder="Username"><br>
            <input type="text" name="mail" value="' . $emailValue . '" placeholder="E-mail"><br>
            <input type="password" id="psw1" name="pwd" placeholder="Password"><br>
            <input type="password" id="psw2" style="outline: none;" oninput="checkPasswordMatch()" name="pwd-repeat" placeholder="Re-type Password"><br>
            <p id="confirmation"></p>';
            
        ?>
        <input type="submit">
        <br>
        <!-- <button type="button" id="loginBtn" onclick="showLogin()">Login</button> -->
        <a onclick="showLogin()">Already a user? Login here!</a>
    </div>
</form>