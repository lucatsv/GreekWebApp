<?php

//require_once('./DBConnector.php');

//$um = new ShoppingCartManager();

// Facade
class ShoppingCartManager {

    private $db;

    public function __construct() {
        $this->db = DBConnector::getInstance();
    }

    public function startCart() {
        if(isset($_SESSION["userid"]))
        {
            $sql = "INSERT INTO cart (state, total,userid) values ('started', 0.00," . $_SESSION['userid'] . ")";
            $id = $this->db->getTransactionID($sql);
            // return id of the cart that was started
            return $id;
        }
        else {
            return null;
        }
    }

    public function cancelCart($id) {
        $sql = "UPDATE cart SET state = 'cancelled' WHERE ID = $id";
        $count = $this->db->affectRows($sql);
        return $count;
    }

    public function checkoutCart($id) {
        $sql = "UPDATE cart SET state = 'checked out' WHERE ID = $id";
        $count = $this->db->affectRows($sql);
        return $count;
    }

    public function addItemsToCart($items, $cart_id){
        $sku = $items["dishId"];
        $qty = $items["qty"];
            
        // need to look up the ID of the product based on the SKU
        $sql = "SELECT dishId FROM DISHES WHERE dishid = '$sku'";
        $rows = $this->db->query($sql);
        $product_id = $rows[0]['dishId'];
        $sql = "INSERT INTO cart_product (dish_id, cart_id, quantity)
                    VALUES ($sku, $cart_id, $qty)";
        $this->db->affectRows($sql);
     }

    public function getShoppingCart($cart_id){
        $sql = "select dishId, dishName, sum(cp.quantity) * price as price, sum(cp.quantity) quantity, d.price as uprice from cart_product cp 
        left join dishes d
        on cp.dish_id = d.dishId
        where cp.cart_id = '$cart_id' group by dishId, dishName, cp.quantity, d.price"; 
        $rows = $this->db->query($sql);
        if(count($rows) > 0) 
            return $rows;
        return null;
    }

    public function getShoppingCartTotal($cart_id){
        $sql = "select sum(cp.quantity * price) as price from cart_product cp left join dishes d on cp.dish_id = d.dishId where cp.cart_id = '$cart_id' group by cp.quantity";
        $rows = $this->db->query($sql);
        if(count($rows) > 0) 
            return $rows;
        return null;
    }
    
    public function getShoppingCartOwner($cart_id){
        $sql = "SELECT CONCAT(FIRSTNAME, ' ', LASTNAME) AS USERNAME FROM CART C left JOIN USERS U ON C.USERID = U.USERID WHERE C.ID= $cart_id";
        $rows = $this->db->query($sql);
         if(count($rows) > 0) 
            return $rows;
        return null;
    }

}

?>
