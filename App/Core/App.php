<?php

namespace App\Core;
/**
 * Class App
 *
 * Класс приложения
 */
final class App
{
    private static $instance;

    protected function __construct(){}
    protected function __clone(){}

    public function __wakeup(){
        throw new \Exception("Cannot unserialize singleton");
    }

    public static function getInstance(): \App\Core\IApp{
        if(!self::$instance)
            self::$instance = new class() implements \App\Core\IApp{
                private $Route;

                public function __construct(){
                    $this->Route = new \App\Core\Route();
                }

                use \App\Core\TApp;
            };

        return self::$instance;
    }

}