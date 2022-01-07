<?php

namespace App\Core;
/**
 * Class View
 *
 * Класс представления
 */
class View
{

    /**
     * @param string $path Путь к файлу с контентом
     */
    public static function render(string $path){
        $path = $_SERVER['DOCUMENT_ROOT'] . '/App/Views/'.$path.'.php';

        ob_start();
        include $path;
        $data = ob_get_clean();

        if($data)
            echo $data;
    }
}