<?php

namespace app\core;

abstract class Model
{
    protected $db;
    public function __construct()
    {
        $this->db = new Db();
        // debug($this->db);
        // debug($_SESSION);
    }

    public function registration($data_user)
    {
        // debug($data_user);
       $res = $this->db->registration($data_user);
    //    var_dump($res);
       return $res; // 1)зарегалиу 2)незарегалиошибкабд  3)зарегануже

    }
    
    public function auth($email, $password)
    {
        $res = $this->db->auth($email, $password); //1) 'Неправильно введена электронная почта.' 2) 'Неверно указан пароль.' 3) данные о пользователе
        if ($res == 'Неправильно введена электронная почта.') {
            return $res;
        } else if ($res == 'Неверно указан пароль.') {
            return $res;
        } else {
            return $res;
        }
        // SELECT * FROM clients WHERE email=$email AND passsword=$password
       
    }
   
}
