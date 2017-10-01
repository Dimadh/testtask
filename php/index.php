<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
</head>
<?php
require_once "dbconection.php"
?>
<?php
if(isset($_SESSION['loged_user'])):?>
<?php echo $_SESSION['loged_user'];?>
<hr>
    <a href="logout.php">Выйти</a>
<?php else:?>
<div class="block">
    <button id="r_button" name="r_button" onclick="window.location.href='signup.php'">Registration</button>
    <button id="s_button" name="s_button" onclick="window.location.href='login.php'">Sign in</button>
</div>
<?php endif;?>
</html>
