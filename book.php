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
    <?php include './includes/header.php';?>
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-12" id="search-container" style="padding-top:200px;" >
                <form class="input-group" action = "book.php" method = "GET">
                    <input type="text" class="form-control" name="wordInput" placeholder="Search Book" id="wordInput">
                    <div class="input-group-btn">
                      <button type="submit" class="btn custom-submit-button">Submit</button>
                    </div>
                </form>
                </p>
            </div>
        </div>
    </div>
    <?php 
  if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['wordInput'])) 
  { 
    $word = $_GET['wordInput'];
    // Form validation
    if ($word != "")
    {      
      // Connect to the database and check if the username and password exist in the userlogin table
      $dbHost = "localhost"; // replace with your host
      $dbUsername = "root"; // replace with your database username
      $dbPassword = ""; // replace with your database password
      $dbName = "sajilo_online_dictionary"; // replace with your database name

      $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
      if ($conn->connect_error)
      {
          die("Connection failed: " . $conn->connect_error);
      }

      $bookQuery = "SELECT bookname, bookauthor, booklink FROM book WHERE bookname LIKE '%$word%' OR bookauthor LIKE '%$word%'";
      $result = $conn->query($bookQuery);
      if ($result->num_rows > 0) 
      {
        echo "<div class='container'><div class='row'>";
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo "<div class='col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-8'>
                    <div class='well well-sm'>
                        <h4>". $row['bookname']."</h4>
                        <br>
                        ".$row['bookauthor']." 
                        <a href='".$row['booklink']."' target='_blank' class='pull-right'>Open <span class='glyphicon glyphicon-open'></span></a>
                    </div>
                  </div>";
          }
        echo "</div></div></div>";
      } else {
          echo "0 results";
      }
    }
  }
  ?>
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
<?php include './includes/footer.php'; ?>

</html>