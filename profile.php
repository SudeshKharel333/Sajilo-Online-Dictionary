<?php
    session_start();
    if(!isset($_SESSION['userid'])){ 
        header("Location: index.php"); 
    }
    $userid = $_SESSION['userid'];


    include './includes/constants.php';
    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if ($conn->connect_error){ die("Connection failed: " . $conn->connect_error); }
    $loginQuery = "SELECT username, password,  firstname, lastname, email FROM user WHERE userid = $userid";
    $result = $conn->query($loginQuery);

    if ($result->num_rows == 1) 
    {
        $row = $result->fetch_assoc();
        $username = $row['username'];
        $password = $row['password'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
    } else{
        $conn->close();
        header("Location: index.php");
    }


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
    <div class="container">
        <h3>Profile Information</h3>
        <hr>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="profile.php" method="post">
                    <div class="mb-3">
                        <label for="FirstName">First Name</label>
                        <input type="text" class="form-control" id="firstname"  name="firstname" value="<?php echo $firstname; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="LastName">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pswd" name="pswd" value="<?php echo $password; ?>">
                    </div>
                    <div class="mb-3" style="margin-top:10px">
                        <button type="submit" class="btn btn-primary" >Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["pswd"];

        //Formm validation
        if($firstname == "" || $lastname == "" || $email == "" || $username == ""||  $password == "")
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
             include './includes/constants.php';
            $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            // Update data into the `userinfo` table
            $updateUserInfo = "UPDATE user SET firstname = '$firstname', lastname = '$lastname', email = '$email', username = '$username', password = '$password' WHERE userid = $userid";
            
            if ($conn->query($updateUserInfo) === FALSE) 
            { 
                echo "<div class='notification success'>User Update failed, try again!</div>";
            }
            else{ 
             echo "<div class='notification success'>User Update Successful!</div>";
            }
                
            $conn->close();
        }
    }
?>
<?php include './includes/footer.php'; ?>
</html>