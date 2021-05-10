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
    $sql2 = "DELETE `questions`,`options` FROM  `questions` INNER JOIN `options` WHERE `questions`.`qid` = `options`.`qid` and `questions`.`eid` = '$eid'";
    $sql3 = "DELETE FROM `history` where eid = '$eid'";
    $sql4 = "DELETE FROM `rank` where eid = '$eid'";
    $result = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql2);
    $result3 = mysqli_query($conn, $sql3);
    $result4 = mysqli_query($conn, $sql4);
    if($result && $result2 && $result3 && $result4){
        header("Location: /QUIZ/quiz.php?quizDeleted=true");
        exit();
    }       
    }
 }


?>