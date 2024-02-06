<?php

require_once 'model/Contactslogic.php';
require_once 'model/Output.php';

class ContactsController
{
    public function __construct()
    {
        $this->ContactsLogic = new ContactsLogic();
        $this->Output = new Output();
    }
    public function __destruct() {}
    public function handleRequest() {
        try {
            $op = isset($_REQUEST['op']) ? $_REQUEST['op'] : '';
            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
            switch ($op) {
                case 'create':
                  $this->collectCreateContact();
                  break;
                case 'read':
                  $this->collectReadContact($_REQUEST['id']);
                  break;
                case 'update':
                  $this->collectUpdateContact($_REQUEST['id']);
                  break;
                case 'delete':
                    $this->collectDeleteContact($_REQUEST['id']);
                    break;
                case 'search':
                    $this->collectSearchContact();
                    break;
                case 'createJSON':
                    $this->collectCreateJSON();
                    break;
                default:
                    $this->collectReadAllContacts();
                    break;
                }
            }catch (Exception $e) {
                throw $e;
            }
        }

        public function collectCreateContact() {
            if (isset($_REQUEST['submit'])) {
                //collect parameters en validate en sanitysed
                $name   = isset($_REQUEST['name']) ?     $_REQUEST['name']   :NULL;
                $phone  = isset($_REQUEST['phone']) ?    $_REQUEST['phone']  :NULL;
                $email  = isset($_REQUEST['email']) ?    $_REQUEST['email']  :NULL;
                $adres  = isset($_REQUEST['adres']) ?    $_REQUEST['adres']  :NULL;

                $contacts = $this->ContactsLogic->createContact($name, $phone, $email, $adres);

                if($contacts > 0){
                    $msg  = "contact toegevoegt";
                } else {
                    $msg = "vul alle velden in";
                }
            }
            include 'view/create.php';

        }

        public function collectReadContact($id) {
            $contacts = $this->ContactsLogic->readContact($id);
            $contacts = $contacts->fetch(PDO::FETCH_ASSOC);
            include 'view/contact.php';
        }

        public function collectUpdateContact($id) {
            //collect parameters en validate en sanitysed
            $name   = isset($_REQUEST['name']) ?     $_REQUEST['name']   :NULL;
            $phone  = isset($_REQUEST['phone']) ?    $_REQUEST['phone']  :NULL;
            $email  = isset($_REQUEST['email']) ?    $_REQUEST['email']  :NULL;
            $adres  = isset($_REQUEST['adres']) ?    $_REQUEST['adres']  :NULL;
            //cheack if form is submit
            if (isset($_REQUEST['submit'])) {
                $contacts = $this->ContactsLogic->updateContact($id, $name, $phone, $email, $adres);

                if($contacts == 0) {
                    $msg = "pas data aan";
                } else if ($contacts == 1) {
                    $msg = "contact geupdate";
                } else if ($contacts == 2) {
                    $msg = "vul alle velden in";
                }
                // $this->collectReadContact($id);
            }
            //if no submit
            $contacts = $this->ContactsLogic->readContact($id);
            $res = $contacts->fetch(PDO::FETCH_NUM);
            [$id, $name, $phone, $email, $adres] = $res;

            $operation = "?op=update&id=$id";
            include 'view/update.php';
        }

        public function collectDeleteContact($id) {
            $contacts = $this->ContactsLogic->deleteContact($id);
            // var_dump($contacts);
            include 'view/delete.php';
        }

        public function collectReadAllContacts(){
            $contacts = $this->ContactsLogic->readAllContacts();
            $act = "contacts";
            $result = $this->Output->createTable($contacts, $act);
            // $names = $this->ContactsLogic->readAllNames();
            // $select = $this->Output->createSelectbox($names);
            include 'view/contacts.php';
        }

        public function collectSearchContact(){
            if (isset($_REQUEST['submit'])) {
                $search = $_POST['search'];
            }
            $contacts = $this->ContactsLogic->searchContact($search);
            $act = "contacts";
            $result = $this->Output->createTable($contacts, $act);
            include 'view/contacts.php';
        }

        public function collectCreateJSON(){
            $contacts = $this->ContactsLogic->readAllContacts();
            $data = $contacts->fetchAll(PDO::FETCH_DEFAULT);
            $result = json_encode($data, JSON_PRETTY_PRINT);
            include 'view/createjson.php';
        }
}


?>