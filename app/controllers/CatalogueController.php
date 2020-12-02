<?php
namespace app\controllers;
use app\core\Controller;

class CatalogueController extends Controller
{
    public function indexAction()
    {
        // echo 'Контроллер:' . __CLASS__ . ' | Экшэн: ' . __METHOD__;
        $data =  $this->model->getCategories();
        // debug( $data);
        $this->view->render($data);
    }

    public function girls_productsAction()
    {
        $this->save_ses_cat_id();

        $data = $this->model->getProducts($_SESSION['cat_id']);

        $this->view->render($data);

    }
    public function boys_productsAction()
    {
        $this->save_ses_cat_id();

        $data = $this->model->getProducts($_SESSION['cat_id']);

        $this->view->render($data);
    }


    
    public function show_info_productAction()
    {
        if ($this->isAjax()) {
            if (isset($_POST['product_id']) and !empty($_POST['product_id'])) {
            $res = $this->model->show_info_product($_POST['product_id']);
             // debug($res);
            //  $res['id_product'] = $_POST['product_id'];
             echo json_encode($res); //перевод в JSON для передачи ajax
            }
        }
    }

    public function ajax_processing_emailAction()
    {       
        if ($this->isAjax()) {
           $query_res =  $this->reg($_POST);
        }
        echo json_encode($query_res);
    }


    public function authAction()
    {
        if ($this->isAjax()) {
            $auth_res = 'trtrt';
            
            //авторизация - вход
            if (isset($_POST['email']) and isset($_POST['password'])) {
                // debug($_POST);
                $res = $this->model->auth($_POST['email'], $_POST['password']);
                //    debug($_SESSION['auth']);
                //что-то изменится дальше
                if ($res == 'Неправильно введена электронная почта.') {
                    $auth_res = $res;

                } else  if ($res == 'Неверно указан пароль.') {
                    $auth_res = $res;
    
                } else { //данные введены были верно
                    //    session_destroy();
                    //    $_SESSION['auth'] = true; 
                    $_SESSION['auth'] = ['id' => $res['id'], 'email' => $res['email']];
                    // debug($_SESSION['auth']);
                    $auth_res = 'true';

                }
                //    debug($_SESSION);
                // return $auth_res;
                //  $auth_res;
            }
            

        }
        echo json_encode($auth_res);

    }




    //сохранение id продукта в каталоге в сессию, так как из url надо удалить get-параметр
    private function save_ses_cat_id()
    {
        if (isset($_GET['cat_id']) and !isset($_SESSION['cat_id'])) {
            $_SESSION['cat_id'] = $_GET['cat_id'];
            header('location: ' . $_SERVER['REDIRECT_URL']);
        } else if (isset($_GET['cat_id']) and isset($_SESSION['cat_id']) and $_SESSION['cat_id'] == $_GET['cat_id']) {
            header('location: ' . $_SERVER['REDIRECT_URL']);
        } else if (isset($_GET['cat_id']) and isset($_SESSION['cat_id']) and $_SESSION['cat_id'] != $_GET['cat_id']) {
            $_SESSION['cat_id'] = $_GET['cat_id'];
            header('location: ' . $_SERVER['REDIRECT_URL']);
        }
    }
}