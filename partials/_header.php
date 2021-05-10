<?php
session_start();
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/QUIZ"><img src="https://img.icons8.com/ios/50/000000/quiz.png"/></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">';
        if(isset($_SESSION['role'])){
          echo '<a class="nav-link active text-light fw-bold" aria-current="page" href="/Quiz/'.$_SESSION["role"].'.php?'.$_SESSION["role"].'">Home</a>
        </li>';
        }
        else{
          echo '<a class="nav-link active text-light fw-bold" aria-current="page" href="/Quiz/index.php">Home</a>
        </li>';
        }
      if(isset($_SESSION['role']) && $_SESSION['role'] == 'teacher'){
        echo '
        <li class="nav-item">
          <a class="nav-link active text-light fw-bold" aria-current="page" href="/Quiz/'.$_SESSION["role"].'.php"?'.$_SESSION["role"].'>Courses</a>
        </li>';}
      if(isset($_SESSION['role']) && isset($_SESSION['email'])){
       echo' 
         <li class="nav-item">
            <a class="nav-link active text-light fw-bold" aria-current="page" href="/Quiz/quiz.php">Quizes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active text-light fw-bold" aria-current="page" href="/Quiz/rank.php">Ranking</a>
        </li>
      </ul>'; 
      }
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
echo '<p class="text-light fw-bold my-0 mx-2">'.$_SESSION['name'].' </p>
<a href="/QUIZ/partials/_logout.php" class="btn btn-dark mx-2">Logout</a>';
}
echo'
</div>
</div>
</nav>';
if(isset($_SESSION['wrong_pass']) && $_SESSION['wrong_pass'] == true){
echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong> Bonk!</strong> Type that password again.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
unset($_SESSION['wrong_pass']);
}
else if(isset($_SESSION['wrong_pass']) && $_SESSION['wrong_pass'] == false){
unset($_SESSION['wrong_pass']);
unset($_GET['signupsuccess']);
}
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == 'true'){
echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Success!</strong> You can login now.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
unset($_GET['signupsuccess']);
}
else if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == 'false'){
echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Whoopsie!</strong> '.$_GET['error'].'.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
unset($_GET['signupsuccess']);
}

/*
else if(isset($_SESSION['unreg_user']) && $_SESSION['unreg_user'] == true){
echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong> Hey Stranger!</strong> You gotta sign up before logging in my friend.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}*/
?>