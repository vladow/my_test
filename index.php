<?php
   
require_once 'include/vars.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <div>
            <?php
            include_once 'include/auth.php';
            session_start();
            include_once 'include/menu.php';
            ?>
        </div>
        <div>
            <?php
            include_once 'include/index_data.php';
            ?>
        </div>    
    </body>
</html>
