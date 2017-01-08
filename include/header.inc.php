<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="utf-8">

		<?php
				$title = "Forum louisgaume.com";
		?>
		<title><?php echo $title ?></title>
		<script src="bootstrap/js/jquery.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
		<script>
			function deconnexion(){
				$.getJSON("include/pages/checkPseudo.php?requete=3");
				document.getElementById('loginout').innerHTML = '<ul class="nav navbar-nav navbar-right"><li><a href="index.php?page=2"><span class="glyphicon glyphicon-user"></span> Inscription</a></li><li><a href="index.php?page=1"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li></ul>';
				$("#nouveau_post").fadeOut(300);
			};

			function load(){
				$.getJSON("include/pages/header_connexion.inc.php",function(data){
					document.getElementById('loginout').innerHTML = data;
				});
			};
		</script>
	</head>
		
	<body>
		<div class="container">
			<div class="jumbotron">
				<h1>Forum</h1>
			</div>
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="index.php">LGF</a>
					</div>
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php">Accueil</a></li>
						<li><a href="index.php?page=8">Tous les posts</a></li>
						<li><a href="index.php">Les plus populaires</a></li>
						<li><a href="index.php?page=7">Post Random</a></li>
					</ul>
					<!-- Emplacement des boutons de connexion, deconnexion -->
					<div id="loginout"></div>
					
					<!-- Chargement des boutons -->
					<script>load();</script>

					<!-- Implémenter recherche -->
					<form class="navbar-form navbar-left">
						<div class="input-group">
							<input name="recherche" type="text" class="form-control" placeholder="Recherche">
							<div class="input-group-btn">
								<button class="btn btn-default" type="submit">
									<i class="glyphicon glyphicon-search"></i>
								</button>
							</div>
						</div>
					</form>
				</div>
			</nav>
	

