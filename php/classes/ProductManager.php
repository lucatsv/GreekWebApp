<?php

//require_once('./DBConnector.php');

//$um = new ProductManager();

// Facade
class ProductManager {

    private $db;

    public function __construct() {
        $this->db = DBConnector::getInstance();
    }

    public function listProducts() {
        $sql = "SELECT dishid, price, description FROM product";
        $rows = $this->db->query($sql);
        return $rows;
    }

    public function findProduct($dishid) {
        $params = array(":sku" => $SKU);
        $sql = "SELECT dishid, price, description FROM product WHERE dishid = :dishid";

        $rows = $this->db->query($sql, $params);
        if(count($rows) > 0) {
            return $rows[0];
        }

        return null;
    }


}

?>
