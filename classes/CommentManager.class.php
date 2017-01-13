<?php
class DepartementManager{
	private $db;

	public function __construct($db){
		$this->db = $db ;
	}

	public function getList(){
		$listeComment = array();
		$sql = "SELECT id,id_user,id_post,description,date FROM comment ORDER BY date DESC";
		$req = $this->db->query($sql);
		while($comment = $req->fetch(PDO::FETCH_OBJ)){
			$listeComment[] = new Comment($comment);
		}
		return $listeComment;
		$req->closeCursor();
	}

    public function add($comment){
        $req = $this->db->prepare('INSERT INTO comment(id_user,id_post,description) VALUES (:id_user,:id_post,:description);');
        $req->bindValue(':id_user',$post->getIdUser(),PDO::PARAM_STR);
        $req->bindValue(':id_post',$post->getSujet(),PDO::PARAM_STR);
        $req->bindValue(':description',$post->getDescription(),PDO::PARAM_STR);
        $res = $req->execute();
        return $res;
	}
}