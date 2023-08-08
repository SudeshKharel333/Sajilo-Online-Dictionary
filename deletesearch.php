<?php
// deletesearch.php?searchid=5
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['searchid']) && $_GET['searchid'])
    {
        $searchid = $_GET['searchid'];
        $userId = $_SESSION['userid'];
        
        include './includes/constants.php'; 

        $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        $worddeleteQuery = "DELETE FROM search  WHERE searchid = $searchid";
        $conn->query($worddeleteQuery);
        header("Location: index.php");
        
    }
?>