<?php
if(isset($_POST['Submit'])){ 
    $add_id=trim($_POST["to_add"]);
    
    session_start();
    $con = new mysqli('localhost', 'root', '','social_db');
    $sql="INSERT INTO `my_friends`(`user_id`, `friend_id`) VALUES (".$_SESSION['user_id'].",".$add_id.")";
    $sql2="INSERT INTO `my_friends`(`user_id`, `friend_id`) VALUES (".$add_id.",".$_SESSION['user_id'].")";
    if($con->query($sql) ===TRUE && $con->query($sql2) ===TRUE)
    {
        $sql="UPDATE `users` SET `num_of_friends`=`num_of_friends`+1 WHERE user_id=".$_SESSION['user_id'];
        $sql2="UPDATE `users` SET `num_of_friends`=`num_of_friends`+1 WHERE user_id=".$add_id;
        if($con->query($sql) ===TRUE && $con->query($sql2) ===TRUE)
        {
        }
    }
    else
    {
        echo "error".$con->error;
    }

    
}

?>