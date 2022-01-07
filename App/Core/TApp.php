<?php

namespace App\Core;
/**
 * Trait TApp
 *
 * Трейт приложения
 *
 * @property \App\Core\Route $Route
 */
trait TApp
{

    /**
     * Установить значения маршрутов
     * @param \App\Core\Models\Route [] $routes Массив роутов
     */
    public function setRoutes(array $routes){
        $this->Route->add($routes);
    }

    /**
     * Получить экземпляр Роута
     * @return Route
     */
    public function getRoute(): \App\Core\Route{
        return $this->Route;
    }

    /**
     * Запуск приложения
     */
    public function run(){
        //echo 'Приложение запущено' . PHP_EOL;
        $this->Route->match();
    }
}