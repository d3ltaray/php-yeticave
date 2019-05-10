<?php
require_once 'functions.php';
require_once 'data.php';
$is_auth = (bool) rand(0, 1);

$user_name = 'Владимир';
$user_avatar = 'img/user.jpg';

$page_content = tplRender('templates/index.php', $lots);

$layout_content = tplRender('templates/layout.php', ['content' => $page_content,
    'title' => 'PHP YETICAVE DELTARAY', 'categories' => $categories]);

print $layout_content;