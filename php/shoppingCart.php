<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    require 'scripts/init.php';
    loadScripts();
    
    $dishId = $_POST["dishId"];

    $scm = new ShoppingCartManager();
    
    if(isset($_SESSION['cartId'])) {
        $cartId = $_SESSION['cartId'];
    }
    else {
        $cartId = $scm->startCart();
        if($cartId == null)
            return;  
        $_SESSION['cartStarted'] = "true";
        $_SESSION['cartId'] = $cartId;
        $data = array("status" => "success", "cart_id" => $cartId, "msg" => "Cart started." . $cartId);
    }

    
    $item = array("dishId" => $dishId, "qty" => "1");
                        
    $scm->addItemsToCart($item, $cartId);
    
    
    $rows = $scm->getShoppingCart($cartId);
    
    $table = "";
    
    $data = array();
    for($i = 0;$i<count($rows);$i++)
    {
        $d = array('dishId' => $rows[$i]['dishId'], 'dishName' => $rows[$i]['dishName'], 
        'quantity' => $rows[$i]['quantity'], 'price' => $rows[$i]['price'], 'uprice' => $rows[$i]['uprice']);
        array_push($data, $d);
        /*
        $table .= "<tr><td>" . $rows[$i]['dishName'] . "</td>
        <td><input class='prod_qty_cart' type='text' value ='" . $rows[$i]['quantity'] . "'></td>
        <td>" . $rows[$i]['price'] . "</td><tr>";*/
    }
    $total = $scm->getShoppingCartTotal($cartId);
    
    //$data = array("table" => $table, "total" => $total);
     
    echo json_encode($data, JSON_FORCE_OBJECT);

?>