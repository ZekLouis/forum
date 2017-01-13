<?php
    $db = new Mypdo();
    $PostManager = new PostManager($db);
    $id = $PostManager->RandId();
    //echo "<script>window.location.replace(\"index.php?page=6&post=".$id."\");</script>";
    header('Location: index.php?page=6&post='.$PostManager->RandId());
?>