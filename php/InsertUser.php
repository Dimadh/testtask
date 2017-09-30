<?php

require_once "dbconection.php";
    $login = $_POST['login'];
    $email = $_POST['email'];
    $real_name = $_POST['real_name'];
    $password = $_POST['password'];
    $country = $_POST['country'];
    $birth_date = $_POST['birth_date'];
    $agree = $_POST['agree'];


        /*$sth_login = $dbh->prepare('SELECT * FROM registrations WHERE login = ?');
        $sth_login->execute(array($login));
        var_dump($sth_login->fetchAll()['login']);*/


        /*$res = $dbh->query("SELECT * FROM registrations WHERE email = ? LIMIT 1");
        $res->execute(array($email));
        $l_records = $res->fetch(PDO::FETCH_ASSOC);
        var_dump($res->fetch(PDO::FETCH_ASSOC));
        if ($l_records){
            echo "email занят!";
            }else{*/
            $insert_user = $dbh->prepare("INSERT INTO registrations (email, login, password,  real_name, id_country, birth_date, confirm, timestamp) 
                                    VALUES (:email, :login, :password,  :real_name, :id_country, :birth_date, :confirm, now())");

            $insert_user->execute(array(':email' => $email,
                ':login' => $login,
                ':password' => password_hash($password, PASSWORD_DEFAULT),
                ':real_name' => $real_name,
                ':id_country' => $country,
                ':birth_date' => $birth_date,
                ':confirm' => $agree));

        

