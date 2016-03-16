<?php
    if (session_status() == PHP_SESSION_NONE)
        session_start();

    require 'scripts/init.php';
    loadScripts();
    if(isset($_SESSION['cartId'])) {
        $cartId = $_SESSION['cartId'];
        $scm = new ShoppingCartManager();
        $k = $scm->checkoutCart($cartId);
        $username = $scm->getShoppingCartOwner($cartId);
        
        if($k > 0)
            $data = array('msg' => 'Cart checked out', 'cartOwner' => $username);
        else 
            $data = array('msg' => 'Cart has not been updated');
    }
    else
        $data = array('msg' => 'Cart has not been initializated');
        
        
        

    unset($_SESSION['cartId']);
      
    echo json_encode($data, JSON_FORCE_OBJECT);    
    
?>
