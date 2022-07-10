<?php

namespace App\Controller;

use Library\Core\AbstractController;
use App\Models\ProductsManager;


class HomeController extends AbstractController {
    public function index(): void {

        $manager = new ProductsManager();

        $this->display(
            'home', [
                'title' => 'Royalement Français - Accueil',
                'banner' => '../images/backgroundhd.jpg',
                'products'=> $manager->getFeaturedProducts(),

                ]);
    }
}