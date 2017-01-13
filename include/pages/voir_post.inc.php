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

<div class="col-md-offset-2 col-md-8 well">
    <div class="form-group">
        <label class="control-label col-sm-2" for="desc">Description:</label>
        <div class="col-sm-10"> 
            <textarea type="text" class="form-control" id="desc" placeholder="Description"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-4">
            <button class="form-control" onclick="publish();">Publier</button>
        </div>
    </div>
</div>