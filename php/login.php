<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./style.css">
</head>
<?php
require_once "dbconection.php";
    if (isset($_POST['login_up'])){
        $a_login = $_POST['a_login'];
        $a_password = $_POST['a_password'];

        $sth = $dbh->prepare('SELECT * FROM registrations WHERE login = ?');
        $sth->execute(array($a_login));

        if (password_verify($a_password, $sth->fetch()['password'])){
            $_SESSION['loged_user'] = $a_login;
            header('Location: index.php');
        }
        else{
            echo "Wrong";
    }
}
?>
<body>
<div class="form_div">
    <form action="login.php" method="post" id="registration">
        <ul class="form_ul">
            <li>
                <label class="main_label" for="a_login">Login</label>
                <input type="text" name="a_login" id="a_login">
            </li>
            <li>
                <label class="main_label" for="a_password">Password</label>
                <input type="password" name="a_password" id="a_password">
            </li>
            <li>
                <input type="submit" name="login_up" id="login_up">
            </li>
         </ul>
    </form>
</div>
</body>
</html>