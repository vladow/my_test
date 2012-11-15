<?php

//функция проверки на существование базы данных с таким именем
function db_exist($db_name) {
    $db_list = mysql_list_dbs();
    $i = 0;
    $cnt = mysql_num_rows($db_list);
    echo "Подключение к базе данных...<br />";
    echo "Вывожу список существующих баз:<br />";
    while ($i < $cnt) {
        echo mysql_db_name($db_list, $i) . "<br />";
        if (mysql_db_name($db_list, $i) == $db_name) {
            echo "Указанная база данных $db_name уже существует<br />";
            return TRUE;
        }
        $i++;
    };
    echo "Указанная база данных не найдена.<br />";
    return FALSE;
}
//функция проверки на существование таблицы пользователей
function table_exist($db_user_table) {
    echo "Вывожу список существующих таблиц:<br />";
    $query = "SHOW TABLES";
    $res = mysql_query($query);
    if (!$res)
        exit("Произошла ошибка: " . mysql_error());
    if (mysql_num_rows($res)) {
        while ($result = mysql_fetch_array($res)) {
            echo "$result[0] <br />";
            if ($result[0] == $db_user_table) {
                echo "Указанная таблица $db_user_table уже существует<br />";
                return TRUE;
            };
        };
    };
    echo "Указанная таблица не найдена.<br />";
    return FALSE;
}

?>
