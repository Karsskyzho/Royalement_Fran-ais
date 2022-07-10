<?php

    namespace App\Models;

    use Library\Core\AbstractModel;

    class ProductsManager extends AbstractModel
    {

        public function getProducts(): array
        {

            return $this->db->getResults('SELECT * FROM products');
        }

        public function getFeaturedProducts(): array
        {
            return $this->db->getResults('SELECT * FROM products WHERE feature = "true" ');
        }

        public function showProducts(): array
        {
            return $this->db->getResults(
                'SELECT p.*, s.label FROM products p
                    LEFT JOIN sizes_products sp ON p.id = sp.product_id
                    LEFT JOIN sizes s ON s.id = sp.size_id
                    WHERE p.id = :id', [
                'id' => $_GET['id']
            ]);
        }
    }
