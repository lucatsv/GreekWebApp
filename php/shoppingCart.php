<?php

    if (session_status() == PHP_SESSION_NONE)
        session_start();
    
    require 'scripts/init.php';
    loadScripts();
    
    $dishId = $_POST["dishId"];

    $scm = new ShoppingCartManager();
    //$scm->getCartId();  
    
    $item = array("dishId" => $dishId, "qty" => "1");
    $scm->addItemsToCart($item);
 
    echo json_encode($scm->ToJSON(), JSON_FORCE_OBJECT);
?>