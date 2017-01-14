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
    $pseudo = $auteur->getPseudo();
    if($pseudo==""){
        $pseudo = "Utilisateur inconnu";
    }
?>
<div class="row">
    <div class="col s12 m12">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
                <span class="card-title"><?php echo $post->getSujet(); ?></span>
                <p><?php echo $post->getDescription(); ?></p>
            </div>
            <div class="card-action">
                <a href="#" onclick="javascript:like()"><?php echo $post->getLike(); ?> <i class="tiny material-icons">thumb_up</i></a>
                <a href="#" onclick="javascript:dislike()"><?php echo $post->getDislike(); ?> <i class="tiny material-icons">thumb_down</i></a>
                <?php echo '<a class="right">Publié par <strong>'.$pseudo.'</strong> - <small><i>Le '.$date.' à '.$time.'</i></small></a>'; ?>
            </div>
        </div>
    </div>
</div>

<script>
    function publish(){
        desc = $("#desc").val();
        id_post = <?php echo $_GET['post'];?>;
        id_user = <?php if(isset($_SESSION['id'])){echo $_SESSION['id'];}else{echo "\"\"";};?>;
        $.getJSON("include/pages/checkPseudo.php?id_user="+id_user+"&id_post="+id_post+"&description="+desc+"&requete=5",function(data){
            if(data==true){
                $('#desc').val('');
                $("#load").addClass('disable');
                $("#ret_pub").slideDown(300);
                setTimeout(function(){ window.location.reload(); }, 2000);
            }else{
                $("#load").removeClass('disable');
            }
        });
        
    }

    function like(){
        $.getJSON("include/pages/checkPseudo.php?post="+<?php echo $_GET['post']; ?>+"&requete=6",function(data){
            if(data==true){
                window.location.reload();
            }
        });
    }

    function dislike(){
        $.getJSON("include/pages/checkPseudo.php?post="+<?php echo $_GET['post']; ?>+"&requete=7",function(data){
            if(data==true){
                window.location.reload();
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
        /*if($_SESSION['id']==$comment->getIdUser()){
            echo "<div class=\"col-md-offset-3 col-md-8 well well-sm\">";
        }else{
            echo "<div class=\"col-md-offset-1 col-md-8 well well-sm\">";
        }*/
        
?>
<div class="row">
    <?php
        if($_SESSION['id']==$comment->getIdUser()){
            echo '<div class="col offset-m4 s8 m8">';
        }else{
            echo '<div class="col s8 m8">';
        }
    ?>
        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
                <span class="card-title"><?php echo $pseudo; ?></span>
                <p><?php echo $comment->getDescription(); ?></p>
            </div>
            <div class="card-action">
                <?php echo '<a>Publié par <strong>'.$pseudo.'</strong> - <small><i>Le '.$date.' à '.$time.'</i></small></a>'; ?>
            </div>
        </div>
    </div>
</div>
<?php
    }
    if(isset($_SESSION['pseudo'])){
?>
<div class="need_log">
    <div id="div_comment" class="row">
        <div class="input-field col offset-m3 m6">
            <textarea id="desc" class="materialize-textarea" length="300"></textarea>
            <label for="desc">Commentaire</label>
        </div>
    </div>
    <div class="row">
        <div class="col offset-m5">
            <button type="button" id="load" class="btn" onclick="publish();">Publier</button>
        </div>
    </div>
</div>
<div id="ret_pub" class="row">
    <div class="col s12 m12">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
                <span class="card-title">Succès !</span>
                <p>Publication réussie. Rafraichissement en cours ...</p>
            </div>
        </div>
    </div>
</div>
<script>$("#ret_pub").hide();</script>
<?php
    }
?>