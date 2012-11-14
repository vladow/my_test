<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <div class="regestration">
            <?php
//    if (!file_exists('data/vars.php')) {
//        header('Location: install/index.php');
//    } else {


            require_once 'data/vars.php';
            require_once 'data/db_release.php';
//проверка нажатия кнопки
            if (isset($_POST['reg_click'])) {
                $user_name = @$_POST['login'];
                $user_pass = @$_POST['pass'];
                require_once 'data/functions.php';
            }
            if (strlen($reg_text) > 0)
                
                ?> <p id="reg_message"><?php echo $reg_text; ?></p> 
            <?php
            require_once 'data/reg_form.php';
//    }
            ?>
        </div>
    </body>
</html>