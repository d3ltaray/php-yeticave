<?php
/* Функция-шаблонизатор, подключает шаблон, передает туда данные и возвращает итоговый HTML-код.
 * $path - путь к шаблону, $array - массив с данными для шаблона
 * $html - итоговый HTML.
 */
function tplRender($path, $array){
    if(file_exists($path)){
        ob_start();
        extract($array);
        require_once "$path";
        $html = ob_get_clean();
        return $html;
    } else {
        return null;
    }
}

/* Функция для форматирования стоимости аукциона.
 * Округляет число, если оно дробное.
 * Если число меньше 1000, то возвращает его за ненадобностью дальнейшего форматирования.
 * Если число больше 1000, то форматирует его, разделяя части пробелом для лучшего конечного вида.
 */
function priceFormat ($price){
    $lotPrice = ceil($price);
    if($lotPrice < 1000){
        return $lotPrice;
    } else {
        $lotPrice = number_format($lotPrice, 0, '.', ' ');
        return $lotPrice;
    }
};


/* Функция для подсчета оставшегося времени до истечения лота на аукционе.
   В функцию передается дата окончания, на выходе получаем оставшееся время.
*/

function lotTimeRemain($date){
    $secsToEnd = strtotime($date) - time();
    $hours = floor($secsToEnd / 3600);
    $minutes = floor(($secsToEnd % 3600) / 60);
    $timeRemaining = str_pad($hours, 2, "0", STR_PAD_LEFT) . ":" .
        str_pad($minutes, 2, "0", STR_PAD_LEFT);
    return $timeRemaining;
}
