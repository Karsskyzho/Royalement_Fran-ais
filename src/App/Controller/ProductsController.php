<?php

namespace App\Controller;

use Library\Core\AbstractController;
use App\Models\ProductsManager;


class ProductsController extends AbstractController {
    public function index(): void {

        $manager = new ProductsManager();

        $this->display(
            'products', [
                'title' => 'Royalement Français - Nos produits',
                'products'=> $manager->getProducts(), // la clé 'products' va créer une variable $products dans le template product.php
                'banner' => '../images/images.jpg'
            ]);
    }
}