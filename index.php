<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="icon" href="https://img.icons8.com/color/48/000000/exam.png" type="image/gif" sizes="30x30">
    <link rel="stylesheet" href="style.css">
    <title>QuizX</title>
</head>

<body>
    <?php include 'partials/_header.php'?>
    <div class="container my-3">
        <h1 class="text-center text-light">
            Welcome to QuizX.
        </h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-3">
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="card card-product" style="width: 18rem;">
                    <img src="https://source.unsplash.com/500x400/?student,education,books" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <center>
                            <h5 class="card-title">Student <img
                                    src="https://img.icons8.com/fluent/48/000000/student-male.png" /></h5>
                            <p>Enter this section if you are a student</p>
                            <a href="signin.php?role=student" class="btn btn-danger">Enter</a>
                        </center>

                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="card card-product" style="width: 18rem;">
                    <img src="https://source.unsplash.com/500x400/?teacher,education,books" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <center>
                            <h5 class="card-title">Teacher <img
                                    src="https://img.icons8.com/color/48/000000/teacher.png" />
                            </h5>
                            <p>Enter this section if you are a teacher</p>
                            <a href="signin.php?role=teacher" class="btn btn-danger">Enter</a>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>

</html>