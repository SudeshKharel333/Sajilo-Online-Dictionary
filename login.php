<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="login.css">
  <link rel="icon" type="image/x-icon" href="sajilo1.png">
  <style>
    body
    {
        background-color: #b0e0e6 ;
    }
</style>
</head>
<body>

<div class="container mt-2">
  <h2>Login form</h2>
  <form action="login.php" method="post">
    <div class="mb-3 mt-3">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
    <input type="submit">
  </form>
  <?php 
    if (isset($_POST['username'])) 
    {
      $username = $_POST['username'];
      $password = $_POST['password'];
      echo $username;
      echo $password;
      //Connect to db and check if email and password exists in the userlogin table
      $dbHost = "localhost"; // replace with your host
      $dbUsername = "root"; // replace with your database username
      $dbPassword = ""; // replace with your database password
      $dbName = "sajilo_online_dictionary"; // replace with your database name

      $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      $query = "SELECT * FROM userlogin WHERE username = '$username' AND password = '$password'";
      $result = $conn->query($query);
      if ($result->num_rows == 1) 
      {
        echo"login successful";
      }
      //If not exist, echo login failed
      // else login passed
      else
      {
        echo"login failed";
      }
    } 
  ?>
</body>
</html>
