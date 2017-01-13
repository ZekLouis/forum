<?php
    session_start();
    header('Content-type: application/json');

    include_once('../config.inc.php');
    include_once('../../classes/Mypdo.class.php');
    include_once('../../classes/User.class.php');
    include_once('../../classes/UserManager.class.php');
    include_once('../../classes/Post.class.php');
    include_once('../../classes/PostManager.class.php');


    $db = new Mypdo();
    $UserManager = new UserManager($db);
    $PostManager = new PostManager($db);
    $CommentManager = new CommentManager($db);

    switch($_GET['requete']){
        case 1:
            $pseudo = $_GET['pseudo'];
            $res = $UserManager->pseudoExiste($pseudo);
            if($res){
                echo json_encode('0');
            }else{
                echo json_encode('1');
            }
            break;

        case 2:
            $pseudo = $_GET['pseudo'];
            $salt = "48@!alsd";
            $password_crypte = sha1(sha1($_GET['password']).$salt);
            $res = $UserManager->connexion($pseudo,$password_crypte);
            if(!empty($res)){
                echo json_encode('0');
                $_SESSION['pseudo'] = $res['pseudo'];
                $_SESSION['id'] = $res['id'];
            }else{
                echo json_encode('1');
            }
            break;

        case 3:
            session_destroy();
            break;

        case 4:
            $post = New Post(array('id_user'=>$_GET['id_user'],'sujet'=>$_GET['sujet'],'description'=>$_GET['description']));
            $res = $PostManager->add($post);
            echo json_encode($res);
            break;

        case 5:
            $comment = New Comment(array('id_user'=>$_GET['id_user'],'id_post'=>$_GET['id_post'],'description'=>$_GET['desc']));
            $res = $CommentManager->add($comment);
            echo json_encode($res);
            break;

        default:
            break;
    }
    
    
?>