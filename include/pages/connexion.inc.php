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
        document.getElementById("redirection").innerHTML = "<strong>Succès!</strong> Connexion réussie. Redirection ... " + counterTemp;
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
        $("#load").button('loading');
        $.getJSON("include/pages/checkPseudo.php?pseudo="+pseudo+"&password="+mdp+"&requete=2", function(data){
            if(data=='0'){
                document.getElementById('div2').className = 'input-group has-success'
                $("#load").button('reset');
                $("#redirection").slideDown(300);
                start();
            }else{
                $("#load").button('reset');
                $("#fail").slideDown(300);
            }
        });
    }
</script>

<div class="row">
    <div class="col-md-4 col-lg-offset-4">
        <h2 class="text-center">Connexion</h2>

        <?php
            //if(!isset($_POST['pseudo']) and !isset($_POST['password'])){
        ?>

           
                <!-- <label>Pseudo :</label><br />
                <input class="form-control" name="pseudo" required /><br /> -->
                <div id="div1" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="pseudo" type="text" class="form-control form-control-success" onchange="checkPseudo();" name="pseudo" placeholder="Pseudo">
                </div><br />
                <div id="div2" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password" type="password" class="form-control form-control-success" name="password" placeholder="Password">
                </div><br />
                <button id="load" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Connexion en cours ..." class="form-control" onclick="connexion();">Connexion</button>
           
            
            <div id="redirection" class="alert alert-success"><strong>Succès!</strong> Connexion réussie. Redirection ... </div>
            <div id="fail" class="alert alert-danger"><strong>Erreur!</strong> Pseudo ou Mot de passe incorrect</div>
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
