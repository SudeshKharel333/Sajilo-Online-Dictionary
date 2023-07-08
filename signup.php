<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>
      body
      {
          background-color: #b0e0e6 ;
      }
  </style>
</head>
<body>

<div class="container mt-3">
  <h2>Registration form</h2>
  <form action="signup.php" method="post">
    <div class="mb-3 mt-3">
      <label for="FirstName">FirstName</label>
      <input type="text" class="form-control" id="firstname" placeholder="Enter your Firstname" name="firstname">
    </div>
    <div class="mb-3">
      <label for="LastName">LastName</label>
      <input type="text" class="form-control" id="lastname" placeholder="Enter your Lastname" name="lastname">
    </div>
    <div class="mb-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="mb-3">
    <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
    </div>
    
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
    </div>
    <div class="mb-3">
      <input type="radio" id="male" name="gender" value="male">
      <label for="male">Male</label><br>
      <input type="radio" id="female" name="gender" value="female">
      <label for="female">Female</label><br>
      <input type="radio" id="other" name="gender" value="other">
      <label for="other">Other</label><br>
      <label for="age">Age:</label>
      <input type="number" id="age" name="age" min="1" max="120" required><br>
      <label for="dob">Date of Birth:</label>
      <input type="date" id="dob" name="dob" required><br>
    </div>
    <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
  </form>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["pswd"];
    $gender = $_POST["gender"];
    $age = $_POST["age"];
    $dob = $_POST["dob"];
    
    $dbhost = "localhost"; // replace with your host
    $dbusername = "root"; // replace with your database username
    $dbpassword = ""; // replace with your database password
    $database = "sajilo_online_dictionary"; // replace with your database name
    
    $conn = new mysqli($dbhost, $dbusername, $dbpassword, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Insert data into the `userinfo` table
    $query1 = "INSERT INTO userinfo (firstname, lastname, age, dob, gender, email) VALUES ('$firstname', '$lastname', '$age', '$dob', '$gender', '$email')";
    
    if ($conn->query($query1) === TRUE) {
        // Retrieve the auto-generated userid
        $userid = $conn->insert_id;
        echo "User info inserted successfully. ";
        
        // Insert data into the `userlogin` table
        $query2 = "INSERT INTO userlogin (userid, username, password) VALUES ('$userid', '$username', '$password')";
        if ($conn->query($query2) === TRUE) {
            echo "User login info inserted successfully.";
        } else {
            echo "Error inserting user login info: " . $conn->error;
        }
    } else {
        echo "Error inserting user info: " . $conn->error;
    }
    
    $conn->close();
}
?>

</body>
</html>
