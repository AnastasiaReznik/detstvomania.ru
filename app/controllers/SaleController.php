<?php
namespace app\controllers;
use app\core\Controller;
//контроллер личной страницы
class SaleController extends Controller {
public function indexAction()
{
   $resSale = $this->model->getProductSale();
   $this->view->render($resSale);
   // $this->view->render($res);
}

}