<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>QuizX</title>
</head>

<body>
    <?php include 'partials/_header.php'?>
    <div class="container my-3 bg-light">
        <?php 
        include 'partials/_dbconnect.php';
        $q=mysqli_query($conn,"SELECT * FROM rank ORDER BY score DESC");
        echo  '<div class="panel title"><div class="table-responsive">
        <table class="table table-striped title1" >
        <tr style="color:red"><td><center><b>Rank</b></center></td><td><center><b>Name</b></center></td><td><center><b>QUIZ</b></center></td><td><center><b>Score</b></center></td></tr>';
        $c=0;
        while($row=mysqli_fetch_array($q) )
        {
            $e=$row['pname'];
            $s=$row['score'];
            $eid = $row['eid'];
            $q12=mysqli_query($conn,"SELECT * FROM student WHERE `name`='$e'" );
            while($row=mysqli_fetch_array($q12))
            {
                $name=$row['name'];
            }
            $q23=mysqli_query($conn,"SELECT * FROM quizes WHERE `eid`='$eid'" );
            while($row=mysqli_fetch_array($q23))
            {
                $qname=$row['qname'];
            }
            $c++;
            echo '<tr><td style="color:black"><center><b>'.$c.'</b></center></td><td><center>'.$name.'</center></td><td><center>'.$qname.'</center></td><td><center>'.$s.'</center></td></tr>';
        }
        echo '</table></div></div>';
    ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>

</html>