$(document).on("click",'#btn_login',function (){
    var login = $("input[name='login']").val();
    var password  = $("input[name='password']").val();
    function category (data){
        if(data == "yes"){
            alert("Поздравляем вы вошли в систему "+login);
            window.location = "/";
        }else alert(data);

    }
    $.ajax({
        url : '../account/save_user.php',
        type: 'POST',
        data: ({login: login, password: password}),
        error: function(){
            alert("Ошибка при обработки данных")
        },
        success:  category
    });
});

$(document).on("click",'#btn_reg',function (){

    var login = $("input[name='login']").val();
    var password  = $("input[name='password']").val();
    var rpassword  = $("input[name='rpassword']").val();
    var email  = $("input[name='email']").val();
    var name  = $("input[name='name']").val();
    function category (data){
        if(data == 'yes'){
            alert("Поздравляем вы зарегистрировались "+login);
            window.location = "/sign-in";
        }else {
            var mas = data.split('-');
            $('.input p').html('')
            switch (mas[0]) {
                case 'login':
                    $(".login_error").append(mas[1]);
                    break;
                case 'password':
                    $(".password_error").append(mas[1]);
                    break;
                case 'rpassword':
                    $(".rpassword_error").append(mas[1]);
                    break;
                case 'email':
                    $(".email_error").append(mas[1]);
                    break;
                case 'name':
                    $(".name_error").append(mas[1]);
                    break;
            }
        }
    }
    $.ajax({
        url : '../account/testreg.php',
        type: 'POST',
        data: ({login: login, password: password, rpassword: rpassword,email:email,name:name}),
        error: function(){
            alert("Ошибка при обработки данных")
        },
        success:  category
    });
});
