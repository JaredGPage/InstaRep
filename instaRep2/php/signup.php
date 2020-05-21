<?php 

require "../SQL/connect.php";

$username = strtolower(trim($_POST["uid"]));
$email = strtolower(trim($_POST["mail"]));
$password = $_POST['pwd'];
$passwordRepeat = $_POST['pwd-repeat'];

if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
    header("Location: ../index.php?error=emptyfields&uid=".$username."&mail=".$email);
    exit();
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
    header("Location: ../index.php?error=invalidmailuid");
    exit();
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ //BUILT IN WAY TO TEST IF VALID EMAIL FORMAT
    header("Location: ../index.php?error=invalidmail&uid=".$username);
    exit();
}
else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){ //checks username if has those characters
    header("Location: ../index.php?error=invaliduid&mail=".$email);
    exit();
}
else if($password !== $passwordRepeat){//why does !$password == $passwordRepeat not work...
    header("Location: ../index.php?error=passwordcheck&uid=".$username."&mail=".$email);
    exit();
}else{

    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username OR email = :email"); 
        $stmt->execute([":username" => $username, ":email" => $email]);
        
        if ($stmt->rowcount() > 0) {
            echo "Error: Username or Email Exists";
        }   
        else if ($stmt->rowcount() == 0) {
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);//ENCRYPTS PASSWORD
            $stmt = $conn->prepare("INSERT INTO users (username, email, image, password) VALUES (:username, :email, :image, :password)" );
            $stmt->execute([":username" => $username, ":email" => $email, ":image" =>"default.png" , ":password" => $hashedPwd]);
            header("Location: ../index.php");
        }
    } catch(PDOException $e) {
        echo "Error: SQL didnt execute";
    }

}

?>