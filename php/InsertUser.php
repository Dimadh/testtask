<?php

require_once "dbconection.php";
    $login = $_POST['login'];
    $email = $_POST['email'];
    $real_name = $_POST['real_name'];
    $password = $_POST['password'];
    $country = $_POST['country'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $agree = $_POST['agree'];

    $dateOfBirth = $year."-". $month."-".$day;

        $sql = "SELECT COUNT(login) AS num FROM registrations WHERE login = :login";
        $stmt = $dbh->prepare($sql);

//Bind the provided username to our prepared statement.
        $stmt->bindValue(':username', $login);

//Execute.
        $stmt->execute();

//Fetch the row.
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

//If the provided username already exists - display error.
//TO ADD - Your own method of handling this error. For example purposes,
//I'm just going to kill the script completely, as error handling is outside
//the scope of this tutorial.
if($row['num'] > 0){
    die('That username already exists!');
}else
            $insert_user = $dbh->prepare("INSERT INTO registrations (email, login, password,  real_name, id_country, birth_date, confirm, timestamp) 
                                    VALUES (:email, :login, :password,  :real_name, :id_country, :birth_date, :confirm, now())");

            $insert_user->execute(array(':email' => $email,
                ':login' => $login,
                ':password' => password_hash($password, PASSWORD_DEFAULT),
                ':real_name' => $real_name,
                ':id_country' => $country,
                ':birth_date' => $dateOfBirth,
                ':confirm' => $agree));

        

