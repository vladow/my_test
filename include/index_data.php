<?php

// обработка параметров http-запроса
// вывод контента страницы
$error_message = 'Нихрена не пашет!!!';
if (isset($_GET['page'])) {
    $filename = "include/content/{$_GET['page']}.php";
    if (file_exists($filename)) {
        include $filename;
    } else {
        echo $error_message."<br />".$filename;
    }
} else {
    @include 'content/index.php';
}
?>
