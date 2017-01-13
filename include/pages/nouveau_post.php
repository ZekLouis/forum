<?php
    if(!isset($_SESSION['pseudo'])){
        header('location: index.php');
    }
?>
<div class="form-horizontal">

    <div class="form-group">
        <label class="control-label col-sm-2" for="sujet">Sujet:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control input-lg" id="sujet" placeholder="Sujet">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="desc">Description:</label>
        <div class="col-sm-10"> 
            <textarea type="text" class="form-control" id="desc" placeholder="Description"></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-4">
            <button class="form-control" onclick="publish();">Publier</button>
        </div>
    </div>  
</div>

<div id="redirection" class="alert alert-success"><strong>Succès!</strong> Publication réussie. Redirection vers le post créé ... </div>
<div id="fail" class="alert alert-danger"><strong>Erreur!</strong> Echec de la publication</div>
<script>$("#redirection").hide();$("#fail").hide();</script>

<script>
    function publish(){
        var id = <?php echo $_SESSION['id']; ?>;
        $.getJSON("include/pages/checkPseudo.php?id_user="+id+"&sujet="+$("#sujet").val()+"&description="+$("#desc").val()+"&requete=4",function(data){
            $("#redirection").slideDown(300);
            redirect(data);
        });
    };

    function redirect(data){
        setTimeout(function(){
            window.location.replace("index.php?page=6&post="+data);
        }, 3000);
    };
</script>