<!doctype html>
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
require_once "../dateBase/insertuser.php"
?>
<body>
<div class="formDiv">
    <form action="signup.php" method="post" id="registration" class="validationSingupform">
        <ul class="formUl">
            <li>
                <label class="mainLabel" for="login">Login</label>
                <input type="text" name="login" id="login" class="login requiredField" placeholder="login" value="<?php echo @$login;?>">
            </li>
            <li>
                <label class="mainLabel" for="email">E-mail</label>
                <input type="email" name="email" id="email" class="email requiredField" placeholder="email@gmail.com" value="<?php echo @$email;?>">
            </li>
            <li>
                <label class="mainLabel" for="realName">Real name</label>
                <input type="text" name="realName" id="real_name" class="realName requiredField" placeholder="real name" value="<?php echo @$realName;?>">
            </li>
            <li>
                <label class="mainLabel" for="password">Password</label>
                <input type="password" name="password" id="password" class="password requiredField" placeholder="password">
            </li>
            <li>
                <label class="mainLabel" for="confirmPassword">Confirm password</label>
                <input type="password" name="confirmPassword" id="confirmPassword" class="confirmPassword requiredField" placeholder="confirm password">
            </li>
            <li>
                <label class="mainLabel" for="country">Country</label>
                <select name="country" id="country" class="country requiredField">
                <option value="0">Select country</option>
                </select>
            </li>
            <li>
                <label class="mainLabel">Birth date</label>
                <select id="days" name="day"></select>
                <select id="months" name="month" class="month"><option value="0">MM</option></select>
                <select id="years" name="year"></select>
            </li>
            <li>
                <label class="selAgree" for="agree">Agree with terms and conditions:</label>
                <input type="checkbox" name="agree" id="agree" class="agree requiredField">
            </li>
            <li>
                <input type="submit" name="signUp" id="signUp">
            </li>
        </ul>
    </form>
</div>
</body>
<script>
    $.ajax({
        type: "POST",
        url: "selectcountry.php",
        dataType: 'json',
        success: function (data) {
            var allCountries = data;
            var sectionCountries =  document.getElementById('country');
            for (var i in allCountries){
                var optionCountries = document.createElement("option");
                optionCountries.innerHTML = allCountries[i][1];
                optionCountries.setAttribute("value", allCountries[i][0]);
                sectionCountries.appendChild(optionCountries);
            }
        }
    });
</script>
</html>
