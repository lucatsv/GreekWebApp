<?php
    if (session_status() == PHP_SESSION_NONE)
        session_start();

    require 'scripts/init.php';
    loadScripts();
    
    $um = new UserManager();
    
    $data = $um->getUserData($_SESSION["userid"]);    

    echo json_encode($data, JSON_FORCE_OBJECT);

?>