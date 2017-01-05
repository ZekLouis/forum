<?php
class UserManager{

	private $db;

	public function __construct($db){
		$this->db = $db ;
	}

	public function add($user){
		$req = $this->db->prepare('INSERT INTO user(pseudo,password,mail) VALUES (:pseudo,:password,:mail);');
		$req->bindValue(':pseudo',$user->getPseudo(),PDO::PARAM_STR);
		$req->bindValue(':password',$user->getPassword(),PDO::PARAM_STR);
        $req->bindValue(':mail',$user->getMail(),PDO::PARAM_STR);
		$res = $req->execute();
        return $res;
	}

    public function connexion($login,$mdp){
		$sql = "SELECT pseudo from user where pseudo=\"".$login."\" and password=\"".$mdp."\";";
		$req = $this->db->query($sql);
		$result = $req->fetch(PDO::FETCH_ASSOC);
		if(empty($result)){
			return false;
		}else{
			return true;
		}
	}
}