<?php
    session_start();

    if(!isset($_SESSION['userid'])){ 
        header("Location: index.php"); 
    }

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $userid = $_GET['userid'];


        include './includes/constants.php';
        $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error){ die("Connection failed: " . $conn->connect_error); }
        $loginQuery = "SELECT firstname, lastname, isactive, isadmin FROM user WHERE userid = $userid";
        $result = $conn->query($loginQuery);

        if ($result->num_rows == 1) 
        {
            $row = $result->fetch_assoc();
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $isactive = $row['isactive'];
            $isadmin = $row['isadmin'];
            
        }else{
            $conn->close();
            header("Location: index.php");
        }

        if(isset($_GET['result'])){
            if ($_GET['result'] == '0') 
            {  
                echo "<div class='notification error'>User Update failed, try again!</div>";
            }
            else if ($_GET['result'] == '1') { 
                echo "<div class='notification success'>User Update Successful!</div>";
            }
        }

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
                <form action="edituser.php?userid=<?php echo $userid; ?>" method="post">
                    <div class="mb-3">
                        <label for="FirstName">First Name</label>
                        <input type="text" class="form-control" id="firstname"  name="firstname" value="<?php echo $firstname; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="LastName">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname; ?>">
                    </div>
                    <div class="mb-3 mt-3" style="margin-top:15px">
                        <label for="isAdmin">Is Admin:</label>
                        <select name="isAdmin" id="isAdmin">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    
                    <div class="mb-3 mt-3" style="margin-top:15px">
                        <label for="isActive">Is Active:</label>
                        <select name="isActive" id="isActive">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>

                    <div class="mb-3" style="margin-top:10px">
                        <button type="submit" class="btn btn-primary" >Update</button>
                    </div>
                </form>
            </div>
        </div>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $userid = $_GET['userid'];
        $isactive = $_POST["isActive"];
        $firstname = $_POST['firstname'];
        $lastname =  $_POST['lastname'];

        $isadmin = $_POST["isAdmin"];

        include './includes/constants.php';
        $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // Update data into the `userinfo` table
        $updateUserInfo = "UPDATE user SET isactive = '$isactive', isadmin = '$isadmin' WHERE userid = $userid";
        
        if ($conn->query($updateUserInfo) === FALSE) 
        { 
            header("Location: edituser.php?userid=$userid&result=1"); 
        }
        else{ 
            header("Location: edituser.php?userid=$userid&result=0"); 
        }
            
        $conn->close();
    }
?>