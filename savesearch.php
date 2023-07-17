<?php
    session_start();
    
    $searchword = "testword";
    if(isset($_SESSION['userid'])){
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
        echo $wordinsertQuery ;
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