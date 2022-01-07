<?php

namespace App\Core;
/**
 * Interface IApp
 *
 * Интерфейс приложения
 */
interface IApp
{
    /**
     * Установить роуты
     * @param array $routes массив маршрутов
     * @return mixed
     */
    public function setRoutes(array $routes);

    /**
     * Получить экземпляр Роута
     * @return Route экземпляр Роута
     */
    public function getRoute(): \App\Core\Route;

    /**
     * Запустить приложение
     * @return mixed
     */
    public function run();
}