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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/index.css">
    <!--google font link -->
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
</head>
<body>
    <?php include './includes/header.php'; ?>

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
                <?php
                    $userId = $_SESSION['userid'];

                    // Connect to the database and check if the username and password exist in the userlogin table
                    include './includes/constants.php';

                    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
                    if ($conn->connect_error)
                    {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $searchQuery = "SELECT searchword, searchid FROM search WHERE userid = $userId ORDER BY searchtime DESC";
                    $result = $conn->query($searchQuery);    
                    if ($result->num_rows > 0) 
                    {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo "<div class='well well-sm'>". $row['searchword']." <a href='./deletesearch.php?searchid=".$row['searchid']."'><span class='glyphicon glyphicon-trash  pull-right'></span></a></div>";
                        }
                    } else {
                        echo "0 results";
                    }
                ?>
            </div>
            <?php } ?>
        </div>
    </div>

    <script src="./js/index.js"></script>
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
<?php include './includes/footer.php'; ?>

</html>