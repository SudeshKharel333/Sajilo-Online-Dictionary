<?php
    echo "
    <nav>
        <img src='./images/logo.png' height='100px'>
        <span id='site-name'><b>Sajilo Online Dictionary</b></span>
        <ul>
                   
            <li><a href='index.php'>Home</a></li>
            <li><a href='book.php'>Search Books</a></li>
            <li><a href='about.php'>About</a></li>";

            if(!isset($_SESSION['user'])){ 
                echo "<li><a href='login.php'>Login</a></li>
                <li><a href='signup.php'> Sign Up</a></li>";
            }
            else {
                echo "Hi ". $_SESSION['FirstName']."!"."
                <li><a href='logout.php'> LogOut</a></li>";
                echo "<a href='profile.php'><img src='./userimages/". $_SESSION['userimage'] ."' style='height:60px;width:60px;border-radius:50%;object-fit:cover'></a>";
            }
        echo "</ul> </nav>";
?>