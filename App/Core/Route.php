<?php

namespace App\Core;
include_once 'Models/Route.php';

class Route
{
    /**
     * @var \App\Core\Models\Route []
     */
    private $routes = [];

    /**
     * Добавить маршруты
     *
     * @param \App\Core\Models\Route [] $routes Массив маршрутов
     */
    public function add(array $routes){
        $this->routes = array_merge($this->routes, $routes);
    }

    /**
     * Обработка совпадений маршрута
     */
    public function match(){
        $current_uri = $_SERVER['REQUEST_URI'];

        // поиск по моделям
        foreach ($this->routes as $item){
            if(preg_match($item->GetPattern(),$current_uri,$matches)) {

                // если найдено вызываем назначенную функцию
                call_user_func($item->GetCallable());
            }
        }

    }
}