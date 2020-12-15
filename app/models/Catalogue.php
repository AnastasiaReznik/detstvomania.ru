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

    public function doSort($typeSort,$catId) {
    // $product_sale =  $this->getProductSale();
    // foreach ($product_sale as $key => $product) {
    //         $product_sale[$key]['total_price'] = $product['price'] - (($product['price'] * $product['discount'])/100);
    //         $this->db->query('');
    // } 
    // return $product_sale;
    // {
           
           $products = $this->getProducts($catId);
            foreach ($products as $key => $product) {
                if (is_int($key)) {
                $id_product = $product['id'];
                if ($product['discount'] > 1) {
                    $productsPrice = $product['price'] - (($product['price'] * $product['discount']) / 100);
                    $this->db->query("UPDATE products SET `total_price` = $productsPrice WHERE `id` =  $id_product"); //UPDATE cart SET `count` = (`count`+ $count) WHERE `product_id` = $id_product AND `client_id` = $id_user
                } else {
                    $productsPrice = $product['price'];
                    $this->db->query("UPDATE products SET `total_price` = $productsPrice WHERE `id` =  $id_product");
                }

                }
              
            }

        $query = "SELECT * FROM `products` WHERE `id_catalogue` = $catId";
        if ($typeSort == 'asc') {
            $query .= " ORDER BY `total_price` ASC";
        } else {
            $query .= " ORDER BY `total_price` DESC";
        }
        return $this->db->query($query);
    // }
        // return $res_query;
    }


}