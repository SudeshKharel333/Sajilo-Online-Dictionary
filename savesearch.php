<?php
    session_start();
    if((isset($_SESSION['userid'])) &&  ($_SERVER["REQUEST_METHOD"] == "GET") && $_GET['searchword'] !="")
    {
        $searchword = $_GET['searchword'];
        $userId = $_SESSION['userid'];
        $dbHost = "localhost"; 
        $dbUsername = "root"; 
        $dbPassword = "";
        $dbName = "sajilo_online_dictionary"; 

        $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        $wordinsertQuery = "INSERT INTO usersearch(userid, searchword) 
                                        VALUES($userId, '$searchword' )";
        if ($conn->query($wordinsertQuery) === TRUE)
        {
            echo "word inserted successfully.";
        } 
        else 
        {
            echo "Error inserting word: " . $conn->error;
        }
    }
?>