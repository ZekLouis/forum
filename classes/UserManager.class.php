<?php
class UserManager{

	private $db;

	public function __construct($db){
		$this->db = $db ;
	}

	public function add($user){
		if(!$this->pseudoExiste($user->getPseudo())){
			$req = $this->db->prepare('INSERT INTO user(pseudo,password,mail) VALUES (:pseudo,:password,:mail);');
			$req->bindValue(':pseudo',$user->getPseudo(),PDO::PARAM_STR);
			$req->bindValue(':password',$user->getPassword(),PDO::PARAM_STR);
			$req->bindValue(':mail',$user->getMail(),PDO::PARAM_STR);
			$res = $req->execute();
			return $res;
		}else{
			return false;
		}
	}

    public function connexion($login,$mdp){
		$sql = "SELECT pseudo, id from user where pseudo=\"$login\" and password=\"$mdp\";";
		$req = $this->db->query($sql);
		$result = $req->fetch(PDO::FETCH_ASSOC);
		return $result;
	}

	public function pseudoExiste($pseudo){
		$sql = "SELECT pseudo from user where pseudo=\"$pseudo\";";
		//echo $sql;
		$req = $this->db->query($sql);
		$result = $req->fetch();
		//echo $result;
		if(empty($result)){
			return false;
		}else{
			return true;
		}
	}

	public function getUser($id){
		$sql = "SELECT id,pseudo,mail FROM user WHERE id=$id;";
		$req = $this->db->query($sql);
		$user = $req->fetch(PDO::FETCH_OBJ);
		return new User($user);
		$req->closeCursor();
    }
}
?>