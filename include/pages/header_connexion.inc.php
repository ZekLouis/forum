<?php
    session_start();
    if(!isset($_SESSION['pseudo'])){
        echo json_encode('
            <li><a href="index.php?page=2"><i class="left material-icons">perm_identity</i>Inscription</a></li>
            <li><a href="index.php?page=1"><i class="left material-icons">input</i> Connexion</a></li>');
    }else{
        echo json_encode('
            <li><a href="index.php?page=4"><i class="left material-icons">perm_identity</i>'.$_SESSION['pseudo'].'</a></li>
            <li><a style="cursor:pointer" onclick="deconnexion();"><i class="left material-icons">input</i> Deconnexion</a></li>');
    }
?>