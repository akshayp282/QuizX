<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="/QUIZ/style.css">
    <title>QuizX</title>
</head>

<body>
    <?php include 'partials/_header.php'?>
    <?php
    if(isset($_GET['quizDeleted']) && $_GET['quizDeleted'] == 'true'){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>Success!</strong> The quiz has been deleted.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    unset($_GET['quizDeleted']);
    }
    ?>
    <div class="container my-3">
        <div class="row mb-2">
            <h3 class="text-light">Available Quizes</h3>
        </div>
        <?php
        include 'partials/_dbconnect.php';
        $sql = "SELECT * FROM `quizes`";
        $result = mysqli_query($conn, $sql);
        echo '<div class="row">';
        while($row = mysqli_fetch_assoc($result)){
            $qname = $row['qname'];
            $_SESSION['subject'] = $qname;
            $qtotal = $row['qtotal'];
            $qright = $row['qright'];
            $qwrong = $row['qwrong'];
            $eid = $row['eid'];
            echo'<div class="col-sm-12 col-md-3 mb-5">
                        <div class="card card-product" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">'.$qname.'</h5>
                                <p>Total Questions : '.$qtotal.' </p>
                                <p>Correct Answer : '.$qright.' </p>
                                <p>Marks : '.$qright * $qtotal.'</p>
                                <p>Negative Marking : '.$qwrong.' </p>';
                                if(isset($_SESSION['role']) && $_SESSION['role'] == 'teacher'){
                                    echo '<a href="/QUIZ/partials/_viewquiz.php?subject='.$qname.'&eid='.$eid.'" class="btn btn-success mb-2 mx-2">View
                                    Quiz</a>';
                                }
                                else if(isset($_SESSION['role']) && $_SESSION['role'] == 'student'){
                                    echo '<a href="/QUIZ/partials/_takequiz.php?subject='.$qname.'&eid='.$eid.'&n=1&t='.$qtotal.'" class="btn btn-danger mb-2">Take
                                    Quiz</a>';
                                }
                                if(isset($_SESSION['role']) && $_SESSION['role'] == 'teacher') {
                                    /*echo '<a href="/QUIZ/partials/_modifyquiz.php?subject='.$qname.'" class="btn btn-warning mb-2">Modify
                                    Quiz</a>*/
                                   echo ' <a href="/QUIZ/partials/_deletequiz.php?op=delete&subject='.$qname.'&eid='.$eid.'" class="btn btn-danger mb-2">Delete
                                    Quiz</a>';
                                }    
                       echo'</div>
                        </div>
                    </div>';   
        }
        echo '</div>';
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>

</html>