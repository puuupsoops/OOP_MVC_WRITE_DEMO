<?php

/**
 * Class Environment
 *
 * Класс с константами окружения проекта
 */
class Environment
{
    /**
     * @var bool Флаг: режим разработки или боевой
     */
    const IS_PRODUCTION = false;

    //region DB Config
    const DB_HOST = 'localhost';
    const DB_NAME = 'work5';
    const DB_USER = 'mysql';
    const DB_PASSWORD = '';
    const DB_PORT = '';
    const DB_SOCKET = '';
    //endregion
}