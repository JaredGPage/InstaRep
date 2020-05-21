<?php

    require "../sql/connect.php";

    $uid = strtolower(trim($_POST["mailuid"]));
    $password = $_POST["pwd"];

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username OR email = :email"); 
        $stmt->execute([":username" => $uid, ":email" => $uid]);
        
        if ($stmt->rowcount() > 0) {
            $result =  $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($password, $result["password"])) {
                $_SESSION["id"] = $result["id"];
                $_SESSION["username"] = $result["username"];
                $_SESSION["email"] = $result["email"];
                $_SESSION["bio"] = $result["bio"];
                $_SESSION["image"] = $result["image"];
                header("Location: ../user.php");
            } else {
                header("Location: ../index.php?error=passwordsdontmatch");
            }
            
        }   
        else {
            header("Location: ../index.php?error=accountdoesnotexist");
        }
    } catch(PDOException $e) {
        header("Location: ../index.php?error=sqlerror");
    }

?>