<!DOCTYPE html>
<html>
    <head>
        <?php
            require "components/meta.php";

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
                session_destroy();
            }
        ?>
    </head>
        
    <body>
        <br><br>
        <div>

            <br><br>

            <?php
                require "components/loginForm.php";
                require "components/registerForm.php";
            ?>

        </div>
        <script src="javaScript/index.js"></script>
    </body>
</html>