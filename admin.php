<?php
    session_start();
    if(!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] == 0){
        header('Location:./index.php');
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
    <?php 
        include './includes/header.php';
        include './includes/constants.php';

        $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
         $searchQuery = "SELECT * FROM word";
         $result = $conn->query($searchQuery);    
         
         $searchArray = array();
        if ($result->num_rows > 0) 
        {

            while($row = $result->fetch_assoc()) 
            {
               array_push($searchArray, $row);
            }
        }

         $searchQuery = "SELECT * FROM user";
         $result = $conn->query($searchQuery);    
        if ($result->num_rows > 0) 
        {
            $userArray = array();

            while($row = $result->fetch_assoc()) 
            {
               array_push($userArray, $row);
            }
        }

         $searchQuery = "SELECT * FROM book";
         $result = $conn->query($searchQuery);    
        if ($result->num_rows > 0) 
        {
            $bookArray = array();

            while($row = $result->fetch_assoc()) 
            {
               array_push($bookArray, $row);
            }
        }
 ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<body>
    <div class="container">
        <h3>Searches</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">UserId</th>
                <th scope="col">Word</th>
                <th scope="col">Searched On</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($searchArray as $row){ ?>
                    <tr>
                        <td><?php echo $row['userid']; ?></td>
                        <td><?php echo $row['word']; ?></td>
                        <td><?php echo $row['searchtime']; ?></td>
                    </tr>
                <?php }?>
            </tbody>
        </table>

        <h3>Users</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Email</th>
                <th scope="col">IsActive</th>
                <th scope="col">IsAdmin</th>
                <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($userArray as $row){ ?>
                    <tr>
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['isActive']; ?></td>
                        <td><?php echo $row['isadmin']; ?></td>
                        <td>
                            <a href="./edituser.php?userid=<?php echo $row['userid']; ?>"><button class="btn btn-primary">Edit</button></a>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>

        <h3>Books</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">bookid</th>
                <th scope="col">bookname</th>
                <th scope="col">bookauthor</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($bookArray as $row){ ?>
                    <tr>
                        <td><?php echo $row['bookid']; ?></td>
                        <td><?php echo $row['bookname']; ?></td>
                        <td><?php echo $row['bookauthor']; ?></td>
                    </tr>
                <?php }?>
            </tbody>
        </table>


    </div>
</body>
<?php include './includes/footer.php'; ?>

</html>