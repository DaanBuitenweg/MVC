<?php

require_once 'model/Productslogic.php';
require_once 'model/Output.php';

class ProductsController
{
    public function __construct()
    {
        $this->ProductsLogic = new ProductsLogic();
        $this->Output = new Output();
    }
    public function __destruct() {}
    public function handleRequest() {
        try {
            $op = isset($_REQUEST['op']) ? $_REQUEST['op'] : '';
            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
            switch ($op) {
                case 'create':
                  $this->collectCreateProduct();
                  break;
                case 'read':
                  $this->collectReadProduct($_REQUEST['id']);
                  break;
                  case 'reads':
                    $this->CollectReadPagedproducts($_REQUEST['page']);
                    break;
                case 'update':
                  $this->collectUpdateProduct($_REQUEST['id']);
                  break;
                case 'delete':
                    $this->collectDeleteProduct($_REQUEST['id']);
                    break;
                case 'search':
                    $this->collectSearchProduct();
                    break;
                default:
                    $this->CollectReadPagedproducts(1);
                    break;
                }
            }catch (Exception $e) {
                throw $e;
            }
        }

        public function collectCreateProduct() {
            if (isset($_REQUEST['submit'])) {
                //collect parameters en validate en sanitysed
                $type       = isset($_REQUEST['product_type_code']) ?      $_REQUEST['product_type_code']   :NULL;
                $supplier   = isset($_REQUEST['supplier_id']) ?            $_REQUEST['supplier_id']  :NULL;
                $name       = isset($_REQUEST['product_name']) ?           $_REQUEST['product_name']  :NULL;
                $price      = isset($_REQUEST['product_price']) ?          $_REQUEST['product_price']  :NULL;
                $details    = isset($_REQUEST['other_product_details']) ?  $_REQUEST['other_product_details']  :NULL;

                $products = $this->ProductsLogic->createProduct($type, $supplier, $name, $price, $details);

                if($products > 0){
                    $msg  = "Product toegevoegt";
                } else {
                    $msg = "vul alle velden in";
                }
            }
            include 'view/createproduct.php';

        }

        public function collectReadProduct($id) {
            $products = $this->ProductsLogic->readProduct($id);
            $products = $products->fetch(PDO::FETCH_ASSOC);
            include 'view/readproduct.php';
        }

        public function collectUpdateProduct($id) {

            $type       = isset($_REQUEST['product_type_code']) ?      $_REQUEST['product_type_code']   :NULL;
            $supplier   = isset($_REQUEST['supplier_id']) ?            $_REQUEST['supplier_id']  :NULL;
            $name       = isset($_REQUEST['product_name']) ?           $_REQUEST['product_name']  :NULL;
            $price      = isset($_REQUEST['product_price']) ?          $_REQUEST['product_price']  :NULL;
            $details    = isset($_REQUEST['other_product_details']) ?  $_REQUEST['other_product_details']  :NULL;

            if (isset($_REQUEST['submit'])) {
                $products = $this->ProductsLogic->updateProduct($id, $type, $supplier, $name, $price, $details);

            }
            $products = $this->ProductsLogic->readProduct($id);
            $res = $products->fetch(PDO::FETCH_NUM);
            [$id, $type, $supplier, $name, $price, $details] = $res;

            $operation = "?act=products&op=update&id=$id";
            include 'view/updateProduct.php';
        }

        public function collectDeleteProduct($product_id){
            $msg = "";
            $products = $this->ProductsLogic->deleteProduct($product_id);
            include 'view/delete.php';
        }

        public function collectReadAllProducts(){
            $products = $this->ProductsLogic->readAllProducts();
            $act = "products";
            $id_colum_name = "product_id";
            $result = $this->Output->createTable($products, $act, $id_colum_name);
            include 'view/readsproducts.php';
        }
    //     public function readAllProducts() {
    //     try {
    //         $sql = "SELECT * FROM `products` LIMIT  5 OFFSET  5;";
    //         $rowsperpage = 5;
    //         $amountBtn = ceil($totaalrows / $rowsperpage);
    //         $this->Output->createButton(3);
    //         $result = $this->DataHandler->readsData($sql);
    //         return $result;
    //     } catch (Exception $e) {
    //         throw $e;
    //     }
    // }

        public function collectSearchProduct(){
            if (isset($_POST['submit'])) {
                $search = $_POST['search'];

            }

            $results = $this->ProductsLogic->SearchProduct($search);
            $act = "products";
            $id_colum_name = "product_id";
            $products = $this->Output->createTable($results, $act, $id_colum_name);

            include 'view/searchproducts.php';

        }
        public function CollectReadPagedproducts($p){
            $result = $this->ProductsLogic->readAllProducts($p);
            $products = $this->Output->createTable($result[0], 'products', 'product_id');
            $pages = $result[1];
            $pagebuttons = $this->Output->createButtons($pages, 'products');
            $msg = "Showing page {$p} of all products";
            include 'view/readsproducts.php';
        }
}