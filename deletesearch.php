<?php
// deletesearch.php?searchid=5
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['wordid']) && $_GET['wordid'])
    {
        $wordid = $_GET['wordid'];
        $userId = $_SESSION['userid'];
        
        include './includes/constants.php'; 

        $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        $worddeleteQuery = "DELETE FROM word  WHERE wordid = $wordid";
        $conn->query($worddeleteQuery);
        header("Location: index.php");
        
    }
?>