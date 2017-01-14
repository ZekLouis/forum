<?php
class PostManager{

	private $db;

	public function __construct($db){
		$this->db = $db ;
	}

    public function add($post){
        $req = $this->db->prepare('INSERT INTO post(id_user,sujet,description) VALUES (:id_user,:sujet,:description);');
        $req->bindValue(':id_user',$post->getIdUser(),PDO::PARAM_STR);
        $req->bindValue(':sujet',$post->getSujet(),PDO::PARAM_STR);
        $req->bindValue(':description',$post->getDescription(),PDO::PARAM_STR);
        $res = $req->execute();
        return $this->db->lastInsertId();
	}

    public function getRecent(){
		$listePost = array();
		$sql = "SELECT id,id_user,date,sujet,description,like_l,dislike FROM post ORDER BY date DESC LIMIT 10;";
		$req = $this->db->query($sql);
		while($post = $req->fetch(PDO::FETCH_OBJ)){
			if(strlen($post->description)>120){
				$post->description = substr($post->description,0,120);
				$post->description = $post->description.'...';
			}
			$listePost[] = new Post($post);
		}
		return $listePost;
		$req->closeCursor();
    }

	public function getPost($id){
		$sql = "SELECT id,id_user,date,sujet,description,like_l,dislike FROM post WHERE id=$id;";
		$req = $this->db->query($sql);
		$post = $req->fetch(PDO::FETCH_OBJ);
		return new Post($post);
		$req->closeCursor();
    }

	public function getAll(){
		$listePost = array();
		$sql = "SELECT id,id_user,date,sujet,description,like_l,dislike FROM post;";
		$req = $this->db->query($sql);
		while($post = $req->fetch(PDO::FETCH_OBJ)){
			if(strlen($post->description)>120){
				$post->description = substr($post->description,0,120);
				$post->description = $post->description.'...';
			}
			$listePost[] = new Post($post);
		}
		return $listePost;
		$req->closeCursor();
	}

	public function randId(){
		$sql = "SELECT id FROM post;";
		$req = $this->db->query($sql);
		while($idPost = $req->fetch(PDO::FETCH_ASSOC)){
			$listePost[] = $idPost['id'];
		}
		return $listePost[array_rand($listePost)];
		$req->closeCursor();
	}

	public function search($string){
		$mots = explode(" ",$string);
		$condition = "description LIKE '%".implode("%' and description LIKE '%",$mots)."%';";
		$listePost = array();
		$sql = "SELECT id,id_user,date,sujet,description,like_l,dislike FROM post WHERE ".$condition;
		$req = $this->db->query($sql);
		while($post = $req->fetch(PDO::FETCH_OBJ)){
			if(strlen($post->description)>120){
				$post->description = substr($post->description,0,120);
				$post->description = $post->description.'...';
			}
			$listePost[] = new Post($post);
		}
		return $listePost;
		$req->closeCursor();
	}

	public function upLike($post){
		$req = $this->db->prepare('UPDATE post SET like_l=like_l+1 WHERE id=:id;');
		$req->bindValue(':id',$post,PDO::PARAM_INT);
		$res = $req->execute();
        return $res;
	}

	public function upDislike($post){
		$req = $this->db->prepare('UPDATE post SET dislike=dislike+1 WHERE id=:id;');
		$req->bindValue(':id',$post,PDO::PARAM_INT);
		$res = $req->execute();
        return $res;
	}
}
?>