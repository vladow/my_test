<?php
//Пользователь НЕ авторизован:    
if (isset($_POST['auth_click'])) {
    $user_name = @$_POST['login1'];
    $user_pass = @$_POST['pass1'];
    //проверка на существование пользователя
    
}
    

?>
<form method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Личный кабинет</legend>
        <label>Логин:</label>
        <input type="text" name="login1" placeholder="Введите логин" title="Логин может состоять только из латинских букв, цифр, тире и нижнего подчеркивания. Длина не менее 5-ти символов, но не более 25"/>
        <label>Пароль:</label>
        <input type="password" name="pass1" placeholder="Введите пароль" title="Пароль может состоять только из латинских букв, цифр, тире и нижнего подчеркивания. Длина не менее 5-ти символов, но не более 25"/>
        <input type="submit" name="auth_click" value="Ok" title="Нажимая кнопку Вы соглашаетесь со всеми правилами данного сайта."/>
    </fieldset>
</form>  
