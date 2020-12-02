<?php
namespace app\models;
use app\core\Model;
//модель главной страницы
class Main extends Model {
    // public function getPages()
    // {
        // echo 'MODEL getphones - method';
        // $arr = $this->db->queryAll('pages');
        // $arr1 = $this->db->queryOne('pages', 'name', 'id', 2);
        // $arr2=$this->db->queryCountProducts();
        // debug($arr1);
        // debug($arr2);
    // }
   public function getCategories()
   {
       $res = $this->db->queryAll('catalogue');
       return $res;
    //    debug($res);
   }
   public function getProductSale()
   {
      $res_query = $this->db->query("SELECT * FROM `products` WHERE `discount` IS NOT NULL");
      $count_cart = $this->db->query("SELECT COUNT(*) as `count` FROM `cart` WHERE `client_id` = {$_SESSION['auth']['id']}");
       $res_query[] = $count_cart;
      return $res_query;
   }
   
}