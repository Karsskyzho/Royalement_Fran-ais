<?php

return [
    '/' => [
        'App\Controller\HomeController',
        'index'
    ],
    '/products' => [
        'App\Controller\ProductsController',
        'index'
    ],
    '/about' => [
        'App\Controller\AboutController',
        'index'
    ],
    '/inscription' => [
        'App\Controller\InscriptionController',
        'index'
    ],
    '/connectionUser' => [
        'App\Controller\ConnectionController',
        'index'
    ],
    '/layoutProduct' => [
        'App\Controller\LayoutProductController',
        'index'
    ],
    '/profil' => [
        'App\Controller\ProfilController',
        'index'
    ],
    '/modifyProfil' => [
        'App\Controller\UpdateController',
        'index'
    ],
    '/basket' => [
        'App\Controller\BasketController',
        'index'
    ],
    '/admin' => [
        'App\Controller\AdminController',
        'index'
    ]
];