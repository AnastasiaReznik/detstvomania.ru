<?php

namespace app\core;

class Db
{
    protected $db;
    public function __construct()
    {   
        $db_name = 'app/config/db_config.php';
        if (file_exists($db_name)) {
            $db_config = require_once $db_name;
            }

        try {
            $this->db = new \PDO("mysql:host={$db_config['host']};dbname={$db_config['db_name']}", $db_config['root'], $db_config['password']);
            
        } catch(\PDOException $e) {
           die('DB connect ERROR!!!!');
        //    debug($e);
        }
        
    }
    public function queryAll($table_name, $param = null, $param_value = null)
    //"SELECT * FROM {$table_name} WHERE {$param_name} = ?"
    {
        if ($param != null and $param_value != null) {
        $stmt = $this->db->prepare("SELECT * FROM {$table_name} WHERE {$param} = ?");
        } else {
            $stmt = $this->db->prepare("SELECT * FROM {$table_name}");
        }
        $stmt->execute([$param_value]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        // debug($stmt);
    }
    
    // public function queryAll($table_name, $param = null) {
    //     if ($param != null) {
    //         $keys = array_keys($param);
    //         $param_name = $keys[0];
    //         $param_value = $param[$param_name];
    //         $stmt = $this->db->prepare("SELECT * FROM {$table_name} WHERE {$param_name} = ?");
    //         // debug($stmt);
           
    //     } else {
    //         $stmt = $this->db->prepare("SELECT * FROM {$table_name}");
    //     }
        
    //     $stmt->execute([$param_value]); //!!!!!!!!!
    //     return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    // }

    public function queryOne($table_name, $field, $param1, $value1, $param2=null, $value2 = null,$param3 = null, $value3 = null) {
        if ($param2 and $value2) {
            $stmt = $this->db->prepare("SELECT {$field} FROM {$table_name} WHERE {$param1} = ? AND  {$param2} = ?");
            $stmt->execute([$value1, $value2]);
        } else if ($param3 and $value3) {
            $stmt = $this->db->prepare("SELECT {$field} FROM {$table_name} WHERE {$param1} = ? AND  {$param2} = ? AND {$param3} = ?");
            $stmt->execute([$value1, $value2, $value3]);
        } else {
            $stmt = $this->db->prepare("SELECT {$field} FROM {$table_name} WHERE {$param1} = ?");
            $stmt->execute([$value1]);
        }
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function query($query)
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function registration($data_user)
    {
        // 1) выбрать все почты пользователей
        $email_users_bd = $this->query("SELECT `email` FROM `users`");
        // debug($email_users_bd);
        $res_answer = '';
        // 2) сравнить на совпадение почту которую ввел пользователь со всеми в бд
        if ($email_users_bd) { 
            foreach ($email_users_bd as $email_bd) {
                if ($email_bd['email'] == $data_user['email']) {
                    // echo 'Пользователь с такой электронной почтой уже зарегистрирован';
                    // $res = 'false';
                    $res_answer = 'Пользователь с такой почтой уже зарегистрирован';
                    // $res = $data_user['email'];
                    
                    break;
                } else { //если такого пользователя нету 

                    $res_answer = 'незареган';
                    // return 'true';
                    
                }
            }
            // return $res;
            // echo $res;
            
            // if($res == 'true') { //если такого пользователя нету, то вставка пользвателя в бд 
            if($res_answer == 'незареган') { //если такого пользователя нету, то вставка пользвателя в бд 
                // 3) добавить нового польователя
                // пароль надо захэштровать сначало!
                    $data_user['password']  = password_hash($data_user['password'], PASSWORD_DEFAULT);
                    $emai_iser = $data_user['email'];
                    $val = '';
                    $fields = '';
                    foreach ($data_user as $field_name => $value_field) {
                        $fields .=  '`' . $field_name . '`' . ',';
                        $val .= '\'' . $value_field . '\'' . ',';
                    }
                    $fil =  rtrim($fields, ',');
                    $val1 = rtrim($val, ',');
                // echo $fil;
                // echo '<br>';
                // echo $val1;
              
                    $query_res =  $this->query("INSERT INTO users ($fil) VALUES ($val1)");
                    $result_insert = $this->query("SELECT `email` FROM `users` WHERE `email` = '{$emai_iser}'");
                    // $result_insert = $this->queryOne(`email`, `users`, `email`,'a904@gmail.com');
                    // var_dump($result_insert);
                    if ($result_insert) {
                    $res_answer = 'Регистрация прошла успешно';
                    } else {
                    $res_answer =  'Произошла ошибка при регистрации.';
                    }
                    // return $res_q;
                    // return 'true';

                    
                    //не работает проверка
                    // if ($query_res) {
                    //     // return 'true'; //пользователь добавлен
                    //     echo 'пользователь добавлен';
                    // } else {
                    //     echo 'Ошибка при добавлении нового пользователя.';
                    //     // return  'false'; //'Ошибка при добавлении нового пользователя.';
                    // }
                    return $res_answer;
            }
            else if ($res_answer== 'Пользователь с такой почтой уже зарегистрирован') {
                // echo 'уже есть такой пользователь';
                // return 'false'; //уже есть такой пользователь
                
                return $res_answer; //уже есть такой пользователь
            }
        }
        
    }
    

    public function auth($email, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE `email` = ?");

        $stmt->execute([$email]);

        $data = $stmt->fetch(\PDO::FETCH_ASSOC); //вся информация о пользователе с данной почтой

        if ($data) { //если пользователь с такой почтой найден
            $password_hash = $data['password'];

            if (password_verify($password, $password_hash)) { //если совпал пароль, то вернуть всю инфу о пользователе
                return $data;
            } else {
                return 'Неверно указан пароль.';
                // return false;
            }
        } else {
            return 'Неправильно введена электронная почта.';
            // return false;
        }
    }

}
