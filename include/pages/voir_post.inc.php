<?php
    $db = new Mypdo();
    $UserManager = new UserManager($db);
    $PostManager = new PostManager($db);
    
    $post = $PostManager->getPost($_GET['post']);
    $auteur = $UserManager->getUser($post->getIdUser());
    $time = new DateTime($post->getDate());
    $time = $time->format('H:i:s');
    $newDate = date("d-m-Y", strtotime($post->getDate()));
    $date = str_replace('-','/',$newDate);
    echo '<h2 class="text-center well">'.$post->getSujet().'</h2>';
    echo '<div class="well"><p>'.$post->getDescription().'</p>';
    echo '<p class="right">Publié par <strong>'.$auteur->getPseudo().'</strong> - <small><i>Le '.$date.' à '.$time.'</i></small></p></div>';
?>