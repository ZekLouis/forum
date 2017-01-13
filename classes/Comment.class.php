<?php
class Comment{
	private $id ;
	private $id_user ;
	private $id_post ;
    private $description ;
    private $date ;

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
				
				case 'id_user':
					$this->setIdUser($valeur);
					break;

				case 'id_post':
					$this->setIdPost($valeur);
					break;

                case 'description':
                    $this->setDescription($valeur);
                    break;

                case 'date':
                    $this->setDate($valeur);
                    break;

				default:
					break;
			}
		}
	}

    public function setId($valeur){
        $this->id = $valeur;
    }

    public function setIdUser($valeur){
        $this->id_user = $valeur;
    }

    public function setIdPost($valeur){
        $this->id_post = $valeur;
    }

    public function setDescription($valeur){
        $this->description = $valeur;
    }
    
    public function setDate($valeur){
        $this->date = $valeur ;
    }

    public function getId(){
        return $this->id;
    }

    public function getIdUser(){
        return $this->id_user;
    }

    public function getIdPost(){
        return $this->id_post;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getDate(){
        return $this->date;
    }
}
?>