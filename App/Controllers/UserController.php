<?php

namespace App\Controllers;
use App\Core\View;

/**
 * Class AuthorizationController
 *
 * Контроллер для авторизации
 */
class UserController
{
    /**
     * @var \App\Core\View
     */
    public static $View = 'App\Core\View';


    /**
     * Авторизация пользователя
     */
    public static function Authorization(){
//        echo PHP_EOL . 'Тестовый вызов функции ' .__FUNCTION__. ' контроллера: ' . __CLASS__;
//        echo PHP_EOL;

        self::$View::render('authorization');

        if(!$_SESSION && $_POST){
            try{
                $User = new \App\Repositories\User($_POST['login'],md5($_POST['password']));
                $User->doAuthorization();
            }catch (\Exception $e){
                echo 'Пользователь не найден. Зарегистрируйтесь';
                $_POST = [];
            }

        }

        if(key_exists('user',$_SESSION))
            header('Location: /personal');
    }

    /**
     * Страница личного кабинета
     */
    public static function Personal(){
//        echo PHP_EOL . 'Тестовый вызов функции ' .__FUNCTION__. ' контроллера: ' . __CLASS__;
//        echo PHP_EOL;

        if(!key_exists('user',$_SESSION))
            header('Location: /auth');

        if(key_exists('exit',$_POST)){
           session_destroy();
            header('Location: /auth');
        }

        // обновление ФИО
        if(key_exists('personal',$_POST)){
            $query = sprintf(
                'UPDATE registry SET %s=\'%s\' WHERE id=\'%s\'',
                'fio',
                $_POST['personal'],
                $_SESSION['user']['id']
            );
            \App\Core\DB::getInstance()->query($query);
            $_SESSION['user']['fio'] = $_POST['personal'];
            $_POST = [];

        }

        // обновление пароля
        if(key_exists('password',$_POST)){

            $query = sprintf(
                'UPDATE registry SET %s=\'%s\' WHERE id=\'%s\'',
                'password',
                md5($_POST['password']),
                $_SESSION['user']['id']
            );

            \App\Core\DB::getInstance()->query($query);
            $_POST = [];
            session_destroy();
            header('Location: /auth');
        }

        self::$View::render('personal');
        self::$View::render('logout');

    }

    /**
     * Регистрация нового пользователя
     */
    public static function Registration(){
//        echo PHP_EOL . 'Тестовый вызов функции ' .__FUNCTION__. ' контроллера: ' . __CLASS__;
//        echo PHP_EOL;

        if(key_exists('user',$_SESSION))
            header('Location: /personal');

        self::$View::render('registration');

        //[NOTE] Без проверки на существующего пользователя!
        try{
            if($_POST){
                $User = \App\Repositories\User::doRegistration($_POST);
                $User->doAuthorization();
                header('Location: /personal');
            }

        }catch (\Exception $e){
            echo $e->getMessage();
        }

    }
}