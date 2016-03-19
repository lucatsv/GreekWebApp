<?php
    require 'scripts/init.php';
    loadScripts();
    
    $dishId = $_POST["dishId"];
  
    $p = new ProductManager();
    
    $data = $p->findProduct($dishId);
    echo json_encode($data, JSON_FORCE_OBJECT);
?>
