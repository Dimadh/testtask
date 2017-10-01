<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <script type="text/javascript" src="js/validations.js"></script>
    <script type="text/javascript" src="js/day.js"></script>

    <title></title>
</head>
<?php

require_once "dbconection.php";
    if (isset($_POST['sign_up'])){
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

        $check_login = "SELECT COUNT(login) AS login FROM registrations WHERE login = :login";
        $check_email = "SELECT COUNT(email) AS email FROM registrations WHERE email = :email";
        $stmt_l = $dbh->prepare($check_login);
        $stmt_e = $dbh->prepare($check_email);
        $stmt_l->bindValue(':login', $login);
        $stmt_e->bindValue(':email', $email);
        $stmt_l->execute();
        $stmt_e->execute();
        $row_login = $stmt_l->fetch(PDO::FETCH_ASSOC);
        $row_email = $stmt_e->fetch(PDO::FETCH_ASSOC);
        if($row_login['login'] > 0){
            echo '<div style="color:red; margin-left: 45%">That login already exists!</div>';
        }else if ($row_email['email'] > 0){
            echo '<div style="color:red; margin-left: 45%">That email already exists!</div>';
        }else {
            $insert_user = $dbh->prepare("INSERT INTO registrations (email, login, password,  real_name, id_country, birth_date, confirm, timestamp) 
                                            VALUES (:email, :login, :password,  :real_name, :id_country, :birth_date, :confirm, now())");

            $insert_user->execute(array(':email' => $email,
                ':login' => $login,
                ':password' => password_hash($password, PASSWORD_DEFAULT),
                ':real_name' => $real_name,
                ':id_country' => $country,
                ':birth_date' => $dateOfBirth,
                ':confirm' => $agree));
        }
    }
?>
    
<body>
<div class="form_div">
    <form action="signup.php" method="post" id="registration" onsubmit="call()" class="validation_singupform" >
        <ul class="form_ul">
            <li>
                <label class="main_label" for="login">Login</label>
                <input type="text" name="login" id="login" class="login required_field">
            </li>
            <li>
                <label class="main_label" for="email">E-mail</label>
                <input type="email" name="email" id="email" class="email required_field">
            </li>
            <li>
                <label class="main_label" for="real_name">Real name</label>
                <input type="text" name="real_name" id="real_name" class="real_name required_field">
            </li>
            <li>
                <label class="main_label" for="password">Password</label>
                <input type="password" name="password" id="password" class="password required_field">
            </li>
            <li>
                <label class="main_label" for="confirmpassword">Confirm password</label>
                <input type="password" name="confirmpassword" id="confirmpassword" class="confirmpassword required_field">
            </li>
            <li>
                <label class="main_label" for="country">Country</label>
                <select name="country" id="country" class="country required_field">
                <option value="0">Select country</option>
                </select>
            </li>
            <li>
                <label class="main_label">Birth date</label>
                <select id="days" name="day"></select>
                <select id="months" name="month"><option value="0">MM</option></select>
                <select id="years" name="year"><option value="0">YYYY</option></select>
            </li>
            <li>
                <label class="sel_agree" for="agree">Agree with terms and conditions:</label>
                <input type="checkbox" name="agree" id="agree" class="agree required_field">
            </li>
            <li>
                <input type="submit" name="sign_up" id="sign_up">
            </li>
        </ul>
    </form>
</div>
</body>

<script>
    $.ajax({
        type: "POST",
        url: "selectcountry.php",
        dataType: 'json', // тип загружаемых данных
        success: function (data){ // вешаем свой обработчик на функцию success
            var allCountries = data;
            var sectionCountries =  document.getElementById('country');
            for (var i in allCountries) {
                var optionCountries = document.createElement("option");
                optionCountries.innerHTML = allCountries[i][1];
                optionCountries.setAttribute("value", allCountries[i][0]);
                sectionCountries.appendChild(optionCountries);
            }
        }
    });

    /*function call() {
        var msg = $('#registration').serialize();
        console.log(msg);
        $.ajax({
            type: 'POST',
            url: 'signup.php',
            data: msg,
            success: function(data) {
                $('#registration').trigger('reset')
            },
            error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });
    }*/
</script>
</html>
