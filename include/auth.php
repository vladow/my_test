<!--авторизация-->
<?php
//проверяю кнопку авторизации
if (isset($_POST['auth_click'])) {
    $user_name = @$_POST['login1'];
    $user_pass = @$_POST['pass1'];
    //проверяю куки
    if (isset($_COOKIE['PHPSESSID'])) {
        $u_sess = $_COOKIE['PHPSESSID'];
        $query = "SELECT * FROM users WHERE u_sessid = '$u_sess'";
        $res = mysql_query($query);
        if ($res && mysql_num_rows($res) > 0) {
            //выгружаю $_SESSION
            echo 'присваиваю значения $_SESSION...';
            $u_sess = $_COOKIE['PHPSESSID'];
            $query = "SELECT * FROM $db_user_table WHERE u_sessid = '$u_sess'";
            $res = mysql_query($query);
            $rows = mysql_fetch_array($res, MYSQL_ASSOC);
            $_SESSION['u_name'] = $rows['u_name'];
            $_SESSION['u_role'] = $rows['u_role'];
            echo 'готово<br />';
            //проверяю кнопку выхода
            if (isset($_POST['out_click'])) {
                echo 'удаляю сессионные куки<br />';
                session_id('Null');
                #echo 'переназначаю ИД сессии';
                #session_regenerate_id();
                header('Location: index.php');
            }
            //выдаю форму ЛК
            ?>
            <form method = "POST" target="auth.php" name="out_form">
                <fieldset>
                    <legend>Личный кабинет</legend>
                    <label>Привет, <b><? echo $_SESSION['u_name']; ?></b>!</label>
                    <input type="submit" name="out_click" value="Выйти" />
                </fieldset>
            </form>
            <?php
            //проверка логина/пароля    
        } else {
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
    }
    //выдаю форму логина
    ?>

    <?php
    //старт сессии
//                    echo 'авторизация прошла успешно<br />';
//                    include_once 'auth_true.php';
//                }else {
//                    echo 'авторизоваться не удалось<br />';
//                    include_once 'auth_false.php';
//                }
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