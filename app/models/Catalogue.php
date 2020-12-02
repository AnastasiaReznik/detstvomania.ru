<?php

namespace app\models;

use app\core\Model;
//модель для каталога
class Catalogue extends Model
{
    public function getCategories()
    {
        $res = $this->db->queryAll('catalogue');
        // $cat_id = $this->db->query("SELECT COUNT(*) as `total_count`FROM products WHERE `id_catalogue` = {$res[0]['id']}");
        // $count = $this->db->query("SELECT COUNT(*) as count FROM products WHERE `id_catalogue` = {$_SESSION['cat_id']} ");
        // $res['count'] = $count;
        // $res[] = $cat_id;
        foreach ($res as $key => $value) {
            $cat_id = $this->db->query("SELECT COUNT(*) as `total_count` FROM products WHERE `id_catalogue` = {$value['id']}");
            // $count_product[$value['id']] = $cat_id;
            $res[$key]['count'] = $cat_id; 
        }
        //['1'] = 14;
        //['2'] = 10
        return $res;
        //    debug($res);
    }
    public function getProducts($cat_id)
    {
        $res = $this->db->queryAll('products', 'id_catalogue', $cat_id); //SELECT * FROM `products` WHERE id_catalogue = id, которое в сессии
        $nameCat = $this->db->queryAll('catalogue', 'id', $cat_id);
        $res['nameCat'] = $nameCat[0]['name'];
        return $res;
        //    debug($res);
    }

    public function show_info_product($productId)
    {
        return $this->db->queryAll('products', 'id', $productId);
    }

}