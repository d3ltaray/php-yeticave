<?php
require_once 'functions.php';
require_once 'data.php';

$page_content = tplRender('templates/index.php', ['lots' => $lots]);

$layout_content = tplRender('templates/layout.php', ['content' => $page_content,
    'title' => 'Интернет-аукцион сноубордического и горнолыжного снаряжения', 'categories' => $categories]);

print $layout_content;