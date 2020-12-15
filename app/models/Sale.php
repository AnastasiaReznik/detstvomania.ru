<?php
namespace app\models;
use app\core\Model;

class Sale extends Model {

    public function getProductSale()
    {
        $res_query = $this->db->query("SELECT * FROM `products` WHERE `discount` IS NOT NULL");

        return $res_query;
    }

}