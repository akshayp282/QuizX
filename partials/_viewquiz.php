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
        <h3 class="text-light">
            Quiz Questions
        </h3>
        <div class="d-flex justify-content-center row ">
            <div class="col-md-10 col-lg-10">
                <div class="border card-product">
                    <?php 
                    include '_dbconnect.php';
                    $qname = $_GET['subject'];
                    $eid=@$_GET['eid'];
                    $sql = "SELECT * FROM `questions` where eid = '$eid'";
                    $result = mysqli_query($conn, $sql);
                    echo'
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row justify-content-between align-items-center mcq">
                            <h4>'.$qname.'</h4>
                        </div>
                    </div>';
                    $numRows = mysqli_num_rows($result);
                    $p = 'p-3';
                        while($row=mysqli_fetch_array($result)){
                        $ques = $row['ques'];
                        $qid = $row['qid'];
                        echo '<div class="question bg-white px-1 py-2 border-bottom">
                        <div class="d-flex flex-row align-items-center question-title">
                            <h3 class="text-danger">Q.</h3>
                            <h5 class="mt-1">&nbsp;'.$ques.'</h5>
                        </div>';
                        $sql2=mysqli_query($conn,"SELECT * FROM options WHERE qid='$qid'" );
                        while($row=mysqli_fetch_array($sql2)){
                            $option=$row['option'];
                            $optionid=$row['optionid'];
                            echo '
                            <div class="ans">
                                <label class="radio"> <input type="radio" name="ans" value="'.$optionid.'"> <span>'.$option.'</span>
                                </label>
                            </div>';
                    }    
                    }
                    
                ?>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
        </script>
</body>

</html>