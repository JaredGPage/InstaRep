<?php
    require "sql/connect.php";

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $userId =  $_SESSION["id"];
    try {
        $stmt = $conn->prepare("SELECT * FROM vwphotos WHERE userF = $userId ORDER BY id DESC");
        $stmt->execute();
        $result = array();

        if ($stmt->execute()) {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $result[] = $row;
                   
        }

        for($i =0; $i < $stmt->rowcount(); $i++){
            echo '<div class="userPic">
                    <hr><h3>@' . $result[$i]["username"] . '</h3><hr>
                    <center>
                        <div style="height: 150px;width: 150px;background-position: center;background-repeat: no-repeat;background-size: cover; background-image: url(feedUploads/' . $result[$i]["imageF"] . ');">
                           </div> <br>
                    </center>
                    <h4>' . $result[$i]["descr"] . '</h4>
                <br>
                </div>
                <br>';
            } 
        }

    } catch (PDOException $e) {
        header("Location: index.php?error=sqlerror");
    }

?>