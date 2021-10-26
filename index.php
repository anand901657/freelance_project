<?php     
    function OpenCon()
    {
        $con = new mysqli('localhost', 'root', '');
        return $con;
    }
    $con = OpenCon();
    if ($con->query("CREATE DATABASE social_db")==TRUE)
    {
        echo "<p style='color:green;'>DATABASE CREATED</p>";
        

    }
    else
    {
        echo "ALREADY CREATED".$con->error;
    }

    $con->close();
    $con = new mysqli('localhost', 'root', '','social_db');
    
    $sql="CREATE TABLE  users (
        user_id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_email VARCHAR(50) NOT NULL,
        password VARCHAR(20) NOT NULL,
        profile_name VARCHAR(30) NOT NULL,
        num_of_friends INT(10) UNSIGNED DEFAULT 0,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
    if($con->query($sql)===TRUE)
    {
        echo "<p style='color:green;'>TABLE USERS CREATED</p>";
    }
    else
    {
        echo "TABLE users not created".$con->error;
    }
    $sql="CREATE TABLE  my_friends (
        user_id INT(4) UNSIGNED NOT NULL ,
        friend_id INT(4) UNSIGNED NOT NULL
        )";
    if($con->query($sql)===TRUE)
    {
        echo "<p style='color:green;'>TABLE MY FRIENDS CREATED</p>";
    }
    else
    {
        echo "TABLE my_friends not created".$con->error;
    }
    
?>

<html>
    <head>
        <title>Home Page</title>
    </head>
    <body>
        <h1>Name: </h1>
        <h1>Student ID: </h1>
        <h1>Email: </h1>
        <h1>Declaration: </h1>
        <p>I declare that this assignment is my individual work. I have not
work collaboratively nor have I copied from any other student's work or from any other source. I
have not engaged another party to complete this assignment. I am aware of the University’s policy
with regards to plagiarism. I have not allowed, and will not allow, anyone to copy my work with
the intention of passing it off as his or her own work</p>
        <a href="signup.php">SIGN UP</a>
        <a href="login.php">LOGIN</a>
        <a href="about.php">ABOUT</a>

    </body>
</html>