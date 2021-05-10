<?php
include '_dbconnect.php';
session_start();
if(isset($_SESSION['role']) && $_SESSION['role']=='teacher')
  {
    if(@$_GET['op']== 'delete') 
    {
    $qname = $_GET['subject'];
    $eid = $_GET['eid'];
    $sql = "DELETE FROM `quizes` WHERE eid = '$eid'";
    $sql2 = "DELETE `questions`,`options` FROM `questions` INNER JOIN `options` WHERE `questions`.`qid` = `options`.`qid` and `questions`.`eid` = '$eid'";
    $result = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql2);
    //echo $result2;
    if($result && $result2){
        header("Location: /QUIZ/quiz.php?quizDeleted=true");
        exit();
    }       
    }
 }


?>