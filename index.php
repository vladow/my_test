<?php
require_once 'include/vars.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title></title>
    </head>
    <body>
        <div class="head">
            <?php
            session_start();
            echo 'стартую сессию<br />';
            echo 'начинаю авторизацию<br />';
            include_once 'include/auth.php';
            
            ?>

        </div>
        <div class="main">
            <div class="nav">
                <fieldset>
                    <legend>Меню</legend>
                    <?php
                    include_once 'include/menu.php';
                    ?>
                </fieldset>
            </div>
            <div class="content">
                <fieldset>
                    <legend>Информация</legend>
                    <?php
                    include_once 'include/index_data.php';
                    ?>
                </fieldset>
            </div>
        </div>    
        <div class="footer">
            <fieldset>
                Vladow Corporation 2012&COPY;. Все права защищены.
            </fieldset>
        </div>
    </body>
</html>