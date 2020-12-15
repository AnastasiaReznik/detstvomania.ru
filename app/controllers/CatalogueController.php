<?php
namespace app\controllers;
use app\core\Controller;

class CatalogueController extends Controller
{
    public function indexAction()
    {
        // echo 'Контроллер:' . __CLASS__ . ' | Экшэн: ' . __METHOD__;
        $data =  $this->model->getCategories();
        // debug($_SESSION['cat_id']);
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

public function sortAction()
{
      if ($this->isAjax()) {
         if (isset($_POST['typeSort'])) {
           $res = $this->model->doSort($_POST['typeSort'], $_SESSION['cat_id']);
           foreach ($res as $key => $product) {
            //    $oldPrice = '';
            //    $sale = '';
               if (!empty($product['discount'])) {
                        $oldPrice = $product['price'] . ' P';
                        $sale = 'SALE!';
               } else {
                        $oldPrice = '';
                        $sale = '';
               }
             printf('<div class="col col-xl-3 col-md-4 row-cols-sm-1 col-7 car">
                <div class="card h-100 border border-secondary" style="width: 300px;">
                    <a href="" data-toggle="modal" data-target="#exampleModal" class="showProduct" data-index=%s>
                        <img src="%s" class="card-img-top" alt="...">
                        <h5 class="card-title">%s</h5>
                        <div class="card-body">

                            <p class="card-text">
    

                                    <span class="new-price-product price-product"> %s</span> P
                                    
                                    <span class="old-price-product" style="text-decoration: line-through; text-decoration-color: grey">
                                        %s </span>
                                    <span class="sale text-danger" style="text-decoration: none;">%s</span>
                                    
                                    
                                <?php endif ?>
                            </p>
                            <!-- <div>
                            <div class="card-footer">
                                Card footer
                            </div>
                        </div> -->
                            <p class="btn btn-warning open-modal ">В корзину
                                <svg style=" width: 30px; height: 30px" viewBox="0 0 16 16" class="bi bi-cart-check " fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                    <path fill-rule="evenodd" d="M11.354 5.646a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                </svg>
                            </p>
                        </div>

                    </a>
                    <!-- <div class="card-body"> -->

                    <!-- <a href="" class="btn btn-warning into-basket">В корзину
                                <svg style=" width: 30px; height: 30px" viewBox="0 0 16 16" class="bi bi-cart-check " fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                    <path fill-rule="evenodd" d="M11.354 5.646a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                </svg>
                            </a> -->
                    <!-- </div> -->
                </div>
            </div>', $product['id'], $product['image'], $product['name'], $product['total_price'] , $oldPrice, $sale);
           }
            // echo json_encode($res);

         }
      }
   // $resSale = $this->model->getProductSale();
   // $this->view->render($resSale);
   // $this->view->render($res);
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