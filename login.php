<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login | Sajilo dictionary</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="./css/login.css">
  <link rel="icon" type="image/x-icon" href="./images/xs_logo.png">
</head>
<body>

<div class="container">
<div class="row">
    <div class="col-md-6 offset-md-3 login-form">
      <h2>Login | Sajilo dictionary</h2>
      <form action="login.php" method="post">
        <div class="mb-3 mt-3">
          <label for="username">Username:</label>
          <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" >
        </div>
        <div class="mb-3">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
        </div>
        <button type="submit" class="btn custom-submit-button">Submit</button>
        <div class="mb-3">
          <label >Don't have an account? Signup <a href="./signup.php">here.</a></label><br>
          <label >Continue without signing in? <a href="./index.php">Go home.</a></label>
        </div>
      </form>
    </div>
  </div>
  
  <?php 
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  { 
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Form validation
    if ($username == "" || $password == "")
    {
      echo "Username and Password are required!";
    }
    else
    {
     
      echo "\nusername= " . $username;
      echo "\npassword= " . $password;
      
      // Connect to the database and check if the username and password exist in the userlogin table
      include './includes/constants.php';

      $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
      if ($conn->connect_error)
      {
          die("Connection failed: " . $conn->connect_error);
      }

      $loginQuery = "SELECT userid FROM userlogin WHERE username = '$username' AND password = '$password'";
      $result = $conn->query($loginQuery);

      if ($result->num_rows == 1) 
      {
        // Fetch the row from the result
        $row = $result->fetch_assoc();
        $userid = $row['userid'];

        $userInfoQuery = "SELECT firstname, lastname, userimage FROM userinfo WHERE userid='$userid'";
        $userInfoResult = $conn->query($userInfoQuery);

        if ($userInfoResult->num_rows == 1) 
        {
          $userInfo = $userInfoResult->fetch_assoc();

          $_SESSION['FirstName'] = $userInfo['firstname'];
         
          $_SESSION['user'] = $username;

          $_SESSION['userid'] = $userid;

          $userimage = $userInfo['userimage'];
          $_SESSION['userimage'] = $userimage;
          
          header("Location: index.php");
        }
      }
      else
      {
        echo "\nLogin failed";
      }
    }
  }
  ?>
</body>
</html>
