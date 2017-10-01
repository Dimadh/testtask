<?php
require_once "dbconection.php"
?>
<?php
if(isset($_SESSION['loged_user'])): ?>
    Авторизирован
    <hr>
    <button><a href="logout.php">Выйти</a></button>
<?php else:?>
<a href="signup.php">Registration</a>
<a href="login.php">Autorization</a>
<?php endif;?>