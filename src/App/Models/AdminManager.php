<?php

    namespace App\Models;

    use Library\Core\AbstractModel;

    class AdminManager extends AbstractModel
    {

        private string $name_product;
        private string $description_product;
        private string $price_product;
        private string $category;
        private string $size_category;
        private string $product_image;
        private string $product_image_hover;
        private string $product_image3;
        private string $product_image4;
        private string $product_image5;
        private string $feature;

        public function __construct($name_product, $description_product, $price_product, $category, $size_category, $product_image, $product_image_hover, $product_image3, $product_image4, $product_image5, $feature)
        {
            parent::__construct();
            $this->name_product = $name_product;
            $this->description_product = $description_product;
            $this->price_product = $price_product;
            $this->category = $category;
            $this->size_category = $size_category;
            $this->product_image = $product_image;
            $this->product_image_hover = $product_image_hover;
            $this->product_image3 = $product_image3;
            $this->product_image4 = $product_image4;
            $this->product_image5 = $product_image5;
            $this->feature = $feature;
        }

        public function getNameProduct(): string
        {
            return $this->name_product;
        }

        public function getDescriptionProduct(): string
        {
            return $this->description_product;
        }

        public function getPriceProduct(): string
        {
            return $this->price_product;
        }

        public function getCategoryProduct(): string
        {
            return $this->category;
        }

        public function getSizeCategory(): string
        {
            return $this->size_category;
        }

        public function getProductImage(): string
        {
            return $this->product_image;
        }

        public function getProductImageHover(): string
        {
            return $this->product_image_hover;
        }

        public function getProductImage3(): string
        {
            return $this->product_image3;
        }

        public function getProductImage4(): string
        {
            return $this->product_image4;
        }

        public function getProductImage5(): string
        {
            return $this->product_image5;
        }

        public function getFeature(): string
        {
            return $this->feature;
        }



        public function addProduct(): void
        {
            $this->db->execute(
                'INSERT INTO products (name_product, description_product, price_product, category, size_category, product_image, product_image_hover, product_image3, product_image4, product_image5, feature) 
                VALUES (:name_product, :description_product, :price_product, :category, :size_category, :product_image, :product_image_hover, :product_image3, :product_image4, :product_image5, :feature)',
                [
                    'name_product' => htmlentities($this->getNameProduct()),
                    'description_product' => htmlentities($this->getDescriptionProduct()),
                    'price_product' => htmlentities($this->getPriceProduct()),
                    'category' => htmlentities($this->getCategoryProduct()),
                    'size_category' => htmlentities($this->getSizeCategory()),
                    'product_image' => htmlentities($this->getProductImage()),
                    'product_image_hover' => htmlentities($this->getProductImageHover()),
                    'product_image3' => htmlentities($this->getProductImage3()),
                    'product_image4' => htmlentities($this->getProductImage4()),
                    'product_image5' => htmlentities($this->getProductImage5()),
                    'feature' => htmlentities($this->getFeature()),
                ]);
        }
        public function joinTables($size): void {
            $idProduct = $this->db->getUniqueResult('SELECT id, size_category FROM products ORDER BY id DESC LIMIT 1');

            $this->db->execute('INSERT INTO sizes_products (product_id, size_id) 
                                        VALUES (:product_id, :size_id)',
                [
                    'product_id' => $idProduct['id'],
                    'size_id' => $size
                ]);
        }
        public function joinTheNewProduct(): void
        {
            $idProduct = $this->db->getUniqueResult('SELECT id, size_category FROM products ORDER BY id DESC LIMIT 1');

            if ($idProduct['size_category'] == '1') {
                for ($i=1; $i<13; $i++) {
                    $this->joinTables($i);
                }

            }

            if ($idProduct['size_category'] == '2') {
                for ($i=13; $i<16; $i++) {
                    $this->joinTables($i);
                }
            }
        }
    }