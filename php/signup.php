<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="./style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <script type="text/javascript" src="validations.js"></script>
    <script type="text/javascript" src="day.js"></script>

    <title></title>
</head>
<style>
    
</style>
<body>
<div class="form_div">
    <form action="javascript:void(null)" method="post" id="registration" onsubmit="call()" class="validation_singupform" >
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
                <select id="days" name="birth_date" ></select>
                <select id="months" name="birth_date"></select>
                <select id="years" name="birth_date"></select>
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

    function call() {
        var msg = $('#registration').serialize();
        console.log(msg);
        $.ajax({
            type: 'POST',
            url: 'InsertUser.php',
            data: msg,
            success: function(data) {
                $('#registration').trigger('reset')
            },
            error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });
    }
</script>
</html>
