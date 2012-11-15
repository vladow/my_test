<?php
echo 'присваиваю значения $_SESSION...';
$u_sess = $_COOKIE['PHPSESSID'];
$query = "SELECT * FROM $db_user_table WHERE u_sessid = '$u_sess'";
$res = mysql_query($query);
$rows = mysql_fetch_array($res, MYSQL_ASSOC);
$_SESSION['u_name'] = $rows['u_name'];
$_SESSION['u_role'] = $rows['u_role'];
echo 'готово<br />';



if (isset($_POST['out_click'])) {
    echo 'удаляю сессионные куки<br />';
    #session_id('Null');
    echo 'переназначаю ИД сессии';
    session_regenerate_id();
    header('Location: index.php');
}
?>
<form method = "POST" target="auth.php" name="out_form">
    <fieldset>
        <legend>Личный кабинет</legend>
        <label>Привет, <b><? echo $_SESSION['u_name']; ?></b>!</label>
        <input type="submit" name="out_click" value="Выйти" />
    </fieldset>
</form>