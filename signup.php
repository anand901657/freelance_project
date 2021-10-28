<?php 
	include('create.php'); 
?>
<html>
    <head>
        <style>
            label {
        display: inline-block;
        width: 150px;
        text-align: right;
      }
        </style>
    </head>
    <body>
    <h1 style="text-align:center;">My Social Circle</h1>
    <h3 style="text-align:center;">Registration page</h3>
    <div style="text-align:center ">
        <span style="text-align:center;float:left;margin-left:35%;">
            <form action="" method="post">

                
                    <label >Email</label>
                    <input type="email" name="email" id="email"  placeholder="Your Email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" required><br><br>

                    <label >Profile Name</label>    
                    <input type="text" name="f_name" id="f_name" " placeholder="Your profile Name" value="<?php echo isset($_POST["f_name"]) ? $_POST["f_name"] : ''; ?>" required><br><br>
                
                    <label >Password</label>    
                    <input type="password" name="password" id="password"  placeholder="Password" required><br><br>

                    <label >Confirm Password</label>    
                    <input type="password" name="repeat_password" id="repeat_password" class="form-control" placeholder="Repeat your Password" required><br><br>
                    

                    <input type="submit" name="Submit" value="Submit">
                    <input type="button" value="Clear Form" onclick="onclear()"><br>
            </form>

            <div style="text-align:left">
            <?php if (isset($error)) {
                
                echo "<fieldset>";
                echo "<legend>Messages</legend>";
                echo "<p class='message'>" .$error. "</p>" ;
                echo "</fieldset>";
                 }
            ?>
            </div>
            <a href="index.php">HOME</a>

        </span>
        <span >
            <img src="images/top_image.png" alt="">
        </span>
    </div>
    <script>
        function onclear()
        {
            document.querySelectorAll('input[required]')[0].value='';
            document.querySelectorAll('input[required]')[1].value='';
            document.querySelectorAll('input[required]')[2].value='';
            document.querySelectorAll('input[required]')[3].value='';
        }
    </script>
    </body>
</html>