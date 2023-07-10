<?php
// Start the session
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="./css/login.css">
  <link rel="icon" type="image/x-icon" href="sajilo1.png">
</head>
<body>

<div class="container">
<div class="row">
    <div class="col-md-8 offset-md-2 login-form">
      <h2>Login form</h2>
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
      </form>
    </div>
  </div>
  
  <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
      $username = $_POST['username'];
      $password = $_POST['password'];

      //Form validation
      if($username == "" || $password == "")
      {
        echo "Username and Password is required!";
      }
      else
      {
        echo "\nusername= ".$username;
        echo "\npassword= ".$password;
        //Connect to db and check if email and password exists in the userlogin table
        $dbHost = "localhost"; // replace with your host
        $dbUsername = "root"; // replace with your database username
        $dbPassword = ""; // replace with your database password
        $dbName = "sajilo_online_dictionary"; // replace with your database name

        $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        $query = "SELECT * FROM userlogin WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($query);
        if ($result->num_rows == 1) 
        {
          //TODO: Get User ID
          $_SESSION['user'] = $username;
          // $userInfoQuery = "SELECT firstname, lastname FROM userinfo WHERE username' = '$username'";
          // $userInfoResult = $conn->query($userInfoQuery);
          // if ($userInfoResult->num_rows == 1) 
          // {
          //   $userInfo = $userInfoResult->fetch_assoc();
          //   $_SESSION['FullName'] = $userInfo['firstname']." ".$userInfo['lastname'];
          // } else{
          //   echo "Error retrieving data";
          // }
          header("Location: index.php");
        }
        //If not exist, echo login failed
        // else login passed
        else
        {
          echo"\nlogin failed";
        }
      }
    } 
  ?>
</body>
</html>
