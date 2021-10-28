

<html>
    <head>
        <title>Home Page</title>        
        <style>
        </style>
    </head>
    <body>
            <h1 style="text-align:center;">MY Social Circle</h1>
            <span style="float:left; width-right :100px; margin:40px; height:100%; ">
            <img src="images/cz_clipart.png" alt="">
            </span>
            

            <span  style="margin-left: 100px; background-color:red;">
                <div >
                <h4>Name: </h4>
                <h4>Student ID: </h4>
                <h4>Email: </h4>
                
                <fieldset>
                <legend>Declaration: </legend>
                
                    <p>I declare that this assignment is my individual work. I have not
                    work collaboratively nor have I copied from any other student's work or from any other source. I
                    have not engaged another party to complete this assignment. I am aware of the University’s policy
                    with regards to plagiarism. I have not allowed, and will not allow, anyone to copy my work with
                    the intention of passing it off as his or her own work</p>

                </fieldset>

                <fieldset>
                    <legend>Messages</legend>
                    <div><?php     
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
                        echo "<p style='color:red;'>ALREADY CREATED".$con->error."</p>";
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
                        
                        $sql="LOAD DATA LOCAL INFILE 'users.txt'
                        INTO TABLE users
                        FIELDS TERMINATED BY ','
                        OPTIONALLY ENCLOSED BY '\"' 
                        LINES TERMINATED BY '\r\n'
                        (user_id,user_email,password,profile_name,num_of_friends)";
                        if($con->query($sql)===TRUE)
                        {
                            echo "<p style='color:green;'>DATA Added to Table Users</p>";
                        }
                        else{
                            echo 'error'.$con->error;
                        }


                        
                    }
                    else
                    {
                        echo "<p style='color:red;'>Table Users Not created  ".$con->error."</p>";
                    }
                    $sql="CREATE TABLE  my_friends (
                        user_id INT(4) UNSIGNED NOT NULL ,
                        friend_id INT(4) UNSIGNED NOT NULL
                        )";
                    if($con->query($sql)===TRUE)
                    {
                        echo "<p style='color:green;'>TABLE MY FRIENDS CREATED</p>";
                        

                        $sql="LOAD DATA LOCAL INFILE 'myfriends.txt'
                        INTO TABLE my_friends
                        FIELDS TERMINATED BY ','
                        OPTIONALLY ENCLOSED BY '\"' 
                        LINES TERMINATED BY '\r\n'
                        (user_id,friend_id)";
                        if($con->query($sql)===TRUE)
                        {
                            echo "<p style='color:green;'>DATA Added to Table my_friends</p>";
                        }
                        else{
                            echo 'error'.$con->error;
                        }
                        
                        
                    }
                    else
                    {
                        echo "<p style='color:red;'>Table My friends Not created  ".$con->error."</p>";                    
                    }
                        

                    ?>
                </div>
                </fieldset>

                <a style="margin-left:50px" href="signup.php">SIGN UP</a>
                <a style="margin-left:50px" href="login.php">LOGIN</a>
                <a style="margin-left:50px" href="about.php">ABOUT</a>
                </div>
            </span>
         
    </body>
</html>