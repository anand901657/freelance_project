<?php
session_start();
?>

<html>
    <head>

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
        <table style="border: 1px solid black;text-align:center;">
            <tr>
                <th>Friends</th>
                <th>Click To add friend</th>
                
            </tr>
            
            <?php
            $con = new mysqli('localhost', 'root', '','social_db');
            $sql="Select * from users";
            $result = $con->query($sql);
            echo "<h3>You have ".$result->num_rows." friends</h3>";
            if($result->num_rows > 0)
            {
             
                while($row = $result->fetch_assoc()) { 
                    echo "<tr>";
                    echo "<td>".$row['profile_name']."</td>";
                    echo "<td><button>Add friend</button></td>";
                    echo "</tr>";
                  }
            }
            $con->close();
            ?>
            
        </table>
    </body>
</html>