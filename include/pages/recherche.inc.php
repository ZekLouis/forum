<?php
    echo "<h2 class='center-align'>Recherche</h2>";

    $db = new Mypdo();
    $PostManager = new PostManager($db);
    $UserManager = new UserManager($db);

    $listePost = $PostManager->search($_GET['recherche']);
?>
    
    <div class="row">
    <table class="striped">
        <thead>
            <tr>
                <th class="col-xs-2">Date de publication</th>
                <th class="col-xs-1">Auteur</th>
                <th class="col-xs-2">Sujet</th>
                <th>Description</th>
            </tr>
        </thead>

        <tbody>
            <?php
                foreach ($listePost as $post) {
                    $time = new DateTime($post->getDate());
                    $time = $time->format('H:i:s');
                    $newDate = date("d-m-Y", strtotime($post->getDate()));
                    $date = str_replace('-','/',$newDate);
                    echo '<tr>';
                    echo "<td>".$date." à ".$time."</td>";
                    $user = $UserManager->getUser($post->getIdUser())->getPseudo();
                    if($user==""){
                        $user="Utilisateur inconnu";
                    }
                    echo "<td>".$user."</td>";
                    echo '<td><a href="index.php?page=6&post='.$post->getId().'">'.$post->getSujet().'</a></td>';
                    echo "<td>".$post->getDescription()."</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    </div>