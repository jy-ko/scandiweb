<?php
 include_once ('database.php'); 
    class Product extends Database
    {
        private $conn;
        public $sku;
        public $name;
        public $price;
        public $type;
        public $attributes;

        public function __construct( )
        {   $this->conn = $db;
            // $this->sku = $inputs['sku'];
            // $this->name = $inputs['name'];
            // $this->price = $inputs['price'];
            // $this->type = $inputs['type'];
        }

        public function displayAll() {
            $stmt = $this->conn->prepare('SELECT * FROM products');
            $stmt-> execute();
            return $stmt;
        }

        public function addProduct() {
            $stmt = $this->conn->prepare('INSERT INTO products SET sku = :sku, name = :name, price = :price');

            $stmt->bindParam(':sku', $this->sku);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':price', $this->price);

            if($stmt->execute()) {
                return TRUE;
            }

            return FALSE;
        }

        public function delete() {

            $stmt = $this->conn->prepare('DELETE FROM products WHERE id = :id');
            $stmt->bindParam(':id', $this->id);
    
            if($stmt->execute()) {
                return TRUE;
            }
    
            return FALSE;
        }
    
    }
?>