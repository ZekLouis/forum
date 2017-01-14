
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
				break;
				
			case 5:
				include_once('pages/nouveau_post.php');
				break;

			case 6:
				include_once('pages/voir_post.inc.php');
				break;

			case 7:
				include_once('pages/randomPost.inc.php');
				echo '<script>$("#rand").addClass("active");$("#main").removeClass("active");</script>';
				break;

			case 8:
				include_once('pages/all.inc.php');
				echo '<script>$("#all").addClass("active");$("#main").removeClass("active");</script>';
				break;

			case 9:
				include_once('pages/recherche.inc.php');
				break;

			default : 	
				include_once('pages/main.inc.php');
		}
		
	?>

