//Script for field validation
$(document).ready(function() {
    //function for show error massage
    function showErrorMsg(fieldSel,errorMsg) {
        var errorMessageHtml = '<span class="textErrorMsg nodisplay">'+errorMsg+'</span>';
        $(fieldSel).next('.textErrorMsg').remove();
        $(fieldSel).after(errorMessageHtml);
        $(fieldSel).next('.textErrorMsg').fadeIn(700);
    }
    
    //function for remove error massage
    function removeErrorMsg(fieldSelRemove)
    {
        $(fieldSelRemove).next('.textErrorMsg').fadeOut(500,function () {
            $(fieldSelRemove).next('.textErrorMsg').remove();
        });
    }
    
    //function for validate field Login
    function validateLogin()
    {
        var loginSel = '.login';
        var loginEle = $(loginSel);
        var loginEleVal = loginEle.val();
        if (loginEleVal.length <=2) {
            showErrorMsg(loginSel,'please enter fullname atleast 2 characters');
            return false;
        }
        else {
            removeErrorMsg(loginSel);
            return true;
        }
     }

    //function for validate field Email
    function validateEmail()
    {
        var emailSel = '.email';
        var emailEle = $(emailSel);
        var emailEleVal = emailEle.val();
        var emailRegex = /^[a-zA-Z0-9_.]+\@[a-zA-Z0-9.]+\.[a-zA-Z0-9]{2,4}$/;
        if (!emailEleVal.match(emailRegex)) {
            showErrorMsg(emailSel,'please enter valid email address');
            return false;
        }
        else {
            removeErrorMsg(emailSel);
            return true;
        }
    }

    //function for validate field Real name
    function validateRealname()
    {
        var realNameSel = '.realName';
        var realNameEle = $(realNameSel);
        var realNameEleVal = realNameEle.val();
        if (realNameEleVal.length <=2) {
            showErrorMsg(realNameSel,'please enter full name atleast 2 characters');
            return false;
        }
        else {
            removeErrorMsg(realNameSel);
            return true;
        }
    }

    //function for validate field Password
    function validatePassword()
    {
        var passwordSel = '.password';
        var passwordEle = $(passwordSel);
        var passwordEleVal = passwordEle.val();
        if (passwordEleVal.length <=5) {
            showErrorMsg(passwordSel,'please enter password atleast 6 characters');
            return false;
        }
        else {
            removeErrorMsg(passwordSel);
            return true;
        }
    }

    //function for validate field Confirm password
    function validateConfirmpassword()
    {
        var confirmpasswordSel = '.confirmPassword';
        var confirmpasswordEle = $(confirmpasswordSel);
        var confirmpasswordEleVal = confirmpasswordEle.val();
        var passwordEleVal = $('.password').val();
        if (confirmpasswordEleVal.length <=5) {
            showErrorMsg(confirmpasswordSel,'please enter confirm password atleast 6 characters');
            return false;
        }
        else if(passwordEleVal!==confirmpasswordEleVal) {
            showErrorMsg(confirmpasswordSel,'confirm password not matched with password');
            return false;
        }
        else{
            removeErrorMsg(confirmpasswordSel);
            return true;
        }
    }

    //function for field validate Country
    function validateCountry()
    {
        var countrySel = '.country';
        var countryEle = $(countrySel);
        var countryVal = $('.country option:selected').attr('value');
        if (countryVal == 0 || typeof countryVal==='undefined') {
            showErrorMsg(countrySel,'please select country');
            return false;
        }
        else {
            removeErrorMsg(countrySel);
            return true;
        }
    }

    //function for field validate Month
    function validateMonth()
    {
        var monthSel = '.month';
        var monthSle = $(monthSel);
        var monthVal = $('.month option:selected').attr('value');
        if (monthVal == 0 || typeof monthVal==='undefined') {
            showErrorMsg(monthSel,'please select month');
            return false;
        }
        else {
            removeErrorMsg(monthSel);
            return true;
        }
    }

    //function for checkbox validate Agree
    function validateAgree()
    {
        var selVal = $('input[name=agree]:checked').val();
        var errorSel = '.agree';
        if (typeof selVal==='undefined' || selVal==null) {
            showErrorMsg(errorSel,'Agree with terms and conditions');
            return false;
        }
        else {
            removeErrorMsg(errorSel);
            return true;
        }
    }

    $('.country').blur(validateCountry);
    $('.confirmPassword').blur(validateConfirmpassword);
    $('.password').blur(validatePassword);
    $('.login').blur(validateLogin);
    $('.email').blur(validateEmail);
    $('.realName').blur(validateRealname);
    $('.month').blur(validateMonth);

    $('form.validationSingupform').submit(function() {
        if (validateCountry() &&
            validateConfirmpassword() &&
            validatePassword() &&
            validateRealname() &&
            validateEmail() &&
            validateAgree() &&
            validateLogin() &&
            validateMonth()
        ) {
            return true;
        } 
        else {
            validateCountry();
            validateConfirmpassword();
            validatePassword();
            validateLogin();
            validateEmail();
            validateAgree();
            validateRealname();
            validateMonth();
            return false;
        }
    });

});
