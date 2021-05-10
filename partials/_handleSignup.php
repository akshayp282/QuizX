<?php
session_start();
$showError = "false";
$role = $_SESSION['role'];
$method = $_SERVER["REQUEST_METHOD"];
if($method == 'POST'){
    include '_dbconnect.php';
    $name = $_POST['inputname'];
    $email = $_POST['inputEmail'];
    $pass = $_POST['inputPassword'];
    $cpass = $_POST['inputcPassword'];
    $table_name = $role;
    $existSql = "SELECT * FROM `$table_name` WHERE email = '$email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows > 0){
        $showError = "Email already in use";
    }
    else{
        if($pass == $cpass){
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `$table_name` (`name`, `email`, `pass`) 
            VALUES ('$name','$email', '$hash')";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
                header("Location: /QUIZ/main.php?signupsuccess=true&role=$role");
                exit();
            }
        }
        else{
            $showError = "Passwords do not match";
            }
    }
    header("Location: /QUIZ/main.php?signupsuccess=false&error=$showError&role=$role");
}

?>