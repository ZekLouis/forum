<?php
    session_start();
    if(!isset($_SESSION['pseudo'])){
        echo json_encode('<ul class="nav navbar-nav navbar-right">
            <li><a href="index.php?page=2"><span class="glyphicon glyphicon-user"></span> Inscription</a></li>
            <li><a href="index.php?page=1"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
        </ul>');
    }else{
        echo json_encode('<ul class="nav navbar-nav navbar-right">
            <li><a href="index.php?page=4">'.$_SESSION['pseudo'].'</a></li>
            <li><a style="cursor:pointer" onclick="deconnexion();"><span class="glyphicon glyphicon-log-out"></span> Deconnexion</a></li>
        </ul>');
    }
?>