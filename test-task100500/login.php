<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
</head>
<?php
require_once "../dateBase/loginuser.php"
?>
<body>
<div class="formDiv">
    <form action="login.php" method="post" id="signIn">
        <ul class="formUl">
            <li>
                <label class="mainLabel" for="signEmail">E-mail</label>
                <input type="email" name="signEmail" id="signEmail" placeholder="email@gmail.com" value="<?php echo @$signEmail;?>">
            </li>
            <li>
                <label class="mainLabel" for="signPassword">Password</label>
                <input type="password" name="signPassword" id="signPassword" placeholder="password">
            </li>
            <li>
                <input type="submit" name="loginUp" id="loginUp">
            </li>
         </ul>
    </form>
</div>
</body>
</html>