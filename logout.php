<?php
session_start();
//Clears the session
session_unset();

//Redirects to homepage//
header("Location: index.php");

?>