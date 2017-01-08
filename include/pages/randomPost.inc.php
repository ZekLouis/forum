<?php
    $db = new Mypdo();
    $PostManager = new PostManager($db);

    header('location: index.php?page=6&post='.$PostManager->RandId());
?>