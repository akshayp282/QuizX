<?php
session_start();
$showError = "false";
$method = $_SERVER["REQUEST_METHOD"];
if($method == 'POST'){
    include '_dbconnect.php';
    $email = $_POST['inputEmailin'];
    $pass = $_POST['inputPasswordin'];
    $tb_name = $_SESSION['role'];
    echo $tb_name;
    $sql = "Select * from $tb_name where email='$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    echo $tb_name;
    if($numRows == 1){
    while($row = mysqli_fetch_assoc($result)){
        if(password_verify($pass, $row['pass'])){
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['wrong_pass'] = false;
            header("Location: ../$tb_name.php");
            exit();
        }
        else{ 
            $_SESSION['wrong_pass'] = true; 
        }
    }       
    }
    else if($numRows == 0){
     $_SESSION['unreg_user'] = true;   
     $_SESSION['wrong_pass'] = true;
    }
    header("location:".$_SERVER['HTTP_REFERER']);
}

?>