 <?php
       include './includes/constants.php';

        $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
         $searchQuery = "SELECT * FROM search";
         $result = $conn->query($searchQuery);    
        if ($result->num_rows > 0) 
        {
            echo "
            <table>
            <tr>
            <th>SearchID</th>&nbsp;&nbsp;&nbsp;&nbsp;
            <th>UserID</th>&nbsp;&nbsp;&nbsp;&nbsp;
            <th>SearchTime</th>&nbsp;&nbsp;&nbsp;&nbsp;
            <th>SearchWord</th>&nbsp;&nbsp;&nbsp;&nbsp;
            </tr>";
        // output data of each row
            while($row = $result->fetch_assoc()) 
            {
               
                echo"<tr><td>". $row['searchid']."</td>&nbsp;&nbsp;&nbsp;&nbsp;<td>".$row['userid']."</td>&nbsp;&nbsp;&nbsp;&nbsp;<td>".$row['searchtime']."</td>&nbsp;&nbsp;&nbsp;&nbsp;<td>".$row['searchword']."</tr></td><br>";
            }
        } else 
        {
            echo "0 results";
        }
        $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
         $searchQuery = "SELECT * FROM user";
         $result = $conn->query($searchQuery);    
        if ($result->num_rows > 0) 
        {
            echo "<table>
            <tr>
            <th>UserID</th>&nbsp;&nbsp;&nbsp;&nbsp;
            <th>Firstname</th>&nbsp;&nbsp;&nbsp;&nbsp;
            <th>Lastname</th>&nbsp;&nbsp;&nbsp;&nbsp;
            <th>Email</th>&nbsp;&nbsp;&nbsp;&nbsp;
            <th>Age</th>&nbsp;&nbsp;&nbsp;&nbsp;
            <th>Gender</th>&nbsp;&nbsp;&nbsp;&nbsp
            </tr>";
        // output data of each row
            while($row = $result->fetch_assoc()) 
            {
               
                echo"<tr><td>". $row['userid']."</td>&nbsp;&nbsp;&nbsp;&nbsp;<td>".$row['firstname']."</td>&nbsp;&nbsp;&nbsp;&nbsp;<td>".$row['lastname']."</td>&nbsp;&nbsp;&nbsp;&nbsp;<td>".$row['email']."</td>&nbsp;&nbsp;&nbsp;&nbsp;<td>".$row['age']."</td>&nbsp;&nbsp;&nbsp;&nbsp;<td>".$row['gender']."</td></tr>";
            }
        } else 
        {
            echo "0 results";
        }
        $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
         $searchQuery = "SELECT * FROM book";
         $result = $conn->query($searchQuery);    
        if ($result->num_rows > 0) 
        {
            echo "<table>
            <tr>
            <th>BookID</th>&nbsp;&nbsp;&nbsp;&nbsp;
            <th>Bookname</th>&nbsp;&nbsp;&nbsp;&nbsp;
            <th>BookAuthor</th>&nbsp;&nbsp;&nbsp;&nbsp;
            <th>Bookprice</th>&nbsp;&nbsp;&nbsp;&nbsp;
            <th>Booklink</th>&nbsp;&nbsp;&nbsp;&nbsp;
            </tr>";
        // output data of each row
            while($row = $result->fetch_assoc()) 
            {
               
                echo"<tr><td>". $row['bookid']."</td>&nbsp;&nbsp;&nbsp;&nbsp;<td>".$row['bookname']."</td>&nbsp;&nbsp;&nbsp;&nbsp;<td>".$row['bookauthor']."</td>&nbsp;&nbsp;&nbsp;&nbsp;<td>".$row['bookprice']."</td>&nbsp;&nbsp;&nbsp;&nbsp;<td>".$row['booklink']."</td></tr>";
            }
        } else 
        {
            echo "0 results";
        }
 ?>
