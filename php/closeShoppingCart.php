<?php
    if (session_status() == PHP_SESSION_NONE)
        session_start();

    require 'scripts/init.php';
    loadScripts();
    
    $scm = new ShoppingCartManager();

    $k = $scm->checkoutCart();
    
    //$scm->setCartId();
        
    $username = $scm->getShoppingCartOwner();
    if($k > 0)
        $data = array('msg' => 'Cart checked out', 'cartOwner' => $username);
    else 
        $data = array('msg' => 'Cart has not been updated');

    //unset($_SESSION['cartId']);
      
    echo json_encode($data, JSON_FORCE_OBJECT);    
?>
