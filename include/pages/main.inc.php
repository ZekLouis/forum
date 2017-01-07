<?php

    $db = new Mypdo();
    $UserManager = new UserManager($db);
    $PostManager = new PostManager($db);

    if(isset($_SESSION['pseudo'])){
        echo '<div class="row" id="nouveau_post"><a href="index.php?page=5" style="color:white;text-decoration:none"><button type="button" class="btn btn-primary btn-lg center-block">Nouveau post</button></a></div>';
    }

    $listePost = $PostManager->getRecent();
?>
    <div class="row">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th class="col-xs-2">Date de publication</th>
                <th class="col-xs-2">Sujet</th>
                <th>Description</th>
            </tr>
        </thead>

        <tbody>
            <?php
                foreach ($listePost as $post) {
                    echo "<tr>";
                    $date = $post->getDate();
                    echo "<td>".$date."</td>";
                    echo "<td>".$post->getSujet()."</td>";
                    echo "<td>".$post->getDescription()."</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    </div>
