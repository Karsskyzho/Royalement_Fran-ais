<?php

    namespace App\Controller;

    use Library\Core\AbstractController;
    use App\Models\ProductsManager;


    class LayoutProductController extends AbstractController
    {
        public function index(): void
        {
            $manager = new ProductsManager();

            $this->display(
                'layoutProduct', [
                    'title' => 'Royalement Français - Produits',
                    'banner' => '../images/images.jpg',
                    'products'=> $manager->showProducts()
                ]
            );
        }
    }
