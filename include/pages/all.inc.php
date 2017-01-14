<?php

    $db = new Mypdo();
    $UserManager = new UserManager($db);
    $PostManager = new PostManager($db);

    $listePost = $PostManager->getAll();
?>
    <h2 class="center-align">Tous les posts</h2>
    <div class="row">
    <table class="striped">
        <thead>
            <tr>
                <th class="">Date de publication</th>
                <th class="">Sujet</th>
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
                    echo '<td><a href="index.php?page=6&post='.$post->getId().'">'.$post->getSujet().'</a></td>';
                    echo "<td>".$post->getDescription()."</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    </div>
