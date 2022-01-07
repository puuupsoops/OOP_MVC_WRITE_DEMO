<?php

namespace App\Core;
/**
 * Class DB
 *
 * Класс работы с базой данных
 */
class DB
{
    /**
     * @var self
     */
    private static $instance;

    /**
     * @var \PDO
     */
    private static $pdo;

    protected function __construct($pdo){self::$pdo = $pdo;}
    protected function __clone(){}

    public function __wakeup(){
        throw new \Exception("Cannot unserialize singleton");
    }

    public static function getInstance(): self{

        if(!self::$instance)
            self::$instance = new static(self::connect());

        return self::$instance;
    }

    /**
     * Выполнить запрос к базе данных
     * @param string $query Строка с запросом
     * @return \PDOStatement Результат с объектом запроса
     */
    public function query(string $query): \PDOStatement{
        return self::$pdo->query($query);
    }

    /**
     * Выполнить соединение с базой данных
     * @return \PDO      Соединение с БД
     * @throws \Exception Ошибка соединения с базой данных
     */
    private static function connect(): \PDO{
        $dsn = 'mysql:dbname=' . \Environment::DB_NAME . ';host=' . \Environment::DB_HOST;

        try {
            return new \PDO($dsn,\Environment::DB_USER,\Environment::DB_PASSWORD);
        }catch (\PDOException $e){
            throw new \Exception($e->getMessage(),400);
        }

    }
}