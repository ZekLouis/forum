<?php
    $db = new Mypdo();
    $UserManager = new UserManager($db);
    if(isset($_SESSION['pseudo'])){
        echo "Vous êtes déjà connecté.";
    }
    //TODO Inscription toutes les vérifications chaque champ
?>

<script>
    var counter = 3;
    var intervalId = null;
    function action(){
        clearInterval(intervalId);
        window.location.replace("index.php");
    }

    function bip(){
        counterTemp = counter - 1 
        //document.getElementById("redirection").innerHTML = "<strong>Succès!</strong> Connexion réussie. Redirection ... " + counterTemp;
        counter--;
    }
    
    function start(){
        bip();
        intervalId = setInterval(bip, 1000);
        setTimeout(action, counter * 1000);
    }
    
    function connexion(){
        $("#fail").slideUp(300);
        pseudo = $("#pseudo").val();
        mdp = $("#password").val();
        $("#load").addClass("disable");
        $(".progress").show();
        $.getJSON("include/pages/checkPseudo.php?pseudo="+pseudo+"&password="+mdp+"&requete=2", function(data){
            if(data=='0'){
                /*document.getElementById('div2').className = 'input-group has-success'
                $("#load").button('reset');*/
                $("#redirection").show();
                $(".progress").hide();
                start();
            }else{
                /*$("#load").button('reset');*/
                $("#fail").slideDown(300);
                $(".progress").hide();
                $("#load").removeClass("disable");
            }
        });
    }
</script>

<div class="row">
    <div class="col s12 m6 offset-m3">
        <h2 class="center-align">Connexion</h2>

        <?php
            //if(!isset($_POST['pseudo']) and !isset($_POST['password'])){
        ?>

           
                <!-- <label>Pseudo :</label><br />
                <input class="form-control" name="pseudo" required /><br /> -->
                <div class="input-field">
                    <i class="material-icons prefix">account_circle</i>
                    <input name="pseudo" id="pseudo" type="text" class="validate">
                    <label for="pseudo">Pseudo</label>
                </div>
                
                <div id="div2" class="input-field">
                    <i class="material-icons prefix">vpn_key</i>
                    <input id="password" type="password" name="password" class="validate">
                    <label for="password">Password</label>
                </div>

                <div class="row">
                    <button id="load" class="col s8 m8 offset-s2 offset-m2 waves-effect waves-light btn" onclick="connexion();">Connexion</button>
                </div>

                <div class="row">
                    <div class="progress">
                        <div class="indeterminate"></div>
                    </div>
                </div>

                <script>$(".progress").hide();</script>
           
            <div id="fail" class="row">
                <div class="col s12 m12">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                    <span class="card-title">Erreur</span>
                    <p>Problème de mot de passe ou de pseudo.</p>
                    </div>
                </div>
                </div>
            </div>
            <div id="redirection" class="row">
                <div class="col s12 m12">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                    <span class="card-title">Succès !</span>
                    <p>Connexion réussie. Redirection en cours ...</p>
                    </div>
                </div>
                </div>
            </div>
            <script>$("#redirection").hide();$("#fail").hide();</script>
        <?php
            /*}else{
                $salt = "48@!alsd";
		        $password_crypte = sha1(sha1($_POST['password']).$salt);
                $res = $UserManager->connexion($_POST['pseudo'],$password_crypte);

                if($res){
                    echo "<div id=\"redirection\" class=\"alert alert-success\"><strong>Succès!</strong> Connexion réussie. Redirection ... </div>";
                    $_SESSION['pseudo'] = $_POST['pseudo'];
                    echo "<script>start();</script>";
                    //AJAX pour rafraichir le header
                }else{
                    echo "<div class=\"alert alert-danger\"><strong>Erreur!</strong> Pseudo ou Mot de passe incorrect</div>";
                }
                
            }*/
        ?>
    </div>
</div>

<script>
    //Obsolète
    function checkPseudo(){
        var res = "";
        pseudo = document.getElementById('pseudo').value;
        $.getJSON("include/pages/checkPseudo.php?pseudo="+pseudo+"&requete=1", function(data){
            console.log(data)
            if(data=='0'){
                if($("#div1").hasClass("has-error")){
                    document.getElementById('div1').className = 'input-group has-success'
                }else{
                    document.getElementById('div1').className += ' has-success'
                }
            }else{
                if($("#div1").hasClass("has-success")){
                    document.getElementById('div1').className = 'input-group has-error'
                }else{
                    document.getElementById('div1').className += ' has-error'
                }
            }
        });
    }
</script>
