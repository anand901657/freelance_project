<?php
session_start();
session_destroy();
echo 'You have been logged out. <a href="redirect_page.php">Go back</a>';
?>