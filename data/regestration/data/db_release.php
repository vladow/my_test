<?php
if (!mysql_connect("$HOST", "$USER", "$PASS"))echo 'Не удается подключить базу данных MySQL<br />';
mysql_select_db($db_name);
?>