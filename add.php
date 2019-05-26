<?php
require_once 'functions.php';
require_once 'data.php';

$lot = [];
$errors = [];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lot = $_POST;
    $required = ['lot-name', 'category', 'message', 'lot-rate', 'lot-step', 'lot-date', 'lot-img'];
    if (empty($lot['lot-name'])) {
        $errors['lot-name'] = 'Введите название лота.';
    }
    if ($lot['category'] == 'Выберите категорию') {
        $errors['category'] = 'Выберите категорию.';
    }
    if (empty($lot['message'])) {
        $errors['message'] = 'Заполните описание лота.';
    }
    if ($lot['lot-rate'] <= 0 or (int)($lot['lot-rate'] != $lot['lot-rate'])) {
        $errors['lot-rate'] = 'Цена не может быть отрицательной и должна быть целым числом';
    }
    if ($lot['lot-step'] <= 0 or (int)($lot['lot-step'] != $lot['lot-step'])) {
        $errors['lot-step'] = 'Шаг ставки не может быть отрицательным и должен быть целым числом';
    }
    /* if(!is_date_valid($lot['lot-date'])){
        $errors['lot-date'] = 'Дата должна соответствовать формату: "ГГГГ-ММ-ДД" ';
    } else
        {
    */
    if (strtotime($lot['lot-date']) < time() + 24 * 3600) {
        $errors['lot-date'] = 'Лот нельзя выставлять менее чем на сутки.';
    }
   // }
    // Если ошибок нет, переходим к загрузке изображения.
    if(count($errors) == 0){
        if(empty($_FILES['lot-img']['tmp_name'])){
            $errors['lot-img'] = 'Файл не загружен.';
            $page_content = tplRender('templates/add-lot.php', [
                    'categories' => $categories,
                    'lot' => $lot,
                    'errors' => $errors]
            );
        }
        else{
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $file_name = $_FILES['lot-img']['tmp_name'];
            $file_type = finfo_file($finfo, $file_name);
            if($file_type != 'image/jpeg'){
                $errors['lot-img'] = 'Формат изображения должен быть jpeg/jpg.';
            }
            else{
                $file_path = __DIR__ . '/uploads/';
                move_uploaded_file($file_name, $file_path . $_FILES['lot-img']['name']);
                $lot['lot-img'] = 'uploads/' . $_FILES['lot-img']['name'];
                $page_content = tplRender('templates/view.php', ['lot' => $lot]);
            }
        }
    } else {
        $page_content = tplRender('templates/add-lot.php', [
                'categories' => $categories,
                'lot' => $lot,
                'errors' => $errors]
        );
    }
} else {
    $page_content = tplRender('templates/add-lot.php', ['categories' => $categories]);
}

$layout_content = tplRender('templates/layout.php', ['content' => $page_content,
    'title' => 'Создать лот', 'categories' => $categories]);

print $layout_content;