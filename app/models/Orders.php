<?php

namespace app\models;

use app\core\Model;
//модель для каталога
class Orders extends Model
{
    public function getOrders($id_user)
    {
        $res = $this->db->queryAll('orders', 'client_id', $id_user);
        // $name = [];
        foreach ($res as $key => $product) {
            $nameProduct = $this->db->query("SELECT `name` FROM `products` WHERE `id` = {$product['product_id']}");
            // $arr_name[] = $nameProduct;
        // $name =  $this->db->queryOne('products','name', 'id', $product['product_id']);
          $res[$key]['name'] = $nameProduct[0]['name'];
        }
        // return $res;
        return $res;
    }
    // public function getInfoProduct($id_user)
    // {
    //    return $this->db->queryAll('orders', 'client_id', $id_user);
    // }
}