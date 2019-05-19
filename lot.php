<?php
require_once 'functions.php';
require_once 'data.php';

$lot = null;

if(isset($_GET['id'])){
    $lot_id = $_GET['id'];

    foreach ($lots as $key => $item) {
        if($key == $lot_id){
            $lot = $item;
            break;
        }
    }
}

if (!$lot){
    http_response_code(404);
    header("location: /404.html");
}

$page_content = tplRender('templates/view.php', ['lot' => $lot]);
$layout_content = tplRender('templates/layout.php', ['content' => $page_content,
    'title' => 'Страница просмотра лота.', 'categories' => $categories]);

print $layout_content;