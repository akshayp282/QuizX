<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../style2.css">
    <title>QuizX</title>
</head>

<body>
    <?php include '_header.php'?>
    <div class="container my-3">
        <div class="col">
            <center>
                <h1 class="text-light">
                    <span id="count" class=" badge bg-danger">Be Quick</span>
                </h1>
            </center>
        </div>
    </div>
    <div class="container mt-4">
        <div class="d-flex justify-content-center row ">
            <div class="col-md-10 col-lg-10">
                <div class="border card-product">
                    <?php 
                    include '_dbconnect.php';
                    $qname = $_GET['subject'];
                    $eid=@$_GET['eid'];
                    $sn=@$_GET['n'];
                    $total=@$_GET['t'];
                    $sql1 = "SELECT * FROM `quizes` where eid = '$eid'";
                    $res = mysqli_query($conn,$sql1);
                    while($row = mysqli_fetch_array($res)){
                        $GLOBALS['qtime'] = $row['qtime'];
                    }
                    $sql = "SELECT * FROM `questions` where eid = '$eid' AND sno='$sn'";
                    $result = mysqli_query($conn, $sql);
                    echo'
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row justify-content-between align-items-center mcq">
                            <h4>'.$qname.'</h4><span>'.$sn.' out of '.$total.'</span>
                        </div>
                    </div>';
                    while($row=mysqli_fetch_array($result)){
                        $ques = $row['ques'];
                        $qid = $row['qid'];
                        echo '<div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row align-items-center question-title">
                            <h3 class="text-danger">Q. '.$sn.'</h3>
                            <h5 class="mt-1 ml-2">&nbsp;'.$ques.'</h5>
                        </div>';
                    }
                    $sql2=mysqli_query($conn,"SELECT * FROM options WHERE qid='$qid'" );
                    while($row=mysqli_fetch_array($sql2)){
                        $option=$row['option'];
                        $optionid=$row['optionid'];
                        echo '
                        <form id="myForm" action="_update.php?subject='.$qname.'&q=quiz&step=2&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'" method="POST">
                        <div class="ans ml-2">
                            <label class="radio"> <input type="radio" name="ans" value="'.$optionid.'"> <span>'.$option.'</span>
                            </label>
                        </div>';
                    }  
                    echo ' 
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
                    <button class="btn btn-primary d-flex align-items-center btn-success">Submit</button>
                </div>
                </form>';
                ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col">
                <center>
                    <h1 class="text-light visually-hidden">
                        <span id="count" class=" badge bg-danger">Be Quick</span>
                    </h1>
                </center>
                <script type="text/javascript">
                var count = <?php echo $qtime;?>;
                var interval = setInterval(function() {
                        document.getElementById('count').innerHTML = count;
                        count--;
                        if (count === 0) {
                            clearInterval(interval);
                            document.getElementById('count').innerHTML = 'Done';
                            //alert("You're out of time!"); 
                            document.getElementById('myForm').submit();
                        }
                    },
                    1000);
                </script>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
        </script>
</body>

</html>