<?php
    $db = new Mypdo();
    $UserManager = new UserManager($db);

    //TODO Inscription toutes les vérifications chaque champ
?>

<div class="row">
    <div class="col-md-4 col-lg-offset-4">
        <h2 class="text-center">Connexion</h2>

        <?php
            if(!isset($_POST['pseudo']) and !isset($_POST['password'])){
        ?>

            <form action="#" method="post">
                <!-- <label>Pseudo :</label><br />
                <input class="form-control" name="pseudo" required /><br /> -->
                <div id="div1" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="pseudo" type="text" class="form-control form-control-success" onchange="checkPseudo();" name="pseudo" placeholder="Pseudo">
                </div><br />
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                </div><br />
                <input class="form-control" type="submit" value="Connexion" />
            </form>

        <?php
            }else{
                $salt = "48@!alsd";
		        $password_crypte = sha1(sha1($_POST['password']).$salt);
                $res = $UserManager->connexion($_POST['pseudo'],$password_crypte);

                if($res){
                    echo "<div class=\"alert alert-success\"><strong>Succès!</strong> Connexion réussie. Redirection ... </div>";
                    $_SESSION['pseudo'] = $_POST['pseudo'];
                    echo "<script>setTimeout(function(){ window.location.replace(\"index.php\"); }, 3000);</script>";
                    //AJAX pour rafraichir le header
                }else{
                    echo "<div class=\"alert alert-danger\"><strong>Erreur!</strong> Pseudo ou Mot de passe incorrect</div>";
                }
                
            }
        //JSON POUR VOIR SI LE PSEUDO EXISTE DANS LA BASE
        ?>
    </div>
</div>

<script>
    function checkPseudo(){
        var res = "";
        pseudo = document.getElementById('pseudo').value;
        $.getJSON("include/pages/checkPseudo.php?pseudo="+pseudo, function(data){
            console.log(data)
            if(data=='0'){
                document.getElementById('div1').className += ' has-success'
            }else{
                if($("#div1").hasClass("has-success")){
                    document.getElementById('div1').className = 'input-group'
                }
            }
        });
        //console.log(res);
    }
</script>
