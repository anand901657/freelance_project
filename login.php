<?php 
	include('login_validation.php'); 
?>
<html>
    <head>
    
    </head>
    <body>
    <div class="container ">
    <div class="row">
        <div class="col-12 col-sm-5 offset-sm-3 text-center">
        

            <form action="" method="post" name="emp_form" class="signup-content form" id="form" autocomplete="off" onsubmit="return validate();">

                    <h3 class="py-3"><b>Login</b></h3>
                
                    <input type="email" name="email" id="email" class="form-control" placeholder="Your Email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" required><br>
                    
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required><br>

                    
                    <input type="submit" name="Submit" class="btn btn-success" value="Submit"><br>
                    <small id="error">Error Message</small>
            </form>

        </div>

    </div>
    <div>
        <?php if (isset($error)) { echo "<p class='message'>" .$error. "</p>" ;} ?>
    </div>
</div>

    </body>
</html>