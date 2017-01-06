<?php
    header('Content-type: application/json');

    include_once('../config.inc.php');
    include_once('../../classes/Mypdo.class.php');
    include_once('../../classes/User.class.php');
    include_once('../../classes/UserManager.class.php');

    $db = new Mypdo();
    $UserManager = new UserManager($db);

    $pseudo = $_GET['pseudo'];
    $res = $UserManager->pseudoExiste($pseudo);
    if($res){
        echo json_encode('0');
    }else{
        echo json_encode('1');
    }
    
?>