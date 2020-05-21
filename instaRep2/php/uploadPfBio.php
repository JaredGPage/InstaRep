<?php

require "../sql/connect.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$user = $_SESSION['username'];
$bio = $_POST["textBio"];

try {

    $stmt = $conn->prepare("UPDATE users SET bio = :bio WHERE username = :username;");
    $stmt->execute([":bio" => $bio, ":username" => $user]);
    $_SESSION["bio"] = $bio;
    header("Location: ../user.php");

} catch (PDOException $e) {
    header("Location: ../user.php");
}
