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
    <?php include '_header.php'?>
    <div class="container">
        <div class="col-sm-12 col-md-6 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Edit a course</h5>
                    <form class="form-signin" action="/QUIZ/partials/_handleCourse.php?op=edit" method="post">
                        <div class="form-label-group mb-2">
                            <input type="text" id="cname" name="cname" class="form-control" placeholder="course name"
                                required autofocus>
                            <label for="cname">Course Name</label>
                        </div>
                        <div class="form-label-group mb-2">
                            <input type="text" id="ncname" name="ncname" class="form-control" placeholder="course name"
                                required autofocus>
                            <label for="ncname">New Name</label>
                        </div>
                        <button class="btn btn-lg btn-warning btn-block text-uppercase" type="submit">Edit
                        </button>
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