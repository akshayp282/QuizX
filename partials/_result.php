<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>QuizX</title>
</head>

<body>
    <?php include '_header.php'?>
    <div class="container my-3">
        <h3 class="text-light">
            Your Quiz Result
        </h3>
        <?php 
        include '_dbconnect.php';
             if(@$_GET['q']== 'result' && @$_GET['eid']) 
                    {
                        $eid=@$_GET['eid'];
                        $subject = @$_GET['subject'];
                        $total=@$_GET['t'];
                        $sn=@$_GET['n'];
                        $score = @$_GET['score'];
                        $email = $_SESSION['email'];
                        $name = $_SESSION['name'];
                        $q=mysqli_query($conn,"SELECT * FROM history WHERE eid='$eid' AND email='$email'");
                        echo  '<div class="panel card-product" style="background: #FFF;">
                        <center><h1 class="title" style="color:#660033">Result</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';

                        while($row=mysqli_fetch_array($q) )
                        {
                            $s=$row['score'];
                            $w=$row['wrong'];
                            $r=$row['correct'];
                            $qa=$row['level'];
                            echo '<tr style="color:#66CCFF"><td>Total Questions</td><td>'.$qa.'</td></tr>
                                <tr style="color:#99cc32"><td>right Answer&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>'.$r.'</td></tr> 
                                <tr style="color:red"><td>Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td>'.$w.'</td></tr>
                                <tr style="color:#66CCFF"><td>Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
                        }
                        /*$q=mysqli_query($conn,"SELECT * FROM rank WHERE pname='$name'");
                        while($row=mysqli_fetch_array($q) )
                        {
                            $s=$row['score'];
                            echo '<tr style="color:#990000"><td>Overall Score&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
                        }*/
                        echo '</table></div>';
                        $q=mysqli_query($conn,"SELECT * FROM quizes WHERE eid='$eid'");
                        while($row=mysqli_fetch_array($q)){
                            $passing = $row['qpassing'];
                        }
                        if($score >= $passing){
                                echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                                <strong>Success!</strong> You have passed the quiz.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                            echo '<a class="btn btn-danger mx-2" href="student.php">Home</a>';
                            echo '<a class="btn btn-warning mx-2" href="quiz.php">Take another quiz</a>';
                        }
                        else{
                            echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                                <strong>Oops!</strong> You could not score the passing marks.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                            echo '<a class="btn btn-danger" href="quiz.php">Try Again</a>'; 
                        }
                    }   
        
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>

</html>