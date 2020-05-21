<?php

require "../sql/connect.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$user = $_SESSION['username'];

try {

        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
    
        $fileExt = explode('.', $fileName);//take apart file name on the .
        $fileActualExt = strtolower(end($fileExt));//want to get extention in lower case
        $allowed = array('jpg', 'jpeg', 'png');
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 500000) {//file size max is 500 mb

                    $fileNameNew = uniqid('', true).".".$fileActualExt;//create new file name with unique id
                    $fileDestination = '../profileUploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $bio = "This is the bio";
                    $stmt = $conn->prepare("UPDATE users SET image = :image WHERE username = :username;" );
                    $stmt->execute([":image" => $fileNameNew, ":username" => $user]);
                    $_SESSION["image"] =  $fileNameNew;
                    header("Location: ../user.php");
                    
                }
            }
        }
    
     
    
} catch(PDOException $e) {
    header("Location: ../user.php");
}


?>