<?php
$main_menu[0] = array('href' => 'index', 'name' => 'Главная', 'title' => '');
$main_menu[2] = array('href' => 'regestration', 'name' => 'Регистрация', 'title' => '');
foreach ($main_menu as $main_menu_item) {
    $active = '';
    if (isset($_GET['page']) && ($_GET['page'] == $main_menu_item['href'])) {
        $active = 'class = "active" ';
    }
    ?>
    <li <?php echo @$active; ?> title="<?php echo $main_menu_item['title']; ?>">
        <a href="?page=<?php echo $main_menu_item['href']; ?>"><?php echo $main_menu_item['name']; ?></a>
    </li>
<?php } ?>