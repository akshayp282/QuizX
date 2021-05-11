<?php
include '_dbconnect.php';
session_start();
$showError = "false";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_SESSION['role']) && $_SESSION['role']=='teacher')
  {
    if(@$_GET['op']== 'add') 
    {
    $cname = $_POST['cname'];
    $existSql = "SELECT * FROM `course` WHERE cname = '$cname'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows > 0){
        $showError = "Course already exists";
    }
    else{
            $sql = "INSERT INTO `course` (`cname`, `qcount`, `date`) VALUES ('$cname', '0', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
                header("Location: ../teacher.php?courseCreated=true");
                exit();
            }
            
    }
    header("location: ../teacher.php?courseCreated=false&error=$showError");
    }
    else if(@$_GET['op']== 'edit'){
    $cname = $_POST['cname'];
    $ncname = $_POST['ncname'];
    $existSql = "SELECT * FROM `course` WHERE cname = '$cname'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows == 0){
        $showError = "Course does not exist";
    }
    else{
            $sql = "UPDATE `course` SET `cname` = '$ncname' WHERE `cname` = '$cname'";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
                header("Location: ../teacher.php?courseUpdated=true");
                exit();
            }
            
    }
    header("location: ../teacher.php?courseUpdated=false&error=$showError");
    }
    else if(@$_GET['op']== 'delete'){
    $cname = $_POST['cname'];
    $existSql = "SELECT * FROM `course` WHERE `cname` = '$cname'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows == 0){
        $showError = "Course does not exist";
    }
    else{
            $sql = "DELETE FROM `course` WHERE `cname` = '$cname'";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
                header("Location: ../teacher.php?courseDeleted=true");
                exit();
            }
            
    }
    header("location: ../teacher.php?courseDeleted=false&error=$showError");
    }
  }
}


?>