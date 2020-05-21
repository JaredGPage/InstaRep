<?php

    require "sql/connect.php";

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    try {
        $stmt = $conn->prepare("SELECT * FROM vwphotos ORDER BY idF DESC");
        $stmt->execute();
        $result = array();

        if ($stmt->execute()) {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $result[] = $row;
                   
        }

        for($i =0; $i < $stmt->rowcount(); $i++){
            echo '<div class="pic">
                    <hr><h3>@' . $result[$i]["username"] . '</h3><hr>
                    <center>
                        <div style="height: 450px;width: 550px;background-position: center;background-repeat: no-repeat;background-size: cover; background-image: url(feedUploads/' . $result[$i]["imageF"] . ');">
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
