<?php
 
if(isset($_POST['Submit'])){ 
	$emp_email=trim($_POST["email"]);
	$password=trim($_POST["password"]);
    $error="";
	if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $emp_email)){
	    $error= $error."<span style='color:red' class='error'>Please enter valid email, like your@abc.com</span><br>";
	}
	else{
        $con = new mysqli('localhost', 'root', '','social_db');
        $sql="Select * from users where user_email='".$emp_email."' and password='".$password."'";
        $result = $con->query($sql);
        if($result->num_rows > 0)
        {
            // Start the session
            session_start();
            // Set session variables
            while($row = $result->fetch_assoc()) { 
                $_SESSION["f_name"] =$row['profile_name'];
                $_SESSION["email"] =$row['user_email'];
                $_SESSION["user_id"] = $row['user_id'];
              }
            header("Location: friendlist.php");
        }
        else
        {
            $error=$error."<span style='color:red' class='error'>Invalid Email and password </span><br>";
            echo "Error Occured".$con->error;
        }
	}
}
?>