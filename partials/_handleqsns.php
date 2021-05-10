<?php 
session_start();
    include '_dbconnect.php';
    $n = @$_GET['n'];
    $eid = @$_GET['eid'];
    $ch = @$_GET['ch'];
    for($i=1;$i<=$n;$i++){
        $qid= uniqid();
        $ques = $_POST['ques'.$i];
        $sql = "INSERT INTO questions VALUES ('$eid','$qid','$ques' , '$ch' , '$i')";
        $result = mysqli_query($conn,$sql);
        $oaid=uniqid();
        $obid=uniqid();
        $ocid=uniqid();
        $odid=uniqid();
        $a=$_POST[$i.'1'];
        $b=$_POST[$i.'2'];
        $c=$_POST[$i.'3'];
        $d=$_POST[$i.'4'];

        $qa=mysqli_query($conn,"INSERT INTO options VALUES  ('$qid','$a','$oaid')");
        $qb=mysqli_query($conn,"INSERT INTO options VALUES  ('$qid','$b','$obid')");
        $qc=mysqli_query($conn,"INSERT INTO options VALUES  ('$qid','$c','$ocid')");
        $qd=mysqli_query($conn,"INSERT INTO options VALUES  ('$qid','$d','$odid')");
        $e = $_POST['ans'.$i];
        switch($e){
            case 'a': $ansid=$oaid;break;
            case 'b': $ansid=$obid;break;
            case 'c': $ansid=$ocid;break;
            case 'd': $ansid=$odid;break;
            default: $ansid = $oaid;
        }        
        $sql2 = "INSERT INTO answers VALUES ('$qid','$ansid')";
        $qans = mysqli_query($conn,$sql2);
    }
        if($qans){
            header("location: /QUIZ/teacher.php?quizcreated=true");
            exit();
        }
    header("location: /QUIZ/teacher.php?quizcreated=false&error=$qans");
    ?>