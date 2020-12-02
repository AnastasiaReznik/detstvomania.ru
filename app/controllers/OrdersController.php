<?php
namespace app\controllers;
use app\core\Controller;

class OrdersController extends Controller
{
 public function indexAction()
 {
    $res = $this->model->getOrders($_SESSION['auth']['id']);
    // $info_product = $this->model->getInfoProduct($_SESSION['auth']['id']);
    $arr_orders = [];
    foreach ($res as $key => $order) {
        foreach ($res as $index => $value) {
            if ($order['date'] == $value['date'] and $order['date'] != $res[$key-1]['date']) {
                    $arr_orders[$key][] = 
                    [
                        [
                            'date' => $value['date'],
                            'product_id' => $value['product_id'],
                            'count' => $value['count'],
                            'price' => $value['price'],
                            'name' => $value['name']
                        ],                        
                    ];
            }
        }
        // if ($order['date'] == $res[$key+1]['date']) {

            // if ($key == 0) {
                    // $arr_orders[] = 
                    // [
                    //     [
                    //         'date' => $order['date'],
                    //         'product_id' => $order['product_id'],
                    //         'count' => $order['count'],
                    //         'price' => $order['price'],
                    //         'name' => $order['name']
                    //     ],
                    //     [
                    //         'date' => $res[$key + 1]['date'],
                    //         'product_id' => $res[$key + 1]['product_id'],
                    //         'count' => $res[$key + 1]['count'],
                    //         'price' => $res[$key + 1]['price'],
                    //         'name' => $res[$key + 1]['name']
                    //     ]
                    // ];
                    // у первго эл-та взять дату - foreach на перебирание всех дат в массиве ,если нашел, тогда к внешнему эл-ту прибавить все данные из найденного внутри
            // } else {
                // $arr_orders[] = 
                // [
                //         [
                //             'date' => $res[$key + 1]['date'],
                //             'product_id' => $res[$key + 1]['product_id'],
                //             'count' => $res[$key + 1]['count'],
                //             'price' => $res[$key + 1]['price'],
                //             'name' => $res[$key + 1]['name']
                //         ]
                // ];
            // }
                                                       //Array [0] => [
                                                                  //[date] => 12 12 2020
                                                                  //[id_product] =>
                                                                  // [name] =>
                                                                  //[count] =>
                                                                  //[price] =>
                                                             //]
                                                 


        // }
    }
    $this->view->render($arr_orders);
 }
}