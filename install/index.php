<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <div>
            <?php
            if (isset($_POST['knopka'])) {
                require_once 'file_create.php';
                require_once '../include/vars.php';
                require_once 'functions.php';
                require_once 'db_install.php';
            } else {
                require_once 'form.php';
            };
            ?>
        </div>
    </body>
</html>