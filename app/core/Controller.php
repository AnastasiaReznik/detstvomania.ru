<?php
namespace app\core;
session_start();
abstract class Controller
{
    protected $route;
    protected $view;
    protected $model;
    public function __construct($route)
    {
        // debug($route);
        $this->route = $route;
        $this->view = new View($route);
        $model_name = '\app\models\\'  . ucfirst($route['controller']);
        $this->model = new $model_name;
        // debug($_SESSION);
        // debug($this->model);
        // debug($this->view);
        // $this->model->getPages();
        // session_destroy();
        // echo 'controller!';

        // $pas = password_hash('12Aa.', PASSWORD_DEFAULT);
        // echo $pas;

        //выход из профиля
        if (isset($_GET['do']) and $_GET['do'] == 'exit') {
            session_unset();
            // header('location: ' . $_SERVER['REDIRECT_URL']);
            header('location: ' . '/');
            // die();
        }
        // //регистрация - старая врсия
        // if (isset($_POST['firstName']) and isset($_POST['email']) and isset($_POST['password'])) {
        //     // var_dump($_POST['sex']);
        //     // $arr_data_user = [];
        //     // foreach ($_POST as $data_user) {
        //         if ($_POST['sex'] == "") {
        //             // debug($data_user['sex']);
        //             unset($_POST['sex']);
        //         }
        //         if ($_POST['birthdate'] == "") {
        //             unset($_POST['birthdate']);
        //         }
        //     // }
        //     // debug($_POST);
        //     $this->model->registration($_POST);
        // }


        //авторизация - вход / исходная версия
        // if (isset($_POST['emailEnter']) and isset($_POST['passwordEnter'])) {
        //     // debug($_POST);
        //     $res = $this->model->auth($_POST['emailEnter'], $_POST['passwordEnter']);
        //     //    debug($_SESSION['auth']);
        //     if ($res) {
        //         //    session_destroy();
        //         //    $_SESSION['auth'] = true; 
        //         $_SESSION['auth'] = ['id' => $res['id'], 'email' => $res['email']];
        //         // debug($_SESSION['auth']);
        //         header('location: ' . $_SERVER['REDIRECT_URL']);
        //     } else {
        //         // echo "
        //         // <div class='card-panel red lighten-2 auth-error' style='position:absolute; left:50%; top: 30%; transform: translate(-50%,-50%)' >Вы ввели неверные данные</div>
        //         // ";


        //     }
        //     //    debug($_SESSION);
        // }


        //выход из профиля
        // if (isset($_GET['do']) and $_GET['do'] == 'exit') 
        // {
        //     session_unset('do');
        //     header('location: ' . $_SERVER['REDIRECT_URL']);
        //     // die();
        // }

    }

    public function isAjax()
    {
        //метод проверяет был ли ajax запрос или нет. Если да - то возвр Истина, иначе - Ложь
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }

    //регистрация
    public function reg($data_user)
    {
        if (isset($_POST['firstName']) and isset($_POST['email']) and isset($_POST['password'])) {
            // var_dump($_POST['sex']);
            // $arr_data_user = [];
            // foreach ($_POST as $data_user) {
                if ($_POST['sex'] == "") {
                    // debug($data_user['sex']);
                    unset($_POST['sex']);
                }
                if ($_POST['birthdate'] == "") {
                    unset($_POST['birthdate']);
                }
            // }
            // debug($_POST);
           $query_res = $this->model->registration($_POST);
        }
        return $query_res;
      
    }


    

    // public function auth($email_user)
    // {
    //     //авторизация - вход
    //     if (isset($_POST['emailEnter']) and isset($_POST['passwordEnter'])) {
    //         // debug($_POST);
    //         $res = $this->model->auth($_POST['emailEnter'], $_POST['passwordEnter']);
    //         //    debug($_SESSION['auth']);
    //         if ($res) {
    //             //    session_destroy();
    //             //    $_SESSION['auth'] = true; 
    //             $_SESSION['auth'] = ['id' => $res['id'], 'email' => $res['email']];
    //             // debug($_SESSION['auth']);
    //             header('location: ' . $_SERVER['REDIRECT_URL']);
    //         } else {
    //             // echo "
    //             // <div class='card-panel red lighten-2 auth-error' style='position:absolute; left:50%; top: 30%; transform: translate(-50%,-50%)' >Вы ввели неверные данные</div>
    //             // ";


    //         }
    //         //    debug($_SESSION);
    //     }
    // }

}
