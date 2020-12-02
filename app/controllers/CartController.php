<?php
namespace app\controllers;
use app\core\Controller;

class CartController extends Controller
{
    public function indexAction()
    {
        $cart_data =  $this->model->getCart();
        $this->view->render($cart_data);
    }
    public function add_to_cartAction()
    {
        if ($this->isAjax()) {

           if (isset($_POST['product_id']) and isset($_POST['count']) and isset($_POST['price'])) {
            //    $cart_data =  $this->model->addCart($_POST['product_id'], $_POST['count'], $_POST['price'], $_SESSION['auth']['id']);
            //   $this->model;
            // $this->addcart();
            $id_client  = $_SESSION['auth']['id'];
            $res_add_cart = $this->model->addCart($_POST['product_id'], $_POST['count'], $_POST['price'], $id_client, $_POST['image']);
            // $res_add_cart['image'] = $_POST['image'];
            if ($res_add_cart['res']) {
                // echo 'true'; //добавлено в корзину
                    //вернуть количество товаров в корзине у пользовт-ля
                    
                echo json_encode($res_add_cart);
            } else {
                    // echo json_encode($res_add_cart);
                echo 'false'; //ошибка добавления
            }
           }
        } 
        // echo $_SESSION['auth']['id'];
        // $this->view->render();
    }

    public function setPriceAction()
    {
        if ($this->isAjax()) { 
            if (isset($_POST['count_change']) and !empty($_POST['count_change']) and isset($_POST['product_id']) and !empty($_POST['product_id'])) {
               $res =  $this->model->setPrice($_POST['product_id'], $_SESSION['auth']['id']);
               $res = $res[0]['price'] * $_POST['count_change'];
            // $res = [$_POST['count_change'], $_POST['product_id'], $_SESSION['auth']['id']];
            }
            echo json_encode($res);

        }
    }
    public function setCountProductAction()
    {
        if ($this->isAjax()) { 
            if (isset($_POST['count_change']) and !empty($_POST['count_change']) and isset($_POST['product_id']) and !empty($_POST['product_id'])) {
               $res =  $this->model->setCount($_POST['count_change'], $_POST['product_id'], $_SESSION['auth']['id']);
            //    $res = $res[0]['price'] * $_POST['count_change'];
            // $res = [$_POST['count_change'], $_POST['product_id'], $_SESSION['auth']['id']];
            }
            echo json_encode($res);

        }
    }
    
    public function checkoutAction()
    {
        if ($this->isAjax()) { 
            $res = $this->model->checkout($_SESSION['auth']['id']);
            //    $res =  $this->model->setCount($_POST['count_change'], $_POST['product_id'], $_SESSION['auth']['id']);
            //    $res = $res[0]['price'] * $_POST['count_change'];
            // $res = [$_POST['count_change'], $_POST['product_id'], $_SESSION['auth']['id']];
            
            echo json_encode($res);

        }
    }
    
    public function deleteFromCartAction()
    {
        if ($this->isAjax()) { 
            if (isset($_POST['product_id']) and !empty($_POST['product_id'])) {
                $res = $this->model->deleteFromCart($_POST['product_id'], $_SESSION['auth']['id']);
            //    $res =  $this->model->setPrice($_POST['count_change'], $_POST['product_id'], $_SESSION['auth']['id']);
            //    $res = $res[0]['price'] * $_POST['count_change'];
            // $res = [$_POST['count_change'], $_POST['product_id'], $_SESSION['auth']['id']];
            }
            // $this->indexAction();
            echo json_encode($res);

        }
    }


}



?>