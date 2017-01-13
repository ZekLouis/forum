<?php
class CommentManager{
	private $db;

	public function __construct($db){
		$this->db = $db ;
	}

	public function getList($id_post){
		$listeComment = array();
		$sql = "SELECT id,id_user,id_post,description,date FROM comment WHERE id_post=$id_post ORDER BY date;";
		$req = $this->db->query($sql);
		while($comment = $req->fetch(PDO::FETCH_OBJ)){
			$listeComment[] = new Comment($comment);
		}
		return $listeComment;
		$req->closeCursor();
	}

    public function add($comment){
        $req = $this->db->prepare('INSERT INTO comment(id_user,id_post,description) VALUES (:id_user,:id_post,:description);');
        $req->bindValue(':id_user',$comment->getIdUser(),PDO::PARAM_STR);
        $req->bindValue(':id_post',$comment->getIdPost(),PDO::PARAM_STR);
        $req->bindValue(':description',$comment->getDescription(),PDO::PARAM_STR);
        $res = $req->execute();
        return $res;
	}
}