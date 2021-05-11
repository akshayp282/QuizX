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

    <?php 
    include '_dbconnect.php';
    $showError = "false";
    $role = $_SESSION['role'];
    $cname = $_GET['subject'];
    $cid = "SELECT cid FROM course where cname = '$cname'";
    $sql = mysqli_query($conn, $cid);
    while($row = mysqli_fetch_assoc($sql)){
        $_SESSION['cid'] = $row['cid'];  
    };
   // echo $row['cid'];
    $method = $_SERVER["REQUEST_METHOD"];
    if($method == 'POST'){
    $qname = $_POST['qname'];
    $qright = $_POST['qright'];
    $qwrong = $_POST['qwrong'];
    $qtotal = $_POST['qtotal'];
    $qpassing = $_POST['qpassing'];
    $qtime = $_POST['qtime'];
    $cid = "SELECT cid FROM course where cname = '$cname'";
    $existSql = "SELECT * FROM quizes WHERE qname = '$qname'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows > 0){
        $showError = "Quiz with this name already exists";
    }
    else{
        $cid=$_SESSION['cid'];
        $id = uniqid();
        $sql = "INSERT INTO `quizes` (`cid`,`eid`,`qname`, `qright`, `qwrong`, `qtotal`,`qpassing`, `qdate`,`qtime`) 
        VALUES ('$cid','$id','$qname', '$qright', '$qwrong', '$qtotal','$qpassing',current_timestamp(),'$qtime')";
        $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
                header("Location:_addqsns.php?quizcreated=true&role=$role&qtotal=$qtotal&eid=$id");
                exit();
            }
    }
    header("Location: _createquiz.php?quizcreated=false&role=$role&error=$showError&subject=$cname");
    }
    
    ?>

    <?php 
    /*if(isset($_GET['quizcreated']) && $_GET['quizcreated'] == 'true'){
                echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                <strong>Success!</strong> A new quiz has been created.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                unset($_GET['quizcreated']);
        }*/
    
    ?>
    <div class="container my-3">
        <div class="col-sm-12 col-md-6 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Create a Quiz</h5>
                    <form class="form-signin" action="_createquiz.php" method="post">
                        <div class="form-label-group">
                            <input type="text" id="qname" name="qname" class="form-control" placeholder="Quiz Title"
                                required autofocus>
                            <label for="qname">Quiz Title</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="qright" name="qright" class="form-control"
                                placeholder="Marks for right answer" required autofocus>
                            <label for="qright">Marks for right answer</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="qwrong" name="qwrong" class="form-control"
                                placeholder="Marks for wrong answer" required autofocus>
                            <label for="qwrong">Marks for wrong answer</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="qtotal" name="qtotal" class="form-control"
                                placeholder="Total Questions" required autofocus>
                            <label for="qtotal">Total Questions</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="qpassing" name="qpassing" class="form-control"
                                placeholder="Total Questions" required autofocus>
                            <label for="qpassing">Passing Marks</label>
                        </div>
                        <div class="form-label-group">
                            <input type="number" id="qtime" name="qtime" class="form-control"
                                placeholder="Total Questions" required autofocus>
                            <label for="qtime">Time Limit Per Question</label>
                        </div>
                        <button class="btn btn-lg btn-success btn-block text-uppercase" type="submit">Create
                            Quiz</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>

</html>