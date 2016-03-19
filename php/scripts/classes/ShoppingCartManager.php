<?php

//require_once('./DBConnector.php');

//$um = new ShoppingCartManager();

// Facade
class ShoppingCartManager {

    private $db;
    private $cartId;

    public function __construct() {
        $this->db = DBConnector::getInstance();
        $_SESSION['cartId'] = $this->getCartId();
        $this->cartId = $_SESSION['cartId'];
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
            return $_SESSION["userid"];
        }
    }

    public function cancelCart() {
        
        $sql = "UPDATE cart SET state = 'cancelled' WHERE ID = $this->cartId";
        $count = $this->db->affectRows($sql);
        return $count;
    }

    public function checkoutCart() {
        $sql = "UPDATE cart SET state = 'checked out' WHERE ID = $this->cartId";
        $count = $this->db->affectRows($sql);
        
        $_SESSION['cartId'] = null;
        return $count;
    }

    public function addItemsToCart($items){
        $sku = $items["dishId"];
        $qty = $items["qty"];
            
        // need to look up the ID of the product based on the SKU
        $sql = "SELECT dishId FROM DISHES WHERE dishid = '$sku'";
        $rows = $this->db->query($sql);
        $product_id = $rows[0]['dishId'];
        $sql = "INSERT INTO cart_product (dish_id, cart_id, quantity)
                    VALUES ($sku, $this->cartId, $qty)";
        $this->db->affectRows($sql);
     }

    public function getShoppingCart(){
        $sql = "select dishId, dishName, sum(cp.quantity) * price as price, sum(cp.quantity) quantity, d.price as uprice from cart_product cp 
        left join dishes d
        on cp.dish_id = d.dishId
        where cp.cart_id = '$this->cartId' group by dishId, dishName, cp.quantity, d.price"; 
        
        $rows = $this->db->query($sql);
        if(count($rows) > 0) 
            return $rows;
        return null;
    }

    public function getShoppingCartTotal(){
        $sql = "select sum(cp.quantity * price) as price from cart_product cp left join dishes d on cp.dish_id = d.dishId where cp.cart_id = '$this->cartId' group by cp.quantity";
        $rows = $this->db->query($sql);
        if(count($rows) > 0) 
            return $rows;
        return null;
    }
    
    public function getShoppingCartOwner(){
        $sql = "SELECT CONCAT(FIRSTNAME, ' ', LASTNAME) AS USERNAME FROM CART C left JOIN USERS U ON C.USERID = U.USERID WHERE C.ID= $this->cartId";
        $rows = $this->db->query($sql);
         if(count($rows) > 0) 
            return $rows;
        return null;
    }
    
    public function ToJSON() {
        $rows = $this->getShoppingCart();
        
        $data = array();
        for($i = 0;$i<count($rows);$i++)
        {
            $d = array('dishId' => $rows[$i]['dishId'], 'dishName' => $rows[$i]['dishName'], 
            'quantity' => $rows[$i]['quantity'], 'price' => $rows[$i]['price'], 'uprice' => $rows[$i]['uprice']);
            array_push($data, $d);
        }
        return $data;
    }

    public function getCartId() {
        $cartId = $this->getOpenCart();
        if($cartId == null)
            $cartId = $this->startCart();
            
        return $cartId;
    }
    
    public function getOpenCart(){
        $userId = $_SESSION['userid'];
        $sql = "SELECT ID FROM cart where state = 'started' and userId = $userId order by time desc";
        $rows = $this->db->query($sql);
        if(count($rows) > 0) {
           return $rows[0]["ID"];
        }
        else{
           return null;
        }
    }
}

?>
