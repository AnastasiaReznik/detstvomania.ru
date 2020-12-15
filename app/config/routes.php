<?php
//ключи-это url адреса/маршруты
return [
    '' => [
        'controller' => 'main', //название страницы
        'action' => 'index' //название метода в контроллере
    ],
    'catalogue' => [
        'controller' => 'catalogue',
        'action' => 'index'
    ],
    'catalogue/girls_products' => [
        'controller' => 'catalogue',
        'action' => 'girls_products'
    ],
    'catalogue/boys_products' => [
        'controller' => 'catalogue',
        'action' => 'boys_products'
    ],
    'catalogue/show_info_product' => [
        'controller' => 'catalogue',
        'action' => 'show_info_product'
    ],
    'catalogue/ajax_processing_email' => [
        'controller' => 'catalogue',
        'action' => 'ajax_processing_email'
    ],
    'catalogue/auth' => [
        'controller' => 'catalogue',
        'action' => 'auth'
    ],
    'cart' => [
        'controller' => 'cart',
        'action' => 'index'
    ],
    'cart/add_to_cart' => [
        'controller' => 'cart',
        'action' => 'add_to_cart'
    ],

    'cart/setPrice' => [
        'controller' => 'cart',
        'action' => 'setPrice'
    ],
    'cart/deleteFromCart' => [
        'controller' => 'cart',
        'action' => 'deleteFromCart'
    ],
    'personalInfo' => [
        'controller' => 'personalInfo',
        'action' => 'index'
    ],
    'cart/setCountProduct' => [
        'controller' => 'cart',
        'action' => 'setCountProduct'
    ],
    'cart/checkout' => [
        'controller' => 'cart',
        'action' => 'checkout'
    ],
    'orders' => [
        'controller' => 'orders',
        'action' => 'index'
    ],
    'personalInfo/save_change' => [
        'controller' => 'personalInfo',
        'action' => 'save_change'
    ],
    'sale' => [
        'controller' => 'sale',
        'action' => 'index'
    ],
    'catalogue/sort' => [
        'controller' => 'catalogue',
        'action' => 'sort'
    ],
    
    // 'catalogue/computers' => [
    //     'controller' => 'catalogue',
    //     'action' => 'computers'
    // ],
    // 'catalogue/add_to_cart' => [
    //     'controller' => 'catalogue',
    //     'action' => 'add_to_cart'
    // ],
    // 'catalogue/get_client_cart' => [
    //     'controller' => 'catalogue',
    //     'action' => 'get_client_cart'
    // ],
    // 'catalogue/delete_from_cart' => [
    //     'controller' => 'catalogue',
    //     'action' => 'delete_from_cart'
    // ],
    // 'catalogue/checkout' => [
    //     'controller' => 'catalogue',
    //     'action' => 'checkout'
    // ],
    // 'catalogue/get_client_orders' => [
    //     'controller' => 'catalogue',
    //     'action' => 'get_client_orders'
    // ],

    // 'contacts' => [
    //     'controller' => 'contacts',
    //     'action' => 'index'
    // ]
    
];