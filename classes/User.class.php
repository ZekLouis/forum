<?php
class User{
	private $id ;
	private $pseudo ;
	private $password ;
    private $mail ;

	public function __construct($valeurs = array()){
		if(!empty($valeurs)){
			$this->affecte($valeurs);
		}
	}

	public function affecte($donnees){
		foreach ($donnees as $attribut => $valeur) {
			switch ($attribut) {
				case 'id':
					$this->setId($valeur);
					break;
				
				case 'pseudo':
					$this->setPseudo($valeur);
					break;

				case 'password':
					$this->setPassword($valeur);
					break;

                case 'mail':
                    $this->setMail($valeur);
                    break;

				default:
					break;
			}
		}
	}

    public function setId($valeur){
        $this->id = $valeur;
    }

    public function setPseudo($valeur){
        $this->pseudo = $valeur;
    }

    public function setPassword($valeur){
        $this->password = $valeur;
    }

    public function setMail($valeur){
        $this->mail = $valeur;
    }

    public function getId(){
        return $this->id;
    }

    public function getPseudo(){
        return $this->pseudo;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getMail(){
        return $this->mail;
    }
}
?>