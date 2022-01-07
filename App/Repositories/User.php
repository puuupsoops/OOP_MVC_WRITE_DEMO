<?php

namespace App\Repositories;
/**
 * Class User
 *
 * Репозиторий для работы с логикой пользователей
 */
class User extends \App\Models\User
{

    /**
     * @param string $login     Логин
     * @param string $password  Пароль
     * @throws \Exception       Пользователь не существует.
     */
    public function __construct(string $login, string $password)
    {
        $arUser = $this->getUser($login,$password);

        if(!$arUser)
            throw new \Exception('User does not exist.');

        parent::__construct($arUser);
    }

    /**
     * Выполнит авторизацию пользователя
     */
    public function doAuthorization(){
        $_SESSION['user'] = $this->AsArray();
        header('Local: /personal');
    }

    /**
     * Выполнить регистрацию. БЕЗ ПРОВЕРКИ НА СУЩЕСТВУЮЩУЮ ЗАПИСЬ!
     *
     * @param array $data Данные для регистрации
     * @return \App\Repositories\User | bool Модель пользователя || false - если регистрация не произошла.
     * @throws \Exception Пустое значенеи поля
     */
    public static function doRegistration(array $data){

        // без проверок по регулярным выражениям!
        foreach ($data as $key => $value){
            if(!$value)
                throw new \Exception('Empty field: ' . $key);
        }

        $email      = $data['email']; //'test@test.ru';
        $login      = $data['login']; //'test';
        $password   = md5($data['password']); //md5('123456789');
        $fio        = $data['personal']; //'Тестов Тест Тестович';

        $query = sprintf('INSERT INTO registry (email,login,password,fio) VALUES (\'%s\',\'%s\',\'%s\',\'%s\')',
            $email, $login,$password, $fio);

        \App\Core\DB::getInstance()->query($query);

        try{
            return new \App\Repositories\User($login,$password);
        }catch (\Exception $e){
            return false;
        }

    }

    /**
     * Получить данные пользователя из БД
     * @param string $login
     * @param string $password
     * @return mixed
     */
    private function getUser(string $login, string $password){
       return \App\Core\DB::getInstance()->query("SELECT * FROM `registry` WHERE `login`='".$login."' AND `password`='".$password."'")->fetch();
    }
}