<?php

require_once "dbconection.php";

if (isset($_POST['signUp'])){
    $login = $_POST['login'];
    $email = $_POST['email'];
    $realName = $_POST['realName'];
    $password = $_POST['password'];
    $country = $_POST['country'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    $dateOfBirth = $year."-". $month."-".$day;

    $checkLogin = "SELECT COUNT(login) AS login FROM registrations WHERE login = :login";
    $stmtLogin = $dbh->prepare($checkLogin);
    $stmtLogin->bindValue(':login', $login);
    $stmtLogin->execute();
    $rowLogin = $stmtLogin->fetch(PDO::FETCH_ASSOC);

    $checkEmail = "SELECT COUNT(email) AS email FROM registrations WHERE email = :email";
    $stmtEmail = $dbh->prepare($checkEmail);
    $stmtEmail->bindValue(':email', $email);
    $stmtEmail->execute();
    $rowEmail = $stmtEmail->fetch(PDO::FETCH_ASSOC);

    if ($rowLogin['login'] > 0) {
        echo '<div style="color:red; margin-left: 45%">That login already exists!</div>';
    }
    else if ($rowEmail['email'] > 0) {
        echo '<div style="color:red; margin-left: 45%">That email already exists!</div>';
    }
    else {
        $insertUser = $dbh->prepare("
            INSERT INTO 
            registrations (
                email, 
                login, 
                password,  
                real_name, 
                id_country, 
                birth_date, 
                timestamp
            ) 
            VALUES (
              :email, 
              :login, 
              :password,  
              :real_name, 
              :id_country, 
              :birth_date,  
              now()
            )
       ");

        $insertUser->execute(array(':email' => $email,
            ':login' => $login,
            ':password' => password_hash($password, PASSWORD_DEFAULT),
            ':real_name' => $realName,
            ':id_country' => $country,
            ':birth_date' => $dateOfBirth
        ));
        $_SESSION['logedUser'] = $email;
        header('Location: /');
    }
}
?>