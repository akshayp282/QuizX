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
    <div class="container my-3">
        <h1 class="text-center text-light">
            Welcome to QuizX.
        </h1>
    </div>
    <?php 
    $role = $_GET['role'];
    $_SESSION['role'] = $role;
    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sign Up</h5>
                        <form class="form-signin" action="/partials/_handleSignup.php" method="post">
                            <div class="form-label-group">
                                <input type="text" id="inputname" name="inputname" class="form-control"
                                    placeholder="Email address" required autofocus>
                                <label for="inputname">Name</label>
                            </div>
                            <div class="form-label-group">
                                <input type="email" id="inputEmail" name="inputEmail" class="form-control"
                                    placeholder="Email address" required autofocus>
                                <label for="inputEmail">Email address</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="inputPassword" name="inputPassword"
                                    action="/partials/_handleLogin.php" method="post" class="form-control"
                                    placeholder="Password" required>
                                <label for="inputPassword">Password</label>
                            </div>
                            <div class="form-label-group">
                                <input type="password" id="inputcPassword" name="inputcPassword" class="form-control"
                                    placeholder="Password" required>
                                <label for="inputcPassword">Confirm Password</label>
                            </div>
                            <button class="btn btn-lg btn-danger btn-block text-uppercase" type="submit">Sign
                                up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>';
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>

</html>