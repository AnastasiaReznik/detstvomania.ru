<?php

namespace app\models;

use app\core\Model;
//модель для каталога
class Cart extends Model
{
    public function getCart()
    {
        $all_products_cart =  $this->db->queryAll('cart', 'client_id', $_SESSION['auth']['id']); //все товары корзины
        foreach ($all_products_cart as $key => $product_cart) {
            $product_id = $product_cart['product_id'];
            $info_product = $this->db->queryAll('products', 'id', $product_id); //"SELECT * FROM {$table_name} WHERE {$param} = ?"
            $name = $info_product[0]['name'];
            $description  = $info_product[0]['description'];
            $all_products_cart[$key]['name'] = $name;
            $all_products_cart[$key]['description'] = $description;
        }
        return $all_products_cart;

    }
    public function addCart($id_product, $count, $price, $id_user, $image)
    {
        
        // $_SESSION['auth']['id'];
        //"INSERT INTO cart (`client_id`, `product_id`, `count`, `price`) VALUES ($_SESSION['auth']['id'],  )"
        //проверить - есть ли такой продукт(по id) уже в корзине, если да - изменить количество, иначе просто добавить
        $find_product = $this->db->query("SELECT * FROM `cart` WHERE `product_id` = $id_product AND `client_id` = $id_user");//SELECT * FROM cart WHERE product_id = $id_product
        if ($find_product) { //если такой продукт уже есть, то обновляеся количество
            $this->db->query("UPDATE cart SET `count` = (`count`+ $count) WHERE `product_id` = $id_product AND `client_id` = $id_user"); 
        } else { //иначе добавление продукта в корзину
            // $this->db->query("INSERT INTO cart(`image`) VALUES ($image) WHERE `client_id` = $id_user AND `product_id` = $id_product"); //вставка изобр чтобы вывести в корзине потом
            $this->db->query("INSERT INTO cart (`client_id`, `product_id`, `count`, `price`,`image` ) VALUES ($id_user, $id_product, $count, $price, '$image')");
            //SELECT {$field} FROM {$table_name} WHERE {$param1} = ? AND  {$param2} = ?
        }
        // $this->db->query("UPDATE `cart` SET `count` = 5 WHERE `product_id` = 1");
       
        $res = $this->db->query("SELECT * FROM `cart` WHERE `client_id` = $id_user AND `product_id` = $id_product");
        $query_res = ['res' => $res];
        return $query_res;
        // return $res;

    }

    public function setPrice($product_id, $id_user)
    {
        // $res_query = $this->db->queryOne(`price`, `cart`, `client_id`, $id_user, `product_id`, $product_id);
        //"SELECT {$field} FROM {$table_name} WHERE {$param1} = ? AND  {$param2} = ? AND {$param3} = ?"
        
        $res_query = $this->db->query("SELECT `price` FROM `cart` WHERE `client_id` = $id_user  AND `product_id`  =  $product_id");
        // $res = $res_query[0]['price'] * $count_product;
        return $res_query;
    }
    public function setCount($count_product, $product_id, $id_user)
    {
        // UPDATE cart SET `count` = (`count`+ $count) WHERE `product_id` = $id_product AND `client_id` = $id_user
        $res_query = $this->db->query("UPDATE cart SET `count` = $count_product WHERE `client_id` = $id_user  AND `product_id`  =  $product_id");
        return $res_query;
    }
    
    public function deleteFromCart($product_id, $id_user)
    {
        // $res_query = $this->db->queryOne(`price`, `cart`, `client_id`, $id_user, `product_id`, $product_id);
        //"SELECT {$field} FROM {$table_name} WHERE {$param1} = ? AND  {$param2} = ? AND {$param3} = ?"
        $query_delete = $this->db->query("DELETE FROM `cart` WHERE `client_id` = $id_user AND `product_id` = $product_id");
        
        //взять корзину без удаленного товара
        return $this->getCart();
        
        // $res = $res_query[0]['price'] * $count_product;
        // return $res_query;
    }

    public function checkout($id_user)
    {
        // UPDATE cart SET `count` = (`count`+ $count) WHERE `product_id` = $id_product AND `client_id` = $id_user
        $cart_user = $this->db->queryAll('cart', `client_id`, $id_user);
        if ($cart_user) {
            foreach ($cart_user as $key => $product_in_cart) {
            $cart_user[$key]['price'] = $product_in_cart['price'] * $product_in_cart['count'];
            $this->db->query("UPDATE cart SET `price` = {$cart_user[$key]['price']} WHERE `client_id` = {$product_in_cart['client_id']} AND `product_id` = {$product_in_cart['product_id']}"); //перезапись новой цены
            }
            //вставка данных в таблицу orders
           $order =  $this->db->query("INSERT INTO orders(`client_id`, `product_id`, `count`, `price`) SELECT `client_id`, `product_id`, `count`, `price` FROM cart");
            //удалить корзину для пользователя
            $this->db->query("DELETE FROM cart WHERE `client_id` = $id_user");    
            //"INSERT INTO cart (`client_id`, `product_id`, `count`, `price`,`image` ) VALUES ($id_user, $id_product, $count, $price, '$image')"
            // return $order;
            return $order;

        } else {
            return 'false';
        }
        // return $cart_user;
    }
    
}
