<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sajilo Online Dictionary</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong">
    <!--google font link -->
    <link rel="icon" type="image/x-icon" href="./images/1.png">
</head>
<body>
    <nav>
        <div class="logo">
            <img src="./images/sajilo1.png" width="200px" height="150px">
        
        <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="about.html">About</a></li>
        <?php if(!isset($_SESSION['user'])){ ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php"> Sign Up</a></li>
        <?php } else {?>
            <li><a href="logout.php"> LogOut</a></li>
        <?php } ?>
        </ul>
        </div>
    </nav>
    <div class=" container pt-5">
        <h1 style="font-family:'Sofia', monospace ;font-size: 55px;" class="animate__animated animate__backInDown"> Sajilo Online dictionary</h1>
    </div>
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-8">
                <input type="text" placeholder="Search word here..." id="wordInput">
                <button type="button" id="searchBtn" class="btn btn-primary btn-sm">Search</button>
                <p id="resultSection" ></p>
            </div>
            <div class="col-lg-4">
                Recent Searches
            </div>
        </div>
    </div>

    <script src="./js/index.js"></script>
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
<footer>
    <p>© 2023 Sajilo Online Dictionary. All rights reserved.</p>
</footer>

</html>