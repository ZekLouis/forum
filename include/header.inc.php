<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="utf-8">

		<?php
				$title = "Hoowe";
		?>
		<title><?php echo $title ?></title>
		<script src="bootstrap/js/jquery.js"></script>
		<!--<script src="bootstrap/js/bootstrap.min.js"></script>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!--Import Google Icon Font-->
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<script>
			function deconnexion(){
				$.getJSON("include/pages/checkPseudo.php?requete=3");
				document.getElementById('loginout').innerHTML = '<ul class="right hide-on-med-and-down"><li><a href="index.php?page=2"><i class="left material-icons">perm_identity</i>Inscription</a></li><li><a href="index.php?page=1"><i class="left material-icons">input</i>Connexion</a></li></ul>';
				document.getElementById('slide-out').innerHTML = '<li id="main" class="active"><a class="waves-effect" href="index.php">Accueil</a></li><li id="all"><a class="waves-effect" href="index.php?page=8">Tous les posts</a></li><li id="pop"><a class="waves-effect" href="index.php">Les plus populaires</a></li><li id="rand"><a class="waves-effect" href="index.php?page=6&post=-1">Post Random</a></li><li id="insc"><a class="waves-effect" href="index.php">Membres</a></li><li><a href="index.php?page=2"><i class="left material-icons">perm_identity</i>Inscription</a></li><li><a href="index.php?page=1"><i class="left material-icons">input</i>Connexion</a></li>';
				$(".need_log").fadeOut(300);
			};

			function load(){
				$.getJSON("include/pages/header_connexion.inc.php",function(data){
					document.getElementById('loginout').innerHTML = '<ul class="right hide-on-med-and-down">'+data+'</ul>';
					document.getElementById('slide-out').innerHTML += data;
				});
			};
		</script>
	</head>
		
	<body>
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      	<script type="text/javascript" src="js/materialize.min.js"></script>
		<div class="container">
			<h1>Hoowe</h1>
		</div>
			<nav>
				<div class="nav-wrapper teal lighten-1">
					<ul id="nav-mobile" class="left hide-on-med-and-down">
						<li id="main" class="active"><a class="waves-effect" href="index.php">Accueil</a></li>
						<li id="all"><a class="waves-effect" href="index.php?page=8">Tous les posts</a></li>
						<li id="pop"><a class="waves-effect" href="index.php">Les plus populaires</a></li>
						<li id="rand"><a class="waves-effect" href="index.php?page=6&post=-1">Post Random</a></li>
						<li id="insc"><a class="waves-effect" href="index.php">Membres</a></li>
					</ul>
					<ul id="slide-out" class="side-nav hide-on-large-only">
						<li id="main" class="active"><a class="waves-effect" href="index.php">Accueil</a></li>
						<li id="all"><a class="waves-effect" href="index.php?page=8">Tous les posts</a></li>
						<li id="pop"><a class="waves-effect" href="index.php">Les plus populaires</a></li>
						<li id="rand"><a class="waves-effect" href="index.php?page=6&post=-1">Post Random</a></li>
						<li id="insc"><a class="waves-effect" href="index.php">Membres</a></li>
					</ul>
					<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
					<!-- Emplacement des boutons de connexion, deconnexion -->
					<div id="loginout"></div>
					
					<!-- Chargement des boutons et menu mobile-->
					<script>
						load();
						$('.button-collapse').sideNav({
							menuWidth: 300, // Default is 240
							edge: 'left', // Choose the horizontal origin
							closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
							draggable: true // Choose whether you can drag to open on touch screens
						}
						);
					</script>

					<!-- Implémenter recherche -->				
				</div>
			</nav>
			<form action="index.php" method="GET">
				<div class="row">
					<div class="input-field col offset-m4 m4 s12">
						<input name="recherche" type="text" class="col m11 s9" placeholder="Recherche">
						<button class="btn waves-effect waves-light col m1 s3" type="submit"><i class="material-icons">search</i></button>
					</div>
					<input name="page" type="hidden" value="9">
					
				</div>	
			</form>
			<div class="container">
	

