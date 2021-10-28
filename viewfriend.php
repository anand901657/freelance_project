<?php
if(isset($_POST['Submit'])){ 
    $add_id=trim($_POST["to_add"]);
    

    $con = new mysqli('localhost', 'root', '','social_db');
    $sql="DELETE FROM `my_friends` WHERE my_friends.user_id=".$_SESSION['user_id']." and my_friends.friend_id=".$add_id;
    $sql2="DELETE FROM `my_friends` WHERE my_friends.user_id=".$add_id." and my_friends.friend_id=".$_SESSION['user_id'];
    if($con->query($sql) ===TRUE && $con->query($sql2) ===TRUE)
    {
        echo "added";
        $sql="UPDATE `users` SET `num_of_friends`=`num_of_friends`-1 WHERE user_id=".$_SESSION['user_id'];
        $sql2="UPDATE `users` SET `num_of_friends`=`num_of_friends`-1 WHERE user_id=".$add_id;
        if($con->query($sql) ===TRUE && $con->query($sql2) ===TRUE)
        {
            echo "incremented";
        }
    }
    else
    {
        echo "error".$con->error;
    }

    
}
?>