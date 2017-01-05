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
	</head>
		
	<body>
		<div class="container">
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="index.php?page=0">Forum louisgaume.com</a>
					</div>
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php?page=0">Accueil</a></li>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.php?page=2"><span class="glyphicon glyphicon-user"></span> Inscription</a></li>
						<li><a href="index.php?page=1"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
					</ul>

					<!-- Implémenter recherche -->
					<form class="navbar-form navbar-right">
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
	

