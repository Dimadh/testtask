<?php
require_once "dbconection.php";

if (isset($_POST['loginUp'])) {
    $signEmail = $_POST['signEmail'];
    $signPassword = $_POST['signPassword'];

    $sth = $dbh->prepare('SELECT * FROM registrations WHERE email = ?');
    $sth->execute(array($signEmail));

    if (password_verify($signPassword, $sth->fetch()['password'])) {
        $_SESSION['logedUser'] = $signEmail;
        header('Location: /');
    }
    else {
        echo '<div style="color:red; margin-left: 30%">Password or email do not match!</div>';
    }
}