
	<?php
		if (!empty($_GET["page"])){
			$page=$_GET["page"];
		}else{
			$page=0;
		}
		
		switch ($page) {
			case 0:
				include_once('pages/main.inc.php');
				break;
			case 1:
				include_once('pages/connexion.inc.php');
				break;
			case 2:
				include_once('pages/inscription.inc.php');
				break;
			case 3:
				include_once('pages/deconnexion.inc.php');
				break;
			case 4:
				include_once('pages/profil.inc.php');
			default : 	
				include_once('pages/main.inc.php');
		}
		
	?>

