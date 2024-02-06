<?php

require_once 'model/DataHandler.php';

class Contactslogic
    {
    public function __construct()
    {
        $this->DataHandler = new Datahandler("localhost", "mysql", "users_db", "user_db", "Fw@OOdD*CTOrXeqZ");
    }
    public function __destruct(){}

    public function createContact($name, $phone, $email, $adres) {
        $sql = "INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `address`)
        VALUES ('" . "', '" . $name . "', '" . $phone . "', '" . $email . "', '" . $adres . "')";
        if(!empty($name) && !empty($phone) && !empty($email) && !empty($adres)){
            $result = $this->DataHandler->createData($sql);
            return $result;
        }
    }

    public function readContact($id) {
        $sql = "SELECT * FROM contacts WHERE id = " . $id;
        $result = $this->DataHandler->readsData($sql);
        return $result;
    }

    public function updateContact($id, $name, $phone, $email, $adres) {
        $sql = "UPDATE contacts
        SET name = '" . $name . "', phone = '" . $phone . "', email = '" . $email . "', address = '" . $adres . "'
        WHERE id = " . $id;
        if(empty($name) || empty($phone) || empty($email) || empty($adres)){
            $result = 2;
        } else {
            $result = $this->DataHandler->updateData($sql);
        }
        return $result;
    }

    public function deleteContact($id) {
        $sql = "DELETE FROM contacts WHERE id = " . $id;
        $result = $this->DataHandler->deleteData($sql);
        return $result;
    }

    public function readAllContacts() {
        $sql = "SELECT * FROM contacts";
        $result = $this->DataHandler->readsData($sql);
        return $result;
    }

    public function readAllNames() {
        $sql = "SELECT name FROM contacts";
        $result = $this->DataHandler->readsData($sql);
        return $result;
    }

    public function searchcontact($search) {
        $sql = "SELECT * FROM contacts WHERE name LIKE '%" . $search . "%'";
        $result = $this->DataHandler->readsData($sql);
        return $result;
    }
 }

?>