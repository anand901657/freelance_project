<?php 
	include('login_validation.php'); 
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
    <div class="container ">
    <div class="row">

    <h1 style="text-align:center;">My Social Circle</h1>
    <h3 style="text-align:center;">Registration page</h3>        

    <span style="text-align:center;float:left;margin-left:35%;">
            <form action="" method="post" >

                    <h3 class="py-3"><b>Login Page</b></h3>
                    <label >Email</label>
                    <input type="email" name="email" id="email" placeholder="Your Email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" required><br><br>
                    
                    <label >Password</label>
                    <input type="password" name="password" id="password"  placeholder="Password" required><br><br>

                    
                    <input type="submit" name="Submit"  value="Submit">
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
            <a href="index.php">Home</a>
    </span>
    <span style="margin-left:60px">
        <img src="images/top_image.png" alt="">
    </span>


    </div>
</div>

    <script>
        function onclear()
        {
            document.querySelectorAll('input[required]')[0].value='';
            document.querySelectorAll('input[required]')[1].value='';
        }
    </script>
    </body>
</html>