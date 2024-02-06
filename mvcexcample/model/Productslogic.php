<?php

require_once 'model/DataHandler.php';

class Productslogic
    {
    public function __construct()
    {
        $this->DataHandler = new Datahandler("localhost", "mysql", "users_db", "root", "");
    }
    public function __destruct(){}

    public function createProduct($type, $supplier, $name, $price, $details) {
        $sql = "INSERT INTO `Products` (`product_id`, `product_type_code`, `supplier_id`, `product_name`, `product_price`, `other_product_details`)
        VALUES ('" . "', '" . $type . "', '" . $supplier . "', '" . $name . "', '" . $price . "', '" . $details . "')";
        if(!empty($type) && !empty($supplier) && !empty($name) && !empty($price) && !empty($details)){
            $result = $this->DataHandler->createData($sql);
            return $result;
        }
    }

    public function readProduct($id) {
        $sql = "SELECT * FROM Products WHERE product_id = " . $id;
        $result = $this->DataHandler->readsData($sql);
        return $result;
    }

    public function updateProduct($id, $type, $supplier, $name, $price, $details) {
        $sql = "UPDATE Products
        SET product_type_code = '" . $type . "', supplier_id = '" . $supplier . "', product_name = '" . $name . "', product_price = '" . $price . "', other_product_details = '" . $details . "'
        WHERE product_id = " . $id;
        // if(empty($type) || empty($supplier) || empty($name) || empty($price) || empty($details)){
        //     $result = 2;
        // } else {
            $result = $this->DataHandler->updateData($sql);
        // }
        return $result;
    }

    public function deleteProduct($product_id) {
            $sql = "DELETE FROM Products WHERE product_id = ". $product_id;
            $result = $this->DataHandler->deleteData($sql);
            return $result;
    }

    public function readAllProducts($p = 1) {
        $items_per_page = 5;
        $position = (($p-1) * $items_per_page);

        $sql = "SELECT * FROM `products` LIMIT $position , $items_per_page";
        $result = $this->DataHandler->readsData($sql);
        $pages = $this->DataHandler->readsData('SELECT COUNT(*) FROM `products`');
        $pages = $pages->fetch(PDO::FETCH_NUM);
        return array($result, $pages);

    }

    public function readAllNames() {
        $sql = "SELECT name FROM Products";
        $result = $this->DataHandler->readsData($sql);
        return $result;
    }

    public function SearchProduct($search) {
        $sql = "SELECT * FROM Products WHERE product_name LIKE '%$search%' OR other_product_details LIKE '%$search%'";
        $result = $this->DataHandler->readsData($sql);
        return $result;

    }

 }

?>