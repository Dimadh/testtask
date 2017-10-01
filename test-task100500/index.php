<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
</head>
<?php
require_once "../dateBase/dbconection.php"
?>
<?php
if (isset($_SESSION['logedUser'])): ?>
<?php echo $_SESSION['logedUser']; ?>
<hr>
    <a href="logout.php">Выйти</a>
<?php else:?>
<div class="block">
    <button id="registerButton" name="registerButton" onclick="window.location.href='signup.php'">Registration</button>
    <button id="signButton" name="signButton" onclick="window.location.href='login.php'">Sign in</button>
</div>
<?php endif;?>
</html>
