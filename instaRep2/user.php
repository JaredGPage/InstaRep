<!DOCTYPE html>
<html>

    <head>
        <?php
            require "components/meta.php";
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if (!isset($_SESSION["username"])) {
            
                header("Location: index.php");
            }
        ?>
    </head>
        
    <body>
        
    <br><br>
        <!-- <div> -->
            <br><br>
            
            <?php
                require "components/userProf.php";
                require "components/nav.php";
                require "components/userFeed.php";
            ?>
            <script src="javaScript/user.js"></script>
        <!-- </div> -->
    </body>

</html>