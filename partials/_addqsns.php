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
    if(isset($_GET['quizcreated']) && $_GET['quizcreated'] == 'true'){
                echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                <strong>Success!</strong> A new quiz has been created. Please add questions.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                unset($_GET['quizcreated']);
    }
    //echo $_SESSION['cid'];
    $cid = $_SESSION['cid'];
    //echo $cid;
    $n = $_GET['qtotal'];
    ?>
    <div class="container my-3">
        <div class="col-sm-12 col-md-6 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Create a Quiz</h5>
                    <?php
                    $id = $_GET['eid'];
                    echo'
                    <form class="form-signin" action="/QUIZ/partials/_handleqsns.php?ch=4&n='.$n.'&eid='.$id.'" method="post">';
                        //echo $n;
                        for($i=1;$i<=$n;$i++){ 
                        echo '
                        <div class="form-label-group">
                            <input type="text" id="ques' .$i.'" name="ques'.$i.'" class="form-control"
                            placeholder="Quiz Title" required autofocus>
                            <label for="ques'.$i.'">Question No. '.$i.'</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="'.$i.'1" name="'.$i.'1" class="form-control" placeholder="Enter Option " A
                                required autofocus>
                            <label for="'.$i.'1">Enter Option A</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="'.$i.'2" name="'.$i.'2" class="form-control" placeholder="Enter Option B"
                                required autofocus>
                            <label for="'.$i.'2">Enter Option B</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="'.$i.'3" name="'.$i.'3" class="form-control" placeholder="Enter Option C"
                                required autofocus>
                            <label for="'.$i.'3">Enter Option C</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="'.$i.'4" name="'.$i.'4" class="form-control" placeholder="Enter Option D"
                                required autofocus>
                            <label for="'.$i.'4">Enter Option D</label>
                        </div>
                        <div class=form-label-group">
                            <select id="ans'.$i.'" name="ans'.$i.'" placeholder="Choose correct answer "
                                class="form-control input-md">
                                <option value="a">Select answer for Question '.$i.'</option>
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="c">C</option>
                                <option value="d">D</option>
                            </select>
                        </div>
                        ';
                        echo '
                        <hr />';
                        }
                        ?>
                    <button class="btn btn-lg btn-success btn-block text-uppercase" type="submit">Submit
                        Questions</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>

</html>