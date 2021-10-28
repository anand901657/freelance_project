<?php
    session_start();

    if(isset($_SESSION['user_id'])===FALSE)
    {
        header("Location: redirect_page.php");
    }

    include('viewfriend.php'); 
    
?>

<!-- SELECT * from my_friends,users WHERE my_friends.user_id!=3 and my_friends.friend_id=users.user_id; -->
<html>
    <head>
    <style>
        table,td,th{
            border: 1px solid black;
            text-align:center;
            padding:10px;
        }
        th{
            background-color:lightblue;
        }
        td button{
            background-color:deeppink;
            color:white;
            padding:5 30 5 30;
        }
        a{
            margin-left:50px;
        }
    </style>
    </head>
    <body style="text-align:center;">
        

        <h1>MY Social Circle</h1>
        <?php if(isset($_SESSION["f_name"])) echo "<h2>".$_SESSION["f_name"]."'s Friend List Page</h2>"?>
        <?php
            $con = new mysqli('localhost', 'root', '','social_db');
            $sql="Select num_of_friends from users where user_id=".$_SESSION['user_id'];
            $data = $con->query($sql);
            while($row = $data->fetch_assoc()) { 
                echo "<h3>You have ".$row['num_of_friends']." friends </h3>";
              }
            $con->close();
        ?>
        <table style="margin-left:auto;margin-right:auto;">
            <tr>
                <th>No.</th>
                <th>Friends</th>
                <th>Click To unfriend</th>
            </tr>
            
            <?php
            $con = new mysqli('localhost', 'root', '','social_db');
            $sql="SELECT users.user_id,users.profile_name from users,my_friends WHERE users.user_id=my_friends.user_id and my_friends.friend_id=".$_SESSION['user_id'];
            $result = $con->query($sql);
            
            if($result->num_rows > 0)
            {
                $i=1;
                while($row = $result->fetch_assoc()) { 
                    echo "<tr>";
                    echo "<td>".$i."</td>";
                    echo "<td>".$row['profile_name']."</td>";
                    echo "<td><button  onclick='button_clk(".$row['user_id'].");'>Unfriend</button></td>";
                    echo "</tr>";
                    $i=$i+1;
                  }
            }
            $con->close();
            ?>
            
        </table>
        <br>
        <a href="logout.php">Logout</a>
        <a href="friendadd.php">friendadd</a>
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