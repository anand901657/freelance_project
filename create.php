<?php
 
if(isset($_POST['Submit'])){ 
	$f_name=trim($_POST["f_name"]);
	$emp_email=trim($_POST["email"]);
	$password=trim($_POST["password"]);
	$repeat_password=trim($_POST["repeat_password"]);
    $error="";
	if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $emp_email)){
	    $error= $error."<span style='color:red' class='error'>Please enter valide email, like your@abc.com</span><br>";
	}
    if(strlen($f_name) > 25 || preg_match('/[^A-Za-z]/', $f_name))
    {
        $error= $error."<span style='color:red' class='error'>Please enter only alphabets in name </span><br>";
    }
    if(strlen($password) < 8 || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/',$password))
    {
        $error= $error."<span style='color:red' class='error'>Password must contains only 8 char adn others</span><br>";
    }
	if($password != $repeat_password) {
	    $error=  $error."<span style='color:red' class='error'>Password and repeat_password password does not match</span><br>";
	}
	else{
        $con = new mysqli('localhost', 'root', '','social_db');
        $sql="INSERT INTO users ( user_email, password,profile_name,num_of_friends) VALUES ('".$emp_email."','".$password."','".$f_name."',0)";
        if($con->query($sql)===TRUE)
        {
            $last_id = $con->insert_id;
            // Start the session
            session_start();
            echo "Record Added";
            // Set session variables
            $_SESSION["f_name"] =$f_name;
            $_SESSION["email"] =$emp_email;
            $_SESSION["user_id"] = $last_id;
            header("Location: friendadd.php");
        }
        else
        {
            echo "Error Occured".$con->error;
        }
	}
}
?>