<?php

require_once 'ContactController.php';
require_once 'ProductController.php';

class MainController
{
    public function __construct()
    {
        $this->ContactsController = new ContactsController();
        $this->ProductsController = new ProductsController();
    }
    public function __destruct() {}
    public function handleRequest() {
        try {
            $act = isset($_REQUEST['act']) ? $_REQUEST['act'] : '';
            switch ($act) {
                case 'products':
                    $this->ProductsController->handleRequest();
                  break;
                default:
                    $this->ContactsController->handleRequest();
                    break;
                }
            }catch (Exception $e) {
                throw $e;
            }
        }
}
?>