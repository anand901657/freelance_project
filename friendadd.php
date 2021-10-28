<?php
include(dirname(__DIR__).'addfriend.php'); 

session_start();

if(isset($_SESSION['user_id'])===FALSE)
{
    header("Location: redirect_page.php");
}

?>
<!-- SELECT * from my_friends,users WHERE my_friends.user_id!=3 and my_friends.friend_id=users.user_id; -->
<html>
    <head>
    <style>
        table,td,th{
            border: 1px solid black;
            text-align:center;
        }
    </style>
    </head>
    <body>
        <!-- <?php echo "<h1>EMAIL : ".$_SESSION["email"]."</h1>"?>
        <?php if(isset($_SESSION["f_name"])) echo "<h1>NAME: ".$_SESSION["f_name"]."</h1>"?>
        <?php if(isset($_SESSION["user_id"])) echo "<h1>ID: ".$_SESSION["user_id"]."</h1>"?> -->
        <?php
        print_r($_SESSION);
        ?>
        

        <h1>MY Social Circle</h1>
        <?php if(isset($_SESSION["f_name"])) echo "<h2>".$_SESSION["f_name"]."'s Add Friend Page</h2>"?>
        <?php
            $con = new mysqli('localhost', 'root', '','social_db');
            $sql="Select num_of_friends from users where user_id=".$_SESSION['user_id'];
            $data = $con->query($sql);
            while($row = $data->fetch_assoc()) { 
                echo "<h3>You have ".$row['num_of_friends']." friends </h3>";
              }
            $con->close();
        ?>
        <table >
            <tr>
                <th>Friends</th>
                <th>Click To add friend</th>
                
            </tr>
            
            <?php
            $con = new mysqli('localhost', 'root', '','social_db');
            $sql="SELECT DISTINCT users.user_id,users.profile_name from users WHERE user_id!=".$_SESSION['user_id']." and users.user_id not in ( SELECT friend_id from my_friends WHERE my_friends.user_id=".$_SESSION['user_id'].")";
            $result = $con->query($sql);
            
            if($result->num_rows > 0)
            {
             
                while($row = $result->fetch_assoc()) { 
                    echo "<tr>";
                    echo "<td>".$row['profile_name']."</td>";
                    echo "<td><button onclick='button_clk(".$row['user_id'].");'>Add friend</button></td>";
                    echo "</tr>";
                  }
            }
            $con->close();
            ?>
            
        </table>
        <a href="friendlist.php">friendlist</a>
        <a href="logout.php">Logout</a>

        <form action="" method="POST">
            <input type="hidden" name="to_add" id="in">
            <button name="Submit" id='btn' type="submit" hidden ></button>
        </form>
        <script>
            function button_clk(friend_id)
            {
                console.log(friend_id);
                document.getElementById("in").value=friend_id;
                document.getElementById("btn").click();
            }
        </script>
    </body>
</html>