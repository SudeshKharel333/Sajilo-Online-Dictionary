<?php
    session_start();
    echo $_SESSION['FullName'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sajilo Online Dictionary</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/index.css">
    <!--google font link -->
    <link rel="icon" type="image/x-icon" href="./images/1.png">
</head>
<body>
    <nav>
        <img src="./images/sajilo1.png" height="100px">
        <span id="site-name"><b>Sajilo Online Dictionary</b></span>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.html">About</a></li>
            <?php if(!isset($_SESSION['user'])){ ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php"> Sign Up</a></li>
            <?php } else {?>
                <li><a href="logout.php"> LogOut</a></li>
            <?php } ?>
        </ul>
    </nav>

    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12" id="search-container" style="padding-top:200px;" >
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" id="wordInput">
                    <div class="input-group-btn">
                    <button class="btn btn-default" id="searchBtn">
                        Search &nbsp;<i class="glyphicon glyphicon-search"></i>
                    </button>
                    </div>
                </div>
                <p id="resultSection">
                </p>
            </div>
            <?php if(isset($_SESSION['user'])){ ?>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <h3>Recent Searches</h3>
                    <div class="well well-sm">Basic Well <a href="#"><span class="glyphicon glyphicon-trash  pull-right"></span></a></div>
                    <div class="well well-sm">Basic Well <a href="#"><span class="glyphicon glyphicon-trash  pull-right"></span></a></div>
                    <div class="well well-sm">Basic Well <a href="#"><span class="glyphicon glyphicon-trash  pull-right"></span></a></div>
                    <div class="well well-sm">Basic Well <a href="#"><span class="glyphicon glyphicon-trash  pull-right"></span></a></div>
                    <div class="well well-sm">Basic Well <a href="#"><span class="glyphicon glyphicon-trash  pull-right"></span></a></div>
                    
                </div>
            <?php } ?>

        </div>
    </div>

    <script src="./js/index.js"></script>
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
<footer>
    © 2023 Sajilo Online Dictionary. All rights reserved.
</footer>

</html>