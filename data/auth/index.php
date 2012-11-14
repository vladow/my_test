<?php

//подключаем базу
require_once '/../regestration/data/db_release.php';
require_once '/../regestration/data/vars.php';

//проверить куки
function bd_query($db_name, $query) {
    $result = mysql_db_query($db_name, $query);
    if (!$result) {
        echo mysql_error();
    } else {
        return $result;
    }
}

;
if (esset($_SESSION['id'])) {
    $u_sess = $_SESSION['id'];
    $query = "SELECT * FROM users WHERE u_sessid = '$u_sess'";
    $res = bd_query($db_name, $query);
    if ($res && mysql_num_rows($res) > 0) {
//Пользователь авторизован:        
        echo 'Привет, авторизованный пользователь!';
    }
//Пользователь НЕ авторизован:    
    if (isset($_POST['auth_click'])) {
        $user_name = @$_POST['login'];
        $user_pass = @$_POST['pass'];
        //проверка на существование пользователя
        $query = "SELECT * FROM $db_user_table WHERE u_name = '$user_name'";
        $res = bd_query($db_name, $query);
        if ($res && mysql_num_rows($res) > 0) {
            $u_hash = md5($user_pass);
            $query = "SELECT * FROM users WHERE u_hash = '$u_hash'";
            $res = bd_query($db_name, $query);
            if ($res && mysql_num_rows($res) > 0) {
                //пользователь существует
                $query = "SELECT * FROM $db_user_table";
                $res = bd_query($db_name, $query);
                if ($rows = mysql_fetch_array($res, MYSQL_ASSOC)) {
                    session_id() = $rows['u_sessid'];
                }
            } else {
                echo 'Неверный пароль';
            }
        } else {
            echo 'Неверный логин';
        }
        //начинаем сессию, высылаем куки (недоделал)
        session_start();
    } else {
        //выдаем форму авторизации   
        ?>
<form method="post" enctype="multipart/form-data">
    <label>Логин:</label>
    <input type="text" name="login" placeholder="Введите логин" title="Логин может состоять только из латинских букв, цифр, тире и нижнего подчеркивания. Длина не менее 5-ти символов, но не более 25"/>
    <label>Пароль:</label>
    <input type="password" name="pass" placeholder="Введите пароль" title="Пароль может состоять только из латинских букв, цифр, тире и нижнего подчеркивания. Длина не менее 5-ти символов, но не более 25"/>
    <input type="submit" name="auth_click" value="Ok" title="Нажимая кнопку Вы соглашаетесь со всеми правилами данного сайта."/>
</form>  
        <?php

    }
}
?>
