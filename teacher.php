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
    <script type="text/javascript">
        (function (global) {

    if(typeof (global) === "undefined") {
        throw new Error("window is undefined");
    }

    var _hash = "!";
    var noBackPlease = function () {
        global.location.href += "#";

        // Making sure we have the fruit available for juice (^__^)
        global.setTimeout(function () {
            global.location.href += "!";
        }, 50);
    };

    global.onhashchange = function () {
        if (global.location.hash !== _hash) {
            global.location.hash = _hash;
        }
    };

    global.onload = function () {
        noBackPlease();

        // Disables backspace on page except on input fields and textarea..
        document.body.onkeydown = function (e) {
            var elm = e.target.nodeName.toLowerCase();
            if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                e.preventDefault();
            }
            // Stopping the event bubbling up the DOM tree...
            e.stopPropagation();
        };
    }
})(window);
    </script>
</head>

<body>
    <?php include 'partials/_header.php'?>
    <?php
    if(isset($_GET['courseCreated']) && $_GET['courseCreated'] == 'true'){
                echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                <strong>Success!</strong> A new course has been added.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                unset($_GET['courseCreated']);
        }
    else if(isset($_GET['courseCreated']) && $_GET['courseCreated'] == 'false'){
                echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                        <strong>Error!</strong> '.$_GET['error'].'.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        unset($_GET['courseCreated']);
                }    
    if(isset($_GET['courseUpdated']) && $_GET['courseUpdated'] == 'true'){
                echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                <strong>Success!</strong> A course has been updated.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                unset($_GET['courseUpdated']);
        }
    else if(isset($_GET['courseUpdated']) && $_GET['courseUpdated'] == 'false'){
                echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                <strong>Error!</strong> '.$_GET['error'].'.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                unset($_GET['courseUpdated']);
        } 
    if(isset($_GET['courseDeleted']) && $_GET['courseDeleted'] == 'true'){
                echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                <strong>Success!</strong> A course has been deleted.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                unset($_GET['courseDeleted']);
    }
    else if(isset($_GET['courseDeleted']) && $_GET['courseDeleted'] == 'false'){
                echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                <strong>Error!</strong> '.$_GET['error'].'.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                unset($_GET['courseDeleted']);
    }
    if(isset($_GET['quizcreated']) && $_GET['quizcreated'] == 'true'){
                echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                <strong>Success!</strong> A quiz has been created.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                unset($_GET['quizcreated']);
    }
    ?>
    <div class="container my-3">
        <h1 class="text-center text-light">
            Hi <em><?php echo $_SESSION['name'];?></em>, Welcome to QuizX.
        </h1>
    </div>
    <div class="container">
        <div class="row mb-2">
            <h3 class="text-light">
                Create/Modify a Course
            </h3>
        </div>
        <div class="row mb-4">
            <div class="col-sm-12 col-md-2">
                <a href="/QUIZ/partials/_addcourse.php" type="button" class="btn btn-success btn-lg">Add a course</a>
            </div>
            <div class="col-sm-12 col-md-2">
                <a href="/QUIZ/partials/_editcourse.php" type="button" class="btn btn-warning btn-lg">Edit a course</a>
            </div>
            <div class="col-sm-12 col-md-2">
                <a href="/QUIZ/partials/_deletecourse.php" type="button" class="btn btn-danger btn-lg">Delete a
                    course</a>
            </div>
        </div>
        <div class="row mb-2">
            <h3 class="text-light">Available courses</h3>
        </div>
        <?php
        include 'partials/_dbconnect.php';
        $sql = "SELECT * FROM `course`";
        $result = mysqli_query($conn, $sql);
        echo '<div class="row">';
        while($row = mysqli_fetch_assoc($result)){
            echo'<div class="col-sm-12 col-md-3 mb-5">
                        <div class="card card-product" style="width: 18rem;">
                            <img src="https://source.unsplash.com/500x400/?'.$row['cname'].'" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title">'.$row['cname'].'</h5>
                                <a href="/QUIZ/partials/_createquiz.php?subject='.$row['cname'].'" class="btn btn-success">Create a
                                    Quiz</a>
                            </div>
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
