<?php

require "../sql/connect.php";
echo "error";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$user = $_SESSION['id'];
try {
        $text = $_POST['text'];

        $fileName = $_FILES['fileToUpload']['name'];
        $fileTmpName = $_FILES['fileToUpload']['tmp_name'];
        $fileSize = $_FILES['fileToUpload']['size'];
        $fileError = $_FILES['fileToUpload']['error'];
        $fileType = $_FILES['fileToUpload']['type'];

        echo $text;
        echo $fileName;
    
        $fileExt = explode('.', $fileName);//take apart file name on the .
        $fileActualExt = strtolower(end($fileExt));//want to get extention in lower case
        $allowed = array('jpg', 'jpeg', 'png');
        echo $fileActualExt;
        

        if (in_array($fileActualExt, $allowed)) {
            echo 'how is it';
            if ($fileError === 0) {
                if ($fileSize < 500000) {//file size max is 500 mb
                    echo "error44444";
                    $fileNameNew = uniqid('', true).".".$fileActualExt;//create new file name with unique id
                    $fileDestination = '../feedUploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $bio = "This is the bio";
                    $stmt = $conn->prepare("INSERT INTO feedPhotos (userF, imageF, descr) VALUES (:userF, :imageF, :descr)" );
                    $stmt->execute([":userF" => $user, ":imageF" => $fileDestination, ":descr" => $text]);
                    header("Location: ../user.php");
                }
            }
        }
    
     
    
} catch(PDOException $e) {
    //header("Location: ../index.php?error=sqlerror");
}


?>