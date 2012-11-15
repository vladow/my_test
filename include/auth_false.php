<?php
//Пользователь НЕ авторизован:    
if (isset($_POST['auth_click'])) {
    $user_name = @$_POST['login'];
    $user_pass = @$_POST['pass'];
    //проверка на существование пользователя
    $query = "SELECT * FROM $db_user_table WHERE u_name = '$user_name'";
    $res = mysql_query($query);
    //проверка логина
    if ($res && mysql_num_rows($res) > 0) {
        $user_pass = md5($user_pass);
        $query = "SELECT * FROM users WHERE u_pass = '$user_pass'";
        $res = mysql_query($query);
        //проверка пароля
        if ($res && mysql_num_rows($res) > 0) {
            //пользователь существует
            $query = "SELECT * FROM $db_user_table WHERE u_name = '$user_name'";
            $res = mysql_query($query);
            if ($rows = mysql_fetch_array($res, MYSQL_ASSOC)) {
                session_id($rows['u_sessid']);
                header('Location: index.php');
            }
        }else
            echo 'Неверный логин или пароль';
    }else
        echo 'Неверный логин или пароль';
}
?>
<form method="post" enctype="multipart/form-data">
    <label>Логин:</label>
    <input type="text" name="login" placeholder="Введите логин" title="Логин может состоять только из латинских букв, цифр, тире и нижнего подчеркивания. Длина не менее 5-ти символов, но не более 25"/>
    <label>Пароль:</label>
    <input type="password" name="pass" placeholder="Введите пароль" title="Пароль может состоять только из латинских букв, цифр, тире и нижнего подчеркивания. Длина не менее 5-ти символов, но не более 25"/>
    <input type="submit" name="auth_click" value="Ok" title="Нажимая кнопку Вы соглашаетесь со всеми правилами данного сайта."/>
</form>  