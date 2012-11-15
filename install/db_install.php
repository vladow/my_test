<?php

//подключение к базе данных
echo "Инициализация базы данных...";
if (mysql_connect("$HOST", "$USER", "$PASS"))
    echo 'Готово!<br />';
else
    echo 'Не удается подключить базу данных MySQL<br />';
//создание базы данных 
if (!db_exist($db_name)) {
    echo "Создаю базу данных...";
    $query = "CREATE DATABASE $db_name";

    if (mysql_query($query)) {
        echo "Готово! <br /> Текущая база данных: $db_name <br />";
    } else {
        echo
        "Произошла ошибка при создании базы данных MySQL: " . mysql_error() . "<br />";
    };
};
//выбор БД с именем $db_name
mysql_select_db($db_name);
//создание таблицы пользователей
if (!table_exist($db_user_table)) {
    echo "Создаю таблицу пользователей...";
    $query = "CREATE TABLE $db_user_table ( 
`u_id` int(11) unsigned NOT NULL auto_increment, 
`u_name` varchar(30) NOT NULL, 
`u_pass` varchar(32) NOT NULL, 
`u_role` int(11) unsigned NOT NULL,
`u_sessid` varchar(32) NOT NULL,
`u_info` varchar(32) NOT NULL,
PRIMARY KEY (`u_id`) 
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1";
    if (mysql_query($query)) {
        echo "Готово! <br /> Текущая таблица: $db_user_table <br />";
    } else {
        echo 'Произошла ошибка при создании таблицы пользователей: ' . mysql_error() . "<br />";
    };
};
echo "Инсталляция успешно завершена. Вы можете проверить установленный <a href='../index.php'>модуль</a>";
?>