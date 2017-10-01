$(document).ready(function(){
    function show_error_msg(field_sel,error_msg){
        var error_message_html = '<span class="text_error_msg nodisplay">'+error_msg+'</span>';
        $(field_sel).next('.text_error_msg').remove();
        $(field_sel).after(error_message_html);
        $(field_sel).next('.text_error_msg').fadeIn(700);
    }

    function remove_error_msg(field_sel_remove){
        $(field_sel_remove).next('.text_error_msg').fadeOut(500,function (){
            $(field_sel_remove).next('.text_error_msg').remove();
        });
    }

    function validate_login(){
        var login_sel = '.login';
        var login_ele = $(login_sel);
        var login_ele_val = login_ele.val();
            if(login_ele_val.length <=2){
                show_error_msg(login_sel,'please enter fullname atleast 2 characters');
                return false;
            }
            else{
                remove_error_msg(login_sel);
                return true;
            }
     }

    function validate_email(){
        var email_sel = '.email';
        var email_ele = $(email_sel);
        var email_ele_val = email_ele.val();
        var email_regex = /^[a-zA-Z0-9_.]+\@[a-zA-Z0-9.]+\.[a-zA-Z0-9]{2,4}$/;
            if(!email_ele_val.match(email_regex)){
                show_error_msg(email_sel,'please enter valid email address');
                return false;
            }
            else{
                remove_error_msg(email_sel);
                return true;
            }
        }

    function validate_realname(){
        var real_name_sel = '.real_name';
        var real_name_ele = $(real_name_sel);
        var real_name_ele_val = real_name_ele.val();
            if(real_name_ele_val.length <=2){
                show_error_msg(real_name_sel,'please enter full name atleast 2 characters');
                return false;
            }
            else{
                remove_error_msg(real_name_sel);
                return true;
        }
    }

    function validate_password(){
        var password_sel = '.password';
        var password_ele = $(password_sel);
        var password_ele_val = password_ele.val();
            if(password_ele_val.length <=5){
                show_error_msg(password_sel,'please enter password atleast 6 characters');
                return false;
            }
            else{
                remove_error_msg(password_sel);
                return true;
            }
        }

    function validate_confirmpassword(){
        var confirmpassword_sel = '.confirmpassword';
        var confirmpassword_ele = $(confirmpassword_sel);
        var confirmpassword_ele_val = confirmpassword_ele.val();
        var password_ele_val = $('.password').val();
            if(confirmpassword_ele_val.length <=5){
                show_error_msg(confirmpassword_sel,'please enter confirm password atleast 6 characters');
                return false;
            }
            else if(password_ele_val!==confirmpassword_ele_val){
                show_error_msg(confirmpassword_sel,'confirm password not matched with password');
                return false;
            }
            else{
                remove_error_msg(confirmpassword_sel);
                return true;
            }
        }

    function validate_country(){
        var country_sel = '.country';
        var country_ele = $(country_sel);
        var country_val = $('.country option:selected').attr('value');
            if(country_val == 0 || typeof country_val==='undefined'){
                show_error_msg(country_sel,'please select country');
                return false;
            }
            else{
                remove_error_msg(country_sel);
                return true;
            }
        }

    function validate_month(){
        var month_sel = '.month';
        var month_ele = $(month_sel);
        var month_val = $('.month option:selected').attr('value');
            if(month_val == 0 || typeof month_val==='undefined'){
                show_error_msg(month_sel,'please select month');
                return false;
            }
            else{
                remove_error_msg(month_sel);
                return true;
            }
        }

    function validate_agree(){
        var sel_val = $('input[name=agree]:checked').val();
        var error_sel = '.agree';
            if(typeof sel_val==='undefined' || sel_val==null){
                show_error_msg(error_sel,'Agree with terms and conditions');
                return false;
            }
            else{
                remove_error_msg(error_sel);
                return true;
            }
        }

    $('.country').blur(validate_country);
    $('.confirmpassword').blur(validate_confirmpassword);
    $('.password').blur(validate_password);
    $('.login').blur(validate_login);
    $('.email').blur(validate_email);
    $('.real_name').blur(validate_realname);
    $('.month').blur(validate_month);

    $('form.validation_singupform').submit(function(){
        if(validate_country() && validate_confirmpassword() && validate_password() && validate_realname() && validate_email() && validate_agree()  && validate_login()  && validate_month()){
            return true;
        } 
        else {
            validate_country();
            validate_confirmpassword();
            validate_password();
            validate_login();
            validate_email();
            validate_agree();
            validate_realname();
            validate_month();
            return false;
        }

    });

});
