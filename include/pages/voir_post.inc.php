<?php
    $db = new Mypdo();
    $UserManager = new UserManager($db);
    $PostManager = new PostManager($db);
    $CommentManager = new CommentManager($db);
    
    if($_GET['post']==-1){
        $_GET['post'] = $PostManager->RandId();
        $id = $PostManager->RandId();
    }else{
        $id = $_GET['post'];
    }

    $post = $PostManager->getPost($_GET['post']);
    $auteur = $UserManager->getUser($post->getIdUser());
    $time = new DateTime($post->getDate());
    $time = $time->format('H:i:s');
    $newDate = date("d-m-Y", strtotime($post->getDate()));
    $date = str_replace('-','/',$newDate);
    echo '<h2 class="text-center well well-lg">'.$post->getSujet().'</h2>';
    echo '<div class="well well-lg"><p>'.$post->getDescription().'</p>';
    $pseudo = $auteur->getPseudo();
    if($pseudo==""){
        $pseudo = "Utilisateur inconnu";
    }
    echo '<p class="right">Publié par <strong>'.$pseudo.'</strong> - <small><i>Le '.$date.' à '.$time.'</i></small></p></div>';
?>

<script>
    function publish(){
        desc = $("#desc").val();
        id_post = <?php echo $_GET['post'];?>;
        id_user = <?php echo $_SESSION['id'];?>;
        $("#load").button('loading');
        $.getJSON("include/pages/checkPseudo.php?id_user="+id_user+"&id_post="+id_post+"&description="+desc+"&requete=5",function(data){
            if(data==true){
                $("#load").button('reset');
                $('#desc').val('');
                $("#div_comment").addClass('has-success has-feedback');
                $('#desc').attr("placeholder", "Publication réussie !");
            }else{
                $("#load").button('reset');
                $("#div_comment").addClass('has-error has-feedback');
                $('#desc').attr("placeholder", "Echec de la publication");
            }
        });
        
    }
</script>



<?php
    $listeComment = $CommentManager->getList($id);
    foreach ($listeComment as $comment) {
        $time = new DateTime($comment->getDate());
        $time = $time->format('H:i:s');
        $newDate = date("d-m-Y", strtotime($comment->getDate()));
        $date = str_replace('-','/',$newDate);
        $auteurComment = $UserManager->getUser($comment->getIdUser());
        $pseudo = $auteurComment->getPseudo();
        if($pseudo==""){
            $pseudo = "Utilisateur inconnu";
        }
        if($_SESSION['id']==$comment->getIdUser()){
            echo "<div class=\"col-md-offset-3 col-md-8 well well-sm\">";
        }else{
            echo "<div class=\"col-md-offset-1 col-md-8 well well-sm\">";
        }
        echo "<p>".$comment->getDescription()."</p>";
        echo '<p class="right">Publié par <strong>'.$pseudo.'</strong> - <small><i>Le '.$date.' à '.$time.'</i></small></p></div>';
    }
    if(isset($_SESSION['pseudo'])){
?>
<div class="need_log col-md-offset-3 col-md-6 well">
    <div id="div_comment" class="form-group">
        <label class="control-label col-md-4" for="desc">Commentaire:</label>
        <div class="col-sm-12"> 
            <textarea type="text" class="form-control" id="desc" placeholder="Description"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-4">
            <button type="button" id="load" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Publication" class="form-control" onclick="publish();">Publier</button>
        </div>
    </div>
</div>
<?php
    }
?>