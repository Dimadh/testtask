<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
</head>
<?php
require_once "dbconection.php";

    if (isset($_POST['login_up'])){
        $a_email = $_POST['a_email'];
        $a_password = $_POST['a_password'];

        $sth = $dbh->prepare('SELECT * FROM registrations WHERE email = ?');
        $sth->execute(array($a_email));
        
        if (password_verify($a_password, $sth->fetch()['password'])){
            $_SESSION['loged_user'] = $a_email;
            header('Location: index.php');
        }
        else{
            echo '<div style="color:red; margin-left: 30%">Password or email do not match!</div>';
        }
    }
?>
<body>
<div class="form_div">
    <form action="login.php" method="post" id="signin">
        <ul class="form_ul">
            <li>
                <label class="main_label" for="a_email">E-mail</label>
                <input type="email" name="a_email" id="a_email" placeholder="email@gmail.com">
            </li>
            <li>
                <label class="main_label" for="a_password">Password</label>
                <input type="password" name="a_password" id="a_password" placeholder="password">
            </li>
            <li>
                <input type="submit" name="login_up" id="login_up">
            </li>
         </ul>
    </form>
</div>
</body>
</html>