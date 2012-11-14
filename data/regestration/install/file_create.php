<?php

$server_name = $_POST['server_name'];
$login = $_POST['login'];
$PASS = $_POST['pass'];
$db_name = $_POST['db_name'];
$db_user_table = $_POST['table_name'];
$reg_text = $_POST['reg_text'];
$fp = fopen('../data/vars.php', 'wt');
$data = '<?php ' .
        '$HOST = "' . $server_name . "\"; " .
        '$USER = "' . $login . "\"; " .
        '$PASS = "' . $PASS . "\"; " .
        '$db_name = "' . $db_name . "\"; " .
        '$db_user_table = "' . $db_user_table . "\"; " .
        '$u_role = "' . 10 . "\"; " .
        '$reg_text = "' . $reg_text . "\"; " .
        '?>';
$write = fwrite($fp, $data);
if ($write) {
    echo 'Файл переменных успешно записан. <br />';
} else {
    echo 'Произошла ошибка записи в файл.';
}
fclose($fp);
?>
