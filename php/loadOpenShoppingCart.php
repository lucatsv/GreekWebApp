<?php
    if (session_status() == PHP_SESSION_NONE)
        session_start();

    require 'scripts/init.php';
    loadScripts();
    
    $scm = new ShoppingCartManager();
    
    $scm->getOpenCart();
    
    $data = $scm->ToJSON();
    
    echo json_encode($data, JSON_FORCE_OBJECT);   
?>