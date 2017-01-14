<?php
class Post{
	private $id ;
    private $id_user;
	private $date ;
	private $sujet ;
    private $description ;
    private $like;
    private $dislike;

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

				case 'date':
					$this->setDate($valeur);
					break;

                case 'sujet':
                    $this->SetSujet($valeur);
                    break;

                case 'description':
                    $this->setDescription($valeur);
                    break;

                case 'like_l':
                    $this->setLike($valeur);
                    break;

                case 'dislike':
                    $this->setDislike($valeur);
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

    public function setDate($valeur){
        $this->date = $valeur;
    }

    public function setSujet($valeur){
        $this->sujet = $valeur;
    }

    public function setDescription($valeur){
        $this->description = $valeur;
    }

    public function setLike($valeur){
        $this->like = $valeur;
    }

    public function setDislike($valeur){
        $this->dislike = $valeur;
    }

    public function getLike(){
        return $this->like;
    }

    public function getDislike(){
        return $this->dislike;
    }

    public function getId(){
        return $this->id;
    }

    public function getIdUser(){
        return $this->id_user;
    }

    public function getDate(){
        return $this->date;
    }

    public function getSujet(){
        return $this->sujet;
    }

    public function getDescription(){
        return $this->description;
    }

}
?>