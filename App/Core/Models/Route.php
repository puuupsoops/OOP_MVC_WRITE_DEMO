<?php

namespace App\Core\Models;
/**
 * Class Route
 *
 * Модель маршрута
 *
 * @package App\Core\Models
 */
class Route
{
    /**
     * @var string URI путь
     */
    private string $path;

    /**
     * @var string Имя функции для вызова
     */
    private string $callable;

    /**
     * Паттерн для поиска совпадения маршрута
     * @var string
     */
    private string $pattern;

    /**
     * @param string $path URI путь
     */
    public function __construct(string $path, $callable)
    {
        $this->path = $path;
        $this->callable = str_replace(':','::',$callable);
        $this->pattern = sprintf("#^%s$#",$path);
    }

    /**
     * Получить URI путь
     * @return string
     */
    public function GetPath(): string{
        return $this->path;
    }

    /**
     * Получить имя вызываемой функции
     * @return string
     */
    public function GetCallable(): string{
        return $this->callable;
    }

    /**
     * Получить выражение для поиска
     * @return string
     */
    public function GetPattern(): string{
        return $this->pattern;
    }
}