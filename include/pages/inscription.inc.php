<?php
    $db = new Mypdo();
    $UserManager = new UserManager($db);
?>

<div class="row">
    <div class="col-md-4 col-lg-offset-4">
        <h2 class="text-center">Inscription</h2>

        <?php
            if(!isset($_POST['pseudo']) and !isset($_POST['password']) and !isset($_POST['mail'])){
        ?>

            <form action="#" method="post">
                <!-- <label>Pseudo :</label><br />
                <input class="form-control" name="pseudo" required /><br /> -->
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" name="pseudo" placeholder="Pseudo" required>
                </div><br />
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                </div><br />
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input id="mail" type="email" class="form-control" name="mail" placeholder="Email" required>
                </div><br />
                <input class="form-control" type="submit" value="Inscription" />
            </form>

        <?php
            }else{
                $salt = "48@!alsd";
		        $password_crypte = sha1(sha1($_POST['password']).$salt);
                $user = new User(array('pseudo'=>$_POST['pseudo'],'password'=>$password_crypte,'mail'=>$_POST['mail']));
                $res = $UserManager->add($user);
                if($res){
                    echo "<div class=\"alert alert-success\"><strong>Succès!</strong> Inscription réussie.</div>";
                }else{
                    echo "<div class=\"alert alert-danger\"><strong>Erreur!</strong> Votre inscription n'a pas aboutie.</div>";
                }
            }
        //JSON POUR VOIR SI LE PSEUDO EXISTE DANS LA BASE
        ?>
    </div>
</div>
