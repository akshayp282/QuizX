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
    <div class="container my-3">
        <h1 class="text-center text-light">
            Hi <em><?php echo $_SESSION['name'];?></em>, Welcome to QuizX.
        </h1>
    </div>
    <div class="container">
        <h3 class="text-light">
            Your Quiz Records
        </h3>
        <?php
        include 'partials/_dbconnect.php';
        $email = $_SESSION['email']; 
                $q=mysqli_query($conn,"SELECT DISTINCT * FROM history WHERE email='$email' ORDER BY date DESC " );
                        echo  '<div class="panel title" style="background:#FFF;">
                        <table class="table table-striped title1" >
                        <tr style="color:black;"><td><center><b>S.No.</b></center></td><td><center><b>Quiz Name</b></center></td><td><center><b>Question Solved</b></center></td><td><center><b>Right</b></center></td><td><center><b>Wrong<b></center></td><td><center><b>Score</b></center></td>';
                        $c=0;
                        while($row=mysqli_fetch_array($q))
                        {
                        $eid=$row['eid'];
                        $s=$row['score'];
                        $w=$row['wrong'];
                        $r=$row['correct'];
                        $qa=$row['level'];
                        $q23=mysqli_query($conn,"SELECT qname FROM quizes WHERE eid='$eid'");
                        while($row=mysqli_fetch_array($q23))
                        {  $title=$row['qname'];  }
                        $c++;
                        echo '<tr><td><center>'.$c.'</center></td><td><center>'.$title.'</center></td><td><center>'.$qa.'</center></td><td><center>'.$r.'</center></td><td><center>'.$w.'</center></td><td><center>'.$s.'</center></td></tr>';
                        }
                        echo'</table></div>';
        
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>

</html>
