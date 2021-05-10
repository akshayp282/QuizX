<?php
  include '_dbconnect.php';
  session_start();
  $email=$_SESSION['email'];
  $name = $_SESSION['name'];
  $role = $_SESSION['role'];
  if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) 
  {
    $eid=@$_GET['eid'];
    $sn=@$_GET['n'];
    $subject = @$_GET['subject'];
    $total=@$_GET['t'];
    $ans=$_POST['ans'];
    $qid=@$_GET['qid'];
    $q=mysqli_query($conn,"SELECT * FROM answers WHERE qid='$qid' ");
    while($row=mysqli_fetch_array($q))
    {  $ansid=$row['ansid']; }
    if($ans == $ansid)
    {
      $q=mysqli_query($conn,"SELECT * FROM quizes WHERE eid='$eid' " );
      while($row=mysqli_fetch_array($q) )
      {
        $sahi=$row['qright'];
      }
      if($sn == 1)
      {
        $q=mysqli_query($conn,"INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW())");
      }
      $q=mysqli_query($conn,"SELECT * FROM history WHERE eid='$eid' AND email='$email'");
      while($row=mysqli_fetch_array($q) )
      {
        $s=$row['score'];
        $r=$row['correct'];
      }
      $r++;
      $s=$s+$sahi;
      $q=mysqli_query($conn,"UPDATE `history` SET `score`=$s,`level`=$sn,`correct`=$r, date= NOW()  WHERE  email = '$email' AND eid = '$eid'");
    } 
    else
    {
      $q=mysqli_query($conn,"SELECT * FROM quizes WHERE eid='$eid'" );
      while($row=mysqli_fetch_array($q) )
      {
        $wrong=$row['qwrong'];
      }
      if($sn == 1)
      {
        $q=mysqli_query($conn,"INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW() )");
      }
      $q=mysqli_query($conn,"SELECT * FROM history WHERE eid='$eid' AND email='$email'");
      while($row=mysqli_fetch_array($q))
      {
        $s=$row['score'];
        $w=$row['wrong'];
      }
      $w++;
      $s=$s-$wrong;
      $q=mysqli_query($conn,"UPDATE `history` SET `score`=$s,`level`=$sn,`wrong`=$w, date=NOW() WHERE  email = '$email' AND eid = '$eid'");
    }
    if($sn != $total)
    {
      $sn++;
      header("location:_takequiz.php?subject=$subject&q=quiz&step=2&eid=$eid&n=$sn&t=$total");
    }
    else if(isset($_SESSION['name']))
    {
      $q=mysqli_query($conn,"SELECT score FROM history WHERE eid='$eid' AND email = '$email'" );
      while($row=mysqli_fetch_array($q) )
      {
        $s=$row['score'];
      }
      $q=mysqli_query($conn,"SELECT * FROM rank WHERE pname='$name' AND eid='$eid'");
      $rowcount=mysqli_num_rows($q);
      if($rowcount == 0)
      {
        $q2=mysqli_query($conn,"INSERT INTO rank VALUES('$eid','$name','$s',NOW())");
      }
      else
      {
        while($row=mysqli_fetch_array($q) )
        {
          $sun=$row['score'];
        }
        $sun=$s;
        $q=mysqli_query($conn,"UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE pname= '$name' AND eid = '$eid'");
      }
      header("location:_result.php?subject=$subject&q=result&eid=$eid&qid=$qid&score=$s&n='.$sn.'&t='.$total.'");
    }
    else
    {
      header("location:_result.php?subject=$subject&q=result&eid=$eid&qid=$qid&score=$s&n='.$sn.'&t='.$total.'");
    }
  }