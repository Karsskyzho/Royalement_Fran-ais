<?php

namespace App\Controller;

use Library\Core\AbstractController;


class BasketController extends AbstractController {
    public function index(): void {

        $this->display(
            'basket',
            [
                'title' => 'Royalement Français - Panier',
                'banner' =>'../images/backgroundhd.jpg'
        ]);
    }
}
