<?php

namespace App\Models;
/**
 * Class User
 *
 * Модель пользователя
 */
class User
{
    /**
     * @var int Идентификатор
     */
    public int $id;

    /**
     * @var string Логин
     */
    private string $login;

    /**
     * @var string Электронная почта
     */
    private string $email;

    /**
     * @var string Пароль MD5
     */
    private string $password;

    /**
     * @var string ФИО
     */
    public string $fio;

    /**
     * Модель пользователя
     *
     * @param array $data Входные данные
     * @throws \Exception Невозможно инициализовать модель данными
     */
    public function __construct(array $data)
    {
        if(!$data)
            throw new \Exception('Invalid user data initialization.',400);

            $this->id       = $data['id'];
            $this->login    = $data['login'];
            $this->password = $data['password'];
            $this->email    = $data['email'];
            $this->fio      = $data['fio'];
    }

    /**
     * @return array{id:int,login:string,fio:string} Получить поля массивом
     */
    public function AsArray(): array{
        return [
            'id' => $this->id,
            'login' => $this->login,
            'fio' => $this->fio
        ];
    }
}