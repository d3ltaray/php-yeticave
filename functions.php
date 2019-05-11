<?php

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

function priceFormat ($price){
    $lotPrice = ceil($price);
    if($lotPrice < 1000){
        return $lotPrice;
    } else {
        $lotPrice = number_format($lotPrice, 0, '.', ' ');
        return $lotPrice;
    }
};