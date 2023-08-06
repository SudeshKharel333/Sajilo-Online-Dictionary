<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register | Sajilo dictionary </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="./css/signup.css">
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2 signup-form">
      <h2>Register | Sajilo dictionary </h2>
      <form action="signup.php" method="post"  enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
            <label for="FirstName">First Name</label>
            <input type="text" class="form-control" id="firstname"  name="firstname">
          </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
            <label for="LastName">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname">
        </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
        <label for="username">Username:</label>
          <input type="text" class="form-control" id="username" name="username">
        </div>
        
        <div class="mb-3">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="pwd" name="pswd" required>
        </div>
        <div class="mb-3">
          <label for="age">Age:</label>
          <input type="number" class="form-control" id="age" name="age" min="1">
        </div>
        <div class="mb-3">
          <input type="radio" id="male" name="gender" value="male">
          <label for="male">Male</label>
          <input type="radio" id="female" name="gender" value="female">
          <label for="female">Female</label>
          <input type="radio" id="other" name="gender" value="other">
          <label for="other">Other</label>
        </div>
        <div>
        Select Image File to Upload:
          <input type="file" name="image"><br>
          
        </div>
        
        <button type="submit" class="btn btn-primary custom-signup-button" >Submit</button><div class="mb-3">
          <label >Already have an account? Signin <a href="./login.php">here.</a></label><br>
          <label >Continue without registration? <a href="./index.php">Go home.</a></label>
        </div>
      </form>
  </div>
</div>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["pswd"];
        $gender = "";
        if(isset($_POST["gender"])){
            $gender = $_POST["gender"];
        }
        $age = $_POST["age"];
        $profile_image = $_FILES['image'];

        //Formm validation
        if($firstname == "" || $lastname == "" || $email == "" || $username == ""||  $password == "" || $gender == "" || $age == "" || empty($_FILES["image"]["name"]))
        {
            echo "Please fill up all the fields!";
        }
        else if(strlen($password) < 8){
            echo "Password cannot be less than 8 characters!";
        }
        else if(!preg_match ("/^[a-zA-z]*$/", $firstname) ) 
        {  
          $ErrMsg = "Only alphabets and whitespace are  in firstname.";  
                   echo $ErrMsg;  
        }
         else 
        {
            $dbhost = "localhost"; // replace with your host
            $dbusername = "root"; // replace with your database username
            $dbpassword = ""; // replace with your database password
            $database = "sajilo_online_dictionary"; // replace with your database name
            
            $conn = new mysqli($dbhost, $dbusername, $dbpassword, $database);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            if(isset($profile_image)){
              move_uploaded_file($profile_image["tmp_name"], "./userimages/".$profile_image['name']);
            }
            $profile_image_filename = $profile_image['name'];
            // Insert data into the `userinfo` table
            $query1 = "INSERT INTO userinfo (firstname, lastname, age, gender, email, userimage) VALUES ('$firstname', '$lastname', '$age', '$gender', '$email', '$profile_image_filename')";
            
            if ($conn->query($query1) === TRUE) 
            {
                // Retrieve the auto-generated userid
                $userid = $conn->insert_id;
                echo "User info inserted successfully. ";
                
                // Insert data into the `userlogin` table
                $query2 = "INSERT INTO userlogin (userid, username, password) VALUES ('$userid', '$username', '$password')";
                if ($conn->query($query2) === TRUE)
                {
                    echo "User login info inserted successfully.";
                    header("Location: login.php");
                } 
                else 
                {
                    echo "Error inserting user login info: " . $conn->error;
                }
                
            }
            $conn->close();
        }
    }
?>

</body>
</html>
